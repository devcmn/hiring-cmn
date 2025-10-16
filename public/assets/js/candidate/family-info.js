document.addEventListener("DOMContentLoaded", function () {
    let familyMemberCount = 0;
    let spouseChildCount = 0;

    // --- Define functions globally (so onclick="..." still works) ---
    window.addFamilyMember = function () {
        familyMemberCount++;
        const container = document.getElementById("familyMembersList");
        if (!container) return;

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative family-member-item" data-index="${familyMemberCount}">
                <button type="button" onclick="removeFamilyMember(${familyMemberCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Relation <span class="text-red-500">*</span>
                        </label>
                        <select name="family_members[${familyMemberCount}][relation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            required>
                            <option value="">Select</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="sibling">Sibling</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="family_members[${familyMemberCount}][name]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Full name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Age</label>
                        <input type="number" name="family_members[${familyMemberCount}][age]" min="0" max="150"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Age">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Occupation</label>
                        <input type="text" name="family_members[${familyMemberCount}][occupation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Occupation">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        <input type="tel" name="family_members[${familyMemberCount}][phone]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="0812 xxxx xxxx">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                        <input type="text" name="family_members[${familyMemberCount}][address]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Address">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeFamilyMember = function (index) {
        document
            .querySelector(`.family-member-item[data-index="${index}"]`)
            ?.remove();
    };

    window.addSpouseChild = function () {
        spouseChildCount++;
        const container = document.getElementById("spouseChildrenList");
        if (!container) return;

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative spouse-child-item" data-index="${spouseChildCount}">
                <button type="button" onclick="removeSpouseChild(${spouseChildCount})"
                    class="absolute top-2 right-2 z-10 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Relation <span class="text-red-500">*</span></label>
                        <select name="spouse_children[${spouseChildCount}][relation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            required>
                            <option value="">Select</option>
                            <option value="spouse">Spouse</option>
                            <option value="child">Child</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="spouse_children[${spouseChildCount}][name]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Full name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Age</label>
                        <input type="text" name="spouse_children[${spouseChildCount}][age]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Occupation</label>
                        <input type="text" name="spouse_children[${spouseChildCount}][occupation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Occupation">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Education</label>
                        <input type="text" name="spouse_children[${spouseChildCount}][education]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Education level">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", template);
    };

    window.removeSpouseChild = function (index) {
        document
            .querySelector(`.spouse-child-item[data-index="${index}"]`)
            ?.remove();
    };

    // --- Show spouse section when "married" is selected ---
    const maritalStatusSelect = document.querySelector(
        'select[name="marital_status"]'
    );
    if (maritalStatusSelect) {
        const spouseSection = document.getElementById("spouseChildrenSection");

        function toggleSpouseSection(value) {
            if (value && value !== "single") {
                spouseSection.classList.remove("hidden");
            } else {
                spouseSection.classList.add("hidden");
            }
        }

        // Listen for change
        maritalStatusSelect.addEventListener("change", function () {
            toggleSpouseSection(this.value);
        });

        // Check initial value (for edit forms or old values)
        toggleSpouseSection(maritalStatusSelect.value);
    }

    // --- Add initial family member on load ---
    addFamilyMember();
});
