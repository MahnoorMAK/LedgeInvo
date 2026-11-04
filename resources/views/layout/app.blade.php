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
        var t = localStorage.getItem('apexbooks-theme');
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
                LedgeInvo
            </div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/Service">Services</a>
                <a href="/contact">Contact Us</a>
                <a href="/about">About Us</a>

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

            {{-- Column 1: Brand + Description + Contact + Socials --}}
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

                {{-- Social icons — with bright containers for visibility --}}
                <div class="footer-socials" aria-label="LedgeInvo on social media">

                    <a href="https://twitter.com/ledgeinvo"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social footer-social--twitter"
                       aria-label="Follow LedgeInvo on Twitter">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" fill="#000000"/>
                        </svg>
                    </a>

                    <a href="https://linkedin.com/company/ledgeinvo"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social footer-social--linkedin"
                       aria-label="Follow LedgeInvo on LinkedIn">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.063 2.063 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="#0A66C2"/>
                        </svg>
                    </a>

                    <a href="https://facebook.com/apexbooks"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social footer-social--facebook"
                       aria-label="Follow Apexbooks on Facebook">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                        </svg>
                    </a>

                    <a href="https://instagram.com/ledgeinvo"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social footer-social--instagram"
                       aria-label="Follow Apexbooks on Instagram">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <defs>
                                <radialGradient id="igGrad" cx="30%" cy="107%" r="150%">
                                    <stop offset="0%" stop-color="#FDF497"/>
                                    <stop offset="5%" stop-color="#FDF497"/>
                                    <stop offset="45%" stop-color="#FD5949"/>
                                    <stop offset="60%" stop-color="#D6249F"/>
                                    <stop offset="90%" stop-color="#285AEB"/>
                                </radialGradient>
                            </defs>
                            <path fill="url(#igGrad)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </a>

                    <a href="https://youtube.com/@ledgeinvo"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social footer-social--youtube"
                       aria-label="Follow LedgeInvo on YouTube">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" fill="#FF0000"/>
                        </svg>
                    </a>

                </div>
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

        {{-- Bottom bar — copyright left, legal links right --}}
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