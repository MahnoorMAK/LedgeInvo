(function () {
    "use strict";

    const items = document.querySelectorAll('.pf-item');

    items.forEach(function (item) {
        const question = item.querySelector('.pf-question');
        if (!question) return;

        question.addEventListener('click', function () {
            const isActive = item.classList.contains('active');

            // Close all other FAQs
            items.forEach(function (other) {
                if (other !== item) {
                    other.classList.remove('active');
                    const otherAnswer = other.querySelector('.pf-answer');
                    if (otherAnswer) otherAnswer.style.maxHeight = null;
                }
            });

            // Toggle current
            if (isActive) {
                item.classList.remove('active');
                const answer = item.querySelector('.pf-answer');
                if (answer) answer.style.maxHeight = null;
            } else {
                item.classList.add('active');
                const answer = item.querySelector('.pf-answer');
                if (answer) answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    console.log("✅ Pricing FAQ loaded — " + items.length + " items");
})();