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
                    <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-blue-900 mb-1">Application Tips</p>
                        <ul class="text-xs text-blue-800 space-y-1">
                            <li>• Complete all required sections</li>
                            <li>• Ensure your resume is up-to-date</li>
                            <li>• Write a personalized cover letter</li>
                            <li>• Double-check all information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Progress Indicator --}}
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Application Progress</h4>
            <div class="space-y-2">
                <div class="flex items-center text-xs">
                    <div
                        class="w-6 h-6 rounded-full bg-primary-900 text-white flex items-center justify-center mr-2 font-semibold">
                        ✓
                    </div>
                    <span class="text-gray-700">Personal Information</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-6 h-6 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mr-2">
                        2
                    </div>
                    <span class="text-gray-500">Family Information</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-6 h-6 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mr-2">
                        3
                    </div>
                    <span class="text-gray-500">Education & Activities</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-6 h-6 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mr-2">
                        4
                    </div>
                    <span class="text-gray-500">Work Experience</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-6 h-6 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mr-2">
                        5
                    </div>
                    <span class="text-gray-500">Documents</span>
                </div>
            </div>
        </div>
    </div>
</div>
