<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobsListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home / redirect based on role
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        return match ($role) {
            'hr' => redirect()->route('hr.jobs'),
            'candidate' => redirect()->route('candidate.jobs'),
            default => redirect('/login')
        };
    }
    // Guest sees candidate jobs
    return redirect()->route('candidate.jobs');
});

// Guest
Route::controller(JobsListController::class)->group(function () {
    Route::get('/candidate/job', 'indexForCandidate')->name('candidate.jobs');
    Route::get('/jobs/{id}/detail', 'detail')->name('jobs.detail');
});

// Auth routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});

Route::controller(JobsListController::class)->group(function () {
    // Candidate routes
    Route::middleware(['auth', 'role:candidate'])->group(function () {
        Route::get('/jobs/{job}/apply', 'showApplyForm')->name('jobs.apply');
        Route::post('/jobs/{job}/apply', 'submitApplication')->name('jobs.submit');
        Route::get('/candidate/applications', 'myApplications')->name('candidate.applications');
    });

    // HR routes
    Route::middleware(['auth', 'role:hr'])->group(function () {
        // Job Management
        Route::get('/hr/job', 'indexForHr')->name('hr.jobs');
        Route::get('/hr/post-job', 'postJob')->name('hr.post-job');
        Route::post('/hr/jobs-store', 'storeJobs')->name('jobs.store');

        Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit');
        Route::put('/jobs/{job}', 'update')->name('jobs.update');

        // Job Details
        Route::get('/hr/jobs/{id}/details', 'getJobDetails')->name('hr.jobs.details');
        Route::put('/hr/jobs/{job}/close', 'closeJob')->name('hr.jobs.close');
    });
});

Route::controller(JobApplicationController::class)->group(function () {
    Route::middleware(['auth', 'role:hr'])->group(function () {
        Route::post('/applications/{id}/status', 'updateStatus')->name('applications.updateStatus');
        Route::get('/hr/applicants', 'applicants')->name('hr.applicants');
        Route::get('/hr/applications/{id}/details', 'getApplicationDetails')->name('hr.applications.details');
    });
});

Route::get('/download/{type}/{jobId}/{folder}/{filename}', [FileController::class, 'download'])
    ->where('filename', '.*')
    ->name('file.download');
