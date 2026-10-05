// Tailwind CSS configuration
// Must be loaded AFTER the Tailwind CDN script and BEFORE the DOM is scanned.
tailwind.config = {
    darkMode: ['selector', '[data-theme="dark"]'],   // <-- ADD THIS LINE
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                brand: {
                    purple: '#7B68B2',
                    lightPurple: '#9B8BC4',
                    darkPurple: '#5A4A8A',
                    dark: '#0F172A',
                    lightBg: '#F8FAFC',
                }
            }
        }
    }
};