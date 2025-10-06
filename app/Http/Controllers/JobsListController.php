<?php

namespace App\Http\Controllers;

use App\Models\JobListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class JobsListController extends Controller
{
    public function indexForCandidate()
    {
        $jobs = JobListModel::where('status', 'active')->latest()->get();
        return view('candidate.jobs', compact('jobs'));
    }

    public function indexForHr()
    {
        $jobs = JobListModel::latest()->get();
        return view('hr.jobs', compact('jobs'));
    }

    public function postJob()
    {
        return view('hr.post-job');
    }

    public function storeJobs(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:100',
            'salary' => 'nullable|string|max:50',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
        ]);

        JobListModel::create($validated);

        return redirect()->route('hr.jobs')->with('success', 'Job posted successfully!');
    }
}
