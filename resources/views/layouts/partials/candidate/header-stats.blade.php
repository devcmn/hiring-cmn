<div class="space-y-6 mb-4">
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
        <!-- Total Applied -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Total Applied</p>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $applications->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Under Review -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Under Review</p>
                    <p class="text-2xl sm:text-3xl font-bold text-yellow-600">
                        {{ $applications->where('status', 'pending')->count() }}
                    </p>
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

        <!-- Interviewed -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Interviewed</p>
                    <p class="text-2xl sm:text-3xl font-bold text-purple-600">
                        {{ $applications->where('status', 'interview')->count() }}
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Accepted -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-medium text-gray-600 mb-1">Accepted</p>
                    <p class="text-2xl sm:text-3xl font-bold text-green-600">
                        {{ $applications->where('status', 'accepted')->count() }}
                    </p>
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
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-start sm:items-center justify-between">
            <div class="flex flex-wrap gap-2 w-full sm:w-auto">
                <button class="px-3 sm:px-4 py-2 rounded-lg font-medium text-sm transition-colors filter-btn active"
                    data-status="all">All</button>
                <button class="px-3 sm:px-4 py-2 rounded-lg font-medium text-sm transition-colors filter-btn"
                    data-status="pending">
                    <span class="w-2 h-2 bg-yellow-500 rounded-full inline-block mr-1"></span>Pending
                </button>
                <button class="px-3 sm:px-4 py-2 rounded-lg font-medium text-sm transition-colors filter-btn"
                    data-status="interview">
                    <span class="w-2 h-2 bg-purple-500 rounded-full inline-block mr-1"></span>Interview
                </button>
                <button class="px-3 sm:px-4 py-2 rounded-lg font-medium text-sm transition-colors filter-btn"
                    data-status="accepted">
                    <span class="w-2 h-2 bg-green-500 rounded-full inline-block mr-1"></span>Accepted
                </button>
                <button class="px-3 sm:px-4 py-2 rounded-lg font-medium text-sm transition-colors filter-btn"
                    data-status="rejected">
                    <span class="w-2 h-2 bg-red-500 rounded-full inline-block mr-1"></span>Rejected
                </button>
            </div>
        </div>
    </div>
</div>
