@extends('layouts.app')

@section('title', "Apply for {$job->title}")
@section('page-title', $job->title)
@section('page-subtitle', $job->company_name)

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="mb-6 flex items-center text-sm text-gray-500">
            <a href="{{ route('candidate.jobs') }}" class="hover:text-gray-700 transition-colors">Jobs</a>
            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('jobs.detail', $job->id) }}"
                class="hover:text-gray-700 transition-colors">{{ Str::limit($job->title, 30) }}</a>
            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-gray-900 font-medium">Apply</span>
        </nav>

        <div class="grid lg:grid-cols-4 gap-6">

            {{-- Main Application Form --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 lg:p-8">

                    {{-- Header --}}
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-primary-900" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900">
                                    Apply for this Position
                                </h1>
                                <p class="text-sm sm:text-base text-gray-600 mt-1">
                                    Complete all sections below to submit your application
                                </p>
                            </div>
                        </div>

                        {{-- Progress Indicator --}}
                        <div class="mt-6 -mx-4 sm:mx-0 px-4 sm:px-0 overflow-x-auto">
                            <div class="flex items-center text-xs pb-2">
                                <div class="flex items-center progress-step" data-step="1">
                                    <div
                                        class="w-8 h-8 bg-primary-900 text-white rounded-full flex items-center justify-center font-semibold step-indicator flex-shrink-0">
                                        1</div>
                                    <span
                                        class="ml-2 font-medium text-gray-900 hidden md:inline whitespace-nowrap">Personal</span>
                                </div>
                                <div class="h-1 bg-gray-200 mx-2 w-6 sm:w-8 md:w-16 flex-shrink-0"></div>
                                <div class="flex items-center progress-step" data-step="2">
                                    <div
                                        class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold step-indicator flex-shrink-0">
                                        2</div>
                                    <span class="ml-2 text-gray-500 hidden md:inline whitespace-nowrap">Family</span>
                                </div>
                                <div class="h-1 bg-gray-200 mx-2 w-6 sm:w-8 md:w-16 flex-shrink-0"></div>
                                <div class="flex items-center progress-step" data-step="3">
                                    <div
                                        class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold step-indicator flex-shrink-0">
                                        3</div>
                                    <span class="ml-2 text-gray-500 hidden md:inline whitespace-nowrap">Education</span>
                                </div>
                                <div class="h-1 bg-gray-200 mx-2 w-6 sm:w-8 md:w-16 flex-shrink-0"></div>
                                <div class="flex items-center progress-step" data-step="4">
                                    <div
                                        class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold step-indicator flex-shrink-0">
                                        4</div>
                                    <span class="ml-2 text-gray-500 hidden md:inline whitespace-nowrap">Experience</span>
                                </div>
                                <div class="h-1 bg-gray-200 mx-2 w-6 sm:w-8 md:w-16 flex-shrink-0"></div>
                                <div class="flex items-center progress-step" data-step="5">
                                    <div
                                        class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold step-indicator flex-shrink-0">
                                        5</div>
                                    <span class="ml-2 text-gray-500 hidden md:inline whitespace-nowrap">Documents</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('jobs.submit', $job->id) }}" method="POST" enctype="multipart/form-data"
                        id="applicationForm">
                        @csrf

                        {{-- Step 1: Personal Information --}}
                        <div class="form-step active" data-step="1">
                            @include('candidate.applications-section.partials.personal-info')
                        </div>

                        {{-- Step 2: Family Information --}}
                        <div class="form-step hidden" data-step="2">
                            @include('candidate.applications-section.partials.family-info')
                        </div>

                        {{-- Step 3: Education & Activities --}}
                        <div class="form-step hidden" data-step="3">
                            @include('candidate.applications-section.partials.education-activities')
                        </div>

                        {{-- Step 4: Work Experience --}}
                        <div class="form-step hidden" data-step="4">
                            @include('candidate.applications-section.partials.work-experience')
                        </div>

                        {{-- Step 5: Documents & Cover Letter --}}
                        <div class="form-step hidden" data-step="5">
                            @include('candidate.applications-section.partials.documents')
                        </div>

                        {{-- Navigation Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 mt-6 border-t border-gray-200">
                            <button type="button" id="prevBtn"
                                class="hidden flex-1 sm:flex-none px-6 py-3 text-center text-gray-700 bg-white border-2 border-gray-300 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                                ← Previous
                            </button>
                            <div class="flex-1"></div>
                            <a href="{{ route('jobs.detail', $job->id) }}" id="cancelBtn"
                                class="flex-1 sm:flex-none px-6 py-3 text-center text-gray-700 bg-white border-2 border-gray-300 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                                Cancel
                            </a>
                            <button type="button" id="nextBtn"
                                class="flex-1 px-8 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md flex items-center justify-center">
                                Next →
                            </button>
                            <button type="submit" id="submitBtn"
                                class="hidden flex-1 px-8 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Sidebar - Job Summary --}}
            @include('candidate.applications-section.partials.job-summary', ['job' => $job])
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/candidate/stepper.js') }}"></script>
        <script src="{{ asset('assets/js/candidate/family-info.js') }}"></script>
        <script src="{{ asset('assets/js/candidate/educations.js') }}"></script>
        <script src="{{ asset('assets/js/candidate/work-experience.js') }}"></script>
    @endpush
@endsection
