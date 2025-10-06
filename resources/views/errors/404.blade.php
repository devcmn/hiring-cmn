<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
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

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center px-4 mb-5">
    <div class="max-w-2xl w-full text-center">
        {{-- Animated 404 Illustration --}}
        <div class="mb-8 relative">
            <div class="inline-block relative">
                <svg class="w-64 h-64 mx-auto" viewBox="0 0 200 200" fill="none">
                    {{-- Background circle --}}
                    <circle cx="100" cy="100" r="80" fill="#e0f2fe" opacity="0.5" />

                    {{-- 404 Text --}}
                    <text x="100" y="120" text-anchor="middle" class="text-7xl font-bold fill-primary-900"
                        style="font-family: system-ui">404</text>

                    {{-- Magnifying glass --}}
                    <circle cx="140" cy="70" r="25" stroke="#0c4a6e" stroke-width="4" fill="none" />
                    <line x1="158" y1="88" x2="175" y2="105" stroke="#0c4a6e" stroke-width="4"
                        stroke-linecap="round" />

                    {{-- Question marks --}}
                    <text x="30" y="50" class="text-2xl fill-primary-600" style="font-family: system-ui">?</text>
                    <text x="170" y="140" class="text-2xl fill-primary-600" style="font-family: system-ui">?</text>
                </svg>

                {{-- Floating animation elements --}}
                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                    <div class="absolute top-4 left-8 w-3 h-3 bg-primary-400 rounded-full animate-ping"
                        style="animation-delay: 0s;"></div>
                    <div class="absolute bottom-12 right-12 w-2 h-2 bg-primary-600 rounded-full animate-ping"
                        style="animation-delay: 1s;"></div>
                    <div class="absolute top-20 right-8 w-2 h-2 bg-primary-500 rounded-full animate-ping"
                        style="animation-delay: 2s;"></div>
                </div>
            </div>
        </div>

        {{-- Error Message --}}
        <div class="mb-8">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Page Not Found</h1>
            <p class="text-lg text-gray-600 mb-2">Oops! The page you're looking for doesn't exist.</p>
            <p class="text-gray-500">It might have been moved or deleted, or perhaps you mistyped the URL.</p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <a href="{{ url('/') }}"
                class="inline-flex items-center px-6 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-primary-800 transition-all shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Back to Home
            </a>

            <button onclick="history.back()"
                class="inline-flex items-center px-6 py-3 bg-white text-gray-700 font-semibold rounded-lg border-2 border-gray-300 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Go Back
            </button>
        </div>

        {{-- Helpful Links --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <a href="{{ route('candidate.jobs') }}"
                    class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                    <svg class="w-8 h-8 text-primary-900 mb-2 group-hover:scale-110 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Jobs</span>
                </a>

                <a href="{{ url('/about') }}"
                    class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                    <svg class="w-8 h-8 text-primary-900 mb-2 group-hover:scale-110 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">About</span>
                </a>

                <a href="{{ url('/contact') }}"
                    class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                    <svg class="w-8 h-8 text-primary-900 mb-2 group-hover:scale-110 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Contact</span>
                </a>

                <a href="{{ url('/help') }}"
                    class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                    <svg class="w-8 h-8 text-primary-900 mb-2 group-hover:scale-110 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Help</span>
                </a>
            </div>
        </div>

        {{-- Footer Text --}}
        <p class="text-sm text-gray-500 mt-8">
            Error Code: 404 | If you believe this is a mistake, please <a href="{{ url('/contact') }}"
                class="text-primary-900 hover:underline font-medium">contact support</a>
        </p>
    </div>
</body>

</html>
