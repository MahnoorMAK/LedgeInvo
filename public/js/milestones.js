// public/js/milestones.js

document.addEventListener('DOMContentLoaded', function() {
    
    // ====== TOGGLE FILTERS PANEL ======
    const toggleFilterBtn = document.getElementById('toggle-filter-btn');
    const filtersPanel = document.getElementById('filters-panel');
    toggleFilterBtn.addEventListener('click', function() {
        filtersPanel.classList.toggle('show');
    });

    // ====== CUSTOM FILTER DROPDOWN (Goal) ======
    window.toggleFilterDropdown = function(id) {
        const dd = document.getElementById(id);
        const menu = dd.querySelector('.custom-dropdown-menu');
        document.querySelectorAll('.ag-filter-select-wrapper').forEach(el => {
            if(el !== dd) el.querySelector('.custom-dropdown-menu').style.display = 'none';
        });
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    window.selectFilterItem = function(ddId, element) {
        const dd = document.getElementById(ddId);
        const textSpan = dd.querySelector('.ag-filter-select span');
        textSpan.innerText = element.innerText;
        textSpan.style.color = '#0f172a';
        textSpan.style.fontWeight = '600';
        dd.querySelector('.custom-dropdown-menu').style.display = 'none';
    }

    // ====== CUSTOM DATE RANGE PICKER ======
    const dateRangeState = { step: 1, start: null, end: null };
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    window.toggleDateRangePicker = function(id) {
        const wrapper = document.getElementById(id);
        const popup = wrapper.querySelector('.custom-calendar-popup');
        document.querySelectorAll('.custom-calendar-popup').forEach(el => {
            if(el !== popup) el.classList.remove('open');
        });
        popup.classList.toggle('open');
        if(popup.classList.contains('open')) renderDateRangeCalendar();
    }

    window.changeMonth = function(calId, direction) {
        currentMonth += direction;
        if (currentMonth < 0) { currentMonth = 11; currentYear--; }
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        renderDateRangeCalendar();
    }

    function renderDateRangeCalendar() {
        const popup = document.getElementById('cal-range');
        const grid = popup.querySelector('.cal-days-grid');
        const monthLabel = popup.querySelector('.month-year');
        const dateText = document.getElementById('date-range-text');

        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        monthLabel.innerText = `${monthNames[currentMonth]} ${currentYear}`;

        grid.innerHTML = `<div class="cal-day-name">Su</div><div class="cal-day-name">Mo</div><div class="cal-day-name">Tu</div><div class="cal-day-name">We</div><div class="cal-day-name">Th</div><div class="cal-day-name">Fr</div><div class="cal-day-name">Sa</div>`;

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) grid.innerHTML += `<div class="cal-day filler"></div>`;

        for (let i = 1; i <= daysInMonth; i++) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'cal-day';
            dayDiv.innerText = i;
            
            // Highlight logic
            if (dateRangeState.start && dateRangeState.start.day === i && dateRangeState.start.month === currentMonth && dateRangeState.start.year === currentYear) {
                dayDiv.classList.add('selected-start');
            }
            if (dateRangeState.end && dateRangeState.end.day === i && dateRangeState.end.month === currentMonth && dateRangeState.end.year === currentYear) {
                dayDiv.classList.add('selected-end');
            }
            if (dateRangeState.start && dateRangeState.end) {
                const curDate = new Date(currentYear, currentMonth, i);
                const startDate = new Date(dateRangeState.start.year, dateRangeState.start.month, dateRangeState.start.day);
                const endDate = new Date(dateRangeState.end.year, dateRangeState.end.month, dateRangeState.end.day);
                if (curDate > startDate && curDate < endDate) dayDiv.classList.add('in-range');
            }

            dayDiv.onclick = function() {
                if (dateRangeState.step === 1) {
                    dateRangeState.start = { day: i, month: currentMonth, year: currentYear };
                    dateRangeState.end = null;
                    dateRangeState.step = 2;
                    dateText.innerText = `From: ${String(currentMonth+1).padStart(2,'0')}/${String(i).padStart(2,'0')}/${currentYear}`;
                } else {
                    dateRangeState.end = { day: i, month: currentMonth, year: currentYear };
                    dateRangeState.step = 1;
                    dateText.innerText = `${dateText.innerText.replace('From: ', '')} To: ${String(currentMonth+1).padStart(2,'0')}/${String(i).padStart(2,'0')}/${currentYear}`;
                    document.getElementById('cal-range').classList.remove('open');
                }
                renderDateRangeCalendar();
            };
            grid.appendChild(dayDiv);
        }
    }

    // Close on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.ag-filter-select-wrapper')) {
            document.querySelectorAll('.ag-filter-select-wrapper .custom-dropdown-menu').forEach(m => m.style.display = 'none');
        }
        if (!e.target.closest('.ag-date-range-wrapper')) {
            document.querySelectorAll('.custom-calendar-popup').forEach(p => p.classList.remove('open'));
        }
    });

});