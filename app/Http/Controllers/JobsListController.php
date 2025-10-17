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
                    ->orWhere('application_deadline', '>=', today());
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
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'home_phone' => 'nullable|string|max:20',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'religion' => 'required|in:islam,christian,catholic,hindu,buddha,confucius',
            'blood_type' => 'nullable|in:A,B,AB,O',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'national_id' => 'required|string|max:16',
            'domicile_address' => 'required|string',
            'current_address' => 'required|string',
            'housing_type' => 'required|in:owned,rented,parents,dormitory',
            'vehicle_type' => 'required|in:motorcycle,car,none',
            'vehicle_owner' => 'nullable|in:self,parents,spouse,company',
            'vehicle_year' => 'nullable|integer|min:1900|max:2030',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',

            // Family Members
            'family_members' => 'nullable|array',
            'family_members.*.relation' => 'required_with:family_members|in:father,mother,sibling,other',
            'family_members.*.name' => 'required_with:family_members|string|max:255',
            'family_members.*.age' => 'nullable|integer|min:0|max:150',
            'family_members.*.occupation' => 'nullable|string|max:255',
            'family_members.*.phone' => 'nullable|string|max:20',
            'family_members.*.address' => 'nullable|string',

            // Spouse & Children
            'spouse_children' => 'nullable|array',
            'spouse_children.*.relation' => 'required_with:spouse_children|in:spouse,child',
            'spouse_children.*.name' => 'required_with:spouse_children|string|max:255',
            'spouse_children.*.birth_date' => 'nullable|date',
            'spouse_children.*.occupation' => 'nullable|string|max:255',
            'spouse_children.*.education' => 'nullable|string|max:255',

            // Education
            'education' => 'nullable|array',
            'education.*.name' => 'required_with:education|string|max:255',
            'education.*.major_or_topic' => 'nullable|string|max:255',
            'education.*.start_year' => 'nullable|integer|min:1950|max:2030',
            'education.*.end_year' => 'nullable|integer|min:1950|max:2030',
            'education.*.note' => 'nullable|string|max:255',

            // Seminars
            'seminars' => 'nullable|array',
            'seminars.*.name' => 'required_with:seminars|string|max:255',
            'seminars.*.major_or_topic' => 'nullable|string|max:255',
            'seminars.*.start_year' => 'nullable|integer|min:1950|max:2030',
            'seminars.*.note' => 'nullable|string|max:255',

            // Organizations
            'organizations' => 'nullable|array',
            'organizations.*.name' => 'required_with:organizations|string|max:255',
            'organizations.*.position' => 'nullable|string|max:255',
            'organizations.*.start_year' => 'nullable|integer|min:1950|max:2030',
            'organizations.*.end_year' => 'nullable|integer|min:1950|max:2030',
            'organizations.*.note' => 'nullable|string|max:50',

            // Work Experience
            'work_experience' => 'nullable|array',
            'work_experience.*.company_name' => 'required_with:work_experience|string|max:255',
            'work_experience.*.position' => 'required_with:work_experience|string|max:255',
            'work_experience.*.start_date' => 'nullable|date',
            'work_experience.*.end_date' => 'nullable|date|after_or_equal:work_experience.*.start_date',
            'work_experience.*.is_current' => 'nullable|boolean',
            'work_experience.*.last_salary' => 'nullable|string|max:255',
            'work_experience.*.resign_reason' => 'nullable|string|max:255',
            'work_experience.*.responsibilities' => 'nullable|string',

            // Documents
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'other_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string|max:5000',
            'terms' => 'required|accepted',
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

            // Store Photo
            $photo = $request->file('photo');
            $photoPath = $photo->storeAs(
                $basePath,
                "Photo_{$firstName}_{$lastName}." . $photo->getClientOriginalExtension()
            );

            // Store Resume (CV)
            $resume = $request->file('resume');
            $cvPath = $resume->storeAs(
                $basePath,
                "CV_{$firstName}_{$lastName}." . $resume->getClientOriginalExtension()
            );

            // Store Other File if exists
            $otherPath = null;
            if ($request->hasFile('other_file')) {
                $otherFile = $request->file('other_file');
                $otherPath = $otherFile->storeAs(
                    $basePath,
                    "Supporting_Docs_{$firstName}_{$lastName}." . $otherFile->getClientOriginalExtension()
                );
            }

            // 🧹 Sanitize last_salary values in work_experience array
            $workExperience = $request->work_experience ?? [];
            foreach ($workExperience as &$exp) {
                if (!empty($exp['last_salary'])) {
                    $exp['last_salary'] = preg_replace('/\D/', '', $exp['last_salary']); // Remove non-digit chars
                }
            }

            // Prepare application data
            $applicationData = [
                'user_id' => Auth::user()->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'home_phone' => $request->home_phone,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'blood_type' => $request->blood_type,
                'marital_status' => $request->marital_status,
                'national_id' => $request->national_id,
                'domicile_address' => $request->domicile_address,
                'current_address' => $request->current_address,
                'housing_type' => $request->housing_type,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_owner' => $request->vehicle_owner,
                'vehicle_year' => $request->vehicle_year,
                'photo_path' => $photoPath,
                'cv_path' => $cvPath,
                'other_path' => $otherPath,
                'cover_letter' => $request->cover_letter,
                'family_members' => json_encode($request->family_members ?? []),
                'spouse_children' => json_encode($request->spouse_children ?? []),
                'education' => json_encode($request->education ?? []),
                'seminars' => json_encode($request->seminars ?? []),
                'organizations' => json_encode($request->organizations ?? []),
                'work_experience' => json_encode($workExperience),
            ];

            // Prepare other_info
            $otherInfo = [];
            for ($i = 1; $i <= 14; $i++) {
                $answerKey = "question_{$i}_answer";
                $explanationKey = "question_{$i}_explanation";

                $answer = $request->input($answerKey);

                // 🧹 Sanitize salary-like input for Question 12
                if ($i === 12 && $answer) {
                    $answer = preg_replace('/\D/', '', $answer);
                }

                $otherInfo["question_{$i}"] = [
                    'answer' => $answer,
                    'explanation' => $request->input($explanationKey) ?? null,
                ];
            }

            // Add other_info to application data
            $applicationData['other_info'] = json_encode($otherInfo);

            // Create the application
            $job->applications()->create($applicationData);

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

    public function edit(JobListModel $job)
    {
        return view('hr.edit', compact('job'));
    }

    public function update(Request $request, JobListModel $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|string',
            'salary' => 'nullable|numeric',
            'application_deadline' => 'nullable|date',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
        ]);

        $job->update($validated);

        return redirect()->route('hr.jobs')->with('success', 'Job updated successfully.');
    }

    public function closeJob(JobListModel $job)
    {
        if ($job->status === 'Closed') {
            return response()->json(['success' => false, 'message' => 'Job is already closed.']);
        }

        $job->update(['status' => 'Closed']);
        return response()->json(['success' => true]);
    }
    // END HR JOB
}
