document.addEventListener("DOMContentLoaded", () => {
    
    // ==========================================
    // 1. INITIALIZE FLATPICKR CALENDAR (Custom Static Dropdown)
    // ==========================================
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#dueDate", { 
            dateFormat: "Y-m-d", 
            altInput: true, 
            altFormat: "F j, Y", 
            disableMobile: true, 
            position: "above",
            static: false,
            showMonths: 1,
            monthSelectorType: "static" // Yeh custom dropdown banata hai
        });
    }

    // ==========================================
    // 2. NORMAL DROPDOWNS & FILTER PANEL
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

    if (toggleFilterBtn) {
        toggleFilterBtn.addEventListener('click', (e) => {
            e.preventDefault();
            filterPanel.classList.toggle('show');
        });
    }

    window.addEventListener('click', (e) => {
        dropdowns.forEach(d => d.classList.remove('show'));
    });

    // ==========================================
    // 3. FILTER CUSTOM DROPDOWN
    // ==========================================
    const filterDropdown = document.getElementById('filterStatusDropdown');
    const filterOptions = filterDropdown ? filterDropdown.querySelectorAll('.custom-modal-option') : [];
    const selectedFilterStatus = document.getElementById('selectedFilterStatus');
    
    if (filterDropdown) {
        const trigger = filterDropdown.querySelector('.custom-modal-trigger');
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            filterDropdown.classList.toggle('open');
        });

        filterOptions.forEach(option => {
            option.addEventListener('click', () => {
                filterOptions.forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                selectedFilterStatus.textContent = option.textContent;
                filterDropdown.classList.remove('open');
            });
        });
    }

    // Apply / Clear Filters
    const applyFilterBtn = document.getElementById('applyFilterBtn');
    const clearFilterBtn = document.getElementById('clearFilterBtn');

    if (applyFilterBtn) {
        applyFilterBtn.addEventListener('click', () => {
            const selectedOpt = filterDropdown.querySelector('.custom-modal-option.selected');
            const filterVal = selectedOpt ? selectedOpt.getAttribute('data-value') : 'all';

            document.querySelectorAll('.row-item').forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                if (filterVal === 'all' || rowStatus === filterVal) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            filterPanel.classList.remove('show');
        });
    }

    if (clearFilterBtn) {
        clearFilterBtn.addEventListener('click', () => {
            selectedFilterStatus.textContent = 'Filter by Status';
            filterOptions.forEach(o => o.classList.remove('selected'));
            document.querySelectorAll('.row-item').forEach(row => row.style.display = '');
        });
    }

    // ==========================================
    // 4. TABS
    // ==========================================
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const target = tab.getAttribute('data-target');
            document.querySelectorAll('.row-item').forEach(row => {
                const type = row.getAttribute('data-type');
                if (target === 'all' || target === type) row.style.display = '';
                else row.style.display = 'none';
            });
        });
    });

    // ==========================================
    // 5. CUSTOM MODAL DROPDOWNS (Goal & Status)
    // ==========================================
    function initModalDropdown(dropdownId, textId, hiddenInputId) {
        const dropdown = document.getElementById(dropdownId);
        if (!dropdown) return;
        const trigger = dropdown.querySelector('.custom-modal-trigger');
        const options = dropdown.querySelectorAll('.custom-modal-option');
        const selectedText = document.getElementById(textId);
        const hiddenInput = document.getElementById(hiddenInputId);

        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.custom-modal-dropdown').forEach(d => { if(d !== dropdown) d.classList.remove('open'); });
            dropdown.classList.toggle('open');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                selectedText.textContent = option.textContent;
                hiddenInput.value = option.getAttribute('data-value');
                dropdown.classList.remove('open');
            });
        });
    }
    initModalDropdown('goalDropdown', 'selectedGoalText', 'milestoneGoal');
    initModalDropdown('statusDropdown', 'selectedStatusText', 'milestoneStatus');

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.custom-modal-dropdown')) {
            document.querySelectorAll('.custom-modal-dropdown').forEach(d => d.classList.remove('open'));
        }
    });

    // ==========================================
    // 6. CREATE MILESTONE MODAL
    // ==========================================
    const modal = document.getElementById('createMilestoneModal');
    const openBtn = document.getElementById('openCreateModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelModalBtn');
    const form = document.getElementById('createMilestoneForm');
    const tableBody = document.getElementById('table-body');

    if (openBtn) openBtn.addEventListener('click', () => { if(modal) modal.classList.add('show'); });
    function closeModal() { if(modal) { modal.classList.remove('show'); if(form) form.reset(); } }
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('milestoneName').value;
            const goal = document.getElementById('milestoneGoal').value;
            const date = document.getElementById('dueDate').value;
            const status = document.getElementById('milestoneStatus').value;

            if(!goal || !status) { alert('Please select Goal and Status'); return; }

            let type = status.toLowerCase().replace(' ', '');
            let statusClass = type === 'completed' ? 'status-completed' : (type === 'inprogress' ? 'status-inprogress' : 'status-pending');

            const newRow = document.createElement('tr');
            newRow.className = 'row-item';
            newRow.setAttribute('data-status', status);
            newRow.setAttribute('data-type', type);

            newRow.innerHTML = `
                <td><div class="milestone-name">${name}</div><span class="badge-sub text-muted">M-00${Math.floor(Math.random() * 9) + 1}</span></td>
                <td><span class="goal-badge">${goal}</span></td>
                <td><span class="date-text"><i class="fa-regular fa-calendar"></i> ${date}</span></td>
                <td><span class="status-badge ${statusClass}">${status}</span></td>
                <td>
                    <div class="progress-bar"><div class="progress-fill" style="width: 0%;"></div></div>
                    <span class="progress-text">0%</span>
                </td>
                <td class="actions"><i class="fa-regular fa-trash-can action-icon"></i></td>
            `;
            if(tableBody) tableBody.insertBefore(newRow, tableBody.firstChild);
            closeModal();
        });
    }

    // ==========================================
    // 7. SEARCH
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
    // 8. DELETE ACTION
    // ==========================================
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('fa-trash-can')) {
            if(confirm('Are you sure you want to delete this milestone?')) e.target.closest('tr').remove();
        }
    });
});