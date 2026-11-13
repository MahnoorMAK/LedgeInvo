<!-- resources/views/pages/sales-invoices/create.blade.php -->
@extends('Layout.app') 

@section('content')
<style>
    /* Force Purple Theme */
    :root { --purple: #8b5cf6 !important; --purple-light: #f3e8ff !important; }
    
    .ag-page-wrapper { background-color: #f8fafc !important; padding: 24px 32px !important; font-family: 'Inter', sans-serif !important; color: #0f172a !important; min-height: 100vh !important; }
    .ag-top-header { display: flex !important; justify-content: space-between !important; align-items: flex-start !important; margin-bottom: 24px !important; }
    .ag-breadcrumb { color: #64748b !important; font-size: 13px !important; margin-bottom: 8px !important; }
    .ag-title { margin: 0 !important; font-size: 24px !important; font-weight: 600 !important; }
    .ag-subtitle { margin: 6px 0 0 0 !important; color: #64748b !important; font-size: 14px !important; }
    
    .ag-btn-outline { background: #fff !important; border: 1px solid #cbd5e1 !important; color: #475569 !important; padding: 10px 20px !important; border-radius: 6px !important; font-weight: 500 !important; cursor: pointer !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 6px !important; font-size: 14px !important; }
    .ag-btn-green { background: var(--purple) !important; color: white !important; border: none !important; padding: 10px 20px !important; border-radius: 6px !important; font-weight: 500 !important; cursor: pointer !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; gap: 8px !important; font-size: 14px !important; transition: all 0.2s !important; }
    .ag-btn-green:hover { background: #7c3aed !important; }
    .ag-btn-dashed { width: 100% !important; border: 1px dashed var(--purple) !important; background: var(--purple-light) !important; color: var(--purple) !important; padding: 12px !important; border-radius: 8px !important; font-weight: 500 !important; cursor: pointer !important; font-size: 14px !important; margin-top: 16px !important; display: flex !important; align-items: center !important; justify-content: center !important; gap: 6px !important; }
    
    .ag-layout { display: flex !important; gap: 24px !important; align-items: flex-start !important; }
    .ag-col-left { flex: 1 !important; min-width: 0 !important; }
    .ag-col-right { width: 320px !important; flex-shrink: 0 !important; }
    
    .ag-card { background: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 12px !important; padding: 24px !important; margin-bottom: 24px !important; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important; }
    .ag-card-header { display: flex !important; align-items: center !important; border-bottom: 1px solid #e2e8f0 !important; padding-bottom: 16px !important; margin-bottom: 20px !important; justify-content: space-between !important; }
    .ag-card-header-left { display: flex !important; align-items: center !important; gap: 12px !important; }
    .ag-icon-box { width: 40px !important; height: 40px !important; background: var(--purple-light) !important; color: var(--purple) !important; border-radius: 8px !important; display: flex !important; align-items: center !important; justify-content: center !important; flex-shrink: 0 !important; }
    .ag-card-title { margin: 0 !important; font-size: 16px !important; font-weight: 600 !important; }
    
    .ag-form-grid { display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 20px !important; }
    .ag-label { display: block !important; margin-bottom: 8px !important; color: #334155 !important; font-size: 13px !important; font-weight: 600 !important; }
    .ag-input { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; outline: none !important; font-size: 14px !important; color: #334155 !important; transition: all 0.3s ease !important; background: #fff !important; box-sizing: border-box !important; }
    .ag-input:focus { border-color: var(--purple) !important; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15) !important; }

    /* CUSTOM DROPDOWN */
    .custom-dropdown { position: relative !important; width: 100% !important; }
    .custom-dropdown-trigger { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; background: #fff !important; color: #334155 !important; font-size: 14px !important; cursor: pointer !important; display: flex !important; justify-content: space-between !important; align-items: center !important; transition: all 0.2s ease !important; }
    .custom-dropdown-trigger:hover { transform: translateY(-2px) !important; border-color: var(--purple) !important; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2) !important; background-color: #f8fafc !important; }
    .custom-dropdown.open .custom-dropdown-trigger { border-color: var(--purple) !important; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15) !important; }
    .custom-dropdown-trigger svg { width: 16px !important; height: 16px !important; stroke: var(--purple) !important; transition: transform 0.2s !important; }
    .custom-dropdown.open .custom-dropdown-trigger svg { transform: rotate(180deg) !important; }
    .custom-dropdown-menu { position: absolute !important; top: 105% !important; left: 0 !important; width: 100% !important; background: #fff !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; margin-top: 4px !important; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1) !important; z-index: 999 !important; display: none !important; overflow: hidden !important; max-height: 200px !important; overflow-y: auto !important; }
    .custom-dropdown.open .custom-dropdown-menu { display: block !important; }
    .custom-dropdown-item { padding: 10px 14px !important; font-size: 14px !important; color: #334155 !important; cursor: pointer !important; transition: 0.1s !important; }
    .custom-dropdown-item:hover { background-color: var(--purple-light) !important; color: var(--purple) !important; font-weight: 600 !important; }

    /* CUSTOM DATE PICKER */
    .custom-datepicker-wrapper { position: relative !important; z-index: 10 !important; }
    .custom-date-display { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; background: #fff !important; color: #334155 !important; font-size: 14px !important; cursor: pointer !important; display: flex !important; justify-content: space-between !important; align-items: center !important; transition: all 0.2s ease !important; }
    .custom-date-display:hover { border-color: var(--purple) !important; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1) !important; }
    .custom-date-display svg { width: 16px !important; height: 16px !important; stroke: var(--purple) !important; }
    .custom-calendar { position: absolute !important; top: 105% !important; left: 0 !important; width: 280px !important; background: #fff !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important; z-index: 9999 !important; display: none !important; padding: 12px !important; }
    .custom-calendar.open { display: block !important; }
    .cal-header { display: flex !important; justify-content: space-between !important; align-items: center !important; margin-bottom: 12px !important; }
    .cal-header button { background: none !important; border: none !important; cursor: pointer !important; color: var(--purple) !important; padding: 4px !important; font-size: 18px !important; }
    .cal-header span { font-weight: 600 !important; color: var(--purple) !important; font-size: 14px !important; }
    .cal-days-grid { display: grid !important; grid-template-columns: repeat(7, 1fr) !important; gap: 2px !important; text-align: center !important; }
    .cal-day-name { font-size: 11px !important; color: #94a3b8 !important; font-weight: 600 !important; margin-bottom: 4px !important; }
    .cal-day { padding: 8px 0 !important; font-size: 13px !important; color: #334155 !important; border-radius: 6px !important; cursor: pointer !important; transition: 0.1s !important; }
    .cal-day:hover { background: var(--purple-light) !important; color: var(--purple) !important; }
    .cal-day.filler { visibility: hidden !important; }

    .ag-table { width: 100% !important; border-collapse: collapse !important; }
    .ag-table th { text-align: left !important; padding: 12px 10px !important; color: #475569 !important; font-size: 13px !important; font-weight: 600 !important; border-bottom: 1px solid #e2e8f0 !important; }
    .ag-table td { padding: 12px 10px !important; border-bottom: 1px solid #f1f5f9 !important; vertical-align: middle !important; }
    .ag-summary-row { display: flex !important; justify-content: space-between !important; margin-bottom: 12px !important; color: #475569 !important; font-size: 14px !important; }
    .ag-summary-total { display: flex !important; justify-content: space-between !important; margin-top: 16px !important; padding-top: 16px !important; border-top: 1px solid #e2e8f0 !important; font-size: 18px !important; font-weight: 700 !important; color: #0f172a !important; }
    .ag-summary-total span:last-child { color: var(--purple) !important; }
    .ag-bottom-bar { display: flex !important; justify-content: space-between !important; align-items: center !important; margin-top: 10px !important; padding: 20px 0 !important; border-top: 1px solid #e2e8f0 !important; }
    .ag-item-count { color: var(--purple) !important; font-weight: 500 !important; font-size: 14px !important; }
</style>

<div class="ag-page-wrapper">
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Sales Invoice › Create Sales Invoice</div>
            <h1 class="ag-title">Create Sales Invoice</h1>
            <p class="ag-subtitle">Create a new sales invoice by entering the customer details, items, and terms.</p>
        </div>
        <a href="#" class="ag-btn-outline">Back</a>
    </div>

    <div class="ag-layout">
        <div class="ag-col-left">
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect></svg>
                        </div>
                        <h2 class="ag-card-title">Sales Invoice Details</h2>
                    </div>
                    <div style="display: flex; gap: 16px; font-size: 14px; color: #475569;">
                        <label style="display: flex; align-items: center; gap: 6px;"><input type="radio" checked style="accent-color: var(--purple);"> Product Wise</label>
                        <label style="display: flex; align-items: center; gap: 6px;"><input type="radio" style="accent-color: var(--purple);"> Service Wise</label>
                    </div>
                </div>
                
                <div class="ag-form-grid">
                    <!-- 1. INVOICE DATE (ONCLICK FORCED) -->
                    <div>
                        <label class="ag-label">Invoice Date *</label>
                        <div class="custom-datepicker-wrapper">
                            <div class="custom-date-display" onclick="toggleCalendar('cal-inv')">
                                <span class="date-text" id="text-inv">{{ date('m/d/Y') }}</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect></svg>
                            </div>
                            <div class="custom-calendar" id="cal-inv">
                                <div class="cal-header">
                                    <button type="button" onclick="changeMonth('cal-inv', -1)">‹</button>
                                    <span class="month-year">Loading...</span>
                                    <button type="button" onclick="changeMonth('cal-inv', 1)">›</button>
                                </div>
                                <div class="cal-days-grid"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. DUE DATE (ONCLICK FORCED) -->
                    <div>
                        <label class="ag-label">Due Date *</label>
                        <div class="custom-datepicker-wrapper">
                            <div class="custom-date-display" onclick="toggleCalendar('cal-due')">
                                <span class="date-text" id="text-due">mm/dd/yyyy</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect></svg>
                            </div>
                            <div class="custom-calendar" id="cal-due">
                                <div class="cal-header">
                                    <button type="button" onclick="changeMonth('cal-due', -1)">‹</button>
                                    <span class="month-year">Loading...</span>
                                    <button type="button" onclick="changeMonth('cal-due', 1)">›</button>
                                </div>
                                <div class="cal-days-grid"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 3. CUSTOMER DROPDOWN (ONCLICK FORCED) -->
                    <div>
                        <label class="ag-label">Customer *</label>
                        <div class="custom-dropdown" id="dd-customer">
                            <div class="custom-dropdown-trigger" onclick="toggleDropdown('dd-customer')">
                                <span>Select Customer</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" onclick="selectItem('dd-customer', this)">Customer A</div>
                                <div class="custom-dropdown-item" onclick="selectItem('dd-customer', this)">Customer B</div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. WAREHOUSE DROPDOWN (ONCLICK FORCED) -->
                    <div>
                        <label class="ag-label">Warehouse *</label>
                        <div class="custom-dropdown" id="dd-warehouse">
                            <div class="custom-dropdown-trigger" onclick="toggleDropdown('dd-warehouse')">
                                <span>Select Warehouse</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" onclick="selectItem('dd-warehouse', this)">Main Warehouse</div>
                                <div class="custom-dropdown-item" onclick="selectItem('dd-warehouse', this)">Secondary</div>
                            </div>
                        </div>
                    </div>

                    <div><label class="ag-label">Payment Terms</label><input type="text" class="ag-input" placeholder="e.g., Net 30"></div>
                    <div><label class="ag-label">Notes</label><textarea class="ag-input" rows="1" placeholder="Additional notes..."></textarea></div>
                </div>
            </div>

            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        </div>
                        <h2 class="ag-card-title">Sales Invoice Items</h2>
                    </div>
                    <button type="button" id="add-item-btn" class="ag-btn-green" style="padding: 8px 16px; font-size: 13px;">+ Add Item</button>
                </div>

                <table class="ag-table">
                    <thead>
                        <tr>
                            <th>Product *</th><th>Qty *</th><th>Unit Price *</th><th>Discount %</th><th>Tax</th><th>Total</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="items-table-body">
                        <tr>
                            <td><input type="text" class="ag-input" placeholder="Product name"></td>
                            <td><input type="number" class="ag-input qty-input" value="1"></td>
                            <td><input type="number" class="ag-input price-input" value="0"></td>
                            <td><input type="number" class="ag-input discount-input" value="0"></td>
                            <td><span style="color: #94a3b8; font-size: 13px;">No tax</span></td>
                            <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
                            <td style="text-align: center;"><button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer;">✖</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="add-another-item-btn" class="ag-btn-dashed">+ Add another item</button>
            </div>
            
            <div class="ag-bottom-bar">
                <div class="ag-item-count"><span id="item-count">1 item added</span></div>
                <div style="display: flex; gap: 12px;">
                    <a href="#" class="ag-btn-outline">Cancel</a>
                    <button type="submit" class="ag-btn-green">Create Invoice</button>
                </div>
            </div>
        </div>

        <div class="ag-col-right">
            <div class="ag-card">
                <div class="ag-card-header"><div class="ag-card-header-left"><div class="ag-icon-box">🧾</div><h2 class="ag-card-title">Invoice Summary</h2></div></div>
                <div class="ag-summary-row"><span>Subtotal</span><span id="summary-subtotal" style="font-weight: 600; color: #0f172a;">$0.00</span></div>
                <div class="ag-summary-row"><span>Discount</span><span style="font-weight: 600; color: #ef4444;">-$0.00</span></div>
                <div class="ag-summary-row"><span>Tax</span><span style="font-weight: 600; color: #0f172a;">$0.00</span></div>
                <div class="ag-summary-total"><span>Total</span><span id="summary-total">$0.00</span></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ==========================================
    // 1. FORCED GLOBAL FUNCTIONS (Inline onclick)
    // ==========================================
    
    // Dropdown Toggle
    function toggleDropdown(id) {
        const dd = document.getElementById(id);
        const isOpen = dd.classList.contains('open');
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
        if (!isOpen) dd.classList.add('open');
    }

    // Dropdown Select
    function selectItem(ddId, element) {
        const dd = document.getElementById(ddId);
        const textSpan = dd.querySelector('.custom-dropdown-trigger span');
        textSpan.innerText = element.innerText;
        textSpan.style.color = '#0f172a';
        textSpan.style.fontWeight = '600';
        dd.classList.remove('open');
    }

    // Calendar State & Toggle
    const calendarState = {};
    function toggleCalendar(id) {
        const cal = document.getElementById(id);
        const isOpen = cal.classList.contains('open');
        document.querySelectorAll('.custom-calendar').forEach(c => c.classList.remove('open'));
        if (!isOpen) {
            cal.classList.add('open');
            renderCalendar(id); 
        }
    }

    // Calendar Month Change
    function changeMonth(calId, direction) {
        if(!calendarState[calId]) {
            const now = new Date();
            calendarState[calId] = { month: now.getMonth(), year: now.getFullYear() };
        }
        calendarState[calId].month += direction;
        if (calendarState[calId].month < 0) { calendarState[calId].month = 11; calendarState[calId].year--; }
        if (calendarState[calId].month > 11) { calendarState[calId].month = 0; calendarState[calId].year++; }
        renderCalendar(calId);
    }

    // Calendar Renderer
    function renderCalendar(calId) {
        const cal = document.getElementById(calId);
        const grid = cal.querySelector('.cal-days-grid');
        const monthLabel = cal.querySelector('.month-year');
        const targetId = (calId === 'cal-inv') ? 'text-inv' : 'text-due';
        const textTarget = document.getElementById(targetId);

        if (!calendarState[calId]) {
            const now = new Date();
            calendarState[calId] = { month: now.getMonth(), year: now.getFullYear() };
        }

        const { month, year } = calendarState[calId];
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        monthLabel.innerText = `${monthNames[month]} ${year}`;

        grid.innerHTML = `<div class="cal-day-name">Su</div><div class="cal-day-name">Mo</div><div class="cal-day-name">Tu</div><div class="cal-day-name">We</div><div class="cal-day-name">Th</div><div class="cal-day-name">Fr</div><div class="cal-day-name">Sa</div>`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            grid.innerHTML += `<div class="cal-day filler"></div>`;
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'cal-day';
            dayDiv.innerText = i;
            dayDiv.onclick = function() {
                textTarget.innerText = `${String(month+1).padStart(2,'0')}/${String(i).padStart(2,'0')}/${year}`;
                textTarget.style.color = '#0f172a';
                textTarget.style.fontWeight = '600';
                cal.classList.remove('open');
            };
            grid.appendChild(dayDiv);
        }
    }

    // Close on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown')) {
            document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
        }
        if (!e.target.closest('.custom-datepicker-wrapper')) {
            document.querySelectorAll('.custom-calendar').forEach(c => c.classList.remove('open'));
        }
    });

    // ==========================================
    // 2. TABLE & CALCULATION LOGIC (Timeout used)
    // ==========================================
    setTimeout(function() {
        const addItemBtn = document.getElementById('add-item-btn');
        const addAnotherBtn = document.getElementById('add-another-item-btn');
        const tableBody = document.getElementById('items-table-body');
        const itemCountEl = document.getElementById('item-count');
        let itemCount = 1;

        function createItemRow() {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="ag-input" placeholder="Product name"></td>
                <td><input type="number" class="ag-input qty-input" value="1"></td>
                <td><input type="number" class="ag-input price-input" value="0"></td>
                <td><input type="number" class="ag-input discount-input" value="0"></td>
                <td><span style="color: #94a3b8; font-size: 13px;">No tax</span></td>
                <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
                <td style="text-align: center;"><button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer;">✖</button></td>
            `;
            tableBody.appendChild(tr);
            itemCount++;
            updateItemCount();
            attachRowEvents(tr);
        }

        function attachRowEvents(row) {
            row.querySelector('.remove-row').addEventListener('click', function() {
                row.remove();
                itemCount--;
                updateItemCount();
                calculateGrandTotal();
            });
            const qtyInput = row.querySelector('.qty-input');
            const priceInput = row.querySelector('.price-input');
            const discountInput = row.querySelector('.discount-input');
            const rowTotal = row.querySelector('.row-total');
            const calculateRow = () => {
                let qty = parseFloat(qtyInput.value) || 0;
                let price = parseFloat(priceInput.value) || 0;
                let discount = parseFloat(discountInput.value) || 0;
                let total = (qty * price) - discount;
                rowTotal.textContent = '$' + total.toFixed(2);
                calculateGrandTotal();
            };
            qtyInput.addEventListener('input', calculateRow);
            priceInput.addEventListener('input', calculateRow);
            discountInput.addEventListener('input', calculateRow);
        }

        function updateItemCount() {
            if(itemCount > 0) { itemCountEl.textContent = itemCount + ' item' + (itemCount > 1 ? 's' : '') + ' added'; } 
            else { itemCountEl.textContent = '0 items added'; }
        }

        function calculateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.row-total').forEach(total => {
                grandTotal += parseFloat(total.textContent.replace('$', '')) || 0;
            });
            document.getElementById('summary-subtotal').textContent = '$' + grandTotal.toFixed(2);
            document.getElementById('summary-total').textContent = '$' + grandTotal.toFixed(2);
        }

        const firstRow = tableBody.querySelector('tr');
        if(firstRow) attachRowEvents(firstRow);
        if(addItemBtn) addItemBtn.addEventListener('click', createItemRow);
        if(addAnotherBtn) addAnotherBtn.addEventListener('click', createItemRow);

    }, 300);
</script>
@endpush