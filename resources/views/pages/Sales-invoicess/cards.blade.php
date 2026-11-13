<!-- resources/views/pages/sales-invoices/create.blade.php -->
@extends('Layout.app') 

@section('content')
<style>
    /* ===== FINAL THEME (PURPLE) ===== */
    :root {
        --purple: #8b5cf6;
        --purple-light: #f3e8ff;
        --purple-shadow: rgba(139, 92, 246, 0.25);
        --border-color: #cbd5e1;
    }

    .ag-page-wrapper { background-color: #f8fafc; padding: 24px 32px; font-family: 'Inter', sans-serif; min-height: 100vh; }
    .ag-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; }
    .ag-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .ag-label { display: block; margin-bottom: 8px; color: #334155; font-size: 13px; font-weight: 600; }
    .ag-input { width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: 8px; outline: none; font-size: 14px; color: #334155; background: #fff; box-sizing: border-box; }
    .ag-input:focus { border-color: var(--purple); box-shadow: 0 0 0 3px var(--purple-shadow); }

    /* ====== 1. PURE CUSTOM DROPDOWN (NO GREY SHADE) ====== */
    .custom-dropdown { position: relative; width: 100%; user-select: none; }
    
    .custom-dropdown-trigger {
        width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: 8px;
        background: #fff; color: #334155; font-size: 14px; cursor: pointer;
        display: flex; justify-content: space-between; align-items: center;
        transition: all 0.25s ease;
    }
    
    /* Hover (Blink) Effect on the Box */
    .custom-dropdown-trigger:hover {
        border-color: var(--purple);
        box-shadow: 0 4px 15px var(--purple-shadow);
        transform: translateY(-2px);
    }

    .custom-dropdown.open .custom-dropdown-trigger {
        border-color: var(--purple);
        box-shadow: 0 0 0 3px var(--purple-shadow);
    }

    .custom-dropdown-trigger svg { width: 16px; height: 16px; stroke: var(--purple); transition: transform 0.3s; }
    .custom-dropdown.open .custom-dropdown-trigger svg { transform: rotate(180deg); }

    /* Dropdown List */
    .custom-dropdown-menu {
        position: absolute; top: 105%; left: 0; width: 100%;
        background: #fff; border: 1px solid var(--border-color); border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1); z-index: 100;
        display: none; overflow: hidden; padding: 4px 0;
    }
    .custom-dropdown.open .custom-dropdown-menu { display: block; }

    .custom-dropdown-item {
        padding: 10px 14px; font-size: 14px; color: #334155; cursor: pointer; transition: all 0.2s;
    }
    
    /* Blink Effect on List Items */
    .custom-dropdown-item:hover {
        background-color: var(--purple-light);
        color: var(--purple);
        font-weight: 600;
        padding-left: 20px; /* Smooth slide effect */
    }

    /* ====== 2. CUSTOM DATE PICKER (CALENDAR) ====== */
    .custom-datepicker-wrapper { position: relative; }
    .custom-date-display {
        width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: 8px;
        background: #fff; color: #334155; font-size: 14px; cursor: pointer;
        display: flex; justify-content: space-between; align-items: center; transition: all 0.25s;
    }
    .custom-date-display:hover { border-color: var(--purple); box-shadow: 0 4px 12px var(--purple-shadow); }
    .custom-date-display svg { width: 16px; height: 16px; stroke: var(--purple); }
    
    .custom-calendar {
        position: absolute; top: 105%; left: 0; width: 290px; background: #fff; border: 1px solid var(--border-color);
        border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); z-index: 1000; display: none; padding: 16px;
    }
    .custom-calendar.open { display: block; }
    .cal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
    .cal-header button { background: none; border: none; cursor: pointer; color: var(--purple); padding: 4px; font-size: 18px; }
    .cal-header span { font-weight: 600; color: var(--purple); font-size: 15px; }
    .cal-days-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; text-align: center; }
    .cal-day-name { font-size: 11px; color: #94a3b8; font-weight: 700; margin-bottom: 8px; }
    .cal-day { padding: 8px 0; font-size: 13px; color: #334155; border-radius: 6px; cursor: pointer; transition: 0.2s; }
    .cal-day:hover { background: var(--purple); color: #fff; }
</style>

<div class="ag-page-wrapper">
    <div class="ag-card">
        <div class="ag-form-grid">
            
            <!-- INVOICE DATE -->
            <div>
                <label class="ag-label">Invoice Date *</label>
                <div class="custom-datepicker-wrapper" id="dp-1">
                    <div class="custom-date-display">
                        <span class="date-text">{{ date('m/d/Y') }}</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <div class="custom-calendar">
                        <div class="cal-header">
                            <button type="button" class="prev-month">‹</button>
                            <span class="month-year">November 2026</span>
                            <button type="button" class="next-month">›</button>
                        </div>
                        <div class="cal-days-grid"></div>
                    </div>
                </div>
            </div>

            <!-- DUE DATE -->
            <div>
                <label class="ag-label">Due Date *</label>
                <div class="custom-datepicker-wrapper" id="dp-2">
                    <div class="custom-date-display">
                        <span class="date-text">mm/dd/yyyy</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <div class="custom-calendar">
                        <div class="cal-header">
                            <button type="button" class="prev-month">‹</button>
                            <span class="month-year">November 2026</span>
                            <button type="button" class="next-month">›</button>
                        </div>
                        <div class="cal-days-grid"></div>
                    </div>
                </div>
            </div>
            
            <!-- CUSTOMER DROPDOWN -->
            <div>
                <label class="ag-label">Customer *</label>
                <div class="custom-dropdown">
                    <div class="custom-dropdown-trigger">
                        <span>Select Customer</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item">Customer A</div>
                        <div class="custom-dropdown-item">Customer B</div>
                        <div class="custom-dropdown-item">Customer C</div>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE DROPDOWN -->
            <div>
                <label class="ag-label">Warehouse *</label>
                <div class="custom-dropdown">
                    <div class="custom-dropdown-trigger">
                        <span>Select Warehouse</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item">Main Warehouse</div>
                        <div class="custom-dropdown-item">Secondary Warehouse</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== 1. CUSTOM DROPDOWN LOGIC =====
        const dropdowns = document.querySelectorAll('.custom-dropdown');
        
        dropdowns.forEach(dropdown => {
            const trigger = dropdown.querySelector('.custom-dropdown-trigger');
            const triggerText = trigger.querySelector('span');
            const items = dropdown.querySelectorAll('.custom-dropdown-item');

            // Open/Close
            trigger.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent closing immediately
                document.querySelectorAll('.custom-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('open');
                });
                dropdown.classList.toggle('open');
            });

            // Select Item
            items.forEach(item => {
                item.addEventListener('click', function() {
                    triggerText.textContent = this.textContent;
                    triggerText.style.color = '#0f172a';
                    triggerText.style.fontWeight = '600';
                    dropdown.classList.remove('open');
                });
            });
        });

        // ===== 2. CUSTOM DATE PICKER LOGIC =====
        const datepickers = document.querySelectorAll('.custom-datepicker-wrapper');
        
        datepickers.forEach(picker => {
            let currentMonth = new Date().getMonth(); 
            let currentYear = new Date().getFullYear(); 

            const display = picker.querySelector('.custom-date-display');
            const calendar = picker.querySelector('.custom-calendar');
            const monthYearLabel = calendar.querySelector('.month-year');
            const daysGrid = calendar.querySelector('.cal-days-grid');
            const prevBtn = calendar.querySelector('.prev-month');
            const nextBtn = calendar.querySelector('.next-month');
            const dateText = display.querySelector('.date-text');

            // Toggle Calendar
            display.addEventListener('click', function(e) {
                e.stopPropagation();
                document.querySelectorAll('.custom-calendar').forEach(c => {
                    if (c !== calendar) c.classList.remove('open');
                });
                calendar.classList.toggle('open');
            });

            // Render Calendar UI
            function renderCalendar(month, year) {
                // Days header
                daysGrid.innerHTML = `
                    <div class="cal-day-name">Su</div><div class="cal-day-name">Mo</div><div class="cal-day-name">Tu</div><div class="cal-day-name">We</div><div class="cal-day-name">Th</div><div class="cal-day-name">Fr</div><div class="cal-day-name">Sa</div>
                `;
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                monthYearLabel.textContent = `${monthNames[month]} ${year}`;

                // Empty slots for first week
                for (let i = 0; i < firstDay; i++) {
                    const empty = document.createElement('div');
                    daysGrid.appendChild(empty);
                }

                // Days of month
                for (let i = 1; i <= daysInMonth; i++) {
                    const day = document.createElement('div');
                    day.className = 'cal-day';
                    day.textContent = i;
                    
                    // Click a date
                    day.addEventListener('click', function() {
                        const selectedDate = `${String(month + 1).padStart(2, '0')}/${String(i).padStart(2, '0')}/${year}`;
                        dateText.textContent = selectedDate;
                        dateText.style.color = '#0f172a';
                        dateText.style.fontWeight = '600';
                        calendar.classList.remove('open');
                    });
                    daysGrid.appendChild(day);
                }
            }

            // Month Navigation
            prevBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                currentMonth--;
                if (currentMonth < 0) { currentMonth = 11; currentYear--; }
                renderCalendar(currentMonth, currentYear);
            });

            nextBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                currentMonth++;
                if (currentMonth > 11) { currentMonth = 0; currentYear++; }
                renderCalendar(currentMonth, currentYear);
            });

            // Initial Render
            renderCalendar(currentMonth, currentYear);
        });

        // ===== 3. CLOSE ON OUTSIDE CLICK =====
        document.addEventListener('click', function() {
            document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
            document.querySelectorAll('.custom-calendar').forEach(c => c.classList.remove('open'));
        });
    });
</script>
@endpush