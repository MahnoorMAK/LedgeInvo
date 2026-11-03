<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — AccountGo</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Sidebar CSS (Purani) -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Naya Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="app-container">
        
        <!-- 1. SIDEBAR INCLUDE -->
        @include('components.sidebar')

        <!-- 2. MAIN DASHBOARD AREA -->
       
            
            <!-- TOPBAR -->
            <header class="topbar">
                <div class="topbar-search">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search anything...">
                </div>

                <div class="topbar-actions">
                    <button class="icon-btn">🔔</button>
                    <button class="icon-btn">✉️</button>
                    <div class="user-profile">
                        <div class="avatar">R</div>
                        <div class="user-info">
                            <span class="user-name">Roman</span>
                            <span class="user-role">Admin</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- DASHBOARD CONTENT -->
          

                <!-- STATS CARDS -->
                <div class="stats-grid">
                    
                    <!-- Card 1 -->
                    

                    <!-- Card 2 -->
                    <div class="stat-card">
                        <div class="stat-icon icon-blue">🧾</div>
                        <div class="stat-details">
                            <h3>Invoices Paid</h3>
                            <h2>142</h2>
                            <span class="stat-trend up">↑ 8% from last month</span>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    

                  

                <!-- Recent Activity Table (Placeholder) -->
                

            </div>
        </main>
    </div>

   
</body>
</html>