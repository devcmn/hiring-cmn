@extends('layouts.app')

@section('title', "Apply for {$job->title}")
@section('page-title', $job->title)
@section('page-subtitle', $job->company_name)

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

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

        <div class="grid lg:grid-cols-3 gap-6">

            {{-- Main Application Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 sm:p-8">

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
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Apply for this Position</h1>
                                <p class="text-gray-600 mt-1">Fill out the form below to submit your application</p>
                            </div>
                        </div>

                        {{-- Progress Indicator --}}
                        <div class="flex items-center justify-between text-sm mt-6">
                            <div class="flex items-center">
                                <div
                                    class="w-8 h-8 bg-primary-900 text-white rounded-full flex items-center justify-center font-semibold">
                                    1</div>
                                <span class="ml-2 font-medium text-gray-900">Your Details</span>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-4"></div>
                            <div class="flex items-center">
                                <div
                                    class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-semibold">
                                    2</div>
                                <span class="ml-2 text-gray-500">Review</span>
                            </div>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('jobs.submit', $job->id) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6" id="applicationForm">
                        @csrf

                        {{-- Personal Information Section --}}
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Personal Information
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('first_name') border-red-500 @enderror"
                                        placeholder="John" required>
                                    @error('first_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('last_name') border-red-500 @enderror"
                                        placeholder="Doe" required>
                                    @error('last_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('email') border-red-500 @enderror"
                                            placeholder="john.doe@example.com" required>
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('phone') border-red-500 @enderror"
                                            placeholder="+62 812 3456 7890" required>
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Application Documents Section --}}
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Application Documents
                            </h3>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Resume/CV <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-500 transition-colors cursor-pointer"
                                    onclick="document.getElementById('resume').click()">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="resume"
                                                class="relative cursor-pointer rounded-md font-medium text-primary-900 hover:text-primary-800">
                                                <span>Upload a file</span>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PDF, DOC, DOCX up to 5MB</p>
                                    </div>
                                </div>
                                <input id="resume" name="resume" type="file" class="hidden"
                                    accept=".pdf,.doc,.docx" required onchange="updateFileName(this)">
                                <p id="fileName" class="text-sm text-gray-600 mt-2 hidden"></p>
                                @error('resume')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Additional Information Section --}}
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Cover Letter
                                <span class="ml-2 text-sm font-normal text-gray-500">(Optional)</span>
                            </h3>

                            <div>
                                <label class="block text-sm text-gray-600 mb-2">
                                    Tell us why you're interested in this position and why you'd be a great fit
                                </label>
                                <textarea name="cover_letter" rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none @error('cover_letter') border-red-500 @enderror"
                                    placeholder="I am writing to express my strong interest in this position...">{{ old('cover_letter') }}</textarea>
                                <div class="flex justify-between items-center mt-2">
                                    <p class="text-xs text-gray-500">Minimum 50 characters recommended</p>
                                    <p class="text-xs text-gray-500"><span id="charCount">0</span> characters</p>
                                </div>
                                @error('cover_letter')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Terms and Conditions --}}
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" name="terms"
                                    class="mt-1 mr-3 h-4 w-4 text-primary-900 border-gray-300 rounded focus:ring-primary-500"
                                    required>
                                <span class="text-sm text-gray-700">
                                    I confirm that the information provided is accurate and I agree to the
                                    <a href="#" class="text-primary-900 hover:underline font-medium">terms and
                                        conditions</a>
                                    and
                                    <a href="#" class="text-primary-900 hover:underline font-medium">privacy
                                        policy</a>.
                                </span>
                            </label>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-4">
                            <a href="{{ route('jobs.detail', $job->id) }}"
                                class="flex-1 sm:flex-none px-6 py-3 text-center text-gray-700 bg-white border-2 border-gray-300 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 px-8 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md flex items-center justify-center">
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
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 sticky top-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Position Details</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Position</p>
                            <p class="text-base font-semibold text-gray-900">{{ $job->title }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Company</p>
                            <p class="text-base font-semibold text-gray-900">{{ $job->company_name }}</p>
                        </div>

                        @if ($job->location)
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Location</p>
                                <p class="text-base text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $job->location }}
                                </p>
                            </div>
                        @endif

                        @if ($job->salary)
                            <div>
                                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Salary Range</p>
                                <p class="text-base font-semibold text-green-700">Rp
                                    {{ number_format($job->salary, 0, ',', '.') }}</p>
                                <p class="text-xs text-gray-500">per month</p>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Job Description</h4>
                        <p class="text-sm text-gray-600 leading-relaxed line-clamp-4">
                            {{ Str::limit($job->description, 150) }}
                        </p>
                        <a href="{{ route('jobs.detail', $job->id) }}"
                            class="text-sm text-primary-900 hover:underline font-medium mt-2 inline-block">
                            View full description →
                        </a>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-blue-900 mb-1">Application Tips</p>
                                    <p class="text-xs text-blue-800">Make sure your resume is up-to-date and tailored to
                                        this position for the best chance of success.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for cover letter
        document.querySelector('textarea[name="cover_letter"]').addEventListener('input', function(e) {
            document.getElementById('charCount').textContent = e.target.value.length;
        });

        // File name display
        function updateFileName(input) {
            const fileName = input.files[0]?.name;
            const fileDisplay = document.getElementById('fileName');
            if (fileName) {
                fileDisplay.textContent = '✓ ' + fileName;
                fileDisplay.classList.remove('hidden');
                fileDisplay.classList.add('text-green-600', 'font-medium');
            }
        }
    </script>
@endsection
