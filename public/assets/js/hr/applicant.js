function toggleJobApplications(jobId) {
    const applications = document.getElementById(`applications-${jobId}`);
    const chevron = document.getElementById(`chevron-${jobId}`);

    applications.classList.toggle("hidden");
    chevron.classList.toggle("rotate-180");
}

// Status filter
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchInput");
    const statusFilter = document.getElementById("statusFilter");
    const dateFilter = document.getElementById("dateFilter");

    const filterJobs = () => {
        const search = searchInput?.value.toLowerCase().trim() || "";
        const status = statusFilter?.value.toLowerCase().trim() || "all";
        const date = dateFilter?.value.toLowerCase().trim() || "all";

        // 🔁 Always refresh jobCards in case new ones are injected
        const jobCards = document.querySelectorAll(".job-card");

        jobCards.forEach((card) => {
            const title =
                card.querySelector("h2")?.textContent.toLowerCase() || "";
            const jobStatus =
                card
                    .querySelector("span.rounded-full")
                    ?.textContent.toLowerCase()
                    .trim() || "";
            const applications = card.querySelectorAll(".application-item");

            let jobVisible = false;

            // If no applications, just check the job itself
            if (applications.length === 0) {
                let show = true;
                if (search && !title.includes(search)) show = false;
                if (status !== "all" && jobStatus !== status) show = false;
                card.style.display = show ? "" : "none";
                return;
            }

            // Otherwise, filter each application
            applications.forEach((app) => {
                const appName =
                    app.querySelector("h4")?.textContent.toLowerCase() || "";
                const appStatus = app.dataset.status?.toLowerCase() || "";
                const createdAtText =
                    app
                        .querySelector("span.text-gray-600")
                        ?.textContent.toLowerCase() || "";
                const createdAtISO = app.dataset.created; // optional ISO date

                let show = true;

                // 🔍 Search
                if (
                    search &&
                    !title.includes(search) &&
                    !appName.includes(search)
                ) {
                    show = false;
                }

                // 🟢 Status
                if (
                    status !== "all" &&
                    appStatus !== status &&
                    jobStatus !== status
                ) {
                    show = false;
                }

                // 📅 Date
                if (date !== "all") {
                    let daysAgo = null;

                    if (createdAtISO) {
                        // Prefer ISO timestamp
                        const createdAt = new Date(createdAtISO);
                        const diffMs = new Date() - createdAt;
                        daysAgo = diffMs / (1000 * 60 * 60 * 24);
                    } else if (createdAtText) {
                        // Fallback to relative text like "2 days ago"
                        if (createdAtText.includes("hour")) daysAgo = 0;
                        else if (createdAtText.includes("day")) {
                            const match = createdAtText.match(/(\d+)/);
                            daysAgo = match ? parseInt(match[1]) : 1;
                        } else if (createdAtText.includes("week")) {
                            const match = createdAtText.match(/(\d+)/);
                            daysAgo = match ? parseInt(match[1]) * 7 : 7;
                        } else if (createdAtText.includes("month")) {
                            const match = createdAtText.match(/(\d+)/);
                            daysAgo = match ? parseInt(match[1]) * 30 : 30;
                        }
                    }

                    if (daysAgo !== null) {
                        if (date === "today" && daysAgo > 1) show = false;
                        else if (date === "week" && daysAgo > 7) show = false;
                        else if (date === "month" && daysAgo > 30) show = false;
                    }
                }

                app.style.display = show ? "" : "none";
                if (show) jobVisible = true;
            });

            // Hide entire job if none of its applications are visible
            card.style.display = jobVisible ? "" : "none";
        });
    };

    // Real-time event listeners
    searchInput?.addEventListener("input", filterJobs);
    statusFilter?.addEventListener("change", filterJobs);
    dateFilter?.addEventListener("change", filterJobs);
});

// Update application status
function updateStatus(applicationId, newStatus) {
    if (!newStatus) return;

    Swal.fire({
        title: "Are you sure?",
        text: `Set this applicant status to "${newStatus}"?`,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#166534",
        cancelButtonColor: "#a1a1aa",
        confirmButtonText: "Yes, update it!",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/applications/${applicationId}/status`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    status: newStatus,
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Updated!",
                            text: `Status changed to "${newStatus}".`,
                            timer: 1500,
                            showConfirmButton: false,
                        }).then(() => location.reload());
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Failed!",
                            text: "Failed to update status.",
                        });
                    }
                })
                .catch((err) => {
                    console.error(err);
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Something went wrong.",
                    });
                });
        }
    });
}

function showApplicationModal(applicationId) {
    const modal = document.getElementById("applicationModal");
    const modalContent = document.getElementById("modalContent");

    function capitalCase(str) {
        if (!str) return "";
        return str
            .toLowerCase()
            .split(" ")
            .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
            .join(" ");
    }

    function parseData(data) {
        try {
            const parsed = typeof data === "string" ? JSON.parse(data) : data;
            if (Array.isArray(parsed)) return parsed;
            if (typeof parsed === "object" && parsed !== null)
                return Object.values(parsed);
            return [];
        } catch {
            return [];
        }
    }

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
<div class="space-y-6 max-h-[80vh] overflow-y-auto">
    <!-- Candidate Information -->
    <section>
        <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
            Personal Information
        </h4>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-500">Full Name</p>
                <p class="text-sm font-medium text-gray-900">${capitalCase(
                    app.first_name
                )} ${capitalCase(app.last_name)}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Gender</p>
                <p class="text-sm font-medium text-gray-900">${capitalCase(
                    app.gender
                )}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Email</p>
                <p class="text-sm font-medium text-gray-900">${
                    app.home_phone ?? "-"
                }</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Date of Birth</p>
                <p class="text-sm font-medium text-gray-900"> ${new Date(
                    app.created_at
                ).toLocaleDateString()} (${capitalCase(app.birth_place)})</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Religion</p>
                <p class="text-sm font-medium text-gray-900">${capitalCase(
                    app.religion
                )}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Blood Type</p>
                <p class="text-sm font-medium text-gray-900">${
                    app.blood_type ?? "-"
                }</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Marital Status</p>
                <p class="text-sm font-medium text-gray-900">${capitalCase(
                    app.marital_status
                )}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">National ID (KTP)</p>
                <p class="text-sm font-medium text-gray-900">${
                    app.national_id
                }</p>
            </div>
        </div>
    </section>

    <!-- Address Information -->
    <section>
        <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
            Address Information
        </h4>
        <div class="space-y-4">
            <div>
                <p class="text-xs text-gray-500">Domicile Address (KTP)</p>
                <p class="text-sm font-medium text-gray-900">${
                    app.domicile_address
                }</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Current Address</p>
                <p class="text-sm font-medium text-gray-900">${
                    app.current_address
                }</p>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-gray-500">Housing Type</p>
                    <p class="text-sm font-medium text-gray-900">${capitalCase(
                        app.housing_type
                    )}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Vehicle</p>
                    <p class="text-sm font-medium text-gray-900">${capitalCase(
                        app.vehicle_type
                    )} ${
                app.vehicle_owner
                    ? `(${capitalCase(app.vehicle_owner)}, ${
                          app.vehicle_year ?? "-"
                      })`
                    : ""
            }</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Family Information -->
    ${
        app.family_members && parseData(app.family_members).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Family Members
                </h4>
                <div class="overflow-x-auto bg-gray-50 rounded-lg">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700 font-semibold">Relation</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-semibold">Name</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-semibold">Age</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-semibold">Occupation</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-semibold">Phone</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            ${parseData(app.family_members)
                                .map(
                                    (m) => `
                                <tr>
                                    <td class="px-4 py-2 text-gray-900">${capitalCase(
                                        m.relation
                                    )}</td>
                                    <td class="px-4 py-2 text-gray-900">${
                                        m.name
                                    }</td>
                                    <td class="px-4 py-2 text-gray-900">${
                                        m.age ?? "-"
                                    }</td>
                                    <td class="px-4 py-2 text-gray-900">${
                                        m.occupation ?? "-"
                                    }</td>
                                    <td class="px-4 py-2 text-gray-900">${
                                        m.phone ?? "-"
                                    }</td>
                                </tr>
                            `
                                )
                                .join("")}
                        </tbody>
                    </table>
                </div>
            </section>
            `
            : ""
    }

    <!-- Spouse & Children -->
    ${
        app.spouse_children && parseData(app.spouse_children).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Spouse & Children
                </h4>
                <div class="space-y-3">
                    ${parseData(app.spouse_children)
                        .map(
                            (sc) => `
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs font-semibold text-primary-900 bg-primary-100 px-2 py-1 rounded">${capitalCase(
                                    sc.relation
                                )}</span>
                            </div>
                            <p class="font-medium text-gray-900">${sc.name}</p>
                            ${
                                sc.birth_date
                                    ? `<p class="text-xs text-gray-600 mt-1">Born: ${formatDate(
                                          sc.birth_date
                                      )}</p>`
                                    : ""
                            }
                            ${
                                sc.occupation
                                    ? `<p class="text-xs text-gray-600">Occupation: ${sc.occupation}</p>`
                                    : ""
                            }
                            ${
                                sc.education
                                    ? `<p class="text-xs text-gray-600">Education: ${sc.education}</p>`
                                    : ""
                            }
                        </div>
                    `
                        )
                        .join("")}
                </div>
            </section>
            `
            : ""
    }

    <!-- Education -->
    ${
        app.education && parseData(app.education).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Education
                </h4>
                <div class="space-y-3">
                    ${parseData(app.education)
                        .map(
                            (e) => `
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="font-medium text-gray-900">${e.name}</p>
                            ${
                                e.major_or_topic
                                    ? `<p class="text-sm text-gray-600 mt-1">${e.major_or_topic}</p>`
                                    : ""
                            }
                            <p class="text-xs text-gray-500 mt-2">${
                                e.start_year ?? "-"
                            } - ${e.end_year ? e.end_year : "Present"} ${
                                e.note ? `• GPA: ${e.note}` : ""
                            }</p>
                        </div>
                    `
                        )
                        .join("")}
                </div>
            </section>
            `
            : ""
    }

    <!-- Seminars -->
    ${
        app.seminars && parseData(app.seminars).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Seminars & Training
                </h4>
                <ul class="space-y-2">
                    ${parseData(app.seminars)
                        .map(
                            (s) => `
                        <li class="text-sm text-gray-700">
                            <span class="font-medium">${s.name}</span> ${
                                s.major_or_topic ? `(${s.major_or_topic})` : ""
                            } — ${s.start_year ?? "-"} ${
                                s.note ? `• ${s.note}` : ""
                            }
                        </li>
                    `
                        )
                        .join("")}
                </ul>
            </section>
            `
            : ""
    }

    <!-- Organizations -->
    ${
        app.organizations && parseData(app.organizations).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Organizations
                </h4>
                <div class="space-y-3">
                    ${parseData(app.organizations)
                        .map(
                            (o) => `
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-medium text-gray-900">${
                                        o.name
                                    }</p>
                                    ${
                                        o.position
                                            ? `<p class="text-sm text-gray-600 mt-1">Position: ${o.position}</p>`
                                            : ""
                                    }
                                </div>
                                ${
                                    o.note
                                        ? `<span class="text-xs font-semibold ${
                                              o.note === "Active"
                                                  ? "bg-green-100 text-green-800"
                                                  : "bg-gray-100 text-gray-800"
                                          } px-2 py-1 rounded">${o.note}</span>`
                                        : ""
                                }
                            </div>
                            <p class="text-xs text-gray-500 mt-2">${
                                o.start_year ?? "-"
                            } - ${o.end_year ?? "-"}</p>
                        </div>
                    `
                        )
                        .join("")}
                </div>
            </section>
            `
            : ""
    }

    <!-- Work Experience -->
    ${
        app.work_experience && parseData(app.work_experience).length > 0
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Work Experience
                </h4>
                <div class="space-y-3">
                    ${parseData(app.work_experience)
                        .map(
                            (w) => `
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="font-medium text-gray-900">${
                                w.company_name
                            }</p>
                            <p class="text-sm text-primary-900 font-semibold mt-1">${
                                w.position
                            }</p>
                            <p class="text-xs text-gray-600 mt-2">${
                                w.start_date ?? "-"
                            } → ${
                                w.end_date ? w.end_date : "Currently working"
                            }</p>
                            <p class="text-xs text-gray-600 mt-1">Salary: ${
                                w.last_salary ?? "-"
                            }</p>
                            ${
                                w.responsibilities
                                    ? `<p class="text-xs text-gray-700 mt-2"><strong>Responsibilities:</strong> ${w.responsibilities}</p>`
                                    : ""
                            }
                            ${
                                w.resign_reason
                                    ? `<p class="text-xs text-gray-700 mt-1"><strong>Resign Reason:</strong> ${w.resign_reason}</p>`
                                    : ""
                            }
                        </div>
                    `
                        )
                        .join("")}
                </div>
            </section>
            `
            : ""
    }

    <!-- Cover Letter -->
    ${
        app.cover_letter
            ? `
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-4 border-b border-gray-200 pb-2">
                    Cover Letter
                </h4>
                <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 max-h-64 overflow-y-auto border border-gray-200 whitespace-pre-wrap">
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
            app.photo_path
                ? (() => {
                      const parts = app.photo_path.split("/");
                      // ['private', 'jobs', '5-head-it', 'klepon-lie', 'Photo_Klepon_Lie.jpg']
                      const jobId = parts[2] ?? "";
                      const folder = parts[3] ?? "";
                      const filename = parts[4] ?? "";
                      const url = `/download/photo/${jobId}/${folder}/${filename}`;
                      return `
                        <a href="${url}" target="_blank"
                            class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            View Photo
                        </a>
                    `;
                  })()
                : ""
        }
        ${
            app.cv_path
                ? (() => {
                      const parts = app.cv_path.split("/");
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
        <button onclick="closeModal()" class="px-6 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-colors">
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
