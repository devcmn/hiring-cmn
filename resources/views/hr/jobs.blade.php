@extends('layouts.app')

@section('title', 'My Jobs - Hiring - CMN')
@section('page-title', 'My Posted Jobs')
@section('page-subtitle', 'Manage and track your job postings')

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
        @forelse ($jobs as $job)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <span
                        class="px-3 py-1 {{ $job->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }} text-xs font-semibold rounded-full">
                        {{ ucfirst($job->status) }}
                    </span>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $job->title }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ $job->company_name }}</p>

                <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                    {{ Str::limit($job->description, 120) }}
                </p>

                <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $job->location }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ ucfirst($job->job_type) }}
                    </span>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <span class="text-sm font-semibold text-gray-900">
                        {{ $job->applicants_count ?? 0 }} Applicants
                    </span>
                    <button class="text-accent-600 hover:text-accent-700 font-medium text-sm">
                        View Details →
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-full py-12">No jobs available right now.</p>
        @endforelse
    </div>
@endsection
