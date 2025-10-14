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

<script>
    let workExperienceCount = 0;

    function addWorkExperience() {
        workExperienceCount++;
        const container = document.getElementById('workExperienceList');

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative work-experience-item" data-index="${workExperienceCount}">
                <button type="button" onclick="removeWorkExperience(${workExperienceCount})"
                    class="absolute top-2 right-2 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="work_experience[${workExperienceCount}][company_name]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Company name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Position/Job Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="work_experience[${workExperienceCount}][position]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="e.g., Software Engineer" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Start Date
                            </label>
                            <input type="date" name="work_experience[${workExperienceCount}][start_date]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors work-start-date"
                                data-index="${workExperienceCount}">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                End Date
                            </label>
                            <input type="date" name="work_experience[${workExperienceCount}][end_date]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors work-end-date"
                                data-index="${workExperienceCount}">
                        </div>
                    </div>

                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="work_experience[${workExperienceCount}][is_current]" value="1"
                                class="mr-2 h-4 w-4 text-primary-900 border-gray-300 rounded focus:ring-primary-500 work-current-checkbox"
                                data-index="${workExperienceCount}"
                                onchange="toggleEndDate(${workExperienceCount})">
                            <span class="text-sm text-gray-700 font-medium">I currently work here</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Job Responsibilities & Achievements
                        </label>
                        <textarea name="work_experience[${workExperienceCount}][responsibilities]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                            placeholder="Describe your key responsibilities and achievements in this role..."></textarea>
                        <p class="text-xs text-gray-500 mt-1">Tip: Use bullet points or separate with line breaks</p>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
    }

    function removeWorkExperience(index) {
        const item = document.querySelector(`.work-experience-item[data-index="${index}"]`);
        if (item) {
            item.remove();
        }
    }

    function toggleEndDate(index) {
        const checkbox = document.querySelector(`.work-current-checkbox[data-index="${index}"]`);
        const endDateInput = document.querySelector(`.work-end-date[data-index="${index}"]`);

        if (checkbox.checked) {
            endDateInput.value = '';
            endDateInput.disabled = true;
            endDateInput.classList.add('bg-gray-100');
            endDateInput.parentElement.querySelector('label').innerHTML =
                'End Date <span class="text-gray-400">(Current)</span>';
        } else {
            endDateInput.disabled = false;
            endDateInput.classList.remove('bg-gray-100');
            endDateInput.parentElement.querySelector('label').innerHTML = 'End Date';
        }
    }
</script>
