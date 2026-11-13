document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Dropdown Working
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    const filterPanel = document.getElementById('filterPanel');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.drop-btn');
        
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdowns.forEach(d => {
                if(d !== dropdown) d.classList.remove('show');
            });
            
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

    // 2. Tabs & Search Working Together
    const tabs = document.querySelectorAll('.tab');
    const rows = document.querySelectorAll('.row-item');
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.querySelector('.btn-search');
    const clearSearchBtn = document.getElementById('clearSearchBtn');
    
    let currentTabTarget = 'all';

    function filterData() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';

        if (searchTerm.length > 0) {
            clearSearchBtn.style.display = 'flex';
        } else {
            clearSearchBtn.style.display = 'none';
        }

        rows.forEach(row => {
            const status = row.getAttribute('data-status');
            const rowText = row.textContent.toLowerCase();

            const matchesTab = (currentTabTarget === 'all' || currentTabTarget === status);
            const matchesSearch = rowText.includes(searchTerm);

            if (matchesTab && matchesSearch) {
                row.classList.remove('hide');
                row.style.animation = "fadeIn 0.3s ease";
            } else {
                row.classList.add('hide');
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

    // Search Button Click Event
    if (searchBtn) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            filterData();
        });
    }

    // Search Input Typing / Enter Event
    if (searchInput) {
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                filterData();
            } else {
                filterData(); 
            }
        });
    }

    // Clear Search (Cross Button) Click Event
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            searchInput.value = ''; 
            filterData(); 
            searchInput.focus(); 
        });
    }

    // 3. Filter Apply & Clear Working (Dropdown ke andar)
    const applyBtn = document.querySelector('.btn-apply');
    const clearBtn = document.querySelector('.btn-clear');

    if (applyBtn) {
        applyBtn.addEventListener('click', () => {
            if(filterPanel) filterPanel.classList.remove('show');
        });
    }

    // 4. CUSTOM DROPDOWN LOGIC (Purple 3D Dropdown)
    const customSelectWrapper = document.querySelector('.custom-select-wrapper');
    const customSelectTrigger = document.getElementById('goalSelectTrigger');
    const customOptions = document.querySelectorAll('.custom-option');
    const selectedGoalText = document.getElementById('selectedGoalText');

    if (customSelectTrigger) {
        customSelectTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            customSelectWrapper.classList.toggle('open');
        });

        customOptions.forEach(option => {
            option.addEventListener('click', () => {
                customOptions.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                selectedGoalText.textContent = option.textContent;
                customSelectWrapper.classList.remove('open');
            });
        });

        document.addEventListener('click', (e) => {
            if (!customSelectWrapper.contains(e.target)) {
                customSelectWrapper.classList.remove('open');
            }
        });
    }

    // Clear button for Filter
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            const dateInput = document.querySelector('.filter-group input[type="date"]');
            if(dateInput) dateInput.value = '';
            
            // Reset custom dropdown
            if(customOptions.length > 0) {
                customOptions.forEach(opt => opt.classList.remove('selected'));
                customOptions[0].classList.add('selected');
                if(selectedGoalText) selectedGoalText.textContent = customOptions[0].textContent;
            }
        });
    }

    // 5. Action Icons Click Animation
    const actionIcons = document.querySelectorAll('.action-icon');
    actionIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            if(this.classList.contains('fa-trash-can')) {
                if(confirm('Are you sure you want to delete this record?')) {
                    this.closest('tr').style.display = 'none';
                }
            } else if (this.classList.contains('fa-eye')) {
                alert('View Details Clicked!');
            } else if (this.classList.contains('fa-pen-to-square')) {
                alert('Edit Details Clicked!');
            }
        });
    });

});

// CSS Animation for smooth tab switching
const style = document.createElement('style');
style.innerHTML = `
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}`;
document.head.appendChild(style);