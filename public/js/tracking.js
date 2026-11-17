document.addEventListener("DOMContentLoaded", () => {
    
    // ==========================================
    // 1. INITIALIZE FLATPICKR CALENDAR
    // ==========================================
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#trackingDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "above", monthSelectorType: "static" });
        flatpickr("#projectedDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "above", monthSelectorType: "static" });
    }

    // ==========================================
    // 2. SEARCH FUNCTIONALITY
    // ==========================================
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        document.querySelectorAll('.row-item').forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
        });
    }
    if (searchBtn) searchBtn.addEventListener('click', (e) => { e.preventDefault(); performSearch(); });
    if (searchInput) searchInput.addEventListener('keyup', () => performSearch());

    // ==========================================
    // 3. NORMAL DROPDOWNS & FILTER PANEL TOGGLE
    // ==========================================
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    const filterPanel = document.getElementById('filterPanel');
    const toggleFilterBtn = document.getElementById('toggleFilterBtn');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.drop-btn');
        if(btn) btn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdowns.forEach(d => { if(d !== dropdown) d.classList.remove('show'); });
            dropdown.classList.toggle('show');
        });
    });

    if (toggleFilterBtn && filterPanel) {
        toggleFilterBtn.addEventListener('click', (e) => {
            e.preventDefault();
            filterPanel.classList.toggle('show');
        });
    }

    window.addEventListener('click', () => { dropdowns.forEach(d => d.classList.remove('show')); });

    // ==========================================
    // 4. CUSTOM STATUS DROPDOWN IN FILTER
    // ==========================================
    const statusFilterDropdown = document.getElementById('statusFilterDropdown');
    const statusOptions = statusFilterDropdown ? statusFilterDropdown.querySelectorAll('.custom-modal-option') : [];
    const selectedStatusFilter = document.getElementById('selectedStatusFilter');

    if (statusFilterDropdown) {
        const trigger = statusFilterDropdown.querySelector('.custom-modal-trigger');
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            statusFilterDropdown.classList.toggle('open');
        });
        statusOptions.forEach(option => {
            option.addEventListener('click', () => {
                statusOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                selectedStatusFilter.textContent = option.textContent;
                statusFilterDropdown.classList.remove('open');
            });
        });
        document.addEventListener('click', (e) => {
            if (!statusFilterDropdown.contains(e.target)) statusFilterDropdown.classList.remove('open');
        });
    }

    // ==========================================
    // 5. APPLY & CLEAR FILTER BUTTONS
    // ==========================================
    const applyFilterBtn = document.getElementById('applyFilterBtn');
    const clearFilterBtn = document.getElementById('clearFilterBtn');

    if (applyFilterBtn) {
        applyFilterBtn.addEventListener('click', () => {
            const selectedOpt = statusFilterDropdown.querySelector('.custom-modal-option.selected');
            const filterVal = selectedOpt ? selectedOpt.getAttribute('data-value') : 'all';
            document.querySelectorAll('.row-item').forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                if (filterVal === 'all' || rowStatus === filterVal) row.style.display = '';
                else row.style.display = 'none';
            });
            filterPanel.classList.remove('show');
        });
    }
    if (clearFilterBtn) {
        clearFilterBtn.addEventListener('click', () => {
            selectedStatusFilter.textContent = 'All Status';
            statusOptions.forEach(o => o.classList.remove('selected'));
            document.querySelectorAll('.row-item').forEach(row => row.style.display = '');
        });
    }

    // ==========================================
    // 6. TABS
    // ==========================================
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const target = tab.getAttribute('data-target');
            document.querySelectorAll('.row-item').forEach(row => {
                const status = row.getAttribute('data-status');
                if (target === 'all' || target === status) row.style.display = '';
                else row.style.display = 'none';
            });
        });
    });

    // ==========================================
    // 7. CREATE TRACKING MODAL
    // ==========================================
    const modal = document.getElementById('createTrackingModal');
    const openBtn = document.getElementById('openCreateModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelModalBtn');
    const form = document.getElementById('createTrackingForm');
    const tableBody = document.getElementById('table-body');

    if (openBtn) openBtn.addEventListener('click', () => { if(modal) modal.classList.add('show'); });
    function closeModal() { if(modal) { modal.classList.remove('show'); if(form) form.reset(); } }
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    // Custom Dropdown in Modal (Goal)
    const goalDropdown = document.getElementById('goalDropdown');
    const goalOptions = goalDropdown ? goalDropdown.querySelectorAll('.custom-modal-option') : [];
    const selectedGoalText = document.getElementById('selectedGoalText');
    const goalHiddenInput = document.getElementById('goalName');

    if (goalDropdown) {
        const trigger = goalDropdown.querySelector('.custom-modal-trigger');
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.custom-modal-dropdown').forEach(d => { if(d !== goalDropdown) d.classList.remove('open'); });
            goalDropdown.classList.toggle('open');
        });
        goalOptions.forEach(option => {
            option.addEventListener('click', () => {
                selectedGoalText.textContent = option.textContent;
                goalHiddenInput.value = option.getAttribute('data-value');
                goalDropdown.classList.remove('open');
            });
        });
    }

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const goalName = document.getElementById('goalName').value;
            const date = document.getElementById('trackingDate').value;
            const contribAmount = document.getElementById('contribAmount').value;
            const currentAmount = document.getElementById('currentAmount').value;
            const progressPercent = document.getElementById('progressPercent').value;
            const daysRemaining = document.getElementById('daysRemaining').value;

            if(!goalName) { alert('Please select a Goal'); return; }

            let statusText = 'On Track', statusClass = 'badge-ontrack';
            if(parseInt(progressPercent) < 10) { statusText = 'Behind'; statusClass = 'badge-behind'; }
            else if(parseInt(progressPercent) >= 50) { statusText = 'Ahead'; statusClass = 'badge-ahead'; }

            const newRow = document.createElement('tr');
            newRow.className = 'row-item';
            newRow.setAttribute('data-status', statusText.toLowerCase());
            newRow.innerHTML = `
                <td>
                    <div class="goal-name">${goalName}</div>
                    <div class="goal-type"><i class="fa-regular fa-circle-dot"></i> Goal Type: Custom</div>
                </td>
                <td>
                    <div class="date"><i class="fa-regular fa-calendar"></i> ${date}</div>
                    <div class="days-left">${daysRemaining} days left</div>
                </td>
                <td>
                    <div class="amount">$${parseFloat(contribAmount).toLocaleString('en-US', {minimumFractionDigits: 2})}</div>
                    <div class="current">$${parseFloat(currentAmount).toLocaleString('en-US', {minimumFractionDigits: 2})}</div>
                </td>
                <td>
                    <div class="progress-text">${progressPercent}%</div>
                    <div class="progress-bar"><div class="progress-fill ${statusClass === 'badge-ahead' ? 'fill-green' : ''}" style="width: ${progressPercent}%;"></div></div>
                </td>
                <td><span class="status ${statusClass}">${statusText}</span></td>
                <td class="actions">
                    <i class="fa-regular fa-eye action-icon"></i>
                    <i class="fa-regular fa-pen-to-square action-icon"></i>
                    <i class="fa-regular fa-trash-can action-icon delete"></i>
                </td>
            `;
            if(tableBody) tableBody.insertBefore(newRow, tableBody.firstChild);
            closeModal();
        });
    }

    // ==========================================
    // 8. DELETE ACTION
    // ==========================================
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('fa-trash-can')) {
            if(confirm('Are you sure you want to delete this record?')) e.target.closest('tr').remove();
        }
    });
});