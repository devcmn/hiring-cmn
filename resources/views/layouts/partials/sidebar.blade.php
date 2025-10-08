<aside class="space-y-2">
    {{-- Browse Jobs (hidden for HR) --}}
    @if (!Auth::check() || !Auth::user()->isHr())
        <a href="{{ route('candidate.jobs') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('candidate.jobs') ? 'bg-primary-800 text-white' : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span x-show="sidebarOpen" x-cloak>Browse Jobs</span>
        </a>
    @endif

    @auth
        {{-- Candidate-only links --}}
        @if (Auth::user()->isCandidate())
            <a href="{{ route('candidate.applications') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('candidate.applications') ? 'bg-primary-800 text-white' : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span x-show="sidebarOpen" x-cloak>My Applications</span>
            </a>
        @endif

        {{-- HR-only links --}}
        @if (Auth::user()->isHr() || Auth::user()->isAdmin())
            <a href="{{ route('hr.jobs') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('hr.jobs') ? 'bg-primary-800 text-white' : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span x-show="sidebarOpen" x-cloak>My Jobs</span>
            </a>

            <a href="{{ route('hr.post-job') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('hr.post-job') ? 'bg-primary-800 text-white' : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span x-show="sidebarOpen" x-cloak>Post Job</span>
            </a>

            <a href="{{ route('hr.applicants') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('hr.applicants') ? 'bg-primary-800 text-white' : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span x-show="sidebarOpen" x-cloak>Applicants</span>
            </a>
        @endif
        @if (Auth::user()->isAdmin())
            <a href="{{ route('admin.add-user') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg
                {{ request()->routeIs('admin.add-user', 'admin.reset-password')
                    ? 'bg-primary-800 text-white'
                    : 'text-gray-300 hover:bg-primary-800 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                <span x-show="sidebarOpen" x-cloak>Add User</span>
            </a>
        @endif
    @endauth
</aside>
