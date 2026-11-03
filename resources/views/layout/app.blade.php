<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LedgeInvo')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- 👇 Navbar CSS Link 👇 -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body style="margin: 0; background-color: #f8fafc;">

    <!-- 👇 Navbar Include 👇 -->
    @include('components.navbar')

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

</body>
</html>