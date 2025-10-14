{{-- Education & Activities Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            Education, Seminars & Organizations
        </h3>
        <p class="text-sm text-gray-500 mt-1">Your educational background and activities</p>
    </div>

    {{-- Education History --}}
    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-base font-semibold text-gray-800 flex items-center">
                <span class="w-2 h-2 bg-primary-900 rounded-full mr-2"></span>
                Education History
            </h4>
            <button type="button" onclick="addEducation()"
                class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Education
            </button>
        </div>

        <div id="educationList" class="space-y-4">
            {{-- Education items will be added here --}}
        </div>
    </div>

    {{-- Seminars & Training --}}
    <div class="border-t border-gray-200 pt-6">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-base font-semibold text-gray-800 flex items-center">
                <span class="w-2 h-2 bg-primary-900 rounded-full mr-2"></span>
                Seminars & Training
            </h4>
            <button type="button" onclick="addSeminar()"
                class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Seminar
            </button>
        </div>

        <div id="seminarList" class="space-y-4">
            {{-- Seminar items will be added here --}}
        </div>
    </div>

    {{-- Organizations --}}
    <div class="border-t border-gray-200 pt-6">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-base font-semibold text-gray-800 flex items-center">
                <span class="w-2 h-2 bg-primary-900 rounded-full mr-2"></span>
                Organizations
            </h4>
            <button type="button" onclick="addOrganization()"
                class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Organization
            </button>
        </div>

        <div id="organizationList" class="space-y-4">
            {{-- Organization items will be added here --}}
        </div>
    </div>
</div>
