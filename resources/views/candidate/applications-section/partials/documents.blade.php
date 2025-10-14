{{-- Documents & Cover Letter Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Application Documents
        </h3>
        <p class="text-sm text-gray-500 mt-1">Upload your resume and other supporting documents</p>
    </div>

    {{-- Resume/CV Upload --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Resume/CV <span class="text-red-500">*</span>
        </label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-500 transition-colors cursor-pointer"
            onclick="document.getElementById('resume').click()">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="resume"
                        class="relative cursor-pointer rounded-md font-medium text-primary-900 hover:text-primary-800">
                        <span>Upload your resume</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PDF, DOC, DOCX up to 2MB</p>
            </div>
        </div>
        <input id="resume" name="resume" type="file" class="hidden" accept=".pdf,.doc,.docx"
            onchange="updateFileName('resume', 'fileNameResume')" required>
        <p id="fileNameResume" class="text-sm text-gray-600 mt-2 hidden"></p>
        @error('resume')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Other File Upload --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Supporting Documents <span class="text-gray-500">(Optional)</span>
        </label>
        <p class="text-xs text-gray-600 mb-2">You can upload certificates, portfolio, or other relevant documents</p>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary-500 transition-colors cursor-pointer"
            onclick="document.getElementById('other_file').click()">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="other_file"
                        class="relative cursor-pointer rounded-md font-medium text-primary-900 hover:text-primary-800">
                        <span>Upload a file</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PDF, DOC, DOCX up to 2MB</p>
            </div>
        </div>
        <input id="other_file" name="other_file" type="file" class="hidden" accept=".pdf,.doc,.docx"
            onchange="updateFileName('other_file', 'fileNameOther')">
        <p id="fileNameOther" class="text-sm text-gray-600 mt-2 hidden"></p>
        @error('other_file')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Cover Letter --}}
    <div class="border-t border-gray-200 pt-6">
        <h4 class="text-base font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Cover Letter
            <span class="ml-2 text-sm font-normal text-gray-500">(Optional but recommended)</span>
        </h4>

        <div>
            <label class="block text-sm text-gray-600 mb-2">
                Tell us why you're interested in this position and why you'd be a great fit
            </label>
            <textarea name="cover_letter" rows="8"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none @error('cover_letter') border-red-500 @enderror"
                placeholder="Dear Hiring Manager,

I am writing to express my strong interest in this position. With my background in...">{{ old('cover_letter') }}</textarea>
            <div class="flex justify-between items-center mt-2">
                <p class="text-xs text-gray-500">Minimum 50 characters recommended</p>
                <p class="text-xs text-gray-500"><span id="charCount">0</span> characters</p>
            </div>
            @error('cover_letter')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Terms and Conditions --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mt-6">
        <label class="flex items-start cursor-pointer">
            <input type="checkbox" name="terms"
                class="mt-1 mr-3 h-4 w-4 text-primary-900 border-gray-300 rounded focus:ring-primary-500" required>
            <span class="text-sm text-gray-700">
                I confirm that all information provided is accurate and complete. I agree to the
                <a href="#" class="text-primary-900 hover:underline font-medium">terms and conditions</a>
                and
                <a href="#" class="text-primary-900 hover:underline font-medium">privacy policy</a>.
                I understand that providing false information may result in disqualification.
            </span>
        </label>
    </div>

    {{-- Application Summary Alert --}}
    <div class="bg-blue-50 rounded-lg p-4 border border-blue-200 mt-6">
        <div class="flex">
            <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd" />
            </svg>
            <div>
                <p class="text-sm font-semibold text-blue-900 mb-1">Ready to submit?</p>
                <p class="text-xs text-blue-800">Please review all sections before submitting. Make sure all required
                    fields are filled and your documents are correctly uploaded.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Character counter for cover letter
    const coverLetter = document.querySelector('textarea[name="cover_letter"]');
    const charCount = document.getElementById('charCount');

    if (coverLetter && charCount) {
        // Initialize counter with existing value
        charCount.textContent = coverLetter.value.length;

        coverLetter.addEventListener('input', function(e) {
            charCount.textContent = e.target.value.length;
        });
    }

    // File name display function
    function updateFileName(inputId, displayId) {
        const input = document.getElementById(inputId);
        const fileDisplay = document.getElementById(displayId);
        const file = input.files[0];

        if (file) {
            const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
            fileDisplay.innerHTML =
                `<span class="text-green-600 font-medium">✓ ${file.name}</span> <span class="text-gray-500">(${fileSize} MB)</span>`;
            fileDisplay.classList.remove('hidden');
        } else {
            fileDisplay.textContent = '';
            fileDisplay.classList.add('hidden');
        }
    }
</script>
