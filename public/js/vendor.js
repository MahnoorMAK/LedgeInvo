// public/js/vendor.js

document.addEventListener('DOMContentLoaded', function() {
    
    let currentStep = 1;
    const totalSteps = 3;

    const btnNext = document.getElementById('btn-next');
    const btnPrev = document.getElementById('btn-prev');
    const btnSubmit = document.getElementById('btn-submit');

    function updateUI() {
        // Hide all steps
        for (let i = 1; i <= totalSteps; i++) {
            document.getElementById(`step-${i}`).style.display = 'none';
            document.getElementById(`step-indicator-${i}`).classList.remove('active');
        }

        // Show current step
        document.getElementById(`step-${currentStep}`).style.display = 'block';
        document.getElementById(`step-indicator-${currentStep}`).classList.add('active');

        // Update Buttons
        if (currentStep === 1) {
            btnPrev.style.display = 'none';
        } else {
            btnPrev.style.display = 'inline-block';
        }

        if (currentStep === totalSteps) {
            btnNext.style.display = 'none';
            btnSubmit.style.display = 'inline-block';
        } else {
            btnNext.style.display = 'inline-block';
            btnSubmit.style.display = 'none';
        }
    }

    btnNext.addEventListener('click', function() {
        if (currentStep < totalSteps) {
            currentStep++;
            updateUI();
        }
    });

    btnPrev.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
        }
    });

});