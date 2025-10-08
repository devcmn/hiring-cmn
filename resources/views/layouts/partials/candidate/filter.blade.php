<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
        <!-- Search -->
        <div class="md:col-span-8">
            <label for="search-jobs" class="block text-sm font-medium text-gray-700 mb-2">
                Search Jobs
            </label>
            <input type="text" id="search-jobs" placeholder="Search jobs by title, company, or keyword..."
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent">
        </div>

        <!-- Job Type -->
        <div class="md:col-span-4">
            <label for="job-type-filter" class="block text-sm font-medium text-gray-700 mb-2">
                Job Type
            </label>
            <select id="job-type-filter"
                class="choices-select w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent">
                <option value="all">All Type</option>
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="contract">Contract</option>
                <option value="internship">Internship</option>
            </select>
        </div>
    </div>
</div>
