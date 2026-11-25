/* public/js/Purchase/invoice.js */

document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 1. CACHE ALL DOM ELEMENTS
    // ==========================================
    const filterToggle = document.getElementById('piFilterToggle');
    const filterPanel = document.getElementById('piFilterPanel');
    const viewButtons = document.querySelectorAll('.pi-view-btn');
    const tableWrapper = document.querySelector('.pi-table-wrapper');
    const searchInput = document.querySelector('.pi-search-input');
    const tableRows = document.querySelectorAll('.pi-table tbody tr');
    const resultsInfo = document.querySelector('.pi-results-info');
    const dropdowns = document.querySelectorAll('.pi-custom-dropdown');
    const applyFiltersBtn = document.getElementById('applyFiltersBtn');
    const clearFiltersBtn = document.getElementById('clearFiltersBtn');
    
    // Date Picker Elements
    const dateMock = document.getElementById('dateRangeDisplay');
    const calDropdown = document.getElementById('calendarDropdown');
    const dateText = document.getElementById('dateRangeText');
    const calGrid = document.getElementById('calDaysGrid');
    const calMonthLabel = document.getElementById('calMonthLabel');
    const calPrev = document.getElementById('calPrev');
    const calNext = document.getElementById('calNext');
    const clearCalBtn = document.getElementById('clearCalBtn');
    const applyCalBtn = document.getElementById('applyCalBtn');
    const calFromText = document.getElementById('calFromText');
    const calToText = document.getElementById('calToText');

    // State for Calendar
    let currentCalDate = new Date();
    let startRangeDate = null; // Stores a full Date object
    let endRangeDate = null;   // Stores a full Date object

    // ==========================================
    // 2. TOGGLE FILTER PANEL
    // ==========================================
    if (filterToggle && filterPanel) {
        filterToggle.addEventListener('click', function() {
            filterPanel.classList.toggle('open');
        });
    }

    // ==========================================
    // 3. VIEW TOGGLE (List / Grid)
    // ==========================================
    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            if (this.title === 'Grid View') {
                tableWrapper.classList.add('grid-view');
            } else {
                tableWrapper.classList.remove('grid-view');
            }
        });
    });

    // ==========================================
    // 4. 3-DOT ACTION MENU
    // ==========================================
    const dropdownHTML = `
        <div class="action-dropdown">
            <button class="action-dropdown-item text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Download</button>
            <button class="action-dropdown-item text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> View</button>
            <button class="action-dropdown-item text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</button>
            <button class="action-dropdown-item text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete</button>
        </div>
    `;
    
    document.querySelectorAll('.action-menu-btn').forEach(btn => {
        btn.insertAdjacentHTML('afterend', dropdownHTML);
    });

    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        if (menuBtn) {
            const dropdown = menuBtn.nextElementSibling;
            document.querySelectorAll('.action-dropdown.show').forEach(menu => {
                if (menu !== dropdown) menu.classList.remove('show');
            });
            dropdown.classList.toggle('show');
            e.stopPropagation(); 
        } else {
            document.querySelectorAll('.action-dropdown.show').forEach(menu => menu.classList.remove('show'));
        }
    });

    // ==========================================
    // 5. SEARCH
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
    // 6. CUSTOM DROPDOWNS
    // ==========================================
    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.pi-custom-dropdown-btn');
        const items = dropdown.querySelectorAll('.pi-custom-dropdown-item');
        const label = dropdown.querySelector('.dropdown-label');

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.pi-custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.toggle('open');
        });

        items.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                items.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                if (label) label.textContent = item.textContent;
                dropdown.classList.remove('open');
            });
        });
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.pi-custom-dropdown')) {
            document.querySelectorAll('.pi-custom-dropdown').forEach(d => d.classList.remove('open'));
        }
    });

    // ==========================================
    // 7. APPLY & CLEAR FILTERS
    // ==========================================
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            const vendor = document.querySelector('[data-filter="vendor"] .pi-custom-dropdown-item.active')?.dataset.value.toLowerCase() || '';
            const status = document.querySelector('[data-filter="status"] .pi-custom-dropdown-item.active')?.dataset.value.toLowerCase() || '';
            
            let visibleCount = 0;
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if ((vendor === "" || rowText.includes(vendor)) && (status === "" || rowText.includes(status))) {
                    row.style.display = ''; visibleCount++;
                } else {
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} filtered results`;
        });
    }

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            dropdowns.forEach(dropdown => {
                const items = dropdown.querySelectorAll('.pi-custom-dropdown-item');
                const label = dropdown.querySelector('.dropdown-label');
                if (items.length > 0) {
                    items.forEach(i => i.classList.remove('active'));
                    items[0].classList.add('active');
                    if (label) label.textContent = items[0].textContent;
                }
            });

            if (dateText) dateText.textContent = 'Select date range';
            startRangeDate = null;
            endRangeDate = null;
            if (calFromText) calFromText.textContent = '--';
            if (calToText) calToText.textContent = '--';

            tableRows.forEach(row => row.style.display = '');
            if (searchInput) searchInput.value = '';
            if (resultsInfo) resultsInfo.textContent = `Showing ${tableRows.length} results`;
        });
    }

    // ==========================================
    // 8. CALENDAR LOGIC (Cross-Month Range)
    // ==========================================
    function renderCalendar() {
        const year = currentCalDate.getFullYear();
        const month = currentCalDate.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        if (calMonthLabel) calMonthLabel.textContent = `${monthNames[month]} ${year}`;
        if (!calGrid) return;
        calGrid.innerHTML = '';
        
        const today = new Date();
        const isCurrentMonth = today.getMonth() === month && today.getFullYear() === year;
        const todayDate = today.getDate();

        // Add empty slots
        for (let i = 0; i < firstDay; i++) {
            const emptySpan = document.createElement('span');
            emptySpan.className = 'pi-cal-empty';
            calGrid.appendChild(emptySpan);
        }
        
        // Add days
        for (let i = 1; i <= daysInMonth; i++) {
            const daySpan = document.createElement('span');
            daySpan.textContent = i;
            daySpan.className = 'pi-cal-day';
            daySpan.tabIndex = 0;
            
            const cellDate = new Date(year, month, i);
            const cellTime = cellDate.getTime();

            // Highlight Today
            if (isCurrentMonth && i === todayDate) {
                daySpan.classList.add('today');
            }

            // Highlight Range
            if (startRangeDate) {
                const startTime = startRangeDate.getTime();
                const endTime = endRangeDate ? endRangeDate.getTime() : null;

                if (endTime && cellTime === startTime) {
                    daySpan.classList.add('active', 'range-start');
                } else if (endTime && cellTime === endTime) {
                    daySpan.classList.add('active', 'range-end');
                } else if (endTime && cellTime > startTime && cellTime < endTime) {
                    daySpan.classList.add('in-range');
                } else if (!endTime && cellTime === startTime) {
                    daySpan.classList.add('active', 'range-start');
                }
            }
            
            // Click to select
            daySpan.addEventListener('click', function() {
                if (!startRangeDate) {
                    startRangeDate = new Date(year, month, i);
                    endRangeDate = null;
                } else if (startRangeDate && !endRangeDate) {
                    if (cellTime < startRangeDate.getTime()) {
                        endRangeDate = startRangeDate;
                        startRangeDate = new Date(year, month, i);
                    } else {
                        endRangeDate = new Date(year, month, i);
                    }
                } else {
                    startRangeDate = new Date(year, month, i);
                    endRangeDate = null;
                }
                
                renderCalendar();
                updateCalSelectionText();
            });
            
            calGrid.appendChild(daySpan);
        }
    }

    function formatDateObj(dateObj) {
        if (!dateObj) return '--';
        const y = dateObj.getFullYear();
        const m = String(dateObj.getMonth() + 1).padStart(2, '0');
        const d = String(dateObj.getDate()).padStart(2, '0');
        return `${y}-${m}-${d}`;
    }

    function updateCalSelectionText() {
        if (calFromText) calFromText.textContent = formatDateObj(startRangeDate);
        if (calToText) calToText.textContent = endRangeDate ? formatDateObj(endRangeDate) : (startRangeDate ? formatDateObj(startRangeDate) : '--');
    }

    if (dateMock && calDropdown) {
        dateMock.addEventListener('click', function(e) {
            e.stopPropagation();
            calDropdown.classList.toggle('open');
            dateMock.classList.toggle('active');
            if(calDropdown.classList.contains('open')) renderCalendar();
        });
    }

    document.addEventListener('click', function(e) {
        if (calDropdown && !calDropdown.contains(e.target) && !dateMock.contains(e.target)) {
            calDropdown.classList.remove('open');
            if (dateMock) dateMock.classList.remove('active');
        }
    });

    if (calPrev) calPrev.addEventListener('click', () => { 
        currentCalDate.setMonth(currentCalDate.getMonth() - 1); 
        renderCalendar(); 
    });
    
    if (calNext) calNext.addEventListener('click', () => { 
        currentCalDate.setMonth(currentCalDate.getMonth() + 1); 
        renderCalendar(); 
    });

    if (applyCalBtn) {
        applyCalBtn.addEventListener('click', function() {
            if (startRangeDate) {
                const startStr = formatDateObj(startRangeDate);
                const endStr = endRangeDate ? formatDateObj(endRangeDate) : startStr;
                if (dateText) dateText.textContent = `${startStr} to ${endStr}`;
                if (applyFiltersBtn) applyFiltersBtn.click(); // Automatically filter
            }
            calDropdown.classList.remove('open');
            dateMock.classList.remove('active');
        });
    }

    if (clearCalBtn) {
        clearCalBtn.addEventListener('click', function() {
            startRangeDate = null;
            endRangeDate = null;
            if (dateText) dateText.textContent = 'Select date range';
            updateCalSelectionText();
            renderCalendar();
        });
    }
});