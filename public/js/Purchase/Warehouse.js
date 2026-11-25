/* public/js/Purchase/Warehouse.js */

document.addEventListener('DOMContentLoaded', function () {
    
    // CACHE ELEMENTS
    const filterToggle = document.getElementById('whFilterToggle');
    const filterPanel = document.getElementById('whFilterPanel');
    const viewButtons = document.querySelectorAll('.wh-view-btn');
    const tableWrapper = document.querySelector('.wh-table-wrapper');
    const searchInput = document.querySelector('.wh-search-input');
    const tableRows = document.querySelectorAll('.wh-table tbody tr');
    const resultsInfo = document.querySelector('.wh-results-info');
    
    // Dropdowns
    const dropdowns = document.querySelectorAll('.wh-custom-dropdown');
    const applyFiltersBtn = document.getElementById('whApplyFiltersBtn');
    const clearFiltersBtn = document.getElementById('whClearFiltersBtn');

    // TOGGLE FILTER PANEL
    if (filterToggle && filterPanel) {
        filterToggle.addEventListener('click', function() {
            filterPanel.classList.toggle('open');
        });
    }

    // VIEW TOGGLE
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

    // 3-DOT ACTION MENU
    const dropdownHTML = `
        <div class="wh-action-dropdown">
            <button class="wh-action-dropdown-item text-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit
            </button>
            <button class="wh-action-dropdown-item text-danger">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete
            </button>
        </div>
    `;
    
    document.querySelectorAll('.wh-action-menu-btn').forEach(btn => {
        btn.insertAdjacentHTML('afterend', dropdownHTML);
    });

    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.wh-action-menu-btn');
        if (menuBtn) {
            const dropdown = menuBtn.nextElementSibling;
            document.querySelectorAll('.wh-action-dropdown.show').forEach(menu => {
                if (menu !== dropdown) menu.classList.remove('show');
            });
            dropdown.classList.toggle('show');
            e.stopPropagation(); 
        } else {
            document.querySelectorAll('.wh-action-dropdown.show').forEach(menu => menu.classList.remove('show'));
        }
    });

    // SEARCH
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            tableRows.forEach(row => {
                if (row.textContent.toLowerCase().includes(query)) { 
                    row.style.display = ''; 
                    visibleCount++; 
                } else { 
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = visibleCount === 0 ? `No results found` : `Showing ${visibleCount} results`;
        });
    }

    // CUSTOM DROPDOWNS & KEYBOARD NAVIGATION
    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.wh-custom-dropdown-btn');
        const menu = dropdown.querySelector('.wh-custom-dropdown-menu');
        const items = dropdown.querySelectorAll('.wh-custom-dropdown-item');
        const label = dropdown.querySelector('.dropdown-label') || dropdown.querySelector('#whPerPageLabel');

        if(btn) {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.querySelectorAll('.wh-custom-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('open');
                });
                dropdown.classList.toggle('open');
                if (dropdown.classList.contains('open')) {
                    const activeItem = menu.querySelector('.wh-custom-dropdown-item.active') || items[0];
                    if(activeItem) activeItem.focus();
                }
            });
        }

        if(menu) {
            menu.addEventListener('keydown', (e) => {
                const focusedItem = document.activeElement;
                if (!focusedItem.classList.contains('wh-custom-dropdown-item')) return;

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const next = focusedItem.nextElementSibling;
                    if (next) next.focus();
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prev = focusedItem.previousElementSibling;
                    if (prev) prev.focus();
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    focusedItem.click();
                } else if (e.key === 'Escape' || e.key === 'Tab') {
                    dropdown.classList.remove('open');
                }
            });
        }

        items.forEach(item => {
            item.tabIndex = 0;
            item.addEventListener('click', (e) => {
                e.preventDefault();
                items.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                if (label) label.textContent = item.textContent;
                dropdown.classList.remove('open');
            });
        });
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.wh-custom-dropdown')) {
            document.querySelectorAll('.wh-custom-dropdown').forEach(d => d.classList.remove('open'));
        }
    });

    // APPLY FILTERS
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            const city = document.querySelector('[data-filter="city"] .wh-custom-dropdown-item.active')?.dataset.value.toLowerCase() || '';
            const status = document.querySelector('[data-filter="status"] .wh-custom-dropdown-item.active')?.dataset.value.toLowerCase() || '';
            
            let visibleCount = 0;
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if ((city === "" || rowText.includes(city)) && (status === "" || rowText.includes(status))) {
                    row.style.display = ''; visibleCount++;
                } else {
                    row.style.display = 'none'; 
                }
            });
            if (resultsInfo) resultsInfo.textContent = `Showing ${visibleCount} filtered results`;
        });
    }

    // CLEAR FILTERS
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            dropdowns.forEach(dropdown => {
                const items = dropdown.querySelectorAll('.wh-custom-dropdown-item');
                const label = dropdown.querySelector('.dropdown-label') || dropdown.querySelector('#whPerPageLabel');
                if (items.length > 0) {
                    items.forEach(i => i.classList.remove('active'));
                    items[0].classList.add('active');
                    if (label) label.textContent = items[0].textContent;
                }
            });

            tableRows.forEach(row => row.style.display = '');
            if (searchInput) searchInput.value = '';
            if (resultsInfo) resultsInfo.textContent = `Showing ${tableRows.length} results`;
        });
    }
});