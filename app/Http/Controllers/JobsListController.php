<?php

namespace App\Http\Controllers;

use App\Models\JobListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class JobsListController extends Controller
{
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

    public function apply($id)
    {
        $job = JobListModel::findOrFail($id);
        // maybe check auth() here later
        // return view('candidate.apply', compact('job'));
    }

    public function indexForHr(Request $request)
    {
        $filter = $request->query('filter', 'active');

        $query = JobListModel::query();

        if ($filter === JobListModel::ACTIVE) {
            $query->where('status', 'Active');
        } elseif ($filter === JobListModel::CLOSED) {
            $query->where('status', 'Closed');
        }

        $jobs = $query->latest()->get();

        $activeCount = JobListModel::where('status', 'Active')->count();
        $closedCount = JobListModel::where('status', 'Closed')->count();

        return view('hr.jobs', compact('jobs', 'activeCount', 'closedCount', 'filter'));
    }


    public function postJob()
    {
        return view('hr.post-job');
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

            JobListModel::create($validated);

            return redirect()->route('hr.jobs')->with('success', 'Job posted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to post job: ' . $e->getMessage());
        }
    }
}
