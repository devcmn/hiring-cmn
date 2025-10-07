<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-4">
    <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-200 text-center">
        <p class="text-lg sm:text-2xl font-bold text-yellow-700">
            {{ $job->applications->where('status', 'pending')->count() }}</p>
        <p class="text-xs text-yellow-600 font-medium">Pending</p>
    </div>
    <div class="bg-purple-50 rounded-lg p-3 border border-purple-200 text-center">
        <p class="text-lg sm:text-2xl font-bold text-purple-700">
            {{ $job->applications->where('status', 'interview')->count() }}</p>
        <p class="text-xs text-purple-600 font-medium">Interview</p>
    </div>
    <div class="bg-green-50 rounded-lg p-3 border border-green-200 text-center">
        <p class="text-lg sm:text-2xl font-bold text-green-700">
            {{ $job->applications->where('status', 'accepted')->count() }}</p>
        <p class="text-xs text-green-600 font-medium">Accepted</p>
    </div>
    <div class="bg-red-50 rounded-lg p-3 border border-red-200 text-center">
        <p class="text-lg sm:text-2xl font-bold text-red-700">
            {{ $job->applications->where('status', 'rejected')->count() }}</p>
        <p class="text-xs text-red-600 font-medium">Rejected</p>
    </div>
</div>
