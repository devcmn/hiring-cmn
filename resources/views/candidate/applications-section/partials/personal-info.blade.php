{{-- Personal Information Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Personal Information
        </h3>
        <p class="text-sm text-gray-500 mt-1">Basic personal details and contact information</p>
    </div>

    {{-- Name Fields --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                First Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="first_name" value="{{ old('first_name', auth()->user()->name) }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('first_name') border-red-500 @enderror"
                placeholder="John" required>
            @error('first_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Last Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('last_name') border-red-500 @enderror"
                placeholder="Doe" required>
            @error('last_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Contact Information --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Email Address <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('email') border-red-500 @enderror"
                    placeholder="john.doe@example.com" required>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Mobile Phone <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <input type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('phone') border-red-500 @enderror"
                    placeholder="0812 3456 7890" required>
            </div>
            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Home Phone <span class="text-gray-500">(Optional)</span>
        </label>
        <input type="tel" name="home_phone" value="{{ old('home_phone') }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
            placeholder="021 1234567">
    </div>

    {{-- Birth Information --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Place of Birth <span class="text-red-500">*</span>
            </label>
            <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('birth_place') border-red-500 @enderror"
                placeholder="Jakarta" required>
            @error('birth_place')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Date of Birth <span class="text-red-500">*</span>
            </label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('birth_date') border-red-500 @enderror"
                required>
            @error('birth_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Personal Details --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Gender <span class="text-red-500">*</span>
            </label>
            <select name="gender"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('gender') border-red-500 @enderror"
                required>
                <option value="">Select</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Religion <span class="text-red-500">*</span>
            </label>
            <select name="religion"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('religion') border-red-500 @enderror"
                required>
                <option value="">Select</option>
                <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>Islam</option>
                <option value="christian" {{ old('religion') == 'christian' ? 'selected' : '' }}>Christian</option>
                <option value="catholic" {{ old('religion') == 'catholic' ? 'selected' : '' }}>Catholic</option>
                <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="buddha" {{ old('religion') == 'buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="confucius" {{ old('religion') == 'confucius' ? 'selected' : '' }}>Confucius</option>
            </select>
            @error('religion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Blood Type <span class="text-gray-500">(Optional)</span>
            </label>
            <select name="blood_type"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                <option value="">Select</option>
                <option value="A" {{ old('blood_type') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('blood_type') == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ old('blood_type') == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="O" {{ old('blood_type') == 'O' ? 'selected' : '' }}>O</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Marital Status <span class="text-red-500">*</span>
            </label>
            <select name="marital_status"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('marital_status') border-red-500 @enderror"
                required>
                <option value="">Select</option>
                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
            @error('marital_status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                National ID (KTP) <span class="text-red-500">*</span>
            </label>
            <input type="text" name="national_id" value="{{ old('national_id') }}" maxlength="16"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('national_id') border-red-500 @enderror"
                placeholder="3201234567890001" required>
            @error('national_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Address Information --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Domicile Address (KTP) <span class="text-red-500">*</span>
        </label>
        <textarea name="domicile_address" rows="2"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none @error('domicile_address') border-red-500 @enderror"
            placeholder="Enter address as shown in your ID card" required>{{ old('domicile_address') }}</textarea>
        @error('domicile_address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Current Address <span class="text-red-500">*</span>
        </label>
        <div class="mb-2">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" id="sameAsKTP"
                    class="mr-2 h-4 w-4 text-primary-900 border-gray-300 rounded focus:ring-primary-500">
                <span class="text-sm text-gray-600">Same as domicile address</span>
            </label>
        </div>
        <textarea name="current_address" id="currentAddress" rows="2"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none @error('current_address') border-red-500 @enderror"
            placeholder="Enter your current residential address" required>{{ old('current_address') }}</textarea>
        @error('current_address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Housing and Transportation --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Housing Status <span class="text-red-500">*</span>
            </label>
            <select name="housing_type"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors @error('housing_type') border-red-500 @enderror"
                required>
                <option value="">Select</option>
                <option value="owned" {{ old('housing_type') == 'owned' ? 'selected' : '' }}>Owned</option>
                <option value="rented" {{ old('housing_type') == 'rented' ? 'selected' : '' }}>Rented</option>
                <option value="parents" {{ old('housing_type') == 'parents' ? 'selected' : '' }}>Parents' House
                </option>
                <option value="dormitory" {{ old('housing_type') == 'dormitory' ? 'selected' : '' }}>Dormitory
                </option>
            </select>
            @error('housing_type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Vehicle Type <span class="text-gray-500">(Optional)</span>
            </label>
            <select name="vehicle_type"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                <option value="">Select</option>
                <option value="motorcycle" {{ old('vehicle_type') == 'motorcycle' ? 'selected' : '' }}>Motorcycle
                </option>
                <option value="car" {{ old('vehicle_type') == 'car' ? 'selected' : '' }}>Car</option>
                <option value="both" {{ old('vehicle_type') == 'both' ? 'selected' : '' }}>Both</option>
                <option value="none" {{ old('vehicle_type') == 'none' ? 'selected' : '' }}>None</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Vehicle Owner <span class="text-gray-500">(Optional)</span>
            </label>
            <select name="vehicle_owner"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                <option value="">Select</option>
                <option value="self" {{ old('vehicle_owner') == 'self' ? 'selected' : '' }}>Self</option>
                <option value="parents" {{ old('vehicle_owner') == 'parents' ? 'selected' : '' }}>Parents</option>
                <option value="spouse" {{ old('vehicle_owner') == 'spouse' ? 'selected' : '' }}>Spouse</option>
                <option value="company" {{ old('vehicle_owner') == 'company' ? 'selected' : '' }}>Company</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Vehicle Year <span class="text-gray-500">(Optional)</span>
            </label>
            <input type="number" name="vehicle_year" value="{{ old('vehicle_year') }}" min="1900"
                max="2030"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                placeholder="2020">
        </div>
    </div>

    {{-- Photo Upload --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Photo <span class="text-gray-500">(Optional)</span>
        </label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-500 transition-colors cursor-pointer"
            onclick="document.getElementById('photo').click()">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                    viewBox="0 0 48 48">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="photo"
                        class="relative cursor-pointer rounded-md font-medium text-primary-900 hover:text-primary-800">
                        <span>Upload a photo</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
            </div>
        </div>
        <input id="photo" name="photo" type="file" class="hidden" accept="image/jpeg,image/png,image/jpg"
            onchange="updatePhotoPreview()">
        <p id="photoName" class="text-sm text-gray-600 mt-2 hidden"></p>
    </div>
</div>

<script>
    // Same as KTP checkbox functionality
    document.getElementById('sameAsKTP').addEventListener('change', function(e) {
        const domicileAddress = document.querySelector('textarea[name="domicile_address"]').value;
        const currentAddressField = document.getElementById('currentAddress');

        if (e.target.checked) {
            currentAddressField.value = domicileAddress;
            currentAddressField.readOnly = true;
            currentAddressField.classList.add('bg-gray-100');
        } else {
            currentAddressField.readOnly = false;
            currentAddressField.classList.remove('bg-gray-100');
        }
    });

    // Photo preview
    function updatePhotoPreview() {
        const input = document.getElementById('photo');
        const display = document.getElementById('photoName');
        const file = input.files[0];

        if (file) {
            display.textContent = '✓ ' + file.name;
            display.classList.remove('hidden');
            display.classList.add('text-green-600', 'font-medium');
        } else {
            display.textContent = '';
            display.classList.add('hidden');
            display.classList.remove('text-green-600', 'font-medium');
        }
    }
</script>
