<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LedgeInvo Accounting</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config (must load right after the CDN, before Tailwind scans the DOM) -->
    <script src="tailwind.config.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
     <script src="{{asset('js/Login1.config.js')}}"></script>
    
    <link rel="stylesheet" href="{{asset('css/Login1.css')}}">

{{-- THEME: CSS variables for light/dark mode --}}
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">

{{-- THEME: Anti-flash script — must run BEFORE body renders --}}
<script>
    (function() {
        var t = localStorage.getItem('apexbooks-theme');
        if (t) document.documentElement.setAttribute('data-theme', t);
    })();
</script>


</head>
<body class="bg-slate-50 font-sans text-slate-800 h-screen overflow-hidden flex selection:bg-brand-purple selection:text-white">

    <!-- LEFT SIDE: Visual / 3D Elements -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center bg-brand-deepBg">

        <!-- Dark, Moody Accounting Background Image -->
        <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?q=80&w=2070&auto=format&fit=crop"
             alt="Accounting desk setup"
             class="absolute inset-0 w-full h-full object-cover z-0 opacity-40 mix-blend-luminosity">

        <!-- Deep Purple Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#2a2344]/95 via-[#7B68B2]/80 to-[#1E1830]/95 z-0"></div>

        <!-- Content Container -->
        <div class="relative z-10 w-full max-w-lg px-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight drop-shadow-lg">
                Building the future of <br> <span class="text-[#d4c9f0]">Accounting.</span>
            </h1>
            <p class="text-slate-300 text-lg mb-12 drop-shadow-md font-light">
                Unlock growth and efficiency through intelligent automation and real-time data insights.
            </p>

            <!-- 3D Floating UI Cards -->
            <div class="relative h-64 w-full perspective-1000">

                <!-- Card 1: Revenue Stats -->
                <div class="absolute top-0 left-0 glass-panel rounded-2xl p-4 w-48 transform -rotate-6 hover:rotate-0 transition-transform duration-500 animate-float z-20 border-t-4 border-t-brand-purple">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs font-semibold text-slate-500">Q3 Revenue</span>
                        <i class="fa-solid fa-chart-line text-brand-purple"></i>
                    </div>
                    <div class="text-2xl font-bold text-slate-800 mb-1">$124.5k</div>
                    <div class="text-xs text-emerald-500 font-medium"><i class="fa-solid fa-arrow-up"></i> 14% vs last month</div>
                </div>

                <!-- Card 2: Data Points -->
                <div class="absolute top-16 right-0 glass-panel rounded-2xl p-4 w-44 transform rotate-3 hover:rotate-0 transition-transform duration-500 animate-float-delayed z-30">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-[#7B68B2]/10 text-brand-purple text-[10px] px-2 py-1 rounded-full font-semibold">Automated</span>
                        <span class="bg-slate-100 text-slate-600 text-[10px] px-2 py-1 rounded-full font-semibold">Ledger</span>
                    </div>
                    <div class="text-sm text-slate-500 mb-1">Processed Invoices</div>
                    <div class="text-3xl font-bold text-slate-800">12,450</div>
                </div>

                <!-- Card 3: Action Button Element -->
                <div class="absolute -bottom-8 left-12 glass-panel rounded-xl p-3 flex items-center gap-3 transform rotate-12 hover:rotate-0 transition-transform duration-500 animate-float z-40">
                    <div class="w-10 h-10 rounded-full bg-brand-purple flex items-center justify-center text-white shadow-inner">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-slate-800">Reconciled</div>
                        <div class="text-xs text-slate-500">Just now</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- RIGHT SIDE: Login Form -->
<div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-slate-50 right-panel-bg relative z-10">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="flex items-center gap-2 mb-10">
                <div class="w-10 h-10 bg-brand-purple rounded-xl flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-calculator text-xl"></i>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">LedgeInvo<span class="text-brand-purple">.</span></span>
            </div>

            <h2 class="text-3xl font-bold text-slate-900 mb-2">Welcome back</h2>
            <p class="text-slate-500 mb-8">Enter your credentials to access your dashboard.</p>

            <!-- Form -->
            <form action="#" method="POST" class="space-y-6" id="loginForm">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-slate-400"></i>
                        </div>
                        <input type="email" id="email" name="email"
                            class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-purple focus:border-transparent transition-all shadow-sm"
                            placeholder="name@company.com" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <a href="#" class="text-sm font-medium text-brand-purple hover:text-brand-darkPurple transition-colors">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-slate-400"></i>
                        </div>
                        <input type="password" id="password" name="password"
                            class="w-full pl-11 pr-12 py-3.5 bg-white border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-purple focus:border-transparent transition-all shadow-sm"
                            placeholder="••••••••" required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer text-slate-400 hover:text-brand-purple transition-colors" id="togglePassword">
                            <i class="fa-regular fa-eye" id="eyeIcon"></i>
                        </div>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 text-brand-purple focus:ring-brand-purple border-slate-300 rounded cursor-pointer">
                    <label for="remember-me" class="ml-2 block text-sm text-slate-600 cursor-pointer">
                        Keep me signed in
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-semibold text-white bg-brand-purple hover:bg-brand-darkPurple focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-purple transition-all duration-300 transform hover:-translate-y-0.5">
                    Login
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-slate-50 text-slate-500">Or continue with</span>
                </div>
            </div>

            <!-- Social Login -->
            <div class="mt-6 grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center gap-2 w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-700 font-medium hover:bg-slate-50 hover:border-slate-300 transition-colors shadow-sm">
                    <i class="fa-brands fa-google text-red-500"></i> Google
                </button>
                <button class="flex items-center justify-center gap-2 w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-700 font-medium hover:bg-slate-50 hover:border-slate-300 transition-colors shadow-sm">
                    <i class="fa-brands fa-microsoft text-blue-500"></i> Microsoft
                </button>
            </div>

            <!-- Footer Link -->
            <p class="mt-8 text-center text-sm text-slate-500">
                Don't have an account?
                <a href="/register" class="font-semibold text-brand-purple hover:text-brand-darkPurple transition-colors">Sign-Up </a>
            </p>

        </div>
    </div>

    <!-- Custom JS -->
  
    <script src="{{asset('js/Login1.js')}}"></script>
    {{-- THEME: Loads the toggle logic (icon swap, click handler, localStorage save) --}}
<script src="{{ asset('js/theme.js') }}"></script>

</body>
</html>