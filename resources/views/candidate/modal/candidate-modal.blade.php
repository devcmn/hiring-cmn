<div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="showModal = false">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75" @click="showModal = false"></div>

        <!-- Modal panel -->
        <div x-show="showModal" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-2xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
            <!-- Modal Header -->
            <div class="bg-primary-950 px-6 py-4 flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Apply for Position</h3>
                <button @click="showModal = false" class="text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6">
                <div class="mb-6 p-4 bg-accent-50 border border-accent-200 rounded-lg">
                    <p class="text-sm text-gray-700">
                        You are applying for: <span class="font-bold text-gray-900" x-text="selectedJob"></span>
                    </p>
                </div>

                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                                required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Resume/CV <span class="text-red-500">*</span>
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-accent-500 transition-colors cursor-pointer">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="text-sm text-gray-600">Click to upload or drag and drop</p>
                            <p class="text-xs text-gray-500 mt-1">PDF, DOC, DOCX (max. 5MB)</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Cover Letter
                        </label>
                        <textarea rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent resize-none"
                            placeholder="Tell us why you're a great fit for this role..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex items-center justify-end space-x-4">
                <button @click="showModal = false"
                    class="px-6 py-3 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors">
                    Cancel
                </button>
                <button
                    class="px-8 py-3 bg-accent-500 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors shadow-lg shadow-accent-500/30">
                    Submit Application
                </button>
            </div>
        </div>
    </div>
</div>
