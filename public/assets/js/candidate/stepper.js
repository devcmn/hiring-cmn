document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 1;
    const totalSteps = 6; // total number of form steps

    function showStep(step) {
        document.querySelectorAll(".form-step").forEach((el) => {
            el.classList.add("hidden");
            el.classList.remove("active");
        });

        const currentStepEl = document.querySelector(
            `.form-step[data-step="${step}"]`
        );
        if (!currentStepEl) return;
        currentStepEl.classList.remove("hidden");
        currentStepEl.classList.add("active");

        document.querySelectorAll("[data-step]").forEach((el) => {
            const stepNum = parseInt(el.getAttribute("data-step"));
            const indicator = el.querySelector(".step-indicator");
            const text = el.querySelector("span");

            if (!indicator) return;

            if (stepNum < step) {
                indicator.classList.add("bg-green-500", "text-white");
                indicator.classList.remove(
                    "bg-gray-200",
                    "text-gray-500",
                    "bg-primary-900"
                );
                text?.classList.add("text-green-700", "font-medium");
                text?.classList.remove("text-gray-500");
            } else if (stepNum === step) {
                indicator.classList.add("bg-primary-900", "text-white");
                indicator.classList.remove(
                    "bg-gray-200",
                    "text-gray-500",
                    "bg-green-500"
                );
                text?.classList.add("text-gray-900", "font-medium");
                text?.classList.remove("text-gray-500", "text-green-700");
            } else {
                indicator.classList.add("bg-gray-200", "text-gray-500");
                indicator.classList.remove(
                    "bg-primary-900",
                    "text-white",
                    "bg-green-500"
                );
                text?.classList.add("text-gray-500");
                text?.classList.remove(
                    "text-gray-900",
                    "font-medium",
                    "text-green-700"
                );
            }
        });

        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");

        prevBtn?.classList.toggle("hidden", step === 1);
        nextBtn?.classList.toggle("hidden", step === totalSteps);
        submitBtn?.classList.toggle("hidden", step !== totalSteps);

        window.scrollTo({ top: 0, behavior: "smooth" });
    }

    function validateStep(step) {
        const currentStepEl = document.querySelector(
            `.form-step[data-step="${step}"]`
        );
        const requiredFields = currentStepEl.querySelectorAll("[required]");
        let valid = true;

        // ✅ Check for photo if it's step 1
        if (step === 1) {
            const photoInput = document.getElementById("photo");
            if (!photoInput || !photoInput.files.length) {
                Swal.fire({
                    icon: "warning",
                    title: "Photo Required",
                    text: "Please upload your 3x4 photo before continuing.",
                    confirmButtonColor: "#166534",
                    confirmButtonText: "OK",
                });
                valid = false;
                return valid;
            }

            // File size check (1MB)
            const file = photoInput.files[0];
            if (file.size > 1 * 1024 * 1024) {
                Swal.fire({
                    icon: "error",
                    title: "File Too Large",
                    text: "Photo must be less than 1MB.",
                    confirmButtonColor: "#166534",
                    confirmButtonText: "OK",
                });
                valid = false;
                return valid;
            }
        }

        requiredFields.forEach((field) => {
            let isEmpty = false;

            // Radio group handling
            if (field.type === "radio") {
                const radioName = field.name;
                const checkedRadio = currentStepEl.querySelector(
                    `input[name="${radioName}"]:checked`
                );
                isEmpty = !checkedRadio;

                const firstRadio = currentStepEl.querySelector(
                    `input[name="${radioName}"]`
                );
                if (field !== firstRadio) return;

                const radioContainer = field.closest(".bg-gray-50");
                if (isEmpty) {
                    radioContainer?.classList.add("ring-2", "ring-red-500");
                    valid = false;
                } else {
                    radioContainer?.classList.remove("ring-2", "ring-red-500");
                }
            } else {
                // Regular input/textarea
                isEmpty = !field.value.trim();
                const choicesContainer = field.closest(".choices");

                if (isEmpty) {
                    if (choicesContainer) {
                        choicesContainer
                            .querySelector(".choices__inner")
                            ?.classList.add("border", "border-red-500");
                    } else {
                        field.classList.add("border", "border-red-500");
                    }
                    valid = false;
                } else {
                    if (choicesContainer) {
                        choicesContainer
                            .querySelector(".choices__inner")
                            ?.classList.remove("border-red-500");
                    } else {
                        field.classList.remove("border-red-500");
                    }
                }
            }
        });

        if (!valid) {
            Swal.fire({
                icon: "warning",
                title: "Incomplete Form",
                text: "Please fill out all required fields before continuing.",
                confirmButtonColor: "#166534",
                confirmButtonText: "OK",
            });
        }

        return valid;
    }

    document.getElementById("nextBtn")?.addEventListener("click", (e) => {
        e.preventDefault();
        if (currentStep < totalSteps && validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    document.getElementById("prevBtn")?.addEventListener("click", (e) => {
        e.preventDefault();
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    const form = document.getElementById("applicationForm");
    const submitBtn = document.getElementById("submitBtn");

    submitBtn?.addEventListener("click", (e) => {
        e.preventDefault();
        if (!validateStep(currentStep)) return;

        // Resume check
        // const resumeInput = document.getElementById("resume");
        // if (resumeInput && (!resumeInput.files || !resumeInput.files.length)) {
        //     Swal.fire({
        //         icon: "warning",
        //         title: "Resume Required",
        //         text: "Please upload your resume before submitting.",
        //         confirmButtonColor: "#166534",
        //         confirmButtonText: "OK",
        //     });
        //     return;
        // }

        // if (resumeInput && resumeInput.files[0]?.size > 1 * 1024 * 1024) {
        //     Swal.fire({
        //         icon: "error",
        //         title: "File Too Large",
        //         text: "Resume must be less than 1MB.",
        //         confirmButtonColor: "#166534",
        //         confirmButtonText: "OK",
        //     });
        //     return;
        // }

        form?.requestSubmit();
    });

    // Photo preview
    window.updatePhotoPreview = function () {
        const photoInput = document.getElementById("photo");
        const photoName = document.getElementById("photoName");

        if (photoInput.files && photoInput.files.length > 0) {
            photoName.textContent = photoInput.files[0].name;
            photoName.classList.remove("hidden");
        } else {
            photoName.textContent = "";
            photoName.classList.add("hidden");
        }
    };

    showStep(currentStep);
});

// ✅ toggleExplanation() stays globally accessible
function toggleExplanation(questionId, show) {
    const explanationDiv = document.getElementById(questionId + "_explanation");
    if (!explanationDiv) return;
    const explanationTextarea = explanationDiv.querySelector("textarea");
    if (!explanationTextarea) return;

    if (show) {
        explanationDiv.classList.remove("hidden");
        explanationTextarea.setAttribute("required", "required");
    } else {
        explanationDiv.classList.add("hidden");
        explanationTextarea.removeAttribute("required");
        explanationTextarea.value = "";
    }
}
