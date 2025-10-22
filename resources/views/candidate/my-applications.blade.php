@extends('layouts.app')

@section('title', 'My Applications')
@section('page-title', 'My Applications')
@section('page-subtitle', 'Track and manage your job applications')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        {{-- Header with Stats --}}
        @include('layouts.partials.candidate.header-stats')

        {{-- Applications List --}}
        @if ($applications->isEmpty())
            {{-- Empty State --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No Applications Yet</h3>
                    <p class="text-gray-600 mb-6">You haven't applied to any jobs yet. Start exploring opportunities and
                        submit your first application!</p>
                    <a href="{{ route('candidate.jobs') }}"
                        class="inline-flex items-center px-6 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Browse Jobs
                    </a>
                </div>
            </div>
        @else
            <div class="space-y-4" id="applicationsList">
                @foreach ($applications as $application)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 application-card"
                        data-status="{{ $application->status }}">
                        <div class="p-6">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                {{-- Left Section: Job Info --}}
                                <div class="flex-1">
                                    <div class="flex items-start gap-4">
                                        {{-- Case Logo --}}
                                        <div
                                            class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" className="size-6">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                            </svg>
                                        </div>

                                        {{-- Job Details --}}
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-2 mb-2">
                                                <div>
                                                    <h3
                                                        class="text-xl font-bold text-gray-900 mb-1 flex items-center gap-2">
                                                        {{ $application->job->title }}
                                                        <span
                                                            class="mt-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                                                {{ $application->job->status === 'Active' ? 'bg-green-100 text-green-800' : '' }}
                                                                {{ $application->job->status === 'Closed' ? 'bg-red-100 text-red-800' : '' }}
                                                                {{ $application->job->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                            ">
                                                            {{ $application->job->status }}
                                                        </span>
                                                    </h3>
                                                    <p class="text-gray-600 font-medium">
                                                        {{ $application->job->company_name }}</p>
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mt-3">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $application->job->location }}
                                                </span>
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    Applied {{ $application->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Section: Status & Actions --}}
                                <div class="flex flex-col items-end gap-3 lg:min-w-[200px]">
                                    {{-- Status Badge --}}
                                    @php
                                        $statusConfig = [
                                            'pending' => [
                                                'bg' => 'bg-yellow-100',
                                                'text' => 'text-yellow-800',
                                                'label' => 'Under Review',
                                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                            'interview' => [
                                                'bg' => 'bg-purple-100',
                                                'text' => 'text-purple-800',
                                                'label' => 'Interview Scheduled',
                                                'icon' =>
                                                    'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                                            ],
                                            'accepted' => [
                                                'bg' => 'bg-green-100',
                                                'text' => 'text-green-800',
                                                'label' => 'Accepted',
                                                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                            'rejected' => [
                                                'bg' => 'bg-red-100',
                                                'text' => 'text-red-800',
                                                'label' => 'Not Selected',
                                                'icon' =>
                                                    'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                                            ],
                                        ];
                                        $status = $statusConfig[$application->status] ?? $statusConfig['pending'];
                                    @endphp

                                    <span
                                        class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $status['bg'] }} {{ $status['text'] }}">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $status['icon'] }}" />
                                        </svg>
                                        {{ $status['label'] }}
                                    </span>

                                    {{-- Actions --}}
                                    <div class="flex gap-2">
                                        @if ($application->job->status !== 'Closed')
                                            <a href="{{ route('jobs.detail', $application->job->id) }}"
                                                class="px-4 py-2 text-sm font-medium text-primary-900 bg-primary-50 rounded-lg hover:bg-primary-100 transition-colors">
                                                View Job
                                            </a>
                                        @endif
                                        <button onclick="showDetails({{ $application->id }})"
                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                            Details
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Expandable Details Section --}}
                            <div id="details-{{ $application->id }}" class="hidden mt-6 pt-6 border-t border-gray-200">
                                <div class="grid md:grid-cols-2 gap-6">
                                    {{-- Application Info --}}
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-primary-900" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Your Application
                                        </h4>
                                        <dl class="space-y-2 text-sm">
                                            <div class="flex justify-between">
                                                <dt class="text-gray-600">Full Name:</dt>
                                                <dd class="font-medium text-gray-900">{{ $application->first_name }}
                                                    {{ $application->last_name }}</dd>
                                            </div>
                                            <div class="flex justify-between">
                                                <dt class="text-gray-600">Email:</dt>
                                                <dd class="font-medium text-gray-900">{{ $application->email }}</dd>
                                            </div>
                                            <div class="flex justify-between">
                                                <dt class="text-gray-600">Phone:</dt>
                                                <dd class="font-medium text-gray-900">{{ $application->phone }}</dd>
                                            </div>
                                            {{-- <div class="flex justify-between">
                                                <dt class="text-gray-600">Resume:</dt>
                                                <dd>
                                                    @php
                                                        $pathParts = explode('/', $application->cv_path);
                                                        $jobId = $pathParts[2] ?? '';
                                                        $folder = $pathParts[3] ?? '';
                                                        $filename = $pathParts[4] ?? '';
                                                    @endphp

                                                    <a href="{{ route('file.download', ['type' => 'cv', 'jobId' => $jobId, 'folder' => $folder, 'filename' => $filename]) }}"
                                                        class="text-primary-900 hover:underline font-medium flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                        Download CV
                                                    </a>
                                                </dd>
                                            </div> --}}
                                        </dl>
                                    </div>

                                    {{-- Cover Letter --}}
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-primary-900" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Cover Letter
                                        </h4>
                                        <div
                                            class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 max-h-32 overflow-y-auto">
                                            {{ $application->cover_letter ?? 'No cover letter provided' }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Timeline --}}
                                @if ($application->status !== 'pending')
                                    <div class="mt-6">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-primary-900" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            Application Timeline
                                        </h4>
                                        <div class="relative pl-8 space-y-4">
                                            <div class="absolute left-2 top-2 bottom-2 w-0.5 bg-gray-200"></div>

                                            <div class="relative">
                                                <div
                                                    class="absolute left-[-1.75rem] w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                                                </div>
                                                <div class="bg-gray-50 rounded-lg p-3">
                                                    <p class="text-sm font-medium text-gray-900">Application Submitted</p>
                                                    <p class="text-xs text-gray-600 mt-1">
                                                        {{ $application->created_at->format('M d, Y - H:i') }}</p>
                                                </div>
                                            </div>

                                            @if ($application->status === 'interview' || $application->status === 'accepted' || $application->status === 'rejected')
                                                <div class="relative">
                                                    <div
                                                        class="absolute left-[-1.75rem] w-4 h-4 bg-purple-500 rounded-full border-2 border-white">
                                                    </div>
                                                    <div class="bg-gray-50 rounded-lg p-3">
                                                        <p class="text-sm font-medium text-gray-900">Under Review</p>
                                                        <p class="text-xs text-gray-600 mt-1">
                                                            {{ $application->updated_at->format('M d, Y - H:i') }}</p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($application->status === 'accepted')
                                                <div class="relative">
                                                    <div
                                                        class="absolute left-[-1.75rem] w-4 h-4 bg-green-600 rounded-full border-2 border-white">
                                                    </div>
                                                    <div class="bg-green-50 rounded-lg p-3 border border-green-200">
                                                        <p class="text-sm font-medium text-green-900">Application Accepted!
                                                            🎉</p>
                                                        <p class="text-xs text-green-700 mt-1">Congratulations! The company
                                                            will contact you soon.</p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($application->status === 'rejected')
                                                <div class="relative">
                                                    <div
                                                        class="absolute left-[-1.75rem] w-4 h-4 bg-red-500 rounded-full border-2 border-white">
                                                    </div>
                                                    <div class="bg-red-50 rounded-lg p-3 border border-red-200">
                                                        <p class="text-sm font-medium text-red-900">Application Not
                                                            Selected</p>
                                                        <p class="text-xs text-red-700 mt-1">Keep trying! There are many
                                                            other opportunities.</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $applications->links() }}
            </div>
        @endif
    </div>

    <script>
        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const applicationCards = document.querySelectorAll('.application-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-primary-900', 'text-white');
                    btn.classList.add('text-gray-700', 'hover:bg-gray-100');
                });
                button.classList.add('active', 'bg-primary-900', 'text-white');
                button.classList.remove('text-gray-700', 'hover:bg-gray-100');

                // Filter cards
                const status = button.dataset.status;
                applicationCards.forEach(card => {
                    if (status === 'all' || card.dataset.status === status) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Show/hide details
        function showDetails(id) {
            const details = document.getElementById(`details-${id}`);
            details.classList.toggle('hidden');
        }

        // Set initial active state
        document.querySelector('.filter-btn.active').classList.add('bg-primary-900', 'text-white');
    </script>

    <style>
        .filter-btn.active {
            @apply bg-primary-900 text-white;
        }

        .filter-btn:not(.active) {
            @apply text-gray-700 hover:bg-gray-100;
        }
    </style>
@endsection
