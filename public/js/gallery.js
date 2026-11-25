(function () {
    'use strict';

    function initFlashScreen() {
        // Uncomment this to test every time
        // if (!sessionStorage.getItem('apex_flash_seen')) {
            
            var flashScreen = document.getElementById('apex-flash-screen');
            var section = document.getElementById('gallery');

            if (flashScreen && section) {
                // 1. Make it opaque and block scrolling
                flashScreen.style.opacity = '1';
                document.body.style.overflow = 'hidden';

                // 2. Force reflow and trigger animation
                void section.offsetWidth; 
                section.classList.add('is-visible');

                // 3. Wait for animation, then fade out
                setTimeout(function() {
                    flashScreen.classList.add('is-finished');
                    
                    // sessionStorage.setItem('apex_flash_seen', 'true');

                    // 4. Cleanup
                    setTimeout(function() {
                        flashScreen.remove();
                        document.body.style.overflow = ''; 
                    }, 800); 
                }, 4000); 
            }
        // }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFlashScreen);
    } else {
        initFlashScreen();
    }
})();