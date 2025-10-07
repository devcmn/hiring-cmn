@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="mb-6 flex items-center text-sm text-gray-500">
            <a href="{{ route('candidate.jobs') }}" class="hover:text-gray-700 transition-colors">Jobs</a>
            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-gray-900 font-medium">{{ Str::limit($job->title, 40) }}</span>
        </nav>

        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-8 mb-6">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                <div class="flex-1">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">{{ $job->title }}</h1>
                    <p class="text-xl text-gray-700 font-medium mb-4">{{ $job->company_name }}</p>

                    <div class="flex flex-wrap items-center gap-4 text-sm">
                        <span class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $job->location ?? 'Location not specified' }}
                        </span>

                        @if ($job->salary)
                            <span class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-semibold text-gray-900">Rp
                                    {{ number_format($job->salary, 0, ',', '.') }}</span>
                                <span class="text-gray-500 ml-1">/ month</span>
                            </span>
                        @endif

                        <span class="flex items-center text-gray-500">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Posted {{ $job->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>

                {{-- Action Buttons - Desktop --}}
                <div class="hidden sm:flex sm:flex-col gap-3 sm:min-w-[180px]">
                    @if ($job->status !== 'Closed')
                        <a href="{{ route('jobs.apply', $job->id) }}"
                            class="w-full px-6 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm hover:shadow-md text-center">
                            Apply Now
                        </a>
                    @else
                        <a href="{{ route('candidate.jobs') }}"
                            class="w-full px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors text-center">
                            Back to Browse Job
                        </a>
                    @endif
                    {{-- <button
                        class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        Save Job
                    </button> --}}
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y divide-gray-200">

            {{-- Job Description --}}
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Job Description
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->description }}</p>
                </div>
            </div>

            {{-- Requirements --}}
            @if ($job->requirements)
                <div class="p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        Requirements
                    </h2>
                    <ul class="space-y-3">
                        @foreach (explode(',', $job->requirements) as $req)
                            <li class="flex items-start text-gray-700">
                                <svg class="w-5 h-5 mr-3 mt-0.5 text-green-600 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>{{ trim($req) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Benefits --}}
            @if ($job->benefits)
                <div class="p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        Benefits & Perks
                    </h2>
                    <ul class="grid sm:grid-cols-2 gap-3">
                        @foreach (explode(',', $job->benefits) as $benefit)
                            <li class="flex items-start text-gray-700 bg-green-50 rounded-lg p-3">
                                <svg class="w-5 h-5 mr-3 mt-0.5 text-green-600 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">{{ trim($benefit) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- Action Buttons - Mobile --}}
        <div
            class="sm:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4 flex gap-3 shadow-lg z-10">

            @if ($job->status !== 'Closed')
                <a href="{{ route('jobs.apply', $job->id) }}"
                    class="flex-[3] px-4 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-sm active:scale-95 text-center">
                    Apply Now
                </a>
            @else
                <span
                    class="flex-[3] px-4 py-3 bg-gray-300 text-gray-700 font-semibold rounded-lg text-center cursor-not-allowed">
                    Closed
                </span>
            @endif
            {{-- <button
                class="px-4 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
            </button> --}}
        </div>

        {{-- Bottom spacing for mobile --}}
        <div class="h-20 sm:h-0"></div>
    </div>
@endsection
