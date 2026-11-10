document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 1. CACHE DOM ELEMENTS
    // ==========================================
    const filterToggle = document.getElementById('vdFilterToggle');
    const filterPanel = document.getElementById('vdFilterPanel');
    const viewButtons = document.querySelectorAll('.vd-view-btn');
    const tableWrapper = document.querySelector('.vd-table-wrapper');
    const tableRows = document.querySelectorAll('.vd-table tbody tr');
    const searchInput = document.querySelector('.vd-search-input');
    const resultsInfo = document.querySelector('.vd-results-info');
    const applyFiltersBtn = document.getElementById('applyFiltersBtn');
    const clearFiltersBtn = document.getElementById('clearFiltersBtn');
    
    // Custom Dropdown
    const perPageDropdown = document.getElementById('perPageDropdown');
    const perPageToggle = document.getElementById('perPageToggle');
    const perPageMenu = document.getElementById('perPageMenu');
    const perPageLabel = document.getElementById('perPageLabel');

    // ==========================================
    // 2. TOGGLE FILTER PANEL
    // ==========================================
    if (filterToggle && filterPanel) {
        filterToggle.addEventListener('click', function() {
            filterPanel.classList.toggle('show');
        });
    }

    // ==========================================
    // 3. VIEW TOGGLE (List / Grid)
    // ==========================================
    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            if (this.title === 'Grid View') {
                tableWrapper.classList.add('grid-view');
            } else {
                tableWrapper.classList.remove('grid-view');
            }
        });
    });

    // ==========================================
    // 4. SEARCH FUNCTIONALITY
    // ==========================================
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if (rowText.includes(query)) { 
                    row.style.display = ''; 
                    visibleCount++; 
                } else { 
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = visibleCount === 0 ? `No results found` : `Showing ${visibleCount} results`;
        });
    }

    // ==========================================
    // 5. CUSTOM PER PAGE DROPDOWN
    // ==========================================
    if (perPageToggle && perPageMenu) {
        perPageToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            perPageDropdown.classList.toggle('open');
        });

        document.querySelectorAll('.vd-custom-dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                // Update active state
                perPageMenu.querySelectorAll('.vd-custom-dropdown-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Update Label
                perPageLabel.textContent = this.textContent;
                
                // Close Menu
                perPageDropdown.classList.remove('open');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!perPageDropdown.contains(e.target)) {
                perPageDropdown.classList.remove('open');
            }
        });
    }

    // ==========================================
    // 6. APPLY & CLEAR FILTERS
    // ==========================================
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            const codeVal = document.getElementById('filterCode').value.toLowerCase();
            const companyVal = document.getElementById('filterCompany').value.toLowerCase();
            const taxVal = document.getElementById('filterTax').value.toLowerCase();
            
            let visibleCount = 0;
            tableRows.forEach(row => {
                const codeText = row.querySelector('.col-code')?.innerText.toLowerCase() || '';
                const companyText = row.querySelector('.col-name')?.innerText.toLowerCase() || '';
                const taxText = row.querySelector('.col-tax')?.innerText.toLowerCase() || '';
                
                if (codeText.includes(codeVal) && companyText.includes(companyVal) && taxText.includes(taxVal)) {
                    row.style.display = ''; 
                    visibleCount++;
                } else {
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} filtered results`;
            filterPanel.classList.remove('show'); // Close panel after apply
        });
    }

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            document.getElementById('filterCode').value = '';
            document.getElementById('filterCompany').value = '';
            document.getElementById('filterTax').value = '';
            
            tableRows.forEach(row => row.style.display = '');
            if (resultsInfo) resultsInfo.textContent = `Showing ${tableRows.length} results`;
        });
    }

    // ==========================================
    // 7. 3-DOT ACTION MENU (Dynamic Injection)
    // ==========================================
    
    // 1. Get the hidden template from the Blade file
    const menuTemplate = document.getElementById('action-menu-template');

    // 2. Loop through every 3-dot button and inject the menu
    document.querySelectorAll('.action-menu-btn').forEach(btn => {
        if (menuTemplate) {
            // Clone the template content
            const clone = menuTemplate.content.cloneNode(true);
            
            // Insert it immediately after the button
            btn.parentNode.insertBefore(clone, btn.nextSibling);
        }
    });

    // 3. Toggle Logic (Open/Close)
    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        
        if (menuBtn) {
            e.stopPropagation();
            // The dropdown is now the nextElementSibling because we injected it right after the button
            const dropdown = menuBtn.nextElementSibling;
            
            // Close all other dropdowns first
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });

            // Toggle current
            if (dropdown && dropdown.classList.contains('action-dropdown')) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        } else {
            // Clicking outside closes all
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});