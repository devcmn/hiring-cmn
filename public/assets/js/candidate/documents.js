console.log("documents.js loaded");

// Cover letter character counter
const coverLetter = document.querySelector('textarea[name="cover_letter"]');
const charCount = document.getElementById("charCount");
if (coverLetter && charCount) {
    charCount.textContent = coverLetter.value.length;
    coverLetter.addEventListener(
        "input",
        (e) => (charCount.textContent = e.target.value.length)
    );
}

// File name display
function updateFileName(inputId, displayId) {
    const input = document.getElementById(inputId);
    const fileDisplay = document.getElementById(displayId);
    const file = input.files[0];

    if (file) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        fileDisplay.innerHTML = `<span class="text-green-600 font-medium">✓ ${file.name}</span> <span class="text-gray-500">(${fileSize} MB)</span>`;
        fileDisplay.classList.remove("hidden");
    } else {
        fileDisplay.textContent = "";
        fileDisplay.classList.add("hidden");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form"); // adjust selector
    const resumeInput = document.getElementById("resume");

    if (!form || !resumeInput) return;

    // Remove native 'required' if present
    resumeInput.removeAttribute("required");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // always stop default submission

        // 1. Check if a file is uploaded
        if (!resumeInput.files || resumeInput.files.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "Resume Required",
                text: "Please upload your resume before submitting.",
                confirmButtonColor: "#166534",
                confirmButtonText: "OK",
            });
            return;
        }

        // 2. Optional: check file size (2MB max)
        const file = resumeInput.files[0];
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: "error",
                title: "File Too Large",
                text: "Resume must be less than 2MB.",
                confirmButtonColor: "#166534",
                confirmButtonText: "OK",
            });
            return;
        }

        // 3. All checks passed → submit manually
        form.submit();
    });
});
