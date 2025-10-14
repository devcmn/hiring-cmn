// Character counter for cover letter
console.log("documents.js loaded");
const coverLetter = document.querySelector('textarea[name="cover_letter"]');
const charCount = document.getElementById("charCount");

if (coverLetter && charCount) {
    // Initialize counter with existing value
    charCount.textContent = coverLetter.value.length;

    coverLetter.addEventListener("input", function (e) {
        charCount.textContent = e.target.value.length;
    });
}

// File name display function
function updateFileName(inputId, displayId) {
    const input = document.getElementById(inputId);
    const fileDisplay = document.getElementById(displayId);
    const file = input.files[0];

    if (file) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
        fileDisplay.innerHTML = `<span class="text-green-600 font-medium">✓ ${file.name}</span> <span class="text-gray-500">(${fileSize} MB)</span>`;
        fileDisplay.classList.remove("hidden");
    } else {
        fileDisplay.textContent = "";
        fileDisplay.classList.add("hidden");
    }
}

const form = document.querySelector("form");
if (form) {
    form.addEventListener("submit", function (e) {
        const resumeInput = document.getElementById("resume");
        if (!resumeInput.files.length) {
            e.preventDefault();
            Swal.fire({
                icon: "warning",
                title: "Resume Required",
                text: "Please upload your resume before submitting.",
                confirmButtonColor: "#166534",
                confirmButtonText: "OK",
            });
        }
    });
}
