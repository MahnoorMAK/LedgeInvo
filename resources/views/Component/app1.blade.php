<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apexbooks - Financial Clarity for Every Role')</title>

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
    <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @yield('styles')
    @stack('styles')
</head>
<body>

    <!-- ====== HEADER (GLASS NAVBAR) ====== -->
    <header class="hdr" id="site-header">
        <div class="hdr__inner">

            {{-- Logo --}}
            <a href="/" class="hdr__logo">
                <span class="hdr__logo-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF" fill-opacity="0.95"/>
                        <path d="M3 7.5V16.5L12 22V13L3 7.5Z" fill="#FFFFFF" fill-opacity="0.65"/>
                        <path d="M21 7.5V16.5L12 22V13L21 7.5Z" fill="#FFFFFF" fill-opacity="0.85"/>
                        <path d="M12 13V22" stroke="#7E6BB5" stroke-opacity="0.4" stroke-width="0.5" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="hdr__logo-text">Apexbooks</span>
            </a>

            {{-- Primary nav links --}}
            <ul class="hdr__links">
                <li><a href="/"            class="{{ request()->is('/')           ? 'is-active' : '' }}">Home</a></li>
                <li><a href="/Service"     class="{{ request()->is('Service')    ? 'is-active' : '' }}">Services</a></li>
                <li><a href="/Contact"     class="{{ request()->is('Contact')    ? 'is-active' : '' }}">Contact Us</a></li>
                <li><a href="/About"       class="{{ request()->is('About')      ? 'is-active' : '' }}">About Us</a></li>

                {{-- Theme toggle --}}
                <li>
                    <button id="theme-toggle" class="hdr__theme-toggle" aria-label="Toggle theme" type="button">
                        <svg id="icon-sun" class="theme-icon hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg id="icon-moon" class="theme-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <span class="theme-label">Theme</span>
                    </button>
                </li>
            </ul>

            {{-- Right actions --}}
            <div class="hdr__actions">
                <div class="hdr__dropdown" id="signinDropdown">
                    <button type="button" class="hdr__login" id="signinToggle" aria-haspopup="true" aria-expanded="false">
                        Login
                        <svg class="hdr__caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                    <div class="hdr__dropdown-menu" role="menu">
                        <a href="/Login1" role="menuitem">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <polyline points="10 17 15 12 10 7"/>
                                <line x1="15" y1="12" x2="3" y2="12"/>
                            </svg>
                            Login 1
                        </a>
                        <a href="/Login2" role="menuitem">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <polyline points="10 17 15 12 10 7"/>
                                <line x1="15" y1="12" x2="3" y2="12"/>
                            </svg>
                            Login 2
                        </a>
                    </div>
                </div>

                <a href="/register" class="hdr__cta">Get Started</a>
            </div>

            {{-- Mobile burger --}}
            <button class="hdr__burger" id="hdr-burger" aria-label="Toggle menu" aria-expanded="false" type="button">
                <span></span><span></span><span></span>
            </button>
        </div>

        {{-- Mobile dropdown --}}
        <div class="hdr__mobile" id="hdr-mobile" hidden>
            <ul class="hdr__mobile-links">
                <li><a href="/">Home</a></li>
                <li><a href="/Service">Services</a></li>
                <li><a href="/Contact">Contact Us</a></li>
                <li><a href="/About">About Us</a></li>
                <li><a href="/Login1">Login 1</a></li>
                <li><a href="/Login2">Login 2</a></li>
            </ul>
            <a href="/register" class="hdr__mobile-cta">Get Started</a>
        </div>
    </header>

    <!-- ====== MAIN CONTENT ====== -->
    <main style="flex-grow: 1;">
        @yield('content')
    </main>

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
                    <span>Apexbooks</span>
                </div>

                <p class="footer-desc">
                    The complete financial management solution for modern businesses.
                </p>

                <ul class="footer-contact">
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
                        <span>support@apexbooks.com</span>
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
                    &copy; {{ date('Y') }} Apexbooks. All rights reserved.
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
    <script src="{{ asset('js/app1.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>