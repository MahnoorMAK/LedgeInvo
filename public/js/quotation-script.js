document.addEventListener('DOMContentLoaded', function() {

    // 1. SEARCH FUNCTIONALITY
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
});

// 2. DELETE FUNCTION
function deleteRecord(button) {
    if (confirm("Are you sure you want to delete this quotation?")) {
        let row = button.closest('tr');
        row.style.opacity = '0';
        setTimeout(() => row.remove(), 300);
    }
}

// 3. EDIT FUNCTION (Demo)
function editRecord(qtnNumber) {
    alert("✏️ Editing Quotation: " + qtnNumber);
}