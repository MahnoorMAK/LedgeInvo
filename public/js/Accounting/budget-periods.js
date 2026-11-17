document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Initialize Calendar
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#dateRangePicker", {
            dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "above", monthSelectorType: "static", showMonths: 1
        });
    }

    // 2. Search Functionality
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

    // 3. Dropdowns & Filters
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

    window.addEventListener('click', () => { dropdowns.forEach(d => d.classList.remove('show')); });

    // 4. Custom Status Dropdown in Filter
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

    // 5. Apply & Clear Filters
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

    // 6. Tabs
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

    // 7. Action Icons (Delete)
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('fa-xmark') && e.target.classList.contains('action-icon')) {
            if(confirm('Are you sure you want to close/delete this period?')) {
                e.target.closest('tr').remove();
            }
        }
    });

});