<?php

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

// Candidate routes
Route::get('/candidate/job', function () {
    return view('candidate.jobs');
})->name('candidate.jobs');

// HR routes
Route::get('/hr/job', function () {
    return view('hr.jobs');
})->name('hr.jobs');

Route::get('/hr/post-job', function () {
    return view('hr.post-job');
})->name('hr.post-job');
