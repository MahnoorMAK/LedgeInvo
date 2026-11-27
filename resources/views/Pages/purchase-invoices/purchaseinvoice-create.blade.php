@extends('layout.Fizadashboard')

@section('content')
<style>
/* =========================================
   CSS START
   ========================================= */
.invoice-page-wrapper {
    --primary-purple: #7b2cbf; 
    --primary-purple-hover: #9d4edd;
    --light-purple-bg: #f3e8ff;
    --text-dark: #1e293b; 
    --text-muted: #64748b;
    --border-color: #cbd5e1;
    --danger-color: #ef4444;
    
    --card-shadow: 0 10px 25px -5px rgba(123, 44, 191, 0.1), 0 8px 10px -6px rgba(123, 44, 191, 0.1);
    --card-shadow-hover: 0 20px 30px -10px rgba(123, 44, 191, 0.3), 0 10px 15px -5px rgba(123, 44, 191, 0.2);
    --input-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
    --purple-glow: 0 0 15px rgba(157, 78, 221, 0.6);
    
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    color: var(--text-dark);
}

.invoice-page-wrapper * {
    box-sizing: border-box;
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

/* Header */
.page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.page-title { font-size: 24px; font-weight: 700; margin: 0 0 5px 0; color: var(--text-dark); letter-spacing: -0.5px; }
.page-subtitle { font-size: 14px; color: var(--text-muted); margin: 0; }
.btn-back { text-decoration: none; color: var(--text-dark); background: white; border: 1px solid var(--border-color); padding: 8px 16px; border-radius: 8px; font-size: 14px; font-weight: 500; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
.btn-back:hover { background: var(--light-purple-bg); color: var(--primary-purple); border-color: var(--primary-purple); transform: translateY(-2px); }

/* Grid & Cards */
.invoice-form-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 25px; align-items: start; }
.custom-card { background: white; border-radius: 12px; border: 1px solid var(--border-color); padding: 25px; margin-bottom: 25px; box-shadow: var(--card-shadow); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transform: perspective(1000px) translateZ(0); }
.custom-card:hover { box-shadow: var(--card-shadow-hover); transform: perspective(1000px) translateZ(10px) translateY(-5px); border-color: var(--primary-purple-hover); }

.card-header { display: flex; align-items: center; margin-bottom: 20px; }
.card-header.space-between { justify-content: space-between; }
.flex-align { display: flex; align-items: center; }
.card-header h2 { font-size: 16px; font-weight: 600; margin: 0 0 0 12px; color: var(--text-dark); }
.icon-box { width: 35px; height: 35px; background: var(--light-purple-bg); color: var(--primary-purple); display: flex; align-items: center; justify-content: center; border-radius: 8px; font-size: 16px; box-shadow: inset 0 -2px 5px rgba(123, 44, 191, 0.1); }

/* Forms */
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
.form-group { display: flex; flex-direction: column; position: relative; }
.form-group label { font-size: 13px; font-weight: 600; margin-bottom: 8px; color: var(--text-dark); }
.required { color: var(--danger-color); }

.custom-input { width: 100%; padding: 10px 15px; border: 1px solid var(--border-color); border-radius: 8px; font-size: 14px; color: var(--text-dark); background: white; transition: all 0.3s ease; box-shadow: var(--input-shadow); outline: none; font-weight: 500; }
.custom-input::placeholder { color: #94a3b8; font-weight: 400; }

.custom-input:focus, .custom-input:hover { border-color: var(--primary-purple); box-shadow: var(--purple-glow); transform: translateY(-2px); animation: blinkPurple 2s infinite alternate; }
.highlight-purple:focus, .notes-highlight:focus { background-color: var(--light-purple-bg); border-color: var(--primary-purple-hover); box-shadow: 0 0 20px rgba(157, 78, 221, 0.5); animation: blinkPurpleStrong 1.5s infinite alternate; }

@keyframes blinkPurple { 0% { box-shadow: 0 0 5px rgba(123, 44, 191, 0.2); } 100% { box-shadow: 0 0 15px rgba(123, 44, 191, 0.6); } }
@keyframes blinkPurpleStrong { 0% { box-shadow: 0 0 10px rgba(157, 78, 221, 0.4); } 100% { box-shadow: 0 0 25px rgba(157, 78, 221, 0.8); } }

.input-with-icon { position: relative; cursor: pointer; }
.input-with-icon i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
.input-with-icon .custom-input { padding-left: 40px; cursor: pointer; }

/* === CUSTOM DROPDOWN CSS === */
.custom-dropdown { position: relative; user-select: none; width: 100%; }
.custom-dropdown-select { width: 100%; padding: 10px 15px; border: 1px solid var(--border-color); border-radius: 8px; font-size: 14px; color: var(--text-dark); background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: 0.3s; box-shadow: var(--input-shadow); }
.custom-dropdown-select:hover { border-color: var(--primary-purple); }
.custom-dropdown.active .custom-dropdown-select { border-color: var(--primary-purple); box-shadow: var(--purple-glow); }
.custom-dropdown-menu { position: absolute; top: 100%; left: 0; right: 0; background: #fff; border: 1px solid var(--border-color); border-radius: 8px; margin-top: 5px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); z-index: 100; display: none; max-height: 200px; overflow-y: auto; }
.custom-dropdown.active .custom-dropdown-menu { display: block; }
.custom-dropdown-item { padding: 10px 15px; font-size: 14px; color: var(--text-dark); cursor: pointer; transition: 0.2s; }
.custom-dropdown-item:hover, .custom-dropdown-item.selected { background-color: var(--primary-purple-hover); color: white; font-weight: 600; }
.custom-dropdown.has-value .custom-dropdown-select { background-color: var(--light-purple-bg); color: var(--primary-purple); font-weight: 600; border-color: var(--primary-purple-hover); }
.custom-dropdown input[type="hidden"] { display: none; }

/* === TABLE SPECIFIC CUSTOM DROPDOWN (Tight fit) === */
.table-dropdown .custom-dropdown-select { padding: 8px 10px; font-size: 13px; border-radius: 6px; }
.table-dropdown .custom-dropdown-menu { font-size: 13px; }
.table-dropdown .custom-dropdown-item { padding: 8px 10px; }

/* Buttons */
.btn-add-item-top, .btn-submit { background: var(--primary-purple); color: white; border: none; padding: 10px 18px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(123, 44, 191, 0.3); }
.btn-add-item-top:hover, .btn-submit:hover { background: var(--primary-purple-hover); transform: translateY(-3px); box-shadow: 0 8px 15px rgba(123, 44, 191, 0.5); animation: blinkPurple 1.5s infinite alternate; }

/* Table */
.invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
.invoice-table th { text-align: left; font-size: 12px; color: var(--text-muted); font-weight: 600; padding-bottom: 10px; border-bottom: 1px solid var(--border-color); }
.invoice-table td { padding: 10px 5px; vertical-align: middle; color: var(--text-dark); }
.table-input { padding: 8px; font-size: 13px; border-radius: 6px; }
.btn-delete-row { background: none; border: none; color: var(--danger-color); cursor: pointer; font-size: 16px; transition: all 0.3s; }
.btn-delete-row:hover { color: #b91c1c; transform: scale(1.2) rotate(10deg); }
.btn-add-another { width: 100%; padding: 12px; background: var(--light-purple-bg); border: 1px dashed var(--primary-purple); color: var(--primary-purple); border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; }
.btn-add-another:hover { background: white; box-shadow: var(--purple-glow); animation: blinkPurple 1.5s infinite alternate; }

.card-footer-actions { display: flex; justify-content: space-between; align-items: center; margin-top: 25px; padding-top: 15px; border-top: 1px solid var(--border-color); }
.status-text { color: var(--primary-purple); font-size: 14px; font-weight: 600; }
.btn-cancel { background: white; border: 1px solid var(--border-color); padding: 10px 20px; border-radius: 8px; margin-right: 10px; cursor: pointer; font-weight: 600; color: var(--text-dark); transition: 0.3s; }
.btn-cancel:hover { background: #f1f5f9; color: var(--danger-color); border-color: var(--danger-color); }

/* Summary List */
.summary-list .summary-item { display: flex; justify-content: space-between; font-size: 14px; padding: 12px 0; border-bottom: 1px solid #f1f5f9; color: var(--text-dark); }
.summary-list .total-row { border-bottom: none; font-size: 18px; padding-top: 15px; font-weight: 700; }
.text-purple-bright { color: var(--primary-purple); }
.text-danger { color: var(--danger-color); }
.font-bold { font-weight: 600; }
.font-italic { font-style: italic; font-size: 14px; }
.text-muted { color: var(--text-muted); }
.text-center { text-align: center; }
.text-right { text-align: right; }

/* Calendar */
.calendar-popup { position: absolute; background: white; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); border: 1px solid var(--border-color); width: 300px; padding: 15px; display: none; z-index: 1000; transform: perspective(1000px) rotateX(5deg); transition: all 0.3s ease; }
.calendar-popup.active { display: block; animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
@keyframes popIn { from { opacity: 0; transform: perspective(1000px) rotateX(20deg) scale(0.9); } to { opacity: 1; transform: perspective(1000px) rotateX(0) scale(1); } }
.calendar-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; font-weight: 600; color: var(--primary-purple); }
.calendar-header button { background: var(--light-purple-bg); border: none; width: 28px; height: 28px; border-radius: 6px; cursor: pointer; color: var(--primary-purple); transition: 0.3s; }
.calendar-header button:hover { background: var(--primary-purple); color: white; }
.calendar-weekdays { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 10px; }
.calendar-days { display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px; }
.calendar-days span { display: flex; align-items: center; justify-content: center; height: 32px; font-size: 13px; border-radius: 6px; cursor: pointer; transition: all 0.2s; color: var(--text-dark); }
.calendar-days span:hover:not(.empty) { background: var(--light-purple-bg); color: var(--primary-purple); font-weight: 600; transform: scale(1.1); box-shadow: 0 2px 8px rgba(123, 44, 191, 0.3); }

@media (max-width: 900px) { .invoice-form-grid { grid-template-columns: 1fr; } .form-row { grid-template-columns: 1fr; } }
</style>

<div class="invoice-page-wrapper">
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Purchase Invoice</h1>
            <p class="page-subtitle">Create a new purchase invoice by entering the vendor details, items, and terms.</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

    <form action="" method="POST" class="invoice-form-grid">
        @csrf
        <div class="left-column">
            <!-- Details Card -->
            <div class="custom-card form-card">
                <div class="card-header">
                    <div class="icon-box"><i class="fa-solid fa-calendar-check"></i></div>
                    <h2>Purchase Invoice Details</h2>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Invoice Date <span class="required">*</span></label>
                        <div class="input-with-icon custom-calendar-trigger">
                            <i class="fa-regular fa-calendar-days"></i>
                            <input type="text" class="custom-input" value="Nov 24, 2026" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Due Date <span class="required">*</span></label>
                        <div class="input-with-icon custom-calendar-trigger">
                            <i class="fa-regular fa-calendar-days"></i>
                            <input type="text" class="custom-input" placeholder="Select date" readonly id="dueDate">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Custom Vendor Dropdown -->
                    <div class="form-group">
                        <label>Vendor <span class="required">*</span></label>
                        <div class="custom-dropdown" id="vendorDropdown">
                            <div class="custom-dropdown-select">
                                <span class="selected-text">Select Vendor</span>
                                <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" data-value="1">Vendor Alpha</div>
                                <div class="custom-dropdown-item" data-value="2">Vendor Beta</div>
                            </div>
                            <input type="hidden" name="vendor_id" required>
                        </div>
                    </div>

                    <!-- Custom Warehouse Dropdown -->
                    <div class="form-group">
                        <label>Warehouse <span class="required">*</span></label>
                        <div class="custom-dropdown highlight-purple" id="warehouseDropdown">
                            <div class="custom-dropdown-select">
                                <span class="selected-text">Select Warehouse</span>
                                <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" data-value="1">Main Warehouse</div>
                                <div class="custom-dropdown-item" data-value="2">Warehouse B</div>
                            </div>
                            <input type="hidden" name="warehouse_id" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Terms</label>
                        <input type="text" class="custom-input" placeholder="e.g., Net 30">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="custom-input notes-highlight" placeholder="Additional notes..." rows="2"></textarea>
                    </div>
                </div>
            </div>

            <!-- Items Card -->
            <div class="custom-card items-card">
                <div class="card-header space-between">
                    <div class="flex-align">
                        <div class="icon-box"><i class="fa-solid fa-box-open"></i></div>
                        <h2>Purchase Invoice Items</h2>
                    </div>
                    <button type="button" class="btn-add-item-top" onclick="addRow()"><i class="fa-solid fa-plus"></i> Add Item</button>
                </div>

                <div style="overflow-x: auto;">
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>Product *</th>
                                <th>Qty *</th>
                                <th>Unit Price *</th>
                                <th>Discount %</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceItemsBody">
                            <!-- Table rows added via JS -->
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn-add-another" onclick="addRow()"><i class="fa-solid fa-plus"></i> Add another item</button>

                <div class="card-footer-actions">
                    <div class="status-text"><i class="fa-solid fa-circle-check"></i> <span id="itemsAddedText">0 items added</span></div>
                    <div class="action-buttons">
                        <button type="button" class="btn-cancel">Cancel</button>
                        <button type="submit" class="btn-submit">Create Purchase Invoice</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="right-column">
            <div class="custom-card summary-card">
                <div class="card-header">
                    <div class="icon-box"><i class="fa-solid fa-file-invoice"></i></div>
                    <h2>Invoice Summary</h2>
                </div>
                <div class="summary-list">
                    <div class="summary-item"><span>Subtotal</span><span class="font-bold">$0.00</span></div>
                    <div class="summary-item"><span>Discount</span><span class="text-danger font-bold">-$0.00</span></div>
                    <div class="summary-item"><span>Tax</span><span class="font-bold">$0.00</span></div>
                    <div class="summary-item total-row"><span>Total</span><span class="text-purple-bright font-bold">$0.00</span></div>
                </div>
            </div>

            <div class="custom-card info-card">
                <div class="card-header">
                    <div class="icon-box"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <h2>Payment Terms</h2>
                </div>
                <p class="text-muted font-italic">No payment terms specified.</p>
            </div>

            <div class="custom-card info-card">
                <div class="card-header">
                    <div class="icon-box"><i class="fa-solid fa-note-sticky"></i></div>
                    <h2>Additional Notes</h2>
                </div>
                <p class="text-muted font-italic">No additional notes.</p>
            </div>
        </div>
    </form>
</div>

<!-- Calendar Popup -->
<div id="customCalendar" class="calendar-popup">
    <div class="calendar-header">
        <button type="button" id="prevMonth"><i class="fa-solid fa-chevron-left"></i></button>
        <span id="monthYearDisplay">November 2026</span>
        <button type="button" id="nextMonth"><i class="fa-solid fa-chevron-right"></i></button>
    </div>
    <div class="calendar-weekdays">
        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
    </div>
    <div class="calendar-days" id="calendarDays"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. GLOBAL CUSTOM DROPDOWN FUNCTION
    // ==========================================
    function initCustomDropdown(dropdown) {
        const selectBox = dropdown.querySelector('.custom-dropdown-select');
        const items = dropdown.querySelectorAll('.custom-dropdown-item');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');
        const selectedText = dropdown.querySelector('.selected-text');

        selectBox.addEventListener('click', function(e) {
            e.stopPropagation();
            // Close all other dropdowns
            document.querySelectorAll('.custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('active');
            });
            dropdown.classList.toggle('active');
        });

        items.forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
                items.forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
                selectedText.textContent = this.textContent;
                if(hiddenInput) hiddenInput.value = this.getAttribute('data-value');
                dropdown.classList.add('has-value');
                dropdown.classList.remove('active');
            });
        });
    }

    // Initialize existing dropdowns
    document.querySelectorAll('.custom-dropdown').forEach(initCustomDropdown);

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('active'));
    });


    // ==========================================
    // 2. ADD / DELETE ROWS LOGIC
    // ==========================================
    window.addRow = function() {
        const tbody = document.getElementById('invoiceItemsBody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td>
                <!-- Table Dropdown with Custom Class -->
                <div class="custom-dropdown table-dropdown">
                    <div class="custom-dropdown-select">
                        <span class="selected-text">Select Product</span>
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item" data-value="100">Item A</div>
                        <div class="custom-dropdown-item" data-value="200">Item B</div>
                    </div>
                    <input type="hidden" name="product_id[]">
                </div>
            </td>
            <td><input type="number" class="custom-input table-input" value="1" name="qty[]"></td>
            <td><input type="number" class="custom-input table-input" value="0" name="price[]"></td>
            <td><input type="number" class="custom-input table-input" value="0" name="discount[]"></td>
            <td class="text-center text-muted">No tax</td>
            <td class="text-right font-bold">$0.00</td>
            <td class="text-center">
                <button type="button" class="btn-delete-row" onclick="deleteRow(this)"><i class="fa-regular fa-trash-can"></i></button>
            </td>
        `;
        tbody.appendChild(newRow);
        
        // Initialize the dropdown in the NEW row
        const newDropdown = newRow.querySelector('.custom-dropdown');
        if(newDropdown) initCustomDropdown(newDropdown);

        updateItemCount();
    };

    window.deleteRow = function(btn) {
        const row = btn.closest('tr');
        row.remove();
        updateItemCount();
    };

    function updateItemCount() {
        const count = document.querySelectorAll('#invoiceItemsBody tr').length;
        document.getElementById('itemsAddedText').innerText = count + ' item' + (count > 1 ? 's' : '') + ' added';
    }
    
    // Add first row by default
    addRow();

    // ==========================================
    // 3. CUSTOM CALENDAR LOGIC
    // ==========================================
    const calendarPopup = document.getElementById('customCalendar');
    const monthYearDisplay = document.getElementById('monthYearDisplay');
    const calendarDays = document.getElementById('calendarDays');
    const dueDateInput = document.getElementById('dueDate');
    const triggerIcons = document.querySelectorAll('.custom-calendar-trigger');
    
    let currentDate = new Date(); 
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function renderCalendar(month, year) {
        calendarDays.innerHTML = "";
        monthYearDisplay.innerText = `${months[month]} ${year}`;
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptySpan = document.createElement('span');
            emptySpan.classList.add('empty');
            calendarDays.appendChild(emptySpan);
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const daySpan = document.createElement('span');
            daySpan.innerText = i;
            daySpan.addEventListener('click', function() {
                const selectedDate = `${months[month].substring(0,3)} ${i}, ${year}`;
                dueDateInput.value = selectedDate;
                calendarPopup.classList.remove('active');
            });
            calendarDays.appendChild(daySpan);
        }
    }

    triggerIcons.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const rect = this.getBoundingClientRect();
            calendarPopup.style.top = (rect.bottom + window.scrollY + 10) + "px";
            calendarPopup.style.left = (rect.left + window.scrollX) + "px";
            calendarPopup.classList.toggle('active');
            if(calendarPopup.classList.contains('active')){
                renderCalendar(currentMonth, currentYear);
            }
        });
    });

    document.getElementById('prevMonth').addEventListener('click', function(e) {
        e.preventDefault(); currentMonth--;
        if (currentMonth < 0) { currentMonth = 11; currentYear--; }
        renderCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth').addEventListener('click', function(e) {
        e.preventDefault(); currentMonth++;
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        renderCalendar(currentMonth, currentYear);
    });

    document.addEventListener('click', function(e) {
        if (!calendarPopup.contains(e.target) && !e.target.closest('.custom-calendar-trigger')) {
            calendarPopup.classList.remove('active');
        }
    });
});
</script>
@endsection