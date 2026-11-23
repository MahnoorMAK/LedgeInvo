// public/js/sales-invoices.js

document.addEventListener('DOMContentLoaded', function() {
    
    // ==========================================
    // 1. FLATPICKR CALENDAR INITIALIZATION
    // ==========================================
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#invoiceDate", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "F j, Y",
            defaultDate: "today",
            disableMobile: true,
            position: "below",
            monthSelectorType: "static"
        });

        flatpickr("#dueDate", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "F j, Y",
            disableMobile: true,
            position: "below",
            monthSelectorType: "static"
        });
    }

    // ==========================================
    // 2. CUSTOM DROPDOWNS
    // ==========================================
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.custom-dropdown-trigger');
        const triggerText = trigger.querySelector('span');
        const items = dropdown.querySelectorAll('.custom-dropdown-item');
        const hiddenInput = dropdown.parentElement.querySelector('input[type="hidden"]');

        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelectorAll('.custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.toggle('open');
        });

        items.forEach(item => {
            item.addEventListener('click', function() {
                triggerText.textContent = this.textContent;
                triggerText.style.color = '#0f172a';
                triggerText.style.fontWeight = '600';
                if(hiddenInput) hiddenInput.value = this.getAttribute('data-value');
                dropdown.classList.remove('open');
            });
        });
    });

    document.addEventListener('click', function() {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
    });

    // ==========================================
    // 3. ITEMS TABLE CALCULATIONS
    // ==========================================
    const addItemBtn = document.getElementById('add-item-btn');
    const addAnotherBtn = document.getElementById('add-another-item-btn');
    const tableBody = document.getElementById('items-table-body');
    const itemCountEl = document.getElementById('item-count');
    
    let itemCount = 1; 

    function calculateRow(row) {
        const qty = parseFloat(row.querySelector('.qty-input').value) || 0;
        const price = parseFloat(row.querySelector('.price-input').value) || 0;
        const discount = parseFloat(row.querySelector('.discount-input').value) || 0;
        
        let total = (qty * price) - discount;
        row.querySelector('.row-total').textContent = '$' + total.toFixed(2);
        
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        let totalDiscount = 0;

        document.querySelectorAll('#items-table-body tr').forEach(row => {
            const qty = parseFloat(row.querySelector('.qty-input').value) || 0;
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            const discount = parseFloat(row.querySelector('.discount-input').value) || 0;
            
            grandTotal += (qty * price);
            totalDiscount += discount;
        });

        const finalTotal = grandTotal - totalDiscount;
        
        document.getElementById('summary-subtotal').textContent = '$' + grandTotal.toFixed(2);
        document.getElementById('summary-discount').textContent = '-$' + totalDiscount.toFixed(2);
        document.getElementById('summary-total').textContent = '$' + finalTotal.toFixed(2);
    }

    function attachRowEvents(row) {
        row.querySelector('.remove-row').addEventListener('click', function() {
            if(document.querySelectorAll('#items-table-body tr').length > 1) {
                row.remove();
                itemCount--;
                updateItemCount();
                calculateGrandTotal();
            } else {
                alert('At least one item is required.');
            }
        });

        row.querySelector('.qty-input').addEventListener('input', () => calculateRow(row));
        row.querySelector('.price-input').addEventListener('input', () => calculateRow(row));
        row.querySelector('.discount-input').addEventListener('input', () => calculateRow(row));
    }

    function updateItemCount() {
        if(itemCountEl) {
            itemCountEl.innerHTML = `<i class="fa-regular fa-circle-check" style="color: #7c3aed;"></i> <span>${itemCount} item${itemCount > 1 ? 's' : ''} added</span>`;
        }
    }

    function createItemRow() {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <select class="ag-input">
                    <option>Select Product</option>
                    <option>Product 1</option>
                    <option>Product 2</option>
                </select>
            </td>
            <td><input type="number" class="ag-input qty-input" value="1"></td>
            <td><input type="number" class="ag-input price-input" value="0"></td>
            <td><input type="number" class="ag-input discount-input" value="0"></td>
            <td><span style="color: #64748b; font-size: 13px;">No tax</span></td>
            <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
            <td style="text-align: center;">
                <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px;">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </td>
        `;
        tableBody.appendChild(tr);
        itemCount++;
        updateItemCount();
        attachRowEvents(tr);
        calculateGrandTotal();
    }

    const firstRow = tableBody.querySelector('tr');
    if(firstRow) {
        attachRowEvents(firstRow);
    }

    if(addItemBtn) addItemBtn.addEventListener('click', createItemRow);
    if(addAnotherBtn) addAnotherBtn.addEventListener('click', createItemRow);

    calculateGrandTotal();
});