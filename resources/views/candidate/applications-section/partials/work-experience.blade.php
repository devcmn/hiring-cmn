{{-- Work Experience Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Work Experience
        </h3>
        <p class="text-sm text-gray-500 mt-1">Your professional work history</p>
    </div>

    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-base font-semibold text-gray-800">Employment History</h4>
            <button type="button" onclick="addWorkExperience()"
                class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Experience
            </button>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            List your work experience starting with the most recent position. If this is your first job, you can skip
            this section.
        </p>

        <div id="workExperienceList" class="space-y-4">
            {{-- Work experience items will be added here --}}
        </div>

        <div class="mt-4 text-center">
            <button type="button" onclick="addWorkExperience()"
                class="text-sm text-primary-900 hover:underline font-medium">
                + Add another position
            </button>
        </div>
    </div>
</div>
