function showJobDetails(jobId) {
    const modal = document.getElementById("jobModal");
    const modalContent = document.getElementById("jobModalContent");

    modalContent.innerHTML = `
        <div class="flex items-center justify-center py-12">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary-900"></div>
        </div>
    `;
    modal.classList.remove("hidden");

    fetch(`/hr/jobs/${jobId}/details`)
        .then((res) => res.json())
        .then((data) => {
            const job = data.job;

            modalContent.innerHTML = `
                <div class="space-y-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">${
                                job.title
                            }</h3>
                            <p class="text-gray-600">${job.company_name}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full ${
                            job.status === "Active"
                                ? "bg-green-100 text-green-700"
                                : "bg-red-100 text-red-700"
                        }">
                            ${job.status}
                        </span>
                    </div>

                    <div class="text-gray-700 text-sm leading-relaxed">
                        ${
                            job.description ||
                            "<em>No description provided.</em>"
                        }
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500">Location</p>
                            <p class="font-medium">${job.location}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Job Type</p>
                            <p class="font-medium">${job.job_type}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Applicants</p>
                            <p class="font-medium">${
                                job.applications_count || 0
                            }</p>
                        </div>
                        ${
                            job.application_deadline
                                ? `
                            <div>
                                <p class="text-xs text-gray-500">Deadline</p>
                                <p class="font-medium">${new Date(
                                    job.application_deadline
                                ).toLocaleDateString()}</p>
                            </div>
                        `
                                : ""
                        }
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-200 space-x-3">
                        ${
                            job.status === "Active"
                                ? `
                            <button onclick="closeJob(${job.id})" 
                                class="px-6 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                Close Job
                            </button>
                        `
                                : ""
                        }
                        <button onclick="closeJobModal()" 
                            class="px-6 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-colors">
                            Close
                        </button>
                    </div>
                </div>
            `;
        })
        .catch(() => {
            modalContent.innerHTML = `
                <div class="text-center py-12">
                    <p class="text-gray-600">Failed to load job details.</p>
                    <button onclick="closeJobModal()" class="mt-4 px-4 py-2 bg-primary-900 text-white rounded-lg">Close</button>
                </div>
            `;
        });
}

function closeJob(jobId) {
    Swal.fire({
        title: "Are you sure?",
        text: "This job will be closed and no longer available for applicants.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc2626",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Yes, close it",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/hr/jobs/${jobId}/close`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Job Closed!",
                            text: "The job has been successfully closed.",
                            confirmButtonColor: "#166534",
                        }).then(() => {
                            closeJobModal();
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message || "Failed to close job.",
                            confirmButtonColor: "#dc2626",
                        });
                    }
                })
                .catch(() => {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong.",
                        confirmButtonColor: "#dc2626",
                    });
                });
        }
    });
}

function closeJobModal() {
    document.getElementById("jobModal").classList.add("hidden");
}
