<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 to-orange-50 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl w-full text-center">
        <div class="mb-8">
            <svg class="w-64 h-64 mx-auto" viewBox="0 0 200 200" fill="none">
                <circle cx="100" cy="100" r="80" fill="#fef3c7" opacity="0.5" />
                <rect x="70" y="80" width="60" height="50" rx="4" stroke="#78350f" stroke-width="3"
                    fill="#fde68a" />
                <circle cx="100" cy="60" r="8" fill="#78350f" />
                <line x1="100" y1="60" x2="100" y2="80" stroke="#78350f" stroke-width="3" />
                <circle cx="90" cy="100" r="3" fill="#78350f" />
                <circle cx="110" cy="100" r="3" fill="#78350f" />
                <path d="M 85 115 Q 100 120 115 115" stroke="#78350f" stroke-width="2" fill="none" />
            </svg>
        </div>

        <div class="mb-8">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Access Denied</h1>
            <p class="text-lg text-gray-600 mb-2">You don't have permission to access this page.</p>
            <p class="text-gray-500">Please contact an administrator if you believe this is an error.</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ url('/') }}"
                class="inline-flex items-center px-6 py-3 bg-yellow-600 text-white font-semibold rounded-lg hover:bg-yellow-700 transition-all shadow-md">
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

        <p class="text-sm text-gray-500 mt-8">
            Error Code: 403 | <a href="{{ url('/contact') }}"
                class="text-yellow-700 hover:underline font-medium">Contact Support</a>
        </p>
    </div>
</body>

</html>
