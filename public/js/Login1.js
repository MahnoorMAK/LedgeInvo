document.addEventListener('DOMContentLoaded', function () {

    // -------- Toggle Password Visibility --------
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';

            // Toggle input type
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

            // Toggle eye icon
            if (isPassword) {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    }

    // -------- Form Submission (Demo Handler) --------
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            // TODO: Replace with real authentication logic
            console.log('Login form submitted');
            alert('Login functionality would be implemented here.');
        });
    }

});