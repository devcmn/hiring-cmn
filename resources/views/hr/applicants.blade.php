@extends('layouts.app')

@section('title', 'Applications Management')
@section('page-title', 'Applications Management')
@section('page-subtitle', 'Review and manage candidate applications')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        {{-- Header Stats --}}
        @include('layouts.partials.hr.applicants-header')

        {{-- Job Categories with Applications --}}
        <div class="space-y-6">
            @forelse($jobs as $job)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    {{-- Job Header --}}
                    <div class="bg-gradient-to-r from-gray-50 to-white p-4 sm:p-6 border-b border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                            {{-- Left Info --}}
                            <div class="flex flex-col sm:flex-row sm:items-start gap-4 flex-1">
                                <div class="flex-1 text-center sm:text-left">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-3 mb-2">
                                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 break-words">
                                            {{ $job->title }}</h2>
                                        <span
                                            class="mt-1 sm:mt-0 px-2 py-0.5 bg-green-100 text-green-800 text-xs font-semibold rounded-full w-max mx-auto sm:mx-0">Active</span>
                                    </div>
                                    <p class="text-gray-600 mb-3 text-sm sm:text-base">{{ $job->company_name }}</p>

                                    <div
                                        class="flex flex-wrap items-center justify-center sm:justify-start gap-3 text-xs sm:text-sm text-gray-600">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $job->location }}
                                        </span>

                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Posted {{ $job->created_at->diffForHumans() }}
                                        </span>

                                        @if ($job->salary)
                                            <span class="flex items-center font-semibold text-green-700">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Rp {{ number_format($job->salary, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Right Side --}}
                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-center sm:text-right">
                                <div
                                    class="flex flex-col items-center justify-center px-4 py-3 sm:px-6 sm:py-4 bg-blue-50 rounded-lg border border-blue-200">
                                    <p class="text-2xl sm:text-3xl font-bold text-blue-700 leading-none">
                                        {{ $job->applications->count() }}
                                    </p>
                                    <p class="text-xs text-blue-600 font-medium mt-1">Applicants</p>
                                </div>

                                <button onclick="toggleJobApplications({{ $job->id }})"
                                    class="p-2 sm:p-3 hover:bg-gray-100 rounded-lg transition-colors mx-auto sm:mx-0 mt-2 sm:mt-0">
                                    <svg id="chevron-{{ $job->id }}"
                                        class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600 transform transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Mini Stats --}}
                        @include('layouts.partials.hr.applicants-mini-stats', ['job' => $job])
                    </div>

                    {{-- Collapsible Applications Section --}}
                    <div id="applications-{{ $job->id }}" class="hidden">
                        {{-- keep your existing application loop here --}}
                        @foreach ($job->applications as $application)
                            <div class="application-item border-t border-gray-100 p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center"
                                data-status="{{ $application->status }}">
                                <div class="text-sm text-gray-800">
                                    <strong>{{ $application->first_name }} {{ $application->last_name }}</strong><br>
                                    <span class="text-gray-500">{{ $application->email }}</span>
                                </div>
                                <div class="mt-2 sm:mt-0 flex items-center gap-3">
                                    <span
                                        class="px-2 py-0.5 text-xs rounded-full {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($application->status === 'interview' ? 'bg-purple-100 text-purple-800' : ($application->status === 'accepted' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                    <button onclick="showApplicationModal({{ $application->id }})"
                                        class="text-primary-700 text-sm font-medium hover:underline">
                                        View
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-8">No jobs found.</p>
            @endforelse
        </div>
    </div>

    {{-- Application Detail Modal --}}
    <div id="applicationModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-900">Application Details</h3>
                <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="p-6">
                {{-- Content loaded via JavaScript --}}
            </div>
        </div>
    </div>

    <script>
        // Toggle job applications visibility
        function toggleJobApplications(jobId) {
            const applications = document.getElementById(`applications-${jobId}`);
            const chevron = document.getElementById(`chevron-${jobId}`);

            applications.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        }

        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function() {
            const status = this.value;
            const applications = document.querySelectorAll('.application-item');

            applications.forEach(app => {
                if (status === 'all' || app.dataset.status === status) {
                    app.style.display = 'block';
                } else {
                    app.style.display = 'none';
                }
            });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const applications = document.querySelectorAll('.application-item');

            applications.forEach(app => {
                const text = app.textContent.toLowerCase();
                app.style.display = text.includes(searchTerm) ? 'block' : 'none';
            });
        });

        // Update application status
        function updateStatus(applicationId, newStatus) {
            if (!newStatus) return;

            if (!confirm('Are you sure you want to update this application status?')) {
                return;
            }

            fetch(`/hr/applications/${applicationId}/update-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showNotification('Status updated successfully!', 'success');

                        // Reload page after short delay
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        showNotification('Failed to update status', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('An error occurred while updating status', 'error');
                });
        }

        // Show application modal
        function showApplicationModal(applicationId) {
            const modal = document.getElementById('applicationModal');
            const modalContent = document.getElementById('modalContent');

            // Show loading
            modalContent.innerHTML = `
                <div class="flex items-center justify-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-900"></div>
                </div>
            `;
            modal.classList.remove('hidden');

            // Fetch application details
            fetch(`/hr/applications/${applicationId}/details`)
                .then(response => response.json())
                .then(data => {
                    if (data.html) {
                        modalContent.innerHTML = data.html;
                    } else {
                        // Fallback if no HTML partial
                        const app = data.application;
                        modalContent.innerHTML = `
                            <div class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Candidate Information</h4>
                                        <dl class="space-y-3">
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Full Name</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.first_name} ${app.last_name}</dd>
                                            </div>
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Email</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.email}</dd>
                                            </div>
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Phone</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.phone}</dd>
                                            </div>
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Applied Date</dt>
                                                <dd class="text-sm font-medium text-gray-900">${new Date(app.created_at).toLocaleDateString()}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Position Details</h4>
                                        <dl class="space-y-3">
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Position</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.job.title}</dd>
                                            </div>
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Company</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.job.company_name}</dd>
                                            </div>
                                            <div>
                                                <dt class="text-xs text-gray-500 mb-1">Location</dt>
                                                <dd class="text-sm font-medium text-gray-900">${app.job.location}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                                ${app.cover_letter ? `
                                                                                                                                                <div>
                                                                                                                                                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Cover Letter</h4>
                                                                                                                                                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 max-h-48 overflow-y-auto">
                                                                                                                                                        ${app.cover_letter}
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                ` : ''}

                                <div class="flex gap-3 pt-4 border-t border-gray-200">
                                    <a href="/storage/${app.resume}" target="_blank" 
                                        class="flex-1 px-4 py-2 bg-primary-900 text-white text-sm font-medium rounded-lg hover:bg-primary-800 transition-colors text-center">
                                        Download Resume
                                    </a>
                                    <button onclick="closeModal()" 
                                        class="px-6 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-colors">
                                        Close
                                    </button>
                                </div>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    modalContent.innerHTML = `
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-600 mb-4">Failed to load application details</p>
                            <button onclick="closeModal()" class="px-4 py-2 bg-primary-900 text-white rounded-lg">Close</button>
                        </div>
                    `;
                });
        }

        // Close modal
        function closeModal() {
            document.getElementById('applicationModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('applicationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Notification helper
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transition-all transform ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white font-medium`;
            notification.textContent = message;

            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.style.opacity = '1';
                notification.style.transform = 'translateY(0)';
            }, 10);

            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
@endsection
