document.addEventListener("DOMContentLoaded", function () {
    let workExperienceCount = 0;

    window.addWorkExperience = function () {
        workExperienceCount++;
        const container = document.getElementById("workExperienceList");

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative work-experience-item" data-index="${workExperienceCount}">
                <button type="button" onclick="removeWorkExperience(${workExperienceCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
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
                        <p class="text-xs text-gray-500 mt-1">Tip: Use bullet points, commas, or separate with line breaks</p>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeWorkExperience = function (index) {
        const item = document.querySelector(
            `.work-experience-item[data-index="${index}"]`
        );
        if (item) {
            item.remove();
        }
    };

    window.toggleEndDate = function (index) {
        const checkbox = document.querySelector(
            `.work-current-checkbox[data-index="${index}"]`
        );
        const endDateInput = document.querySelector(
            `.work-end-date[data-index="${index}"]`
        );

        if (checkbox.checked) {
            endDateInput.value = "";
            endDateInput.disabled = true;
            endDateInput.classList.add("bg-gray-100");
            endDateInput.parentElement.querySelector("label").innerHTML =
                'End Date <span class="text-gray-400">(Current)</span>';
        } else {
            endDateInput.disabled = false;
            endDateInput.classList.remove("bg-gray-100");
            endDateInput.parentElement.querySelector("label").innerHTML =
                "End Date";
        }
    };
});
