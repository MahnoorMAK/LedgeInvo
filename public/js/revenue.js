// public/js/revenue.js

document.addEventListener('DOMContentLoaded', function() {
    
    const modal = document.getElementById('revenue-modal');
    const openBtn = document.getElementById('open-modal-btn');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-modal-btn');

    // Open Modal
    openBtn.addEventListener('click', function() {
        modal.style.display = 'flex';
        // JS se blur hata diya gaya hai, ab sirf CSS overlay kaam karega
    });

    // Close Modal Functions
    function closeModal() {
        modal.style.display = 'none';
    }

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close if clicked outside the modal
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

});