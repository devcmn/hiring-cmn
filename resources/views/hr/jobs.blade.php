@extends('layouts.app')

@section('title', 'My Jobs - Hiring - CMN')
@section('page-title', 'My Posted Jobs')
@section('page-subtitle', 'Manage and track your job postings')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div class="inline-flex rounded-lg overflow-hidden border border-gray-300">
            <a href="{{ route('hr.jobs', ['filter' => 'all']) }}"
                class="px-4 py-2 font-medium transition-colors
        {{ ($filter ?? '') === 'all' ? 'bg-primary-950 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                All Jobs ({{ $activeCount + $closedCount }})
            </a>

            <a href="{{ route('hr.jobs', ['filter' => 'active']) }}"
                class="px-4 py-2 font-medium transition-colors border-l border-gray-300
        {{ ($filter ?? '') === 'active' ? 'bg-primary-950 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Active ({{ $activeCount }})
            </a>

            <a href="{{ route('hr.jobs', ['filter' => 'closed']) }}"
                class="px-4 py-2 font-medium transition-colors border-l border-gray-300
        {{ ($filter ?? '') === 'closed' ? 'bg-primary-950 text-white' : 'text-gray-600 hover:bg-gray-100' }}">
                Closed ({{ $closedCount }})
            </a>
        </div>
        <a href="{{ route('hr.post-job') }}"
            class="flex items-center gap-x-2 px-3 py-2 border-2 border-primary-800 text-primary-800 font-semibold rounded-lg 
            hover:bg-primary-800 hover:text-white transition-colors shadow-lg shadow-accent-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
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
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <span
                        class="px-3 py-1 text-xs font-semibold rounded-full
                        @if ($job->status === 'Active') bg-green-100 text-green-700
                        @elseif ($job->status === 'Closed')
                        bg-red-100 text-red-700
                        @else
                        bg-gray-100 text-gray-600 @endif">
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

                    @if ($job->application_deadline)
                        <span class="flex items-center text-xs">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Until {{ \Carbon\Carbon::parse($job->application_deadline)->format('d M Y') }}
                        </span>
                    @endif
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
