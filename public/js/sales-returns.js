document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Flatpickr Calendar Setup
    if (typeof flatpickr !== 'undefined') {
        flatpickr("#returnDate", {
            dateFormat: "Y-m-d", 
            altInput: true, 
            altFormat: "F j, Y", 
            defaultDate: "today", 
            disableMobile: true, 
            position: "below"
        });
    }

    // 2. Custom Dropdown Logic
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.custom-dropdown-trigger');
        const triggerText = trigger.querySelector('span');
        const items = dropdown.querySelectorAll('.custom-dropdown-item');

        // Toggle Dropdown
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            // Pehle saare dropdowns band kar dein
            document.querySelectorAll('.custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            // Phir current ko toggle karein
            dropdown.classList.toggle('open');
        });

        // Select Item
        items.forEach(item => {
            item.addEventListener('click', function() {
                triggerText.textContent = this.textContent;
                triggerText.style.color = '#0f172a';
                triggerText.style.fontWeight = '600';
                dropdown.classList.remove('open');
            });
        });
    });

    // Bahir click karne par dropdown band ho jaye
    document.addEventListener('click', function() {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
    });

});