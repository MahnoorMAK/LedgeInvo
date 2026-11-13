document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Dropdowns Working
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    const filterPanel = document.getElementById('filterPanel');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.drop-btn');
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdowns.forEach(d => { if(d !== dropdown) d.classList.remove('show'); });
            
            if(dropdown.id === 'filterDropdown') {
                if(filterPanel) filterPanel.classList.toggle('show');
            } else {
                dropdown.classList.toggle('show');
            }
        });
    });

    window.addEventListener('click', (e) => {
        dropdowns.forEach(d => d.classList.remove('show'));
        if(filterPanel && !e.target.closest('#filterDropdown')) {
            filterPanel.classList.remove('show');
        }
    });

    // 2. Tabs & Search & Grid View Working Together
    const tabs = document.querySelectorAll('.tab');
    const rows = document.querySelectorAll('.row-item');
    const searchInput = document.querySelector('.search-box input');
    const searchBtn = document.querySelector('.btn-search');
    const tableContainer = document.querySelector('.table-responsive'); // Table wrapper
    const table = document.querySelector('table');
    const tbody = document.querySelector('tbody');
    
    let currentTabTarget = 'all';
    let isGridView = false;

    // Helper function to Filter (Search + Tabs)
    function filterData() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';

        rows.forEach(row => {
            const type = row.getAttribute('data-type');
            const rowText = row.textContent.toLowerCase();

            const matchesTab = (currentTabTarget === 'all' || currentTabTarget === type);
            const matchesSearch = rowText.includes(searchTerm);

            if (matchesTab && matchesSearch) {
                row.style.display = ''; // Show
                if(isGridView) row.classList.add('grid-item');
            } else {
                row.style.display = 'none'; // Hide
            }
        });
    }

    // Tab Click Event
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            currentTabTarget = tab.getAttribute('data-target');
            filterData();
        });
    });

    // Search Button Click
    if (searchBtn) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            filterData();
        });
    }

    // Search typing (Enter or Live)
    if (searchInput) {
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') filterData();
            else filterData();
        });
    }

    // 3. View Toggle (List / Grid)
    const viewBtns = document.querySelectorAll('.view-btn');
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            viewBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Check if grid button clicked (using index 1)
            if (btn === viewBtns[1]) {
                isGridView = true;
                table.classList.add('grid-view');
                rows.forEach(row => row.classList.add('grid-item'));
            } else {
                isGridView = false;
                table.classList.remove('grid-view');
                rows.forEach(row => row.classList.remove('grid-item'));
            }
        });
    });

    // 4. Action Icons Click
    const actionIcons = document.querySelectorAll('.action-icon');
    actionIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            if(this.classList.contains('fa-xmark')) {
                alert('Rejected!');
            } else if (this.classList.contains('fa-play')) {
                alert('Approved!');
            } else if (this.classList.contains('fa-trash-can')) {
                if(confirm('Are you sure you want to delete this budget?')) {
                    this.closest('tr').style.display = 'none';
                }
            }
        });
    });

});

// CSS Animation for fade in
const style = document.createElement('style');
style.innerHTML = `@keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }`;
document.head.appendChild(style);