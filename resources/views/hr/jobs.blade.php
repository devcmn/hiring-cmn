@extends('layouts.app')

@section('title', 'My Jobs - Hiring - CMN')
@section('page-title', 'My Posted Jobs')
@section('page-subtitle', 'Manage and track your job postings')
@section('user-initial', 'HR')
@section('user-name', 'HR Manager')
@section('user-role', 'Human Resources')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button class="px-4 py-2 bg-primary-950 text-white rounded-lg font-medium">
                All Jobs (:count)
            </button>
            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                Active (:count)
            </button>
            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg font-medium transition-colors">
                Closed (:count)
            </button>
        </div>
        <a href="{{ route('hr.post-job') }}"
            class="flex items-center gap-x-2 px-3 py-2 border-2 border-primary-800 text-primary-800 font-semibold rounded-lg 
            hover:bg-primary-800 hover:text-white transition-colors shadow-lg shadow-accent-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Post New Job
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Job Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Senior Frontend Developer</h3>
            <p class="text-sm text-gray-600 mb-4">TechCorp Inc.</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                We're looking for an experienced frontend developer to join our growing team and build amazing user
                experiences.
            </p>

            <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Remote
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Full-time
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">24 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>

        <!-- Job Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Product Designer</h3>
            <p class="text-sm text-gray-600 mb-4">DesignHub Studio</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                Join our creative team to design beautiful and intuitive products that users love.
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
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Full-time
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">18 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>

        <!-- Job Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Marketing Manager</h3>
            <p class="text-sm text-gray-600 mb-4">GrowthLabs</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                Lead our marketing efforts and drive growth through innovative campaigns and strategies.
            </p>

            <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    San Francisco
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Full-time
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">31 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>

        <!-- Job Card 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Closed</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Backend Engineer</h3>
            <p class="text-sm text-gray-600 mb-4">DataFlow Systems</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                Build scalable backend systems and APIs that power our platform.
            </p>

            <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Remote
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Contract
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">42 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>

        <!-- Job Card 5 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">Content Writer</h3>
            <p class="text-sm text-gray-600 mb-4">ContentCraft Media</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                Create engaging content that resonates with our audience and drives engagement.
            </p>

            <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Remote
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Part-time
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">15 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>

        <!-- Job Card 6 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Active</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">DevOps Engineer</h3>
            <p class="text-sm text-gray-600 mb-4">CloudScale Inc.</p>

            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                Manage and optimize our cloud infrastructure for maximum reliability and performance.
            </p>

            <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Austin, TX
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Full-time
                </span>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-900">27 Applicants</span>
                <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                    View Details →
                </button>
            </div>
        </div>
    </div>
@endsection
