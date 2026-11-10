document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 1. CACHE DOM ELEMENTS
    // ==========================================
    const filterToggle = document.getElementById('exFilterToggle');
    const filterPanel = document.getElementById('exFilterPanel');
    const tabButtons = document.querySelectorAll('.ex-tab-btn');
    const tableRows = document.querySelectorAll('.ex-table tbody tr');
    const searchInput = document.querySelector('.ex-search-input');
    const resultsInfo = document.querySelector('.ex-results-info');
    const applyFiltersBtn = document.getElementById('applyFiltersBtn');
    const clearFiltersBtn = document.getElementById('clearFiltersBtn');
    
    // Custom Dropdown
    const perPageDropdown = document.getElementById('perPageDropdown');
    const perPageToggle = document.getElementById('perPageToggle');
    const perPageMenu = document.getElementById('perPageMenu');
    const perPageLabel = document.getElementById('perPageLabel');

    // ==========================================
    // 2. TOGGLE FILTER PANEL
    // ==========================================
    if (filterToggle && filterPanel) {
        filterToggle.addEventListener('click', function() {
            filterPanel.classList.toggle('show');
        });
    }

    // ==========================================
    // 3. STATUS TABS (All, Draft, Approved, Posted)
    // ==========================================
    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Toggle active class
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');
            let visibleCount = 0;

            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                
                if (filterValue === 'all' || rowStatus === filterValue) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} results`;
        });
    });

    // ==========================================
    // 4. SEARCH FUNCTIONALITY
    // ==========================================
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if (rowText.includes(query)) { 
                    row.style.display = ''; 
                    visibleCount++; 
                } else { 
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = visibleCount === 0 ? `No results found` : `Showing ${visibleCount} results`;
        });
    }

    // ==========================================
    // 5. CUSTOM PER PAGE DROPDOWN
    // ==========================================
    if (perPageToggle && perPageMenu) {
        perPageToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            perPageDropdown.classList.toggle('open');
        });

        document.querySelectorAll('.ex-custom-dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                perPageMenu.querySelectorAll('.ex-custom-dropdown-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                perPageLabel.textContent = this.textContent;
                perPageDropdown.classList.remove('open');
            });
        });

        document.addEventListener('click', function(e) {
            if (!perPageDropdown.contains(e.target)) {
                perPageDropdown.classList.remove('open');
            }
        });
    }

    // ==========================================
    // 6. APPLY & CLEAR FILTERS
    // ==========================================
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            const categoryVal = document.getElementById('filterCategory').value.toLowerCase();
            const bankVal = document.getElementById('filterBank').value.toLowerCase();
            
            let visibleCount = 0;
            tableRows.forEach(row => {
                const catText = row.querySelector('.col-category')?.innerText.toLowerCase() || '';
                const bankText = row.querySelector('.ex-bank-info')?.innerText.toLowerCase() || '';
                
                if (catText.includes(categoryVal) && bankText.includes(bankVal)) {
                    row.style.display = ''; 
                    visibleCount++;
                } else {
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} filtered results`;
            filterPanel.classList.remove('show'); 
        });
    }

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            document.getElementById('filterCategory').value = '';
            document.getElementById('filterBank').value = '';
            
            // Reset tabs to "All"
            tabButtons.forEach(btn => btn.classList.remove('active'));
            document.querySelector('.ex-tab-btn[data-filter="all"]').classList.add('active');

            tableRows.forEach(row => row.style.display = '');
            if (searchInput) searchInput.value = '';
            if (resultsInfo) resultsInfo.textContent = `Showing 1 to 10 of 13 results`;
        });
    }
     // ==========================================
    // 6.5 TOP HORIZONTAL CALENDAR LOGIC
    // ==========================================
    const monthBoxes = document.querySelectorAll('.ex-month-box');
    const topCalPrev = document.querySelectorAll('.ex-cal-nav')[0]; 
    const topCalNext = document.querySelectorAll('.ex-cal-nav')[1]; 
    const topCalTitle = document.querySelector('.ex-cal-title');
    
    let currentTopYear = 2026; 
    let currentTopMonth = 11; // Default to November

    // Function to highlight the active month visually
    function updateActiveMonthUI() {
        monthBoxes.forEach(box => {
            const dateSpan = box.querySelector('.ex-m-date');
            if (dateSpan) {
                const boxMonth = parseInt(dateSpan.textContent.trim());
                if (boxMonth === currentTopMonth) {
                    box.classList.add('active');
                } else {
                    box.classList.remove('active');
                }
            }
        });
    }

    // Function to filter the table rows
    function filterByTopCalendar() {
        let visibleCount = 0;
        
        tableRows.forEach(row => {
            const dateCell = row.querySelector('td:nth-child(2)');
            if (!dateCell) return;

            const dateMatch = dateCell.innerText.match(/\d{4}-\d{2}-\d{2}/);
            
            if (dateMatch) {
                const rowDateStr = dateMatch[0];
                const rowDate = new Date(rowDateStr);
                const rowYear = rowDate.getFullYear();
                const rowMonth = rowDate.getMonth() + 1;

                if (rowYear === currentTopYear && rowMonth === currentTopMonth) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            }
        });

        if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} results for ${topCalTitle.textContent}`;
    }

    // Make boxes clickable
    monthBoxes.forEach(box => {
        box.addEventListener('click', function(e) {
            e.preventDefault();
            
            const dateSpan = this.querySelector('.ex-m-date');
            if (!dateSpan) return;

            // Get the new month number
            currentTopMonth = parseInt(dateSpan.textContent.trim());
            
            // Update the title (e.g., "Nov 2026")
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            if (topCalTitle) topCalTitle.textContent = `${monthNames[currentTopMonth - 1]} ${currentTopYear}`;
            
            // 1. Highlight the clicked month
            updateActiveMonthUI();
            
            // 2. Filter the data
            filterByTopCalendar();
        });
    });

    // Arrow Logic
    if (topCalPrev) {
        topCalPrev.addEventListener('click', function() {
            currentTopYear--;
            if (topCalTitle) topCalTitle.textContent = `Nov ${currentTopYear}`; 
            filterByTopCalendar();
        });
    }

    if (topCalNext) {
        topCalNext.addEventListener('click', function() {
            currentTopYear++;
            if (topCalTitle) topCalTitle.textContent = `Nov ${currentTopYear}`;
            filterByTopCalendar();
        });
    }

    // Initial highlight on page load
    updateActiveMonthUI();
    
    // ==========================================
    // 7. 3-DOT ACTION MENU (Dynamic Injection)
    // ==========================================
    const menuTemplate = document.getElementById('action-menu-template');

    // Inject into every button
    document.querySelectorAll('.action-menu-btn').forEach(btn => {
        if (menuTemplate) {
            const clone = menuTemplate.content.cloneNode(true);
            btn.parentNode.insertBefore(clone, btn.nextSibling);
        }
    });

    // Toggle logic
    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        
        if (menuBtn) {
            e.stopPropagation();
            const dropdown = menuBtn.nextElementSibling;
            
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });

            if (dropdown && dropdown.classList.contains('action-dropdown')) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        } else {
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});