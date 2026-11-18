<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - LedgeInvo')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Theme script --}}
    <script>
    (function() {
        var t = localStorage.getItem('ledgeinvo-theme');
        if (t) document.documentElement.setAttribute('data-theme', t);
    })();
    </script>

    {{-- Dashboard Specific CSS --}}
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    
    {{-- FontAwesome for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @yield('styles')
    @stack('styles')
</head>
<body class="db-body">

    {{-- NAVBAR --}}
    <nav class="db-nav">
        <div class="db-nav-container">
            
            {{-- Left Side: Logo & Breadcrumbs --}}
            <div class="nav-left-group">
                <a href="/" class="db-logo">
                    <div class="db-logo-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF"/>
                        </svg>
                    </div>
                    <span class="site-logo-text">LedgeInvo</span>
                </a>

                {{-- Vertical Slash --}}
                <span class="nav-divider-slash">|</span>

                {{-- Breadcrumbs --}}
                <div class="db-breadcrumbs">
                    
                    {{-- Home Link --}}
                    <a href="/" class="crumb-link">Home</a>
                    
                    <span class="crumb-separator"><i class="fa-solid fa-chevron-right"></i></span>

                    {{-- Dynamic Path Segments --}}
                    @php
                        $segments = request()->segments();
                        $url = '';
                    @endphp
                    @foreach($segments as $segment)
                        @php
                            $url .= '/' . $segment;
                            $title = ucwords(str_replace(['-', '_'], ' ', $segment));
                        @endphp
                        @if($loop->last)
                            <span class="crumb-current">{{ $title }}</span>
                        @else
                            <a href="{{ url($url) }}" class="crumb-link">{{ $title }}</a>
                            <span class="crumb-separator"><i class="fa-solid fa-chevron-right"></i></span>
                        @endif
                    @endforeach
                </div>
            </div>
            
            {{-- Right Side: Language & Actions --}}
            <div class="db-nav-actions">
                
                {{-- Language Selector --}}
                <div class="lang-dropdown" id="langDropdown">
                    <button class="lang-btn" id="langToggle">
                        <i class="fa-solid fa-globe"></i>
                        <span>EN</span>
                        <i class="fa-solid fa-chevron-down lang-caret"></i>
                    </button>
                    <ul class="lang-menu" id="langMenu">
                        <li data-lang="en" class="active">English (EN)</li>
                        <li data-lang="ur">اردو (UR)</li>
                        <li data-lang="ar">العربية (AR)</li>
                    </ul>
                </div>

                <a href="/" class="db-btn-logout">Logout</a>
            </div>
        </div>
    </nav>

    <!-- ====== DASHBOARD MAIN WRAPPER ====== -->
    <div class="db-layout">
        <aside class="db-sidebar">
            @include('Layout.Sidebar')
        </aside>

        <main class="db-main">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/Dashboard/Dashboard.js') }}"></script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>