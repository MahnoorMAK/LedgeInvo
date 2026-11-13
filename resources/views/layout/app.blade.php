<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LedgeInvo')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- 👇 CSS Files 👇 -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    
    <!-- SIDEBAR CSS YAHAN ADD KI HAI TAAKE LOAD HO -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Global Variables (Purple Theme) -->
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #f3e8ff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --bg-color: #f8fafc;
            --white: #ffffff;
            --border-color: #e5e7eb;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: var(--bg-color); color: var(--text-main); font-family: 'Inter', sans-serif; overflow: hidden; }
        
        /* Main Layout Setup */
        .app-layout { display: flex; height: 100vh; }
        
        /* Sidebar Area */
        .sidebar-area {
            width: 260px;
            background: var(--white);
            border-right: 1px solid var(--border-color);
            box-shadow: 2px 0 10px rgba(0,0,0,0.02);
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        /* Right Content Area */
        .right-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* Page Content Padding */
        .main-page-content {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }
    </style>

    @yield('styles')
</head>
<body>

    <div class="app-layout">
        
        <!-- SIDEBAR INCLUDE -->
        <aside class="sidebar-area">
            @include('Layout.Sidebar')
        </aside>

        <!-- RIGHT SIDE (Navbar + Content) -->
        <div class="right-content">
            
            <!-- NAVBAR INCLUDE -->
            @include('components.navbar')

            <!-- MAIN CONTENT YAHAN AAYEGA -->
            <div class="main-page-content">
                @yield('content')
            </div>

        </div>

    </div>

    <!-- Sidebar Dropdown Logic (JS) -->
    <script>
        document.querySelectorAll('.has-submenu').forEach(item => {
            item.addEventListener('click', (e) => {
                // Agar link pe click ho to dropdown na khule
                if(e.target.tagName === 'A') return; 
                
                e.preventDefault();
                item.classList.toggle('open');
            });
        });
    </script>

    @yield('scripts')
</body>
</html>