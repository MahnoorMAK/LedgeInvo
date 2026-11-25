// Tailwind CSS configuration
// Must be loaded AFTER the Tailwind CDN script and BEFORE the DOM is scanned.
tailwind.config = {
    darkMode: ['selector', '[data-theme="dark"]'], // <-- THIS IS THE MISSING LINE
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                brand: {
                    purple: '#7B68B2',
                    darkPurple: '#63528F',
                    lightPurple: '#9B8BC4',
                    deepBg: '#1E1830',
                }
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 6s ease-in-out 3s infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-15px)' },
                }
            }
        }
    }
};