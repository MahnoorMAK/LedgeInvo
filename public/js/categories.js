document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Normal Dropdowns (10 per page, etc.)
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

    // 2. Custom Status Dropdown (Inside Filter Panel)
    const customSelectWrapper = document.querySelector('.custom-select-wrapper');
    const customSelectTrigger = document.getElementById('statusSelectTrigger');
    const customOptions = document.querySelectorAll('.custom-option');
    const selectedStatusText = document.getElementById('selectedStatusText');

    if (customSelectTrigger) {
        customSelectTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            customSelectWrapper.classList.toggle('open');
        });

        customOptions.forEach(option => {
            option.addEventListener('click', () => {
                customOptions.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                selectedStatusText.textContent = option.textContent;
                customSelectWrapper.classList.remove('open');
            });
        });

        document.addEventListener('click', (e) => {
            if (!customSelectWrapper.contains(e.target)) {
                customSelectWrapper.classList.remove('open');
            }
        });
    }

    // 3. COMBINED SEARCH AND FILTER WORKING
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.querySelector('.btn-search');
    const applyBtn = document.querySelector('.btn-apply');
    const clearBtn = document.querySelector('.btn-clear');
    const rows = document.querySelectorAll('.row-item');

    // Helper function jo dono (Search + Filter) check karega
    function applySearchAndFilter() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        let selectedStatus = 'all';
        
        // Get selected status from custom dropdown
        const activeOption = document.querySelector('.custom-option.selected');
        if (activeOption) {
            selectedStatus = activeOption.getAttribute('data-value');
        }

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            const rowText = row.textContent.toLowerCase();

            // Check if matches Search AND Filter
            const matchesSearch = rowText.includes(searchTerm);
            const matchesFilter = (selectedStatus === 'all' || selectedStatus === rowStatus);

            if (matchesSearch && matchesFilter) {
                row.style.display = 'table-row';
                row.style.animation = "fadeIn 0.3s ease";
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Search Button Click
    if (searchBtn) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            applySearchAndFilter();
        });
    }

    // Live Search (Typing in input)
    if (searchInput) {
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                applySearchAndFilter();
            } else {
                applySearchAndFilter(); 
            }
        });
    }

    // Filter Apply Button Click
    if (applyBtn) {
        applyBtn.addEventListener('click', () => {
            applySearchAndFilter();
            if(filterPanel) filterPanel.classList.remove('show');
        });
    }

    // Filter Clear Button Click
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            // Reset Custom Dropdown to "All Status"
            customOptions.forEach(opt => opt.classList.remove('selected'));
            if(customOptions[0]) customOptions[0].classList.add('selected');
            if(selectedStatusText) selectedStatusText.textContent = 'All Status';
            
            // Reset Search Input
            if(searchInput) searchInput.value = '';

            // Show all rows
            rows.forEach(row => {
                row.style.display = 'table-row';
            });
        });
    }

    // 4. Action Icons (Delete/Edit) working
    const actionIcons = document.querySelectorAll('.action-icon');
    actionIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            if(this.classList.contains('fa-trash-can')) {
                if(confirm('Are you sure you want to delete this category?')) {
                    this.closest('tr').style.display = 'none';
                }
            } else if (this.classList.contains('fa-pen-to-square')) {
                alert('Edit Category Clicked!');
            }
        });
    });

});

// CSS Animation for fade in
const style = document.createElement('style');
style.innerHTML = `
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}`;
document.head.appendChild(style);