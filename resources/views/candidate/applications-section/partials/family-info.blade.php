{{-- Family Information Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Family Information
        </h3>
        <p class="text-sm text-gray-500 mt-1">Details about your family members</p>
    </div>

    {{-- Family Members (Parents & Siblings) --}}
    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-base font-semibold text-gray-800">Parents & Siblings</h4>
            <button type="button" onclick="addFamilyMember()"
                class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Member
            </button>
        </div>

        <div id="familyMembersList" class="space-y-4">
            {{-- Initial family member form will be added here --}}
        </div>
    </div>

    {{-- Spouse & Children (Conditional) --}}
    <div id="spouseChildrenSection" class="hidden">
        <div class="border-t border-gray-200 pt-6">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-base font-semibold text-gray-800">Spouse & Children</h4>
                <button type="button" onclick="addSpouseChild()"
                    class="text-sm px-4 py-2 bg-primary-900 text-white rounded-lg hover:bg-primary-800 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Spouse/Child
                </button>
            </div>

            <div id="spouseChildrenList" class="space-y-4">
                {{-- Spouse/children forms will be added here --}}
            </div>
        </div>
    </div>
</div>

<script>
    let familyMemberCount = 0;
    let spouseChildCount = 0;

    // Show spouse section when married status is selected
    document.addEventListener('DOMContentLoaded', function() {
        const maritalStatusSelect = document.querySelector('select[name="marital_status"]');
        if (maritalStatusSelect) {
            maritalStatusSelect.addEventListener('change', function() {
                const spouseSection = document.getElementById('spouseChildrenSection');
                if (this.value === 'married') {
                    spouseSection.classList.remove('hidden');
                } else {
                    spouseSection.classList.add('hidden');
                }
            });

            // Check initial value
            if (maritalStatusSelect.value === 'married') {
                document.getElementById('spouseChildrenSection').classList.remove('hidden');
            }
        }

        // Add initial family member
        addFamilyMember();
    });

    function addFamilyMember() {
        familyMemberCount++;
        const container = document.getElementById('familyMembersList');

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative family-member-item" data-index="${familyMemberCount}">
                <button type="button" onclick="removeFamilyMember(${familyMemberCount})"
                    class="absolute top-2 right-2 text-red-600 hover:text-red-800 transition-colors">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="family_members[${familyMemberCount}][name]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Full name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Age
                        </label>
                        <input type="number" name="family_members[${familyMemberCount}][age]" min="0" max="150"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Age">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Occupation
                        </label>
                        <input type="text" name="family_members[${familyMemberCount}][occupation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Occupation">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone
                        </label>
                        <input type="tel" name="family_members[${familyMemberCount}][phone]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="0812 xxxx xxxx">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Address
                        </label>
                        <input type="text" name="family_members[${familyMemberCount}][address]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Address">
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
    }

    function removeFamilyMember(index) {
        const item = document.querySelector(`.family-member-item[data-index="${index}"]`);
        if (item) {
            item.remove();
        }
    }

    function addSpouseChild() {
        spouseChildCount++;
        const container = document.getElementById('spouseChildrenList');

        const template = `
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 relative spouse-child-item" data-index="${spouseChildCount}">
                <button type="button" onclick="removeSpouseChild(${spouseChildCount})"
                    class="absolute top-2 right-2 text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Relation <span class="text-red-500">*</span>
                        </label>
                        <select name="spouse_children[${spouseChildCount}][relation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            required>
                            <option value="">Select</option>
                            <option value="spouse">Spouse</option>
                            <option value="child">Child</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="spouse_children[${spouseChildCount}][name]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Full name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Date of Birth
                        </label>
                        <input type="date" name="spouse_children[${spouseChildCount}][birth_date]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Occupation
                        </label>
                        <input type="text" name="spouse_children[${spouseChildCount}][occupation]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Occupation">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Education
                        </label>
                        <input type="text" name="spouse_children[${spouseChildCount}][education]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                            placeholder="Education level">
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
    }

    function removeSpouseChild(index) {
        const item = document.querySelector(`.spouse-child-item[data-index="${index}"]`);
        if (item) {
            item.remove();
        }
    }
</script>
