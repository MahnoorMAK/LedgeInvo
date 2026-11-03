document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.querySelector(".nav-links");

    if (hamburger) {
        hamburger.addEventListener("click", function () {
            // Mobile menu ko toggle karega
            navLinks.classList.toggle("active");
            
            // Hamburger icon ko X shape mein badalne ke liye
            hamburger.classList.toggle("is-active");
        });
    }
});