document.addEventListener('DOMContentLoaded', function() {

    // 1. Search Functionality
    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');
    
    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let searchTerm = searchInput.value.toLowerCase();
            let rows = document.querySelectorAll('#table-body tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    }

    // 2. Dropdowns Toggle (10 per page)
    const perPageBtn = document.getElementById('perPageBtn');
    const perPageMenu = document.getElementById('perPageMenu');

    if(perPageBtn && perPageMenu) {
        perPageBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            perPageMenu.classList.toggle('show');
        });
    }

    // Document click to close dropdowns
    document.addEventListener('click', function(e) {
        if(perPageMenu && !perPageBtn.contains(e.target) && !perPageMenu.contains(e.target)) {
            perPageMenu.classList.remove('show');
        }
    });

    // 3. Filter Panel Toggle
    const filterToggleBtn = document.getElementById('filterToggleBtn');
    const filterPanel = document.getElementById('filterPanel');

    if(filterToggleBtn && filterPanel) {
        filterToggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            filterPanel.classList.toggle('show');
        });
    }

    // 4. Apply Filter (Demo Functionality)
    const applyFilterBtn = document.getElementById('applyFilterBtn');
    const statusFilter = document.getElementById('statusFilter');
    
    if(applyFilterBtn && statusFilter) {
        applyFilterBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let filterValue = statusFilter.value.toLowerCase();
            let rows = document.querySelectorAll('#table-body tr');

            rows.forEach(row => {
                let statusText = row.textContent.toLowerCase();
                // Basic logic for demo
                if(filterValue === 'all' || statusText.includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            filterPanel.classList.remove('show'); // Close panel after applying
        });
    }

    // 5. Clear Filter
    const clearFilterBtn = document.getElementById('clearFilterBtn');
    if(clearFilterBtn) {
        clearFilterBtn.addEventListener('click', function(e) {
            e.preventDefault();
            statusFilter.value = 'all';
            let rows = document.querySelectorAll('#table-body tr');
            rows.forEach(row => row.style.display = '');
        });
    }
});