// public/js/sales-returns.js

// ==========================================
// GLOBAL CALENDAR FUNCTIONS
// ==========================================
const calendarState = {};

window.toggleCalendar = function(id) {
    const cal = document.getElementById(id);
    const isOpen = cal.classList.contains('open');
    document.querySelectorAll('.custom-calendar').forEach(c => c.classList.remove('open'));
    if (!isOpen) {
        cal.classList.add('open');
        renderCalendar(id); 
    }
}

window.changeMonth = function(calId, direction) {
    if(!calendarState[calId]) {
        const now = new Date();
        calendarState[calId] = { month: now.getMonth(), year: now.getFullYear() };
    }
    calendarState[calId].month += direction;
    if (calendarState[calId].month < 0) { calendarState[calId].month = 11; calendarState[calId].year--; }
    if (calendarState[calId].month > 11) { calendarState[calId].month = 0; calendarState[calId].year++; }
    renderCalendar(calId);
}

function renderCalendar(calId) {
    const cal = document.getElementById(calId);
    const grid = cal.querySelector('.cal-days-grid');
    const monthLabel = cal.querySelector('.month-year');

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
        // YEH HAI WOH LINE JO CLICK KO HANDLE KARTI HAI
        dayDiv.setAttribute('onclick', `selectReturnDate('${calId}', ${i}, ${month}, ${year})`);
        grid.appendChild(dayDiv);
    }
}

// GLOBAL FUNCTION (Onclick se call hoga)
window.selectReturnDate = function(calId, day, month, year) {
    const textTarget = document.getElementById('text-return');
    textTarget.innerText = `${String(month+1).padStart(2,'0')}/${String(day).padStart(2,'0')}/${year}`;
    textTarget.style.color = '#0f172a';
    textTarget.style.fontWeight = '600';
    
    document.getElementById(calId).classList.remove('open');
}


// ==========================================
// GLOBAL DROPDOWN FUNCTIONS
// ==========================================
window.toggleDropdown = function(id) {
    const dd = document.getElementById(id);
    const isOpen = dd.classList.contains('open');
    document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
    if (!isOpen) dd.classList.add('open');
}

window.selectItem = function(ddId, element) {
    const dd = document.getElementById(ddId);
    const textSpan = dd.querySelector('.custom-dropdown-trigger span');
    textSpan.innerText = element.innerText;
    textSpan.style.color = '#0f172a';
    textSpan.style.fontWeight = '600';
    dd.classList.remove('open');
}

// ==========================================
// LOAD ITEMS LOGIC
// ==========================================
window.loadReturnItems = function(invoiceNo, element) {
    const dd = document.getElementById('dd-invoice');
    const textSpan = dd.querySelector('.custom-dropdown-trigger span');
    textSpan.innerText = invoiceNo;
    textSpan.style.color = '#0f172a';
    textSpan.style.fontWeight = '600';
    dd.classList.remove('open');

    let dummyItems = [];
    if (invoiceNo === 'INV-001') {
        dummyItems = [
            { name: 'Cordless Drill Machine', qty: 2, price: 70.80 },
            { name: 'Face Cream', qty: 5, price: 52.18 }
        ];
    } else if (invoiceNo === 'INV-002') {
        dummyItems = [
            { name: 'Plant Pot', qty: 4, price: 32.48 }
        ];
    } else {
        dummyItems = [
            { name: 'Coffee Mug', qty: 10, price: 5.50 }
        ];
    }

    const itemsCard = document.getElementById('items-card');
    itemsCard.style.display = 'block';

    const tbody = document.getElementById('items-table-body');
    tbody.innerHTML = ''; 

    dummyItems.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.name}</td>
            <td>${item.qty}</td>
            <td><input type="number" class="return-qty-input" value="1" min="1" max="${item.qty}" data-price="${item.price}"></td>
            <td>$${item.price.toFixed(2)}</td>
            <td><strong class="row-total" style="color: #0f172a;">$${item.price.toFixed(2)}</strong></td>
        `;
        tbody.appendChild(tr);

        const qtyInput = tr.querySelector('.return-qty-input');
        qtyInput.addEventListener('input', calculateReturnTotal);
    });

    calculateReturnTotal();
}

// ==========================================
// CALCULATE TOTAL LOGIC
// ==========================================
function calculateReturnTotal() {
    let grandTotal = 0;
    let totalItems = 0;

    document.querySelectorAll('.return-qty-input').forEach(input => {
        let qty = parseInt(input.value) || 0;
        let max = parseInt(input.max);
        
        if (qty > max) { qty = max; input.value = max; }

        const price = parseFloat(input.getAttribute('data-price'));
        const rowTotal = qty * price;
        grandTotal += rowTotal;
        totalItems += qty;

        input.closest('tr').querySelector('.row-total').innerText = '$' + rowTotal.toFixed(2);
    });

    document.getElementById('summary-subtotal').innerText = '$' + grandTotal.toFixed(2);
    document.getElementById('summary-total').innerText = '$' + grandTotal.toFixed(2);
    
    document.getElementById('item-count-text').innerText = totalItems;

    const createBtn = document.getElementById('create-btn');
    if (totalItems > 0) {
        createBtn.classList.remove('ag-btn-disabled');
        createBtn.disabled = false;
    } else {
        createBtn.classList.add('ag-btn-disabled');
        createBtn.disabled = true;
    }
}

// ==========================================
// CLOSE ON OUTSIDE CLICK
// ==========================================
document.addEventListener('click', function(e) {
    if (!e.target.closest('.custom-dropdown')) {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
    }
    if (!e.target.closest('.custom-datepicker-wrapper')) {
        document.querySelectorAll('.custom-calendar').forEach(c => c.classList.remove('open'));
    }
});