document.addEventListener("DOMContentLoaded", function () {
    let educationCount = 0;
    let seminarCount = 0;
    let organizationCount = 0;

    window.addEducation = function () {
        educationCount++;
        const container = document.getElementById("educationList");

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative education-item" data-index="${educationCount}">
                <button type="button" onclick="removeEducation(${educationCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <input type="hidden" name="education[${educationCount}][type]" value="education">

                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Institution Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="education[${educationCount}][name]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="University/School name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Major/Field of Study
                            </label>
                            <input type="text" name="education[${educationCount}][major_or_topic]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Computer Science">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Start Year
                            </label>
                            <input type="number" name="education[${educationCount}][start_year]" min="1950" max="2030"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="2015">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                End Year
                            </label>
                            <input type="number" name="education[${educationCount}][end_year]" min="1950" max="2030"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="2019">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                GPA/Grade (Optional)
                            </label>
                            <input type="text" name="education[${educationCount}][note]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="3.75/4.00">
                        </div>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeEducation = function (index) {
        const item = document.querySelector(
            `.education-item[data-index="${index}"]`
        );
        if (item) {
            item.remove();
        }
    };

    window.addSeminar = function () {
        seminarCount++;
        const container = document.getElementById("seminarList");

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative seminar-item" data-index="${seminarCount}">
                <button type="button" onclick="removeSeminar(${seminarCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <input type="hidden" name="seminars[${seminarCount}][type]" value="seminar">

                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Seminar/Training Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="seminars[${seminarCount}][name]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Seminar name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Topic/Subject
                            </label>
                            <input type="text" name="seminars[${seminarCount}][major_or_topic]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="e.g., Leadership, Digital Marketing">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Year
                            </label>
                            <input type="number" name="seminars[${seminarCount}][start_year]" min="1950" max="2030"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="2023">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Organizer (Optional)
                            </label>
                            <input type="text" name="seminars[${seminarCount}][note]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Organizer name">
                        </div>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeSeminar = function (index) {
        const item = document.querySelector(
            `.seminar-item[data-index="${index}"]`
        );
        if (item) {
            item.remove();
        }
    };

    window.addOrganization = function () {
        organizationCount++;
        const container = document.getElementById("organizationList");

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative organization-item" data-index="${organizationCount}">
                <button type="button" onclick="removeOrganization(${organizationCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <input type="hidden" name="organizations[${organizationCount}][type]" value="organization">

                <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Organization Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="organizations[${organizationCount}][name]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Organization name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Position
                            </label>
                            <input type="text" name="organizations[${organizationCount}][position]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="e.g., Member, Chairman">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Start Year
                            </label>
                            <input type="number" name="organizations[${organizationCount}][start_year]" min="1950" max="2030"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="2020">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                End Year
                            </label>
                            <input type="number" name="organizations[${organizationCount}][end_year]" min="1950" max="2030"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="2022">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status
                            </label>
                            <select name="organizations[${organizationCount}][note]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                                <option value="">Select</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeOrganization = function (index) {
        const item = document.querySelector(
            `.organization-item[data-index="${index}"]`
        );
        if (item) {
            item.remove();
        }
    };

    addEducation();
});
