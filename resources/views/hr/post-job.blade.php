@extends('layouts.app')

@section('title', 'Post a Job - Hiring - CMN')
@section('page-title', 'Post a New Job')
@section('page-subtitle', 'Fill in the details to create a new job posting')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Job Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">
                        Job Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" placeholder="e.g. Senior Frontend Developer"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                        required>
                </div>

                <!-- Company & Location -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="company_name" class="block text-sm font-semibold text-gray-900 mb-2">
                            Company Name <span class="text-red-500">*</span>
                        </label>
                        <select id="company_name" name="company_name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                            <option value="">Select company name</option>
                            <option value="PT. Ciptakom Media Nusa">CMN (PT. Ciptakom Media Nusa)</option>
                            <option value="PT. Ciptakomunindo Pradipta">CP (PT. Ciptakomunindo Pradipta)</option>
                        </select>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-900 mb-2">
                            Location <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location" placeholder="e.g. Cengkareng, Jakarta Barat"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                    </div>
                </div>

                <!-- Job Type & Salary -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="job-type" class="block text-sm font-semibold text-gray-900 mb-2">
                            Job Type <span class="text-red-500">*</span>
                        </label>
                        <select id="job-type" name="job_type"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                            <option value="">Select job type</option>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                        </select>
                    </div>
                    <div>
                        <label for="salary" class="block text-sm font-semibold text-gray-900 mb-2">
                            Salary
                        </label>
                        <input type="text" id="salary" name="salary" placeholder="e.g. 5.000.000"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="application_deadline" class="block text-sm font-semibold text-gray-900 mb-2">
                            Open Until
                        </label>
                        <input type="date" id="application_deadline" name="application_deadline"
                            placeholder="e.g. 5.000.000"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Job Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                        Job Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" name="description" rows="6"
                        placeholder="Describe the role, responsibilities, and what makes this opportunity exciting..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"
                        required></textarea>
                </div>

                <!-- Requirements -->
                <div>
                    <label for="requirements" class="block text-sm font-semibold text-gray-900 mb-2">
                        Requirements <span class="text-red-500">*</span>
                    </label>
                    <textarea id="requirements" name="requirements" rows="6"
                        placeholder="Gunakan koma pada setiap list. Contoh: Pengalaman min. 2 thn, Menguasai Excel, dll."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"
                        required></textarea>
                </div>

                <!-- Benefits (Optional) -->
                <div>
                    <label for="benefits" class="block text-sm font-semibold text-gray-900 mb-2">
                        Benefits & Perks
                    </label>
                    <textarea id="benefits" name="benefits" rows="4"
                        placeholder="Gunakan koma pada setiap list. Contoh: Health insurance, flexible hours, remote work..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="px-8 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors shadow-lg shadow-accent-500/30">
                        Publish Job
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salaryInput = document.getElementById('salary');

            salaryInput.addEventListener('input', function(e) {
                // Remove any non-digit characters
                let value = e.target.value.replace(/\D/g, '');

                // Format with dot as thousand separator
                if (value) {
                    e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                } else {
                    e.target.value = '';
                }
            });

            // Before submit, strip the dots so backend gets clean number
            salaryInput.form.addEventListener('submit', function() {
                salaryInput.value = salaryInput.value.replace(/\./g, '');
            });
        });
    </script>
@endsection
