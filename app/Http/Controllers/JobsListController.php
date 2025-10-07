<?php

namespace App\Http\Controllers;

use App\Models\JobApplicationModel;
use App\Models\JobListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class JobsListController extends Controller
{
    // CANDIDATE
    public function indexForCandidate()
    {
        $jobs = JobListModel::where('status', 'Active')
            ->where(function ($q) {
                $q->whereNull('application_deadline')
                    ->orWhere('application_deadline', '>=', now());
            })
            ->latest()
            ->get();
        return view('candidate.jobs', compact('jobs'));
    }

    public function detail($id)
    {
        $job = JobListModel::findOrFail($id);
        return view('candidate.detail', compact('job'));
    }

    public function showApplyForm(JobListModel $job)
    {
        return view('candidate.apply', compact('job'));
    }

    public function myApplications()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Fetch applications with related job data
        $applications = $user->applications()
            ->with('job')
            ->latest()
            ->paginate(10);

        return view('candidate.my-applications', compact('applications'));
    }

    public function submitApplication(Request $request, JobListModel $job)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'other_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
        ]);

        try {
            if ($job->applications()->where('user_id', Auth::id())->exists()) {
                return redirect()->back()->with('error', 'You have already applied for this job.');
            }
            $firstName = $request->first_name;
            $lastName = $request->last_name;
            $jobFolder = Str::slug($job->id . '-' . $job->title);
            $candidateFolder = Str::slug($firstName . '-' . $lastName);

            $basePath = "private/jobs/{$jobFolder}/{$candidateFolder}";

            // Store Resume (CV)
            $resume = $request->file('resume');
            $cvPath = $resume->storeAs($basePath, "CV_{$firstName}_{$lastName}." . $resume->getClientOriginalExtension());

            // Store Other File if exists
            $otherPath = null;
            if ($request->hasFile('other_file')) {
                $otherFile = $request->file('other_file');
                $otherPath = $otherFile->storeAs($basePath, "Other_{$firstName}_{$lastName}." . $otherFile->getClientOriginalExtension());
            }

            // Save application
            $job->applications()->create([
                'user_id' => Auth::user()->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'cover_letter' => $request->cover_letter,
                'cv_path' => $cvPath,
                'other_path' => $otherPath,
            ]);

            return redirect()->route('candidate.jobs', $job->id)
                ->with('success', 'Application submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Job Application Error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to submit application. Please try again.');
        }
    }

    // END CANDIDATE

    // HR
    public function indexForHr(Request $request)
    {
        $filter = $request->query('filter', 'active');

        $query = JobListModel::query();

        if ($filter === 'active') {
            $query->where('status', JobListModel::ACTIVE);
        } elseif ($filter === 'closed') {
            $query->where('status',  JobListModel::CLOSED);
        } elseif ($filter === 'all') {
            // Show all jobs
        }

        $jobs = $query->withCount('applications')->latest()->get();

        $activeCount = JobListModel::where('status', 'Active')->count();
        $closedCount = JobListModel::where('status', 'Closed')->count();

        return view('hr.jobs', compact(
            'jobs',
            'activeCount',
            'closedCount',
            'filter'
        ));
    }

    public function postJob()
    {
        return view('hr.post-job');
    }

    public function getJobDetails($id)
    {
        $job = JobListModel::withCount('applications')->findOrFail($id);

        return response()->json([
            'job' => $job
        ]);
    }

    public function storeJobs(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'job_type' => 'required|string|max:100',
                'salary' => 'nullable|string|max:50',
                'description' => 'required|string',
                'requirements' => 'required|string',
                'benefits' => 'nullable|string',
                'application_deadline' => 'nullable|date',
            ]);

            $validated['posted_by'] = auth()->id();

            JobListModel::create($validated);

            return redirect()->route('hr.jobs')->with('success', 'Job posted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to post job: ' . $e->getMessage());
        }
    }
    // END HR JOB

    // HR APPLICANTS
    public function applicants()
    {
        // Get all jobs with their applications
        $jobs = JobListModel::with(
            ['applications' => function ($query) {
                $query->latest();
            }]
        )
            ->whereHas('applications')
            ->withCount('applications')
            ->latest()
            ->get();

        // Get all applications for statistics
        $allApplications = JobApplicationModel::all();

        // Calculate statistics
        $totalApplications = $allApplications->count();
        $pendingApplications = $allApplications->where('status', 'pending')->count();
        $interviewApplications = $allApplications->where('status', 'interview')->count();
        $acceptedApplications = $allApplications->where('status', 'accepted')->count();
        $rejectedApplications = $allApplications->where('status', 'rejected')->count();

        return view('hr.applicants', compact(
            'jobs',
            'totalApplications',
            'pendingApplications',
            'interviewApplications',
            'acceptedApplications',
            'rejectedApplications'
        ));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,interview,accepted,rejected'
        ]);

        $application = JobApplicationModel::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return response()->json([
            'success' => true,
            'message' => 'Application status updated successfully'
        ]);
    }

    public function getApplicationDetails($id)
    {
        $application = JobApplicationModel::with(['job', 'user'])->findOrFail($id);

        return response()->json([
            'application' => $application
        ]);
    }

    public function closeJob(JobListModel $job)
    {
        if ($job->status === 'Closed') {
            return response()->json(['success' => false, 'message' => 'Job is already closed.']);
        }

        $job->update(['status' => 'Closed']);
        return response()->json(['success' => true]);
    }
    // END HR APPLICANTS
}
