// public/js/cards.js

document.addEventListener('DOMContentLoaded', function() {
    
    // ==========================================
    // 1. Product / Service Toggle Logic
    // ==========================================
    const radioLabels = document.querySelectorAll('.ag-radio-label');
    const warehouseField = document.getElementById('warehouse-field');
    const serviceField = document.getElementById('service-field');
    const itemsTitle = document.getElementById('items-title');
    const colProductTitle = document.getElementById('col-product-title');

    radioLabels.forEach(label => {
        label.addEventListener('click', function() {
            radioLabels.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            const value = this.querySelector('input[type="radio"]').value;

            if (value === 'service') {
                warehouseField.style.display = 'none';
                serviceField.style.display = 'block';
                itemsTitle.textContent = 'Sales Invoice Items (Service)';
                colProductTitle.textContent = 'Service *';
            } else {
                warehouseField.style.display = 'block';
                serviceField.style.display = 'none';
                itemsTitle.textContent = 'Sales Invoice Items (Product)';
                colProductTitle.textContent = 'Product *';
            }
        });
    });

    // ==========================================
    // 2. Add Row & Calculation Logic
    // ==========================================
    const addItemBtn = document.getElementById('add-item-btn');
    const addAnotherBtn = document.getElementById('add-another-item-btn');
    const tableBody = document.getElementById('items-table-body');
    
    let itemCount = 1; 

    function createItemRow() {
        const isService = document.querySelector('input[name="invoice_type"]:checked').value === 'service';
        const placeholderText = isService ? 'Select Service' : 'Select Product';

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <select class="ag-input item-select" style="padding: 8px 10px;">
                    <option>${placeholderText}</option>
                    <option>Item A</option>
                    <option>Item B</option>
                </select>
            </td>
            <td><input type="number" class="ag-input qty-input" value="1" style="padding: 8px 10px;"></td>
            <td><input type="number" class="ag-input price-input" value="0" style="padding: 8px 10px;"></td>
            <td><input type="number" class="ag-input discount-input" value="0" style="padding: 8px 10px;"></td>
            <td><span style="color: #94a3b8; font-size: 13px;">No tax</span></td>
            <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
            <td style="text-align: center;">
                <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 18px;">🗑️</button>
            </td>
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
        const countDisplay = document.getElementById('item-count-display');
        if(itemCount > 0) {
            countDisplay.style.display = 'flex';
            countDisplay.innerHTML = `<span style="font-size: 18px;">✔️</span> ${itemCount} item(s) added`;
        } else {
            countDisplay.style.display = 'none';
        }
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        const rowTotals = document.querySelectorAll('.row-total');
        rowTotals.forEach(total => {
            grandTotal += parseFloat(total.textContent.replace('$', '')) || 0;
        });

        document.getElementById('summary-subtotal').textContent = '$' + grandTotal.toFixed(2);
        document.getElementById('summary-total').textContent = '$' + grandTotal.toFixed(2);
        document.getElementById('total-amount-input').value = grandTotal.toFixed(2);
    }

    const firstRow = tableBody.querySelector('tr');
    if(firstRow) attachRowEvents(firstRow);

    if(addItemBtn) addItemBtn.addEventListener('click', createItemRow);
    if(addAnotherBtn) addAnotherBtn.addEventListener('click', createItemRow);

});