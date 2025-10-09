document.addEventListener("DOMContentLoaded", () => {
    const searchJobs = document.getElementById("search-jobs");
    const jobTypeFilter = document.getElementById("job-type-filter");

    const filterJobs = () => {
        const search = searchJobs?.value.toLowerCase().trim() || "";
        const jobType = jobTypeFilter?.value.toLowerCase().trim() || "all";

        const jobCards = document.querySelectorAll(".job-card");

        jobCards.forEach((card) => {
            const title =
                card.querySelector("h3")?.textContent.toLowerCase() || "";
            const company =
                card
                    .querySelector(".company-name")
                    ?.textContent.toLowerCase() || "";
            const type = card.dataset.type?.toLowerCase() || "";

            let show = true;

            // 🔍 Search filter
            if (search && !title.includes(search) && !company.includes(search))
                show = false;

            // 🏷️ Type filter
            if (jobType !== "all" && type !== jobType) show = false;

            card.style.display = show ? "" : "none";
        });
    };

    searchJobs?.addEventListener("input", filterJobs);
    jobTypeFilter?.addEventListener("change", filterJobs);
});
