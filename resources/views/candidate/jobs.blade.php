@extends('layouts.app')

@section('title', 'Browse Jobs - Hiring - CMN')
@section('page-title', 'Find Your Dream Job')
@section('page-subtitle', 'Explore opportunities from our companies')
@section('user-initial', 'JD')
@section('user-name', 'John Doe')
@section('user-role', 'Candidate')

@section('content')
    <div x-data="{ showModal: false, selectedJob: null }">
        <!-- Search & Filters -->
        @include('layouts.partials.candidate.filter')

        <!-- Job Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Job Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all hover:border-primary-600">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center text-white font-bold text-xl">
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
        @include('candidate.modal.candidate-modal')
    </div>
@endsection
