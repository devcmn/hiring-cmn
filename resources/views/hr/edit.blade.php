@extends('layouts.app')

@section('title', 'Edit Job - Hiring - CMN')
@section('page-title', 'Edit Job')
@section('page-subtitle', 'Update the details for this job posting')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Job Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">
                        Job Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}"
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
                            <option value="PT. Ciptakom Media Nusa"
                                {{ old('company_name', $job->company_name) == 'PT. Ciptakom Media Nusa' ? 'selected' : '' }}>
                                CMN (PT. Ciptakom Media Nusa)</option>
                            <option value="PT. Ciptakomunindo Pradipta"
                                {{ old('company_name', $job->company_name) == 'PT. Ciptakomunindo Pradipta' ? 'selected' : '' }}>
                                CP (PT. Ciptakomunindo Pradipta)</option>
                        </select>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-900 mb-2">
                            Location <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                    </div>
                </div>

                <!-- Job Type & Salary -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="job_type" class="block text-sm font-semibold text-gray-900 mb-2">
                            Job Type <span class="text-red-500">*</span>
                        </label>
                        <select id="job_type" name="job_type"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                            <option value="">Select job type</option>
                            <option value="full-time"
                                {{ old('job_type', $job->job_type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time"
                                {{ old('job_type', $job->job_type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('job_type', $job->job_type) == 'Contract' ? 'selected' : '' }}>
                                Contract</option>
                            <option value="Internship"
                                {{ old('job_type', $job->job_type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>
                    <div>
                        <label for="salary" class="block text-sm font-semibold text-gray-900 mb-2">Salary</label>
                        <input type="text" id="salary" name="salary" value="{{ old('salary', $job->salary) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label for="application_deadline" class="block text-sm font-semibold text-gray-900 mb-2">Open
                            Until</label>
                        <input type="date" id="application_deadline" name="application_deadline"
                            value="{{ old('application_deadline', $job->application_deadline ? $job->application_deadline->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <!-- Job Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">Job Description</label>
                    <textarea id="description" name="description" rows="6"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"
                        required>{{ old('description', $job->description) }}</textarea>
                </div>

                <!-- Requirements -->
                <div>
                    <label for="requirements" class="block text-sm font-semibold text-gray-900 mb-2">Requirements</label>
                    <textarea id="requirements" name="requirements" rows="6"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"
                        required>{{ old('requirements', $job->requirements) }}</textarea>
                </div>

                <!-- Benefits -->
                <div>
                    <label for="benefits" class="block text-sm font-semibold text-gray-900 mb-2">Benefits & Perks</label>
                    <textarea id="benefits" name="benefits" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none">{{ old('benefits', $job->benefits) }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('hr.jobs') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-primary-900 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors shadow-lg shadow-accent-500/30">
                        Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salaryInput = document.getElementById('salary');

            function formatNumber(value) {
                // Remove non-digits
                value = value.replace(/\D/g, '');
                // Format with dot as thousand separator
                return value ? value.replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '';
            }

            // Format the value once on page load
            if (salaryInput.value) {
                // Convert "9000000.00" → "9000000"
                const numericValue = salaryInput.value.split('.')[0];
                salaryInput.value = formatNumber(numericValue);
            }

            // Format on input while typing
            salaryInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = formatNumber(value);
            });

            // Before submit, strip the dots so backend gets a clean number
            salaryInput.form.addEventListener('submit', function() {
                salaryInput.value = salaryInput.value.replace(/\./g, '');
            });
        });
    </script>
@endsection
