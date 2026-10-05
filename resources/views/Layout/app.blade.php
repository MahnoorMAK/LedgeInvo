<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LedgeInvo - Financial Clarity for Every Role')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
    (function() {
        var t = localStorage.getItem('ledgeinvo-theme');
        if (t) document.documentElement.setAttribute('data-theme', t);
    })();
    </script>

    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @yield('styles')
    @stack('styles')
</head>
<body>

    <!-- ====== HEADER ====== -->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">
                    <!-- PERFECT ISOMETRIC CUBE SVG -->
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF" fill-opacity="0.95"/>
                        <path d="M3 7.5V16.5L12 22V13L3 7.5Z" fill="#FFFFFF" fill-opacity="0.65"/>
                        <path d="M21 7.5V16.5L12 22V13L21 7.5Z" fill="#FFFFFF" fill-opacity="0.85"/>
                        <path d="M12 13V22" stroke="#7E6BB5" stroke-opacity="0.4" stroke-width="0.5" stroke-linejoin="round"/>
                    </svg>
                </div>
                LedeInvo
            </div>
            <div class="nav-links">
                <a href="/">Home</a>

                <a href="/Service">Services</a>
                <a href="/Contact">Contact Us</a>
                <a href="/About">About Us</a>

                {{-- THEME TOGGLE --}}
                <button id="theme-toggle" class="nav-theme-toggle" aria-label="Toggle theme">
                    <svg id="icon-sun" class="theme-icon hidden" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                    <svg id="icon-moon" class="theme-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <span class="theme-label">Theme</span>
                </button>
            </div>

            <div class="nav-actions">
                <!-- Sign in Dropdown -->
                <div class="dropdown" id="signinDropdown">
                    <button type="button" class="btn-login" id="signinToggle" aria-haspopup="true" aria-expanded="false">
                        Login
                        <i class="caret fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                        <a href="/Login1" role="menuitem">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login 1
                        </a>
                        <a href="/Login2" role="menuitem">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login 2
                        </a>
                    </div>
                </div>

                <a href="/register" class="btn-primary">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- ====== MAIN CONTENT ====== -->
    <main style="flex-grow: 1;">
        @yield('content')
    </main>

    <!-- ====== FOOTER ====== -->
  <!-- ====== FOOTER ====== -->
<footer class="site-footer">
    <div class="footer-container">

        {{-- Column 1: Brand + Description + Contact --}}
        <div class="footer-col footer-brand">
            <div class="footer-logo">
                <div class="footer-logo-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF" fill-opacity="0.95"/>
                        <path d="M3 7.5V16.5L12 22V13L3 7.5Z" fill="#FFFFFF" fill-opacity="0.65"/>
                        <path d="M21 7.5V16.5L12 22V13L21 7.5Z" fill="#FFFFFF" fill-opacity="0.85"/>
                    </svg>
                </div>
                <span>LedgeInvo</span>
            </div>

            <p class="footer-desc">
                The complete financial management solution for modern businesses.
            </p>

            <ul class="footer-contact">
                <li>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
                    <span>support@ledgeinvo.com</span>
                </li>
                <li>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span>+1 (555) 123-4567</span>
                </li>
            </ul>
        </div>

        {{-- Column 2: Product --}}
        <div class="footer-col">
            <h4 class="footer-heading">Product</h4>
            <ul class="footer-links-list">
                <li><a href="/">Home</a></li>
                <li><a href="#">Features</a></li>
                 <li><a href="#">Pricing</a></li>
                <li><a href="/Service">Services</a></li>
            </ul>
        </div>

        {{-- Column 3: Company --}}
        <div class="footer-col">
            <h4 class="footer-heading">Company</h4>
            <ul class="footer-links-list">
                <li><a href="/About">About Us</a></li>
                <li><a href="/Contact">Contact Us</a></li>
            
                <li><a href="#">Support</a></li>
            </ul>
        </div>

        {{-- Column 4: Newsletter --}}
        <div class="footer-col footer-newsletter">
            <h4 class="footer-heading">Stay Updated</h4>
            <p class="footer-desc">Subscribe for the latest accounting tips and updates.</p>

            <form class="footer-form" onsubmit="event.preventDefault();">
                <input type="email" placeholder="Enter email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>

    </div>

    {{-- Bottom bar --}}
    <div class="footer-bottom">
        <div class="footer-container footer-bottom-inner">
            <div class="footer-copy">
                &copy; {{ date('Y') }} LedgeInvo. All rights reserved.
            </div>

            <div class="footer-legal">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Security</a>
            </div>
        </div>
    </div>
</footer>

    <!-- Link to external JS file -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>