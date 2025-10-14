document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 1;
    const totalSteps = 5;

    function showStep(step) {
        document.querySelectorAll(".form-step").forEach((el) => {
            el.classList.add("hidden");
            el.classList.remove("active");
        });

        const currentStepEl = document.querySelector(
            `.form-step[data-step="${step}"]`
        );
        if (!currentStepEl) return; // prevent error if step not found
        currentStepEl.classList.remove("hidden");
        currentStepEl.classList.add("active");

        document.querySelectorAll("[data-step]").forEach((el) => {
            const stepNum = parseInt(el.getAttribute("data-step"));
            const indicator = el.querySelector(".step-indicator");
            const text = el.querySelector("span");

            if (!indicator) return; // ← prevent null crash

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

        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }

    function validateStep(step) {
        const currentStepEl = document.querySelector(
            `.form-step[data-step="${step}"]`
        );
        const requiredFields = currentStepEl.querySelectorAll("[required]");
        let valid = true;

        requiredFields.forEach((field) => {
            if (!field.value.trim()) {
                field.classList.add("border-red-500");
                valid = false;
            } else {
                field.classList.remove("border-red-500");
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

    // ✅ Buttons will now exist
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

    // Initialize
    showStep(currentStep);
});
