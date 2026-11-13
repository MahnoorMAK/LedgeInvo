
document.addEventListener('DOMContentLoaded', function () {

    // ---------- Contact form submission ----------
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = {
                firstName: document.getElementById('first_name').value.trim(),
                lastName:  document.getElementById('last_name').value.trim(),
                email:     document.getElementById('email').value.trim(),
                phone:     document.getElementById('phone').value.trim(),
                subject:   document.getElementById('subject').value,
                message:   document.getElementById('message').value.trim()
            };

            if (!formData.firstName || !formData.lastName ||
                !formData.email || !formData.subject || !formData.message) {
                alert('Please fill in all required fields before submitting.');
                return;
            }

            console.log('Contact form submitted:', formData);

            alert('Thanks, ' + formData.firstName + '! We\'ll be in touch soon.');
            contactForm.reset();
        });
    }

    const faqLinks = document.querySelectorAll('.faq-card a');
    faqLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            const card = link.closest('.faq-card');
            const title = card ? card.querySelector('h4') : null;
            console.log('FAQ link clicked:', title ? title.textContent.trim() : '');
        });
    });

});