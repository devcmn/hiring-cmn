function toggleJobApplications(jobId) {
    const applications = document.getElementById(`applications-${jobId}`);
    const chevron = document.getElementById(`chevron-${jobId}`);

    applications.classList.toggle("hidden");
    chevron.classList.toggle("rotate-180");
}

// Status filter
document.getElementById("statusFilter").addEventListener("change", function () {
    const status = this.value;
    const applications = document.querySelectorAll(".application-item");

    applications.forEach((app) => {
        if (status === "all" || app.dataset.status === status) {
            app.style.display = "block";
        } else {
            app.style.display = "none";
        }
    });
});

// Search functionality
document.getElementById("searchInput").addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase();
    const applications = document.querySelectorAll(".application-item");

    applications.forEach((app) => {
        const text = app.textContent.toLowerCase();
        app.style.display = text.includes(searchTerm) ? "block" : "none";
    });
});

// Update application status
function updateStatus(applicationId, newStatus) {
    if (!newStatus) return;

    if (!confirm("Are you sure you want to update this application status?")) {
        return;
    }

    fetch(`/hr/applications/${applicationId}/update-status`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({
            status: newStatus,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Show success message
                showNotification("Status updated successfully!", "success");

                // Reload page after short delay
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showNotification("Failed to update status", "error");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            showNotification(
                "An error occurred while updating status",
                "error"
            );
        });
}

function showApplicationModal(applicationId) {
    const modal = document.getElementById("applicationModal");
    const modalContent = document.getElementById("modalContent");

    modalContent.innerHTML = `
        <div class="flex items-center justify-center py-12">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-900"></div>
        </div>
    `;
    modal.classList.remove("hidden");

    fetch(`/hr/applications/${applicationId}/details`)
        .then((response) => response.json())
        .then((data) => {
            const app = data.application;
            const user = app.user || {};
            const job = app.job || {};

            modalContent.innerHTML = `
                <div class="space-y-8">
                    <!-- Candidate Information -->
                    <section>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                            Candidate Information
                        </h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs text-gray-500">Full Name</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    app.first_name
                                } ${app.last_name}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Email</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    app.email
                                }</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Phone</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    app.phone
                                }</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Applied Date</p>
                                <p class="text-sm font-medium text-gray-900">
                                    ${new Date(
                                        app.created_at
                                    ).toLocaleDateString()}
                                </p>
                            </div>
                            <div>
                                 <p class="text-xs text-gray-500">Status</p>
                                ${(() => {
                                    const statusMap = {
                                        pending: {
                                            text: "Pending",
                                            classes:
                                                "bg-yellow-100 text-yellow-800",
                                        },
                                        approved: {
                                            text: "Approved",
                                            classes:
                                                "bg-green-100 text-green-800",
                                        },
                                        rejected: {
                                            text: "Rejected",
                                            classes: "bg-red-100 text-red-800",
                                        },
                                    };
                                    const statusInfo = statusMap[
                                        app.status
                                    ] || {
                                        text: app.status || "-",
                                        classes: "bg-gray-100 text-gray-800",
                                    };
                                    return `<span class="inline-block px-3 py-1 text-xs font-semibold rounded-full ${statusInfo.classes}">
                                                ${statusInfo.text}
                                            </span>`;
                                })()}
                            </div>
                        </div>
                    </section>

                    <!-- Job Details -->
                    <section>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                            Position Details
                        </h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs text-gray-500">Position</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    job.title || "-"
                                }</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Company</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    job.company_name || "-"
                                }</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Location</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    job.location || "-"
                                }</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Type</p>
                                <p class="text-sm font-medium text-gray-900">${
                                    job.job_type || "-"
                                }</p>
                            </div>
                        </div>
                    </section>

                    <!-- Cover Letter -->
                    ${
                        app.cover_letter
                            ? `
                                <section>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                                        Cover Letter
                                    </h4>
                                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 max-h-64 overflow-y-auto">
                                        ${app.cover_letter}
                                    </div>
                                </section>
                            `
                            : ""
                    }

                    <!-- Attachments -->
                    <section>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                        Attachments
                    </h4>
                    <div class="flex flex-wrap gap-3">
                        ${
                            app.cv_path
                                ? (() => {
                                      const parts = app.cv_path.split("/");
                                      // ['private', 'jobs', '5-head-it', 'klepon-lie', 'CV_Klepon_Lie.pdf']
                                      const jobId = parts[2] ?? "";
                                      const folder = parts[3] ?? "";
                                      const filename = parts[4] ?? "";
                                      const url = `/download/cv/${jobId}/${folder}/${filename}`;
                                      return `
                                        <a href="${url}" class="px-4 py-2 bg-primary-900 text-white text-sm font-medium rounded-lg hover:bg-primary-800 transition">
                                            Download CV
                                        </a>
                                    `;
                                  })()
                                : '<p class="text-gray-500 text-sm">No CV uploaded</p>'
                        }
                        ${
                            app.other_path
                                ? (() => {
                                      const parts = app.other_path.split("/");
                                      const jobId = parts[2] ?? "";
                                      const folder = parts[3] ?? "";
                                      const filename = parts[4] ?? "";
                                      const url = `/download/other/${jobId}/${folder}/${filename}`;
                                      return `
                                        <a href="${url}" class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition">
                                            Download Other File
                                        </a>
                                    `;
                                  })()
                                : ""
                        }
                    </div>
                </section>
                    <!-- Close Button -->
                    <div class="flex justify-end pt-4 border-t border-gray-200">
                        <button onclick="closeModal()"
                            class="px-6 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-colors">
                            Close
                        </button>
                    </div>
                </div>
            `;
        })
        .catch((error) => {
            console.error("Error:", error);
            modalContent.innerHTML = `
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-600 mb-4">Failed to load application details</p>
                    <button onclick="closeModal()"
                        class="px-4 py-2 bg-primary-900 text-white rounded-lg">Close</button>
                </div>
            `;
        });
}

function closeModal() {
    document.getElementById("applicationModal").classList.add("hidden");
}

// Click outside to close
document.getElementById("applicationModal").addEventListener("click", (e) => {
    if (e.target === e.currentTarget) closeModal();
});
