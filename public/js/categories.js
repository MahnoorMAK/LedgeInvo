document.addEventListener("DOMContentLoaded", () => {
    
    // ==========================================
    // 1. SEARCH FUNCTIONALITY
    // ==========================================
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const rows = document.querySelectorAll('.category-row');

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
        });
    }

    if (searchBtn) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            performSearch();
        });
    }

    if (searchInput) {
        searchInput.addEventListener('keyup', () => {
            performSearch(); // Live search
        });
    }

    // ==========================================
    // 2. CUSTOM DROPDOWNS & FILTERS
    // ==========================================
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    
    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.drop-btn');
        if(btn) {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdowns.forEach(d => { if(d !== dropdown) d.classList.remove('show'); });
                dropdown.classList.toggle('show');
            });
        }
    });

    window.addEventListener('click', () => {
        dropdowns.forEach(d => d.classList.remove('show'));
    });

    // ==========================================
    // 3. ADD CATEGORY FUNCTIONALITY
    // ==========================================
    const addCategoryForm = document.getElementById('addCategoryForm');
    const tableBody = document.getElementById('categoryTableBody');

    if (addCategoryForm) {
        addCategoryForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('catName').value;
            const code = document.getElementById('catCode').value.toUpperCase();
            const desc = document.getElementById('catDesc').value || 'No description';
            const isActive = document.getElementById('catStatus').checked;

            const statusText = isActive ? 'Active' : 'Inactive';
            const statusClass = isActive ? 'status-active' : 'status-inactive';
            
            let codeClass = 'code-purple';
            if(code.includes('HEALTH')) codeClass = 'code-green';
            else if(code.includes('FIN')) codeClass = 'code-blue';
            else if(code.includes('CAREER')) codeClass = 'code-pink';

            const newRow = document.createElement('tr');
            newRow.className = 'category-row';
            
            newRow.innerHTML = `
                <td>
                    <div class="category-info">
                        <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                        <div class="category-text">
                            <h4>${name}</h4>
                            <p>${desc}</p>
                        </div>
                    </div>
                </td>
                <td><span class="code-badge ${codeClass}">${code}</span></td>
                <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td class="actions">
                    <i class="fa-regular fa-pen-to-square action-icon"></i>
                    <i class="fa-regular fa-trash-can action-icon"></i>
                </td>
            `;

            if(tableBody) tableBody.insertBefore(newRow, tableBody.firstChild);

            addCategoryForm.reset();
            document.getElementById('catStatus').checked = true;
        });
    }

    // ==========================================
    // 4. DELETE ACTION
    // ==========================================
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('fa-trash-can')) {
            if(confirm('Are you sure you want to delete this category?')) {
                e.target.closest('tr').remove();
            }
        }
    });

});