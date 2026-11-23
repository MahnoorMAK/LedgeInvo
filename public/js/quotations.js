document.addEventListener('DOMContentLoaded', function() {

    // =========================================
    // 1. INDEX PAGE LOGIC (Search & Delete)
    // =========================================
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

    // =========================================
    // 2. CREATE PAGE LOGIC (Flatpickr Calendar)
    // =========================================
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#quotationDate", {
            dateFormat: "Y-m-d", 
            altInput: true, 
            altFormat: "F j, Y", 
            defaultDate: "today",
        });

        flatpickr("#dueDate", {
            dateFormat: "Y-m-d", 
            altInput: true, 
            altFormat: "F j, Y", 
        });
    }

    // Form Submit (Frontend Only Demo)
    const form = document.getElementById('quotationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert("✅ Quotation Created Successfully! (Frontend Demo)");
            // Route ka naam yahan 'quotations.qindex' kar diya hai taake error na aaye
            window.location.href = "{{ route('quotations.qindex') }}"; 
        });
    }
});

// Global Delete Function
function deleteRecord(button) {
    if (confirm("Are you sure you want to delete this quotation?")) {
        let row = button.closest('tr');
        row.style.opacity = '0';
        setTimeout(() => row.remove(), 300);
    }
}

function editRecord(qtnNumber) {
    alert("✏️ Editing Quotation: " + qtnNumber);
}