<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 mb-8">
    <!-- Total Applications -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Total Applications</p>
                <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $totalApplications }}</p>
                <p class="text-xs mt-1 text-gray-500">Across all positions</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- New Applications -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">New Applications</p>
                <p class="text-2xl sm:text-3xl font-bold text-yellow-600">{{ $pendingApplications }}</p>
                <p class="text-xs mt-1 text-gray-500">Awaiting review</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- In Interview -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">In Interview</p>
                <p class="text-2xl sm:text-3xl font-bold text-purple-600">{{ $interviewApplications }}</p>
                <p class="text-xs mt-1 text-gray-500">Scheduled interviews</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Accepted -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Accepted</p>
                <p class="text-2xl sm:text-3xl font-bold text-green-600">{{ $acceptedApplications }}</p>
                <p class="text-xs mt-1 text-gray-500">This month</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Active Jobs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Active Jobs</p>
                <p class="text-2xl sm:text-3xl font-bold text-indigo-600">{{ $jobs->count() }}</p>
                <p class="text-xs mt-1 text-gray-500">Open positions</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        {{-- Search --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Search Jobs</label>
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search by job title..."
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        {{-- Status Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select id="statusFilter"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="all">All Status</option>
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
            </select>
        </div>

        {{-- Date Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
            <select id="dateFilter"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>
        </div>
    </div>
</div>
