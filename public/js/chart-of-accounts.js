// public/js/account-types.js

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('account-type-modal');
    const openBtn = document.getElementById('open-modal-btn');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-modal-btn');

    if (openBtn) {
        openBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'flex';
        });
    }

    function closeModal() {
        modal.style.display = 'none';
    }

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }
});