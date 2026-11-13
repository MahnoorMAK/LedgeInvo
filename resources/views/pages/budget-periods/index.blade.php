<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Periods - AccountGo</title>
    <link rel="stylesheet" href="{{ asset('css/budget-periods.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <span class="logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                <h2>ACCOUNT<span>GO</span></h2>
            </div>
            <div class="search-menu">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search menu...">
            </div>
            
            <nav class="menu">
                <p class="menu-label">Overview</p>
                <a href="#" class="menu-item"><i class="fa-solid fa-border-all"></i> Dashboard</a>
                
                <p class="menu-label">Sales & Revenue</p>
                <a href="#" class="menu-item"><i class="fa-solid fa-file-invoice"></i> Proposal</a>
                <a href="#" class="menu-item"><i class="fa-solid fa-file-invoice-dollar"></i> Sales Invoice</a>
                
                <p class="menu-label">Accounting & Finance</p>
                <a href="#" class="menu-item"><i class="fa-solid fa-calculator"></i> Accounting</a>
                <a href="#" class="menu-item"><i class="fa-solid fa-bullseye"></i> Goal <i class="fa-solid fa-chevron-down arrow"></i></a>
                
                <!-- Budget Planner Active -->
                <a href="#" class="menu-item active"><i class="fa-solid fa-wallet"></i> Budget Planner <i class="fa-solid fa-chevron-up arrow"></i></a>
                <a href="#" class="sub-menu-item">Budget</a>
                <a href="#" class="sub-menu-item active">Budget Periods</a>
                <a href="#" class="sub-menu-item">Budget Allocations</a>
                <a href="#" class="sub-menu-item">Budget Monitoring</a>
                
                <a href="#" class="menu-item"><i class="fa-solid fa-book"></i> Double Entry</a>
                <a href="#" class="menu-item"><i class="fa-solid fa-coins"></i> Assets</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="breadcrumb">
                    <i class="fa-solid fa-bars"></i>
                    <span>Budget Planner</span> <i class="fa-solid fa-chevron-right"></i>
                    <span class="active-page">Budget Periods</span>
                </div>
                <div class="topbar-right">
                    <div class="lang-dropdown"><i class="fa-solid fa-globe"></i> GB English <i class="fa-solid fa-chevron-down"></i></div>
                    <div class="profile-icon"><i class="fa-solid fa-user"></i></div>
                </div>
            </header>

            <div class="content-area">
                <!-- Page Title -->
                <div class="page-title">
                    <div>
                        <h1>Budget Periods</h1>
                        <p>Manage and configure budget periods, financial years, and approval workflows.</p>
                    </div>
                    <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <!-- Filters Top Bar -->
                    <div class="table-header-filters">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Search Budget Periods...">
                            <button class="btn-search">Search</button>
                        </div>
                        
                        <div class="right-filters">
                            <div class="dropdown custom-dropdown">
                                <button class="drop-btn">10 per page <i class="fa-solid fa-chevron-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">10 per page</a>
                                    <a href="#">25 per page</a>
                                    <a href="#">50 per page</a>
                                </div>
                            </div>

                            <!-- Filters Dropdown (AccountGo Style) -->
                            <div class="dropdown custom-dropdown" id="filterDropdown">
                                <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                                
                                <!-- Filter Panel -->
                                <div class="filter-panel" id="filterPanel">
                                    <div class="filter-row">
                                        <!-- Financial Year -->
                                        <div class="filter-group">
                                            <label>Financial Year</label>
                                            <input type="text" id="filterYear" placeholder="Enter Financial Year" class="filter-input">
                                        </div>
                                        
                                        <!-- Date Range -->
                                        <div class="filter-group">
                                            <label>Date Range</label>
                                            <input type="date" id="filterDate" placeholder="Select date range" class="filter-input">
                                        </div>
                                    </div>
                                    
                                    <div class="filter-actions">
                                        <button class="btn-clear">Clear</button>
                                        <button class="btn-apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="tabs">
                        <div class="tab active" data-target="all"><i class="fa-solid fa-border-all"></i> All <span class="badge">5</span></div>
                        <div class="tab" data-target="draft"><i class="fa-regular fa-file"></i> Draft <span class="badge">0</span></div>
                        <div class="tab" data-target="approved"><i class="fa-regular fa-circle-check"></i> Approved <span class="badge">0</span></div>
                        <div class="tab" data-target="active"><i class="fa-solid fa-play"></i> Active <span class="badge">5</span></div>
                        <div class="tab" data-target="closed"><i class="fa-solid fa-xmark"></i> Closed <span class="badge">0</span></div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Period Name <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Financial Year <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Start Date <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>End Date <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Status</th>
                                    <th>Approved By</th>
                                    <th style="text-align: right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 -->
                                <tr class="row-item" data-status="active">
                                    <td><div class="period-name">Q1 2024 Budget</div></td>
                                    <td><span class="year-badge">2024</span></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2023-12-31</div></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-03-30</div></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=5" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Nicole Young</h5>
                                                <p>nicole.young@client.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="row-item" data-status="active">
                                    <td><div class="period-name">Q2 2024 Budget</div></td>
                                    <td><span class="year-badge">2024</span></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-03-31</div></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-06-29</div></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=9" alt="User"></div>
                                            <div class="user-text">
                                                <h5>XYZ Industries</h5>
                                                <p>info@xyzind.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="row-item" data-status="active">
                                    <td><div class="period-name">Q3 2024 Budget</div></td>
                                    <td><span class="year-badge">2024</span></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-06-30</div></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-09-29</div></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=15" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Global Solutions Ltd</h5>
                                                <p>sales@globalsol.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="row-item" data-status="active">
                                    <td><div class="period-name">Q4 2024 Budget</div></td>
                                    <td><span class="year-badge">2024</span></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-09-30</div></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-12-30</div></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=3" alt="User"></div>
                                            <div class="user-text">
                                                <h5>James Garcia</h5>
                                                <p>james.garcia@company.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 5 -->
                                <tr class="row-item" data-status="active">
                                    <td><div class="period-name">Annual Budget 2024</div></td>
                                    <td><span class="year-badge">2024</span></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2023-12-31</div></td>
                                    <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-12-30</div></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=8" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Future Tech Ltd</h5>
                                                <p>hello@futuretech.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="{{ asset('js/budget-periods.js') }}"></script>
</body>
</html>