document.addEventListener("DOMContentLoaded", function() {
    
    // 1. ADD / DELETE ROWS LOGIC
    window.addRow = function() {
        const tbody = document.getElementById('invoiceItemsBody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td>
                <select class="custom-select table-select">
                    <option value="" disabled selected>Select Product</option>
                    <option value="100">Item A</option>
                    <option value="200">Item B</option>
                </select>
            </td>
            <td><input type="number" class="custom-input table-input" value="1"></td>
            <td><input type="number" class="custom-input table-input" value="0"></td>
            <td><input type="number" class="custom-input table-input" value="0"></td>
            <td class="text-center text-muted">No tax</td>
            <td class="text-right font-bold">$0.00</td>
            <td class="text-center">
                <button type="button" class="btn-delete-row" onclick="deleteRow(this)"><i class="fa-regular fa-trash-can"></i></button>
            </td>
        `;
        tbody.appendChild(newRow);
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

    // 2. CUSTOM CALENDAR LOGIC
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
        e.preventDefault();
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    document.getElementById('nextMonth').addEventListener('click', function(e) {
        e.preventDefault();
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    document.addEventListener('click', function(e) {
        if (!calendarPopup.contains(e.target) && !e.target.closest('.custom-calendar-trigger')) {
            calendarPopup.classList.remove('active');
        }
    });
});