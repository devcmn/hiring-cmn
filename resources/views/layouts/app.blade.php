<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hiring - CMN')</title>

    {{-- Vite handles Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside
            :class="[sidebarOpen ? 'w-64' : 'w-20',
                'bg-primary-950 text-white flex flex-col transition-all duration-300 ease-in-out overflow-hidden'
            ]">
            <!-- Logo & Toggle -->
            <div class="flex items-center justify-between p-6 border-b border-primary-800">
                <h1 x-show="sidebarOpen" x-cloak class="text-2xl font-bold text-primary-50">
                    Hiring - CMN
                </h1>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-lg hover:bg-primary-800 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <div class="sidebar">
                    @include('layouts.partials.sidebar')
                </div>
            </nav>

            <!-- User Info -->
            <div class="p-4 border-t border-primary-800">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-primary-200 flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-semibold text-primary-950">@yield('user-initial', 'U')</span>
                    </div>
                    <div x-show="sidebarOpen" x-cloak class="flex-1 min-w-0">
                        <p class="text-sm font-medium truncate">@yield('user-name', 'User')</p>
                        <p class="text-xs text-gray-400 truncate">@yield('user-role', 'Role')</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">@yield('page-title')</h2>
                        <p class="text-sm text-gray-600 mt-1">@yield('page-subtitle')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button
                            class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
