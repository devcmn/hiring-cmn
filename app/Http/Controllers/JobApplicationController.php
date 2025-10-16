<?php

namespace App\Http\Controllers;

use App\Models\JobApplicationModel;
use App\Models\JobListModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JobApplicationController extends Controller
{

    public function applicants()
    {
        $jobs = JobListModel::with(['applications' => function ($query) {
            $query->latest();
        }])
            ->whereHas('applications')
            ->withCount('applications')
            ->latest()
            ->get();

        // Stats
        $allApplications = JobApplicationModel::all();
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

    public function getApplicationDetails($id)
    {
        $application = JobApplicationModel::with(['job', 'user'])->findOrFail($id);

        return response()->json([
            'application' => $application
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $application = JobApplicationModel::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return response()->json(['success' => true]);
    }

    public function downloadForm($id)
    {
        $application = JobApplicationModel::findOrFail($id);
        $job = $application->job;

        $pdf = Pdf::loadView('pdf.hr.applicant-form', [
            'application' => $application,
            'job' => $job,
        ]);

        $fileName = 'Application_' . $application->first_name . '_' . $application->last_name . '.pdf';

        return $pdf->stream($fileName);
    }
}
