document.addEventListener("DOMContentLoaded", () => {
    // 1. Dropdowns Working (10 per page, etc. + Filter Panel Toggle)
    const dropdowns = document.querySelectorAll(".custom-dropdown");
    const filterPanel = document.getElementById("filterPanel");

    dropdowns.forEach((dropdown) => {
        const btn = dropdown.querySelector(".drop-btn");
        if (btn) {
            btn.addEventListener("click", (e) => {
                e.stopPropagation();
                // Close other dropdowns
                dropdowns.forEach((d) => {
                    if (d !== dropdown) {
                        d.classList.remove("show");
                        if (d.id === "filterDropdown" && filterPanel) {
                            filterPanel.classList.remove("show");
                        }
                    }
                });

                // Toggle current
                if (dropdown.id === "filterDropdown") {
                    if (filterPanel) filterPanel.classList.toggle("show");
                } else {
                    dropdown.classList.toggle("show");
                }
            });
        }
    });

    // Close dropdowns when clicking outside
    window.addEventListener("click", (e) => {
        dropdowns.forEach((d) => d.classList.remove("show"));
        if (filterPanel) {
            filterPanel.classList.remove("show");
        }
    });

    // Stop closing when clicking inside filter panel
    if (filterPanel) {
        filterPanel.addEventListener("click", (e) => {
            e.stopPropagation();
        });
    }

    // 2. Tabs Working
    const tabs = document.querySelectorAll(".tab");
    const rows = document.querySelectorAll(".row-item");
    const searchInput = document.querySelector(".search-box input");
    const searchBtn = document.querySelector(".btn-search");

    let currentTabTarget = "all";

    function filterData() {
        const searchTerm = searchInput
            ? searchInput.value.toLowerCase().trim()
            : "";

        rows.forEach((row) => {
            const status = row.getAttribute("data-status");
            const rowText = row.textContent.toLowerCase();

            const matchesTab =
                currentTabTarget === "all" || currentTabTarget === status;
            const matchesSearch = rowText.includes(searchTerm);

            if (matchesTab && matchesSearch) {
                row.classList.remove("hide");
                row.style.animation = "fadeIn 0.3s ease";
            } else {
                row.classList.add("hide");
            }
        });
    }

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");
            currentTabTarget = tab.getAttribute("data-target");
            filterData();
        });
    });

    if (searchBtn) {
        searchBtn.addEventListener("click", (e) => {
            e.preventDefault();
            filterData();
        });
    }

    if (searchInput) {
        searchInput.addEventListener("keyup", (e) => {
            if (e.key === "Enter") filterData();
            else filterData();
        });
    }

    // 3. FILTER APPLY & CLEAR WORKING
    const applyBtn = document.querySelector(".btn-apply");
    const clearBtn = document.querySelector(".btn-clear");

    if (applyBtn) {
        applyBtn.addEventListener("click", () => {
            filterPanel.classList.remove("show");
            // Aap yahan apna custom filter logic laga sakti hain
        });
    }

    if (clearBtn) {
        clearBtn.addEventListener("click", () => {
            document.getElementById("filterYear").value = "";
            document.getElementById("filterDate").value = "";
        });
    }

    // 4. Action Icons Click
    const actionIcons = document.querySelectorAll(".action-icon");
    actionIcons.forEach((icon) => {
        icon.addEventListener("click", function () {
            if (this.classList.contains("fa-xmark")) {
                if (confirm("Are you sure you want to close this period?")) {
                    this.closest("tr").style.display = "none";
                }
            }
        });
    });
});

// CSS Animation for fade in
const style = document.createElement("style");
style.innerHTML = `@keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }`;
document.head.appendChild(style);
