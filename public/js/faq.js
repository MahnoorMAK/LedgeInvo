(function () {
    "use strict";

    /* ============================================
       FAQ ACCORDION
       ============================================ */
    const faqItems = document.querySelectorAll('.ct-faq-item');

    faqItems.forEach(function (item) {
        const question = item.querySelector('.ct-faq-question');

        if (!question) return;

        question.addEventListener('click', function () {
            const isActive = item.classList.contains('active');

            // Close all other FAQs
            faqItems.forEach(function (other) {
                if (other !== item) {
                    other.classList.remove('active');
                    const otherAnswer = other.querySelector('.ct-faq-answer');
                    if (otherAnswer) otherAnswer.style.maxHeight = null;
                }
            });

            // Toggle current
            if (isActive) {
                item.classList.remove('active');
                const answer = item.querySelector('.ct-faq-answer');
                if (answer) answer.style.maxHeight = null;
            } else {
                item.classList.add('active');
                const answer = item.querySelector('.ct-faq-answer');
                if (answer) answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    console.log("✅ FAQ loaded — " + faqItems.length + " items");
})();