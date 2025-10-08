<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hiring - CMN')</title>

    {{-- Vite handles Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-50 font-sans antialiased" x-data="{
    sidebarOpen: false,
    init() {
        // Only auto-open sidebar on desktop
        this.sidebarOpen = window.innerWidth >= 768;
        window.addEventListener('resize', () => {
            this.sidebarOpen = window.innerWidth >= 768;
        });
    }
}">
    <div class="flex h-screen overflow-hidden relative">

        <!-- Sidebar (Desktop) / Drawer (Mobile) -->
        <aside x-show="sidebarOpen" x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="w-64 bg-primary-950 text-white flex flex-col fixed md:static inset-y-0 left-0 z-40 transition-transform duration-300 ease-in-out"
            x-cloak>

            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-primary-800">
                <img src="{{ asset('assets/logo/logo-cmn-full.png') }}" alt="Hiring CMN Logo"
                    class="h-8 invert brightness-0 contrast-200" />

                <!-- Close button (Mobile only) -->
                <button @click="sidebarOpen = false"
                    class="p-2 rounded-lg hover:bg-primary-800 transition-colors md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                @include('layouts.partials.sidebar')
            </nav>

            <!-- User Profile Section -->
            <div class="p-4 border-t border-primary-800">
                <div class="flex items-center space-x-3">
                    <!-- Avatar -->
                    <div class="w-10 h-10 rounded-full bg-primary-200 flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-semibold text-primary-950">
                            @auth
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @else
                                G
                            @endauth
                        </span>
                    </div>

                    <!-- User Info & Logout -->
                    <div class="flex-1 flex items-center justify-between min-w-0">
                        <div class="min-w-0">
                            @auth
                                <p class="text-sm font-medium truncate">
                                    {{ strtoupper(auth()->user()->name) }} {{ strtoupper(auth()->user()->last_name) }}
                                </p>
                                <p class="text-xs text-gray-400 truncate">
                                    {{ strtoupper(auth()->user()->role) }}
                                </p>
                            @else
                                <p class="text-sm font-medium truncate">GUEST</p>
                                <p class="text-xs text-gray-400 truncate">VISITOR</p>
                            @endauth
                        </div>

                        <!-- Logout Button -->
                        <div class="ml-3 flex-shrink-0">
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center justify-center p-2 rounded-lg bg-red-500/80 hover:bg-red-600 text-white shadow-sm transition-all duration-200 hover:shadow-md hover:scale-105"
                                        title="Log Out">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0110.5 3h6a2.25 2.25 0 012.25 2.25v13.5A2.25 2.25 0 0116.5 21h-6a2.25 2.25 0 01-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="flex items-center justify-center p-2 rounded-lg bg-white/20 hover:bg-white/30 text-white shadow-sm transition-all duration-200 hover:shadow-md hover:scale-105"
                                    title="Login">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12" />
                                    </svg>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay (Mobile Only) -->
        <div x-show="sidebarOpen && window.innerWidth < 768" @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden" x-transition.opacity x-cloak></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Mobile Top Navbar -->
            <div class="md:hidden bg-primary-950 text-white shadow-lg">
                <div class="flex items-center justify-between px-4 py-3">
                    <!-- Menu Button -->
                    <button @click="sidebarOpen = true" class="p-2 rounded-lg hover:bg-primary-800 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <img src="{{ asset('assets/logo/logo-cmn-full.png') }}" alt="CMN Logo"
                        class="h-7 invert brightness-0 contrast-200" />

                    <!-- User Avatar -->
                    <div class="w-8 h-8 rounded-full bg-primary-200 flex items-center justify-center">
                        <span class="text-sm font-semibold text-primary-950">
                            @auth
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @else
                                G
                            @endauth
                        </span>
                    </div>
                </div>
            </div>

            <!-- Page Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">@yield('page-title')</h2>
                        <p class="text-sm text-gray-600 mt-1">@yield('page-subtitle')</p>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#166534'
                });
            @endif
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#dc2626'
                });
            @endif
        });

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.choices-select').forEach((select) => {
                new Choices(select, {
                    searchEnabled: true,
                    itemSelectText: '',
                    shouldSort: false,
                    placeholder: true,
                    placeholderValue: select.dataset.placeholder || 'Select an option',
                    searchPlaceholderValue: 'Type to search...', // Optional: placeholder for search
                });
            });
        });
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</body>

</html>
