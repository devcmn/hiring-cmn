@extends('layouts.app')

@section('title', 'Browse Jobs - Hiring - CMN')
@section('page-title', 'Find Your Dream Job')
@section('page-subtitle', 'Explore opportunities from our companies')
@section('user-initial', 'JD')
@section('user-name', 'John Doe')
@section('user-role', 'Candidate')

@section('sidebar')
    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-primary-800 text-white">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <span x-show="sidebarOpen" x-cloak>Browse Jobs</span>
    </a>
    <a href="#"
        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary-800 hover:text-white transition-colors">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span x-show="sidebarOpen" x-cloak>My Applications</span>
    </a>
    <a href="#"
        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary-800 hover:text-white transition-colors">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
        <span x-show="sidebarOpen" x-cloak>Saved Jobs</span>
    </a>
    <a href="#"
        class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-primary-800 hover:text-white transition-colors">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span x-show="sidebarOpen" x-cloak>Profile</span>
    </a>
@endsection

@section('content')
    <div x-data="{ showModal: false, selectedJob: null }">
        <!-- Search & Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <input type="text" placeholder="Search jobs by title, company, or keyword..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent">
                </div>
                <div>
                    <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent">
                        <option>All Locations</option>
                        <option>Remote</option>
                        <option>New York</option>
                        <option>San Francisco</option>
                        <option>Austin</option>
                    </select>
                </div>
                <div>
                    <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent">
                        <option>All Types</option>
                        <option>Full-time</option>
                        <option>Part-time</option>
                        <option>Contract</option>
                        <option>Internship</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Job Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all hover:border-primary-600">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                        DH
                    </div>
                    <button class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-1">Product Designer</h3>
                <p class="text-sm text-gray-600 mb-3">DesignHub Studio</p>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 bg-primary-200 text-primary-800 text-xs font-semibold rounded-full">Figma</span>
                    <span class="px-3 py-1 bg-primary-200 text-primary-800 text-xs font-semibold rounded-full">UI/UX</span>
                    <span
                        class="px-3 py-1 bg-primary-200 text-primary-800 text-xs font-semibold rounded-full">Prototyping</span>
                </div>

                <p class="text-sm text-gray-700 mb-4 line-clamp-3">
                    Join our creative team to design beautiful and intuitive products that users love. Work on exciting
                    projects with a talented team.
                </p>

                <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        New York, NY
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        $70k - $100k
                    </span>
                </div>

                <button @click="showModal = true; selectedJob = 'Product Designer'"
                    class="w-full py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors">
                    Apply Now
                </button>

                {{-- @if (auth()->check())
                    <a href="{{ route('job.apply', $job->id) }}" class="btn btn-primary">Apply Now</a>
                @else
                    <button @click="showModal = true; selectedJob = '{{ $job->title }}'"
                        class="w-full py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors">
                        Apply Now
                    </button>
                @endif --}}
            </div>
        </div>

        <!-- Application Modal -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
            @keydown.escape.window="showModal = false">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75" @click="showModal = false"></div>

                <!-- Modal panel -->
                <div x-show="showModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-2xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
                    <!-- Modal Header -->
                    <div class="bg-primary-950 px-6 py-4 flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Apply for Position</h3>
                        <button @click="showModal = false" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="px-6 py-6">
                        <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-lg">
                            <p class="text-sm text-gray-700">
                                You are applying for: <span class="font-bold text-gray-900" x-text="selectedJob"></span>
                            </p>
                        </div>

                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                        required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="tel"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Resume/CV <span class="text-red-500">*</span>
                                </label>
                                <div
                                    class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-accent-500 transition-colors cursor-pointer">
                                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                                    <p class="text-xs text-gray-500 mt-1">PDF, DOC, DOCX (max. 5MB)</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Cover Letter
                                </label>
                                <textarea rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent resize-none"
                                    placeholder="Tell us why you're a great fit for this role..."></textarea>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex items-center justify-end space-x-4">
                        <button @click="showModal = false"
                            class="px-6 py-3 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors">
                            Cancel
                        </button>
                        <button
                            class="px-8 py-3 bg-accent-500 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors shadow-lg shadow-accent-500/30">
                            Submit Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
