<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apexbooks · Sign in</title>
    <!-- Tailwind via CDN (v3) for easy preview -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for subtle icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom overrides & font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap');
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(145deg, #f9f7fe 0%, #f0f2f8 100%);
            /* subtle texture for depth */
            position: relative;
        }
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 30%, rgba(180, 160, 220, 0.08) 0%, transparent 35%),
                              radial-gradient(circle at 90% 70%, rgba(100, 140, 200, 0.08) 0%, transparent 40%);
            pointer-events: none;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.5) inset;
        }
        .role-tab {
            transition: all 0.2s ease;
            border: 1.5px solid transparent;
        }
        .role-tab.active {
            background: white;
            border-color: #8b7bb8;
            box-shadow: 0 8px 18px -6px rgba(139, 123, 184, 0.25);
            color: #3a2e5a;
            font-weight: 600;
        }
        .role-tab:not(.active) {
            color: #5a5e6b;
            background: rgba(255,255,255,0.6);
        }
        .role-tab:not(.active):hover {
            background: white;
            border-color: #cfc6e6;
            color: #3a2e5a;
        }
        .input-field {
            background: white;
            border: 1.5px solid #e2e4ec;
            transition: all 0.2s ease;
        }
        .input-field:focus {
            border-color: #8b7bb8;
            box-shadow: 0 0 0 4px rgba(139, 123, 184, 0.12);
            outline: none;
        }
        .btn-primary {
            background: linear-gradient(105deg, #7463b0 0%, #8d7ac0 100%);
            transition: all 0.2s ease;
            box-shadow: 0 10px 18px -8px rgba(116, 99, 176, 0.4);
        }
        .btn-primary:hover {
            background: linear-gradient(105deg, #6553a0 0%, #7e6bb0 100%);
            box-shadow: 0 14px 22px -8px rgba(116, 99, 176, 0.55);
            transform: translateY(-1px);
        }
        .text-accent {
            color: #5d4b8c;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-5 antialiased">

    <!-- main login card -->
    <div class="glass-card w-full max-w-5xl rounded-3xl overflow-hidden flex flex-col md:flex-row shadow-2xl relative z-10">
        
        <!-- LEFT PANEL: brand + accent (aesthetic and eye-catchy but not too dark/light) -->
        <div class="md:w-5/12 bg-gradient-to-br from-[#f2effb] to-[#e9e5f5] p-8 flex flex-col justify-between relative overflow-hidden">
            <!-- decorative circles -->
            <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full bg-[#b8a9e0] opacity-20 blur-2xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-[#9f8fd4] opacity-15 blur-3xl"></div>
            
            <div class="relative">
                <!-- logo / brand -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#7463b0] flex items-center justify-center shadow-md">
                        <i class="fa-solid fa-cubes text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-[#2d2440]">Apexbooks</span>
                </div>
                <p class="mt-2 text-sm font-medium text-[#5e5475]">Financial clarity for every role.</p>
            </div>

            <!-- tagline / quote -->
            <div class="relative mt-12 md:mt-0">
                <div class="bg-white/50 p-5 rounded-2xl border border-white/70 backdrop-blur-sm">
                    <i class="fa-solid fa-quote-left text-[#8b7bb8] text-xl mb-2"></i>
                    <p class="text-[#2d2440] text-base leading-relaxed font-medium">Streamlined access for companies, vendors, customers & more.</p>
                    <div class="flex mt-3 space-x-1">
                        <div class="w-8 h-1 rounded-full bg-[#b8a9e0]"></div>
                        <div class="w-6 h-1 rounded-full bg-[#cfc3e8]"></div>
                        <div class="w-4 h-1 rounded-full bg-[#ddd4f0]"></div>
                    </div>
                </div>
            </div>

            <!-- small footer / meta -->
            <div class="relative text-xs text-[#6a5f82] mt-8 flex items-center gap-2">
                <i class="fa-regular fa-shield-halved"></i>
                <span>Secure multi-role portal</span>
            </div>
        </div>

        <!-- RIGHT PANEL: login form + role selector -->
        <div class="md:w-7/12 bg-white/80 p-8 md:p-10">
            <div class="max-w-md mx-auto">
                <h2 class="text-3xl font-bold text-[#1f1a2e]">Welcome back</h2>
                <p class="text-[#5f5a6b] mt-1 mb-7">Sign in with your preferred role</p>

                <!-- ROLE SELECTOR (Company, Vendor, Customer, Employee, Admin) -->
                <div class="mb-7">
                    <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                        <!-- Company -->
                        <button type="button" class="role-tab active flex flex-col items-center justify-center py-2.5 px-1 rounded-xl text-xs font-medium">
                            <i class="fa-regular fa-building text-base mb-1"></i>
                            <span>Company</span>
                        </button>
                        <!-- Vendor -->
                        <button type="button" class="role-tab flex flex-col items-center justify-center py-2.5 px-1 rounded-xl text-xs font-medium">
                            <i class="fa-regular fa-handshake text-base mb-1"></i>
                            <span>Vendor</span>
                        </button>
                        <!-- Customer -->
                        <button type="button" class="role-tab flex flex-col items-center justify-center py-2.5 px-1 rounded-xl text-xs font-medium">
                            <i class="fa-regular fa-user text-base mb-1"></i>
                            <span>Customer</span>
                        </button>
                        <!-- Employee -->
                        <button type="button" class="role-tab flex flex-col items-center justify-center py-2.5 px-1 rounded-xl text-xs font-medium">
                            <i class="fa-regular fa-id-card text-base mb-1"></i>
                            <span>Employee</span>
                        </button>
                        <!-- Admin -->
                        <button type="button" class="role-tab flex flex-col items-center justify-center py-2.5 px-1 rounded-xl text-xs font-medium">
                            <i class="fa-regular fa-crown text-base mb-1"></i>
                            <span>Admin</span>
                        </button>
                    </div>
                    <!-- subtle indicator (optional) -->
                    <p class="text-[11px] text-[#817a92] mt-2 flex items-center gap-1">
                        <i class="fa-regular fa-circle-check text-[#9f8fd4]"></i>
                        Selected role: <span id="selectedRoleLabel" class="font-semibold text-[#5d4b8c]">Company</span>
                    </p>
                </div>

                <!-- LOGIN FORM -->
                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    <!-- Email / username -->
                    <div>
                        <label class="block text-sm font-medium text-[#2f2a3c] mb-1.5">Email or username</label>
                        <div class="relative">
                            <i class="fa-regular fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-[#a49bb8] text-sm"></i>
                            <input type="email" name="email" placeholder="you@company.com" 
                                   class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-sm placeholder:text-[#b6afc7] text-[#1f1a2e]">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-sm font-medium text-[#2f2a3c]">Password</label>
                            <a href="#" class="text-xs font-medium text-[#7463b0] hover:text-[#5d4b8c] transition">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <i class="fa-regular fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-[#a49bb8] text-sm"></i>
                            <input type="password" name="password" placeholder="••••••••" 
                                   class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-sm placeholder:text-[#b6afc7] text-[#1f1a2e]">
                            <button type="button" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#a49bb8] hover:text-[#7463b0] transition">
                                <i class="fa-regular fa-eye-slash text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember + submit -->
                    <div class="flex items-center justify-between pt-2">
                        <label class="flex items-center gap-2 text-sm text-[#4c4659]">
                            <input type="checkbox" class="w-4 h-4 rounded border-[#d1cbdf] text-[#7463b0] focus:ring-[#b8a9e0]">
                            <span>Keep me signed in</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full py-3.5 rounded-xl text-white font-semibold text-sm tracking-wide flex items-center justify-center gap-2">
                        <span>Sign in as <span id="buttonRoleLabel">Company</span></span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>

                <!-- Divider / signup alternative -->
                <div class="relative my-7">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-[#e5e0ee]"></div>
                    </div>
                    <div class="relative flex justify-center text-xs">
                        <span class="bg-white/80 px-3 text-[#817a92]">New to Apexbooks?</span>
                    </div>
                </div>

                <div class="text-center">
                    <a href="#" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#5d4b8c] hover:text-[#3a2e5a] transition">
                        <i class="fa-regular fa-circle-user"></i> Create an account
                    </a>
                </div>

                <!-- subtle foot note -->
                <p class="text-[11px] text-center text-[#a49bb8] mt-8">
                    <i class="fa-regular fa-lock mr-1"></i> Your data is encrypted & secure.
                </p>
            </div>
        </div>
    </div>

    <!-- tiny script for role interaction (purely frontend demo) -->
    <script>
        (function() {
            const roleTabs = document.querySelectorAll('.role-tab');
            const selectedRoleLabel = document.getElementById('selectedRoleLabel');
            const buttonRoleLabel = document.getElementById('buttonRoleLabel');

            // Function to update active state and labels
            function setActiveRole(activeTab) {
                // remove active class from all
                roleTabs.forEach(tab => tab.classList.remove('active'));
                // add active to clicked
                activeTab.classList.add('active');
                
                // Get the role name (second span inside button)
                const roleName = activeTab.querySelector('span')?.innerText || 'Company';
                // Update displayed role
                if (selectedRoleLabel) selectedRoleLabel.innerText = roleName;
                if (buttonRoleLabel) buttonRoleLabel.innerText = roleName;
            }

            // Add click listeners
            roleTabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    setActiveRole(this);
                });
            });

            // Ensure initial active state matches label (Company)
            const initialActive = document.querySelector('.role-tab.active');
            if (initialActive) {
                const initialRole = initialActive.querySelector('span')?.innerText || 'Company';
                if (selectedRoleLabel) selectedRoleLabel.innerText = initialRole;
                if (buttonRoleLabel) buttonRoleLabel.innerText = initialRole;
            } else {
                // fallback: set first tab active if none
                if (roleTabs.length > 0) {
                    roleTabs[0].classList.add('active');
                    const firstRole = roleTabs[0].querySelector('span')?.innerText || 'Company';
                    if (selectedRoleLabel) selectedRoleLabel.innerText = firstRole;
                    if (buttonRoleLabel) buttonRoleLabel.innerText = firstRole;
                }
            }
        })();
    </script>
</body>
</html>