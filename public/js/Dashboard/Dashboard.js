document.addEventListener('DOMContentLoaded', function() {
    const langDropdown = document.getElementById('langDropdown');
    const langToggle = document.getElementById('langToggle');
    const langMenu = document.getElementById('langMenu');

    if (langToggle && langMenu) {
        langToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            langDropdown.classList.toggle('open');
        });

        langMenu.querySelectorAll('li').forEach(item => {
            item.addEventListener('click', function() {
                const langCode = this.getAttribute('data-lang');
                langMenu.querySelectorAll('li').forEach(li => li.classList.remove('active'));
                this.classList.add('active');
                langToggle.querySelector('span').textContent = langCode.toUpperCase();
                langDropdown.classList.remove('open');
            });
        });

        document.addEventListener('click', function(e) {
            if (!langDropdown.contains(e.target)) {
                langDropdown.classList.remove('open');
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') langDropdown.classList.remove('open');
        });
    }
});