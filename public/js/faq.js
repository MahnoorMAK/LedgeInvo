document.addEventListener('DOMContentLoaded', function () {
    "use strict";

    /* ============================================
       FAQ ACCORDION
       ============================================ */
    const faqItems = document.querySelectorAll('.ct-faq-item');

    if (faqItems.length === 0) {
        console.warn("⚠️ No FAQ items found on this page.");
        return;
    }

    faqItems.forEach(function (item) {
        const question = item.querySelector('.ct-faq-question');
        const answer = item.querySelector('.ct-faq-answer');

        if (!question || !answer) return;

        question.addEventListener('click', function () {
            const isActive = item.classList.contains('active');

            // Close all other FAQs
            faqItems.forEach(function (other) {
                if (other !== item) {
                    other.classList.remove('active');
                    const otherAnswer = other.querySelector('.ct-faq-answer');
                    if (otherAnswer) {
                        otherAnswer.style.maxHeight = null;
                    }
                }
            });

            // Toggle current FAQ
            if (isActive) {
                item.classList.remove('active');
                answer.style.maxHeight = null;
            } else {
                item.classList.add('active');
                // Set max-height to the exact content height for animation
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    console.log("✅ FAQ Accordion initialized with " + faqItems.length + " items.");
});