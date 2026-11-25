// ============================================
// Apexbooks — Service Page
// Interactive behaviors
// ============================================
document.addEventListener('DOMContentLoaded', function () {

    // ---------- "Learn more" links (demo) ----------
    const serviceLinks = document.querySelectorAll('.service-link');
    serviceLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const card = link.closest('.service-card');
            const title = card ? card.querySelector('.service-title') : null;
            const name = title ? title.textContent.trim() : 'this service';
            console.log('Learn more clicked:', name);
            // TODO: route to a real detail page, e.g. window.location.href = '/services/...'
        });
    });

    // ---------- Showcase CTA buttons (demo) ----------
    const showcaseButtons = document.querySelectorAll('.showcase-actions a');
    showcaseButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            console.log('Showcase CTA clicked:', btn.textContent.trim());
        });
    });

    // ---------- Step cards: subtle click feedback ----------
    const steps = document.querySelectorAll('.step');
    steps.forEach(function (step) {
        step.addEventListener('click', function () {
            const number = step.querySelector('.step-number');
            const title = step.querySelector('.step-title');
            console.log(
                'Step clicked:',
                number ? number.textContent.trim() : '',
                '-',
                title ? title.textContent.trim() : ''
            );
        });
    });

});