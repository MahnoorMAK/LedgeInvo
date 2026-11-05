// public/js/journal.js

document.addEventListener('DOMContentLoaded', function() {
    
    const addLineBtn = document.getElementById('add-line-btn');
    const itemsBody = document.getElementById('journal-items-body');
    
    function calculateTotals() {
        let totalDebit = 0;
        let totalCredit = 0;

        document.querySelectorAll('.debit-input').forEach(input => {
            totalDebit += parseFloat(input.value) || 0;
        });

        document.querySelectorAll('.credit-input').forEach(input => {
            totalCredit += parseFloat(input.value) || 0;
        });

        document.getElementById('total-debit').textContent = '$' + totalDebit.toFixed(2);
        document.getElementById('total-credit').textContent = '$' + totalCredit.toFixed(2);

        const difference = Math.abs(totalDebit - totalCredit);
        document.getElementById('difference-amount').textContent = '$' + difference.toFixed(2);

        const statusBadge = document.getElementById('balance-status');
        
        if (totalDebit === totalCredit && totalDebit > 0) {
            statusBadge.textContent = 'Balanced';
            statusBadge.className = 'ag-badge-success';
            document.getElementById('difference-amount').style.color = 'var(--ag-green)';
        } else {
            statusBadge.textContent = 'Unbalanced';
            statusBadge.className = 'ag-badge-danger';
            document.getElementById('difference-amount').style.color = 'var(--ag-red)';
        }
    }

    function attachRowEvents(row) {
        row.querySelector('.remove-row').addEventListener('click', function() {
            row.remove();
            calculateTotals();
        });

        const debitInput = row.querySelector('.debit-input');
        const creditInput = row.querySelector('.credit-input');

        debitInput.addEventListener('input', function() {
            if (this.value > 0) creditInput.value = 0;
            calculateTotals();
        });

        creditInput.addEventListener('input', function() {
            if (this.value > 0) debitInput.value = 0;
            calculateTotals();
        });
    }

    addLineBtn.addEventListener('click', function() {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <select class="ag-input" style="padding: 8px 10px;">
                    <option>Select Account</option>
                    <option>Cash</option>
                    <option>Bank</option>
                    <option>Sales Revenue</option>
                </select>
            </td>
            <td><input type="text" class="ag-input" placeholder="Line description" style="padding: 8px 10px;"></td>
            <td><input type="number" class="ag-input debit-input" value="0" style="padding: 8px 10px;"></td>
            <td><input type="number" class="ag-input credit-input" value="0" style="padding: 8px 10px;"></td>
            <td style="text-align: center;">
                <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
            </td>
        `;
        itemsBody.appendChild(tr);
        attachRowEvents(tr);
    });

    const firstRow = itemsBody.querySelector('tr');
    if (firstRow) attachRowEvents(firstRow);
});