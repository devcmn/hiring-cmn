@extends('layouts.app')

@section('title', 'Post a Job - Hiring - CMN')
@section('page-title', 'Post a New Job')
@section('page-subtitle', 'Fill in the details to create a new job posting')
@section('user-initial', 'HR')
@section('user-name', 'HR Manager')
@section('user-role', 'Human Resources')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="#" method="POST" class="space-y-6">
                <!-- Job Title -->
                <div>
                    <label for="job-title" class="block text-sm font-semibold text-gray-900 mb-2">
                        Job Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="job-title" name="job_title" placeholder="e.g. Senior Frontend Developer"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                        required>
                </div>

                <!-- Company & Location -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="company" class="block text-sm font-semibold text-gray-900 mb-2">
                            Company Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="company" name="company" placeholder="Your company name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-900 mb-2">
                            Location <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location" placeholder="e.g. San Francisco, CA or Remote"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all"
                            required>
                    </div>
                </div>

                <!-- Job Type & Salary -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                            Salary Range
                        </label>
                        <input type="text" id="salary" name="salary" placeholder="e.g. $80,000 - $120,000"
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
                        placeholder="List the required skills, experience, and qualifications..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"
                        required></textarea>
                </div>

                <!-- Benefits (Optional) -->
                <div>
                    <label for="benefits" class="block text-sm font-semibold text-gray-900 mb-2">
                        Benefits & Perks
                    </label>
                    <textarea id="benefits" name="benefits" rows="4"
                        placeholder="Health insurance, 401k, flexible hours, remote work..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button"
                        class="px-6 py-3 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                        Save as Draft
                    </button>
                    <button type="submit"
                        class="px-8 py-3 bg-accent-500 text-white font-semibold rounded-lg hover:bg-accent-600 transition-colors shadow-lg shadow-accent-500/30">
                        Publish Job
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
