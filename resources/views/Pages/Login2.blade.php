<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LedgeInvo Accounting</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config (must load right after the CDN) -->
    <script src="tailwind.config.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts: Inter for clean corporate look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
   
    <Script src="{{asset('js/Login2.config.js')}}"></Script>
    <link rel="stylesheet" href="{{asset('css/Login2.css')}}">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

{{-- THEME: Anti-flash script — must run BEFORE body renders --}}
<script>
    (function() {
        var t = localStorage.getItem('ledgeinvo-theme');
        if (t) document.documentElement.setAttribute('data-theme', t);
    })();
</script>

</head>
<body class="bg-slate-300 font-sans text-slate-800 h-screen overflow-hidden flex items-center justify-center relative selection:bg-brand-purple selection:text-white">

    <!-- BACKGROUND: 3D MOVING CARDS SCENE -->
    <div class="scene-container absolute inset-0 z-0 pointer-events-none">

        <!-- Muted Gradient Overlay (Not too dark, not too bright) -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-200 via-slate-300 to-[#D8D4E8] z-0"></div>

        <!-- Ambient Soft Glows -->
        <div class="absolute top-[-20%] left-[-10%] w-[800px] h-[800px] bg-white/40 rounded-full blur-[120px] z-0"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[800px] h-[800px] bg-brand-purple/10 rounded-full blur-[120px] z-0"></div>

        <!-- 3D Floating Card 1: Invoice/Receipt (Top Left) -->
        <div class="float-element w-64 h-80 top-[10%] left-[5%] opacity-80 animate-drift-1 p-6 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold text-brand-purple tracking-widest uppercase">Invoice #INV-2026</span>
                    <i class="fa-solid fa-file-invoice text-slate-300"></i>
                </div>
                <div class="space-y-3">
                    <div class="h-2 w-3/4 bg-slate-200 rounded"></div>
                    <div class="h-2 w-1/2 bg-slate-200 rounded"></div>
                    <div class="h-2 w-5/6 bg-slate-200 rounded"></div>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs text-slate-400">Total Due</span>
                    <span class="text-lg font-bold text-brand-purple">$4,250.00</span>
                </div>
                <div class="h-2 w-full bg-brand-purple/10 rounded"></div>
            </div>
        </div>

        <!-- 3D Floating Card 2: Analytics Chart (Bottom Right) -->
        <div class="float-element w-72 h-56 top-[60%] right-[8%] opacity-90 animate-drift-2 p-6">
            <div class="flex justify-between items-center mb-6">
                <span class="text-xs font-bold text-slate-500 tracking-widest uppercase">Revenue Growth</span>
                <i class="fa-solid fa-chart-line text-brand-purple"></i>
            </div>
            <!-- Simulated Bar Chart -->
            <div class="flex items-end justify-between h-24 gap-2">
                <div class="w-1/5 bg-brand-purple/20 rounded-t h-[40%]"></div>
                <div class="w-1/5 bg-brand-purple/40 rounded-t h-[60%]"></div>
                <div class="w-1/5 bg-brand-purple/60 rounded-t h-[80%]"></div>
                <div class="w-1/5 bg-brand-purple/80 rounded-t h-[50%]"></div>
                <div class="w-1/5 bg-brand-purple rounded-t h-[95%]"></div>
            </div>
        </div>

        <!-- 3D Floating Card 3: Credit Card (Top Right) -->
        <div class="float-element w-80 h-48 top-[15%] right-[15%] opacity-70 animate-drift-3 p-6 flex flex-col justify-between bg-gradient-to-br from-white/90 to-brand-lightPurple/40">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-brand-purple/20 flex items-center justify-center">
                    <i class="fa-solid fa-chart-pie text-brand-purple text-lg"></i>
                </div>
                <span class="text-brand-purple font-bold tracking-wider text-sm">LedgeInvo</span>
            </div>
            <div>
                <div class="text-slate-700 text-lg font-mono tracking-widest mb-3">
                    5022 3386 9820 1246
                </div>
                <div class="flex justify-between items-center text-slate-500 text-xs font-mono uppercase tracking-wider">
                    <span>FINANCES</span>
                    <span>01/28</span>
                </div>
            </div>
        </div>

        <!-- 3D Floating Card 4: Balance Sheet / Ledger (Bottom Left) -->
        <div class="float-element w-56 h-64 bottom-[10%] left-[10%] opacity-85 animate-drift-4 p-6 flex flex-col justify-between">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-lg bg-brand-purple/10 flex items-center justify-center">
                    <i class="fa-solid fa-calculator text-brand-purple text-sm"></i>
                </div>
                <span class="text-xs font-bold text-slate-500 tracking-widest uppercase">Balance Sheet</span>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-slate-400">Assets</span>
                    <span class="font-semibold text-slate-700">$120,000</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-slate-400">Liabilities</span>
                    <span class="font-semibold text-slate-700">$45,000</span>
                </div>
                <div class="flex justify-between items-center text-sm border-t border-slate-100 pt-2">
                    <span class="text-brand-purple font-bold">Equity</span>
                    <span class="font-bold text-brand-purple">$75,000</span>
                </div>
            </div>
        </div>

    </div>

    <!-- FOREGROUND: Login Form -->
    <div class="relative z-10 w-full max-w-[480px] mx-4">

        <div class="form-card rounded-3xl p-10 md:p-12 animate-fade-in-up">

            <!-- Logo -->
            <div class="flex flex-col items-center mb-10">
                <div class="w-14 h-14 bg-brand-purple rounded-2xl flex items-center justify-center text-white shadow-lg shadow-brand-purple/30 mb-4 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white">LedgeInvo</h1>
                <p class="text-sm text-brand-purple font-semibold tracking-widest uppercase mt-1">Financial Intelligence</p>
            </div>

            <!-- Header Text -->
           <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2 text-center">Client Portal Login</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-10 text-center">Enter your credentials to access your dashboard.</p>
            <form action="#" method="POST" class="space-y-8" id="loginForm">
                @csrf

                <!-- Email Input -->
                <div class="relative input-group">
                    <input type="email" id="email" name="email"
                        class="w-full bg-transparent border-0 border-b border-slate-300 text-slate-900 py-3 px-0 focus:outline-none focus:ring-0 peer placeholder-transparent transition-colors duration-300 text-base"
                        placeholder="Email" required>
                    <label for="email" class="absolute left-0 top-3 text-slate-500 text-base transition-all duration-300 pointer-events-none origin-left">
                        Email Address
                    </label>
                    <i class="fa-regular fa-envelope absolute right-0 top-4 text-slate-400 peer-focus:text-brand-purple transition-colors"></i>
                </div>

                <!-- Password Input -->
                <div class="relative input-group">
                    <input type="password" id="password" name="password"
                        class="w-full bg-transparent border-0 border-b border-slate-300 text-slate-900 py-3 px-0 focus:outline-none focus:ring-0 peer placeholder-transparent transition-colors duration-300 text-base"
                        placeholder="Password" required>
                    <label for="password" class="absolute left-0 top-3 text-slate-500 text-base transition-all duration-300 pointer-events-none origin-left">
                        Password
                    </label>
                    <i class="fa-regular fa-eye absolute right-0 top-4 text-slate-400 cursor-pointer hover:text-brand-purple transition-colors" id="togglePassword" data-target="password"></i>
                </div>

                <!-- Options Row -->
                <div class="flex items-center justify-between pt-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-slate-300 text-brand-purple focus:ring-brand-purple cursor-pointer transition-colors">
                        <span class="text-sm text-slate-600 dark:text-slate-300 group-hover:text-brand-purple transition-colors">Remember me</span>
                    </label>
                    <a href="#" class="text-sm font-semibold text-brand-purple hover:text-brand-darkPurple transition-colors">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full relative overflow-hidden group bg-brand-purple text-white font-bold py-4 rounded-xl shadow-[0_10px_20px_-10px_rgba(123,104,178,0.5)] hover:shadow-[0_15px_30px_-10px_rgba(123,104,178,0.7)] transition-all duration-300 transform hover:-translate-y-0.5 mt-4 text-base">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Sign In Securely <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </span>
                    <div class="absolute inset-0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite] bg-gradient-to-r from-transparent via-white/20 to-transparent z-0"></div>
                </button>
            </form>

            <!-- Footer Link -->
           <p class="mt-8 text-center text-sm text-slate-500 dark:text-slate-400">
                Don't have an account?
                <a href="#" class="font-bold text-brand-purple hover:text-brand-darkPurple transition-colors underline decoration-slate-300 underline-offset-4 hover:decoration-brand-purple">Sign Up</a>
            </p>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="{{asset('js/Login2.js')}}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>