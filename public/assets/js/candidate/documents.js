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

// File name display - make it globally accessible
window.updateFileName = function (inputId, displayId) {
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
};
