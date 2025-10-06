<?php

namespace App\Http\Controllers;

use App\Models\JobListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class JobsListController extends Controller
{
    public function storeJobs(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string',
            'salary' => 'nullable|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
        ]);

        JobListModel::create([
            'title' => $validated['job_title'],
            'company' => $validated['company'],
            'location' => $validated['location'],
            'type' => $validated['job_type'],
            'salary' => $validated['salary'] ?? null,
            'description' => $validated['description'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'] ?? null,
            'posted_by' => auth()->id(), // Optional
        ]);

        return redirect()->back()->with('success', 'Job successfully published!');
    }
}
