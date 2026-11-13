// public/js/sales-invoices.js

document.addEventListener('DOMContentLoaded', function() {
    
    const addItemBtn = document.getElementById('add-item-btn');
    const addAnotherBtn = document.getElementById('add-another-item-btn');
    const tableBody = document.getElementById('items-table-body');
    const itemCountEl = document.getElementById('item-count');
    
    let itemCount = 1; 

    function createItemRow() {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <select class="ag-input">
                    <option>Select Product</option>
                </select>
            </td>
            <td><input type="number" class="ag-input qty-input" value="1"></td>
            <td><input type="number" class="ag-input price-input" value="0"></td>
            <td><input type="number" class="ag-input discount-input" value="0"></td>
            <td><span style="color: #94a3b8; font-size: 13px;">No tax</span></td>
            <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
            <td style="text-align: center;">
                <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
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
        if(itemCount > 0) {
            itemCountEl.textContent = itemCount + ' item' + (itemCount > 1 ? 's' : '') + ' added';
        } else {
            itemCountEl.textContent = '0 items added';
        }
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
});