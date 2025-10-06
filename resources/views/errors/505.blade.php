<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: "#f0fdf4",
                            100: "#dcfce7",
                            200: "#bbf7d0",
                            300: "#86efac",
                            400: "#4ade80",
                            500: "#22c55e", // main green
                            600: "#16a34a",
                            700: "#15803d",
                            800: "#166534",
                            900: "#14532d",
                            950: "#052e16",
                        },
                        accent: {
                            50: "#fafafa",
                            100: "#f4f4f5",
                            200: "#e4e4e7",
                            300: "#d4d4d8",
                            400: "#a1a1aa",
                            500: "#71717a", // neutral gray for text/borders
                            600: "#52525b",
                            700: "#3f3f46",
                            800: "#27272a",
                            900: "#18181b",
                            950: "#09090b",
                        },
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-gradient-to-br from-red-50 to-orange-50 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl w-full text-center">
        {{-- Error Illustration --}}
        <div class="mb-8 relative">
            <div class="inline-block relative">
                <svg class="w-64 h-64 mx-auto" viewBox="0 0 200 200" fill="none">
                    {{-- Background circle --}}
                    <circle cx="100" cy="100" r="80" fill="#fee2e2" opacity="0.5" />

                    {{-- Server icon with X --}}
                    <rect x="60" y="70" width="80" height="60" rx="4" stroke="#7f1d1d" stroke-width="3"
                        fill="#fecaca" />
                    <line x1="70" y1="85" x2="130" y2="85" stroke="#7f1d1d"
                        stroke-width="2" />
                    <line x1="70" y1="95" x2="130" y2="95" stroke="#7f1d1d"
                        stroke-width="2" />
                    <line x1="70" y1="105" x2="130" y2="105" stroke="#7f1d1d"
                        stroke-width="2" />

                    {{-- Big X mark --}}
                    <line x1="80" y1="150" x2="120" y2="170" stroke="#dc2626" stroke-width="4"
                        stroke-linecap="round" />
                    <line x1="120" y1="150" x2="80" y2="170" stroke="#dc2626" stroke-width="4"
                        stroke-linecap="round" />

                    {{-- Warning symbols --}}
                    <circle cx="40" cy="60" r="8" fill="#f87171" />
                    <text x="40" y="65" text-anchor="middle" class="text-sm font-bold fill-white"
                        style="font-family: system-ui">!</text>

                    <circle cx="160" cy="140" r="8" fill="#f87171" />
                    <text x="160" y="145" text-anchor="middle" class="text-sm font-bold fill-white"
                        style="font-family: system-ui">!</text>
                </svg>

                {{-- Animated warning signs --}}
                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                    <div class="absolute top-8 right-8 w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                    <div class="absolute bottom-16 left-12 w-2 h-2 bg-red-600 rounded-full animate-pulse"
                        style="animation-delay: 0.5s;"></div>
                </div>
            </div>
        </div>

        {{-- Error Message --}}
        <div class="mb-8">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Server Error</h1>
            <p class="text-lg text-gray-600 mb-2">Oops! Something went wrong on our end.</p>
            <p class="text-gray-500">We're working to fix the issue. Please try again later.</p>
        </div>

        {{-- Error Details (only in development) --}}
        @if (config('app.debug') && isset($exception))
            <div class="mb-8 bg-white rounded-xl shadow-sm border border-red-200 p-6 text-left">
                <h3 class="text-lg font-semibold text-red-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Error Details (Debug Mode)
                </h3>
                <div class="bg-red-50 rounded-lg p-4 font-mono text-sm text-red-900 overflow-x-auto">
                    <p class="mb-2"><strong>Message:</strong> {{ $exception->getMessage() }}</p>
                    <p><strong>File:</strong> {{ $exception->getFile() }}:{{ $exception->getLine() }}</p>
                </div>
            </div>
        @endif

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <button onclick="location.reload()"
                class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Try Again
            </button>

            <a href="{{ url('/') }}"
                class="inline-flex items-center px-6 py-3 bg-white text-gray-700 font-semibold rounded-lg border-2 border-gray-300 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Back to Home
            </a>
        </div>

        {{-- Help Section --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">What can you do?</h2>
            <div class="grid sm:grid-cols-3 gap-4 text-left">
                <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                    <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1">Refresh the page</h3>
                        <p class="text-xs text-gray-600">The issue might be temporary</p>
                    </div>
                </div>

                <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                    <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1">Wait a moment</h3>
                        <p class="text-xs text-gray-600">We're working to resolve this</p>
                    </div>
                </div>

                <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                    <svg class="w-6 h-6 text-red-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-sm mb-1">Contact support</h3>
                        <p class="text-xs text-gray-600">If the problem persists</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer Text --}}
        <p class="text-sm text-gray-500 mt-8">
            Error Code: 500 | <a href="{{ url('/contact') }}" class="text-red-700 hover:underline font-medium">Report
                this issue</a>
        </p>
    </div>
</body>

</html>
