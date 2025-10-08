@extends('layouts.app')

@section('title', 'Applications Management')
@section('page-title', 'Applications Management')
@section('page-subtitle', 'Review and manage candidate applications')

@section('content')
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        {{-- Header Stats --}}
        @include('layouts.partials.hr.applicants-header')

        {{-- Job Categories with Applications --}}
        <div class="space-y-6">
            @forelse($jobs as $job)
                <div class="job-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    {{-- Job Header --}}
                    <div class="bg-gradient-to-r from-gray-50 to-white p-4 sm:p-6 border-b border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                            {{-- Left Info --}}
                            <div class="flex flex-col sm:flex-row sm:items-start gap-4 flex-1">
                                <div class="flex-1 text-center sm:text-left">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-3 mb-2">
                                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 break-words">
                                            {{ $job->title }}</h2>
                                        <span
                                            class="mt-1 sm:mt-0 px-2 py-0.5 text-xs font-semibold rounded-full w-max mx-auto sm:mx-0 
                                            {{ $job->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $job->status }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 mb-3 text-sm sm:text-base">{{ $job->company_name }}</p>

                                    <div
                                        class="flex flex-wrap items-center justify-center sm:justify-start gap-3 text-xs sm:text-sm text-gray-600">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $job->location }}
                                        </span>

                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Posted {{ $job->created_at->diffForHumans() }}
                                        </span>

                                        @if ($job->salary)
                                            <span class="flex items-center font-semibold text-green-700">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Rp {{ number_format($job->salary, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Right Side --}}
                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-center sm:text-right">
                                <div
                                    class="flex flex-col items-center justify-center px-4 py-3 sm:px-6 sm:py-4 bg-blue-50 rounded-lg border border-blue-200">
                                    <p class="text-2xl sm:text-3xl font-bold text-blue-700 leading-none">
                                        {{ $job->applications->count() }}
                                    </p>
                                    <p class="text-xs text-blue-600 font-medium mt-1">Applicants</p>
                                </div>

                                <button onclick="toggleJobApplications({{ $job->id }})"
                                    class="p-2 sm:p-3 hover:bg-gray-100 rounded-lg transition-colors mx-auto sm:mx-0 mt-2 sm:mt-0">
                                    <svg id="chevron-{{ $job->id }}"
                                        class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600 transform transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Mini Stats --}}
                        @include('layouts.partials.hr.applicants-mini-stats', ['job' => $job])
                    </div>

                    {{-- Collapsible Applications Section --}}
                    <div id="applications-{{ $job->id }}" class="hidden transition-all duration-300 ease-in-out">
                        @forelse($job->applications as $index => $application)
                            <div class="application-item border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150"
                                data-status="{{ $application->status }}"
                                data-created="{{ $application->created_at->format('Y-m-d H:i:s') }}"
                                style="animation: slideDown 0.3s ease-out {{ $index * 0.05 }}s both;">
                                <div class="p-6">
                                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                                        {{-- Left: Candidate Info --}}
                                        <div class="flex items-start gap-4 flex-1 min-w-0">
                                            {{-- Avatar --}}
                                            <div
                                                class="w-12 h-12 bg-primary-800 rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                                                <span class="text-white font-bold text-lg">
                                                    {{ substr($application->first_name, 0, 1) }}{{ substr($application->last_name, 0, 1) }}
                                                </span>
                                            </div>

                                            {{-- Info --}}
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-3 mb-2 flex-wrap">
                                                    <h4 class="text-lg font-bold text-gray-900 truncate">
                                                        {{ $application->first_name }} {{ $application->last_name }}
                                                    </h4>
                                                    @php
                                                        $statusConfig = [
                                                            'pending' => [
                                                                'bg' => 'bg-yellow-100',
                                                                'text' => 'text-yellow-800',
                                                                'label' => 'Pending',
                                                                'dot' => 'bg-yellow-500',
                                                            ],
                                                            'interview' => [
                                                                'bg' => 'bg-purple-100',
                                                                'text' => 'text-purple-800',
                                                                'label' => 'Interview',
                                                                'dot' => 'bg-purple-500',
                                                            ],
                                                            'accepted' => [
                                                                'bg' => 'bg-green-100',
                                                                'text' => 'text-green-800',
                                                                'label' => 'Accepted',
                                                                'dot' => 'bg-green-500',
                                                            ],
                                                            'rejected' => [
                                                                'bg' => 'bg-red-100',
                                                                'text' => 'text-red-800',
                                                                'label' => 'Rejected',
                                                                'dot' => 'bg-red-500',
                                                            ],
                                                        ];
                                                        $status =
                                                            $statusConfig[$application->status] ??
                                                            $statusConfig['pending'];
                                                    @endphp
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $status['bg'] }} {{ $status['text'] }}">
                                                        <span
                                                            class="w-2 h-2 {{ $status['dot'] }} rounded-full mr-2 animate-pulse"></span>
                                                        {{ $status['label'] }}
                                                    </span>
                                                </div>

                                                <div
                                                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400 flex-shrink-0" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                        </svg>
                                                        <span class="truncate">{{ $application->email }}</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400 flex-shrink-0" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                        </svg>
                                                        <span>{{ $application->phone }}</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400 flex-shrink-0" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        <span>{{ $application->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>

                                                {{-- Cover Letter Preview (if exists) --}}
                                                @if ($application->cover_letter)
                                                    <div class="mt-3 bg-gray-50 rounded-lg p-3 border border-gray-200">
                                                        <p class="text-xs text-gray-500 font-medium mb-1">Cover Letter
                                                            Preview:</p>
                                                        <p class="text-sm text-gray-700 line-clamp-2">
                                                            {{ $application->cover_letter }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Right: Actions --}}
                                        <div class="flex flex-col gap-2 sm:flex-row lg:flex-col lg:min-w-[180px]">
                                            <button onclick="showApplicationModal({{ $application->id }})"
                                                class="px-4 py-2.5 bg-primary-900 text-white text-sm font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md inline-flex items-center justify-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View Details
                                            </button>
                                            @php
                                                $cvParts = explode('/', $application->cv_path); // ['private', 'jobs', '5-head-it', 'klepon-lie', 'CV_Klepon_Lie.pdf']
                                                $type = 'cv';
                                                $jobId = $cvParts[2] ?? '';
                                                $folder = $cvParts[3] ?? '';
                                                $filename = $cvParts[4] ?? '';
                                            @endphp

                                            <a href="{{ route('file.download', [$type, $jobId, $folder, $filename]) }}"
                                                class="px-4 py-2.5 bg-white border-2 border-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors inline-flex items-center justify-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                Resume
                                            </a>

                                            {{-- Quick Status Update --}}
                                            <div class="relative">
                                                <select onchange="updateStatus({{ $application->id }}, this.value)"
                                                    class="choices-select w-full px-4 py-2.5 border-2 border-gray-300 rounded-lg text-sm font-semibold appearance-none cursor-pointer hover:border-primary-500 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white transition-colors pr-10">
                                                    <option value="pending"
                                                        {{ $application->status == 'pending' ? 'disabled selected' : '' }}>
                                                        {{ $application->status == 'pending' ? 'Pending' : 'Set Pending' }}
                                                    </option>
                                                    <option value="interview"
                                                        {{ $application->status == 'interview' ? 'disabled selected' : '' }}>
                                                        {{ $application->status == 'interview' ? 'Interview' : 'Schedule Interview' }}
                                                    </option>
                                                    <option value="accepted"
                                                        {{ $application->status == 'accepted' ? 'disabled selected' : '' }}>
                                                        {{ $application->status == 'accepted' ? 'Accepted' : 'Accept' }}
                                                    </option>
                                                    <option value="rejected"
                                                        {{ $application->status == 'rejected' ? 'disabled selected' : '' }}>
                                                        {{ $application->status == 'rejected' ? 'Rejected' : 'Reject' }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 text-center border-t border-gray-200 bg-gray-50">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-gray-600 font-medium text-lg">No applications yet</p>
                                <p class="text-sm text-gray-500 mt-2">Applications will appear here when candidates apply
                                    for this position</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-8">No jobs found.</p>
            @endforelse
        </div>
    </div>

    {{-- Application Detail Modal --}}
    @include('layouts.partials.hr.application-details')

    {{-- Scripts --}}
    <script src={{ asset('assets/js/hr/applicant.js') }}></script>
@endsection
