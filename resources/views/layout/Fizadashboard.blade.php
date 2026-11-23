<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FizaDashboard - Apexbooks')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Theme script --}}
    <script>
    (function() {
        var t = localStorage.getItem('apexbooks-theme');
        if (t) document.documentElement.setAttribute('data-theme', t);
    })();
    </script>

    {{-- Dashboard Specific CSS --}}
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    @yield('styles')
</head>
<body class="db-body" >

    <!-- ====== DASHBOARD MAIN WRAPPER ====== -->
    <div class="db-layout">

        <!-- SIDEBAR -->
        <aside class="db-sidebar">
            @include('Layout.Fizasidebar')
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="db-main">
            @yield('content')
        </main>

    </div>
    
    {{-- Load theme.js FIRST so it runs before other scripts --}}
    <script src="{{ asset('js/theme.js') }}"></script>

    {{-- Sidebar JS --}}
    <script src="{{ asset('js/sidebar.js') }}"></script>
    @yield('scripts')
</body>
</html>