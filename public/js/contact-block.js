/**
 * Contact Block — Slower Staggered Reveal
 */
(function () {
    'use strict';

    var block = document.querySelector('[data-ctb]');
    if (!block) return;

    if (block.dataset.ctbInit === '1') return;
    block.dataset.ctbInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var infoCards = block.querySelectorAll('.ctb__card');
    var formWrap  = block.querySelector('.ctb__form-wrap');

    // --- SLOWED DOWN DELAYS ---
    // 600ms gap between each card (was 150ms)
    var CARD_STAGGER = 600; 
    // 400ms initial delay before the first card appears
    var INITIAL_PAUSE = 400; 

    function revealSequence() {
        if (!infoCards.length) return;

        // Form slides in first
        if (formWrap) formWrap.classList.add('is-visible');

        // Cards snap in slowly one by one
        infoCards.forEach(function (card, i) {
            setTimeout(function () {
                card.classList.add('is-visible');
            }, INITIAL_PAUSE + (i * CARD_STAGGER));
        });
    }

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    revealSequence();
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });

        io.observe(block);
    } else {
        infoCards.forEach(function (card) { card.classList.add('is-visible'); });
        if (formWrap) formWrap.classList.add('is-visible');
    }

    // Form submission
    var contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstName = (document.getElementById('first_name') || {}).value || '';
            var email     = (document.getElementById('email')      || {}).value || '';
            
            if (!firstName.trim() || !email.trim()) {
                alert('Please fill in all required fields.');
                return;
            }
            alert('Message sent!');
            contactForm.reset();
        });
    }
})();