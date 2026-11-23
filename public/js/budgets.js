document.addEventListener("DOMContentLoaded", () => {
    
    // ==========================================
    // CUSTOM DROPDOWNS LOGIC (Purple 3D Blink)
    // ==========================================
    const dropdowns = document.querySelectorAll('.custom-dropdown');
    
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.custom-dropdown-trigger');
        const triggerText = trigger.querySelector('span');
        const items = dropdown.querySelectorAll('.custom-dropdown-item');
        const hiddenInput = dropdown.parentElement.querySelector('input[type="hidden"]');

        // Toggle open/close
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelectorAll('.custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.toggle('open');
        });

        // Select item
        items.forEach(item => {
            item.addEventListener('click', function() {
                triggerText.textContent = this.textContent;
                triggerText.style.color = '#0f172a';
                triggerText.style.fontWeight = '600';
                if(hiddenInput) hiddenInput.value = this.getAttribute('data-value');
                dropdown.classList.remove('open');
            });
        });
    });

    // Close on outside click
    document.addEventListener('click', function() {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
    });

});