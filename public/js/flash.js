// public/js/flash.js

(function() {
    document.body.style.overflow = 'hidden';
    
    function runFlash() {
        var flashScreen = document.getElementById('apex-flash-screen');
        if (!flashScreen) return;

        // Force browser to paint initial state
        void flashScreen.offsetWidth;

        // Step 1: Reveal the logo
        requestAnimationFrame(function() {
            flashScreen.classList.add('is-animating');
        });

        // Step 2: After 1s, move logo up & reveal text
        setTimeout(function() {
            flashScreen.classList.add('is-text-visible');
        }, 1000);

        // Step 3: After 2s, start the letter sequence (L -> O)
        setTimeout(function() {
            flashScreen.classList.add('is-letters-visible');
        }, 2000);

        // Step 4: After 5s total, fade everything out
        setTimeout(function() {
            flashScreen.classList.add('is-finished');
            
            setTimeout(function() {
                flashScreen.remove();
                document.body.style.overflow = ''; 
            }, 1000); 
        }, 5000); 
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runFlash);
    } else {
        runFlash();
    }
})();