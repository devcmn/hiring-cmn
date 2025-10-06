@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">

        {{-- Header Section --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
            <p class="text-lg text-gray-700">{{ $job->company_name }}</p>

            <div class="flex items-center text-gray-600 text-sm mt-2 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $job->location ?? 'Location not specified' }}
                </span>

                @if ($job->salary)
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Rp {{ number_format($job->salary, 0, ',', '.') }} / month
                    </span>
                @endif
            </div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <h2 class="text-xl font-semibold text-gray-800">Job Description</h2>
            <p class="text-gray-700 leading-relaxed mb-6 whitespace-pre-line">
                {{ $job->description }}
            </p>

            @if ($job->requirements)
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Requirements</h2>
                <ul class="list-disc pl-6 text-gray-700 mb-6 space-y-2">
                    @foreach (explode("\n", $job->requirements) as $req)
                        <li>{{ trim($req) }}</li>
                    @endforeach
                </ul>
            @endif

            @if ($job->benefits)
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Benefits</h2>
                <ul class="list-disc pl-6 text-gray-700 mb-6 space-y-2">
                    @foreach (explode("\n", $job->benefits) as $benefit)
                        <li>{{ trim($benefit) }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mt-8 flex space-x-4">
                <button
                    class="px-6 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-colors">
                    Apply Now
                </button>

                <a href="{{ route('candidate.jobs') }}"
                    class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Back to Job List
                </a>
            </div>
        </div>

        {{-- Optional Footer Info --}}
        <p class="text-sm text-gray-500 mt-6 text-right">
            Posted on {{ $job->created_at->format('d M Y') }}
        </p>
    </div>
@endsection
