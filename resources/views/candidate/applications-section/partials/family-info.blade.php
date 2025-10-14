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
