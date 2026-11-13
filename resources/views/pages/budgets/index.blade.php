<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Budget - AccountGo</title>
    <link rel="stylesheet" href="{{ asset('css/budgets.css') }}">
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
                
                <!-- Budget Planner Menu Active -->
                <a href="#" class="menu-item active"><i class="fa-solid fa-wallet"></i> Budget Planner <i class="fa-solid fa-chevron-up arrow"></i></a>
                <a href="#" class="sub-menu-item active">Budget</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="breadcrumb">
                    <i class="fa-solid fa-bars"></i>
                    <span>Dashboard</span> <i class="fa-solid fa-chevron-right"></i>
                    <span>Budget Planner</span> <i class="fa-solid fa-chevron-right"></i>
                    <span class="active-page">Budget</span>
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
                        <h1>Manage Budget</h1>
                        <p>Plan, track, and manage all your organization budgets. Create new budgets, assign periods and types, and get approvals.</p>
                    </div>
                    <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <!-- Filters Top Bar -->
                    <div class="table-header-filters">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Search Budgets...">
                            <button class="btn-search">Search</button>
                        </div>
                        
                        <div class="right-filters">
                            <div class="view-toggle">
                                <button class="view-btn active"><i class="fa-solid fa-list-ul"></i></button>
                                <button class="view-btn"><i class="fa-solid fa-table-cells"></i></button>
                            </div>

                            <div class="dropdown custom-dropdown">
                                <button class="drop-btn">10 per page <i class="fa-solid fa-chevron-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">10 per page</a>
                                    <a href="#">25 per page</a>
                                    <a href="#">50 per page</a>
                                </div>
                            </div>

                            <!-- Filter Dropdown -->
                            <div class="dropdown custom-dropdown" id="filterDropdown">
                                <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                                <div class="filter-panel" id="filterPanel">
                                    <div class="filter-row">
                                        <div class="filter-group">
                                            <label>Status</label>
                                            <select>
                                                <option>All Status</option>
                                                <option>Approved</option>
                                                <option>Active</option>
                                                <option>Draft</option>
                                            </select>
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
                        <div class="tab" data-target="operational"><i class="fa-regular fa-file"></i> Operational <span class="badge">3</span></div>
                        <div class="tab" data-target="capital"><i class="fa-solid fa-building"></i> Capital <span class="badge">2</span></div>
                        <div class="tab" data-target="cash"><i class="fa-solid fa-money-bill-trend-up"></i> Cash Flow <span class="badge">0</span></div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Budget <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Period</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Approved By</th>
                                    <th style="text-align: right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 (Operational) -->
                                <tr class="row-item" data-type="operational">
                                    <td>
                                        <div class="budget-name">Marketing Budget</div>
                                        <span class="budget-type-badge type-operational"><i class="fa-regular fa-file"></i> Operational</span>
                                    </td>
                                    <td><span class="period-badge">Q1 2024 Budget</span></td>
                                    <td><span class="amount">$50,000.00</span></td>
                                    <td><span class="status-badge status-approved">Approved</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=11" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Alex Vendor</h5>
                                                <p>alex.vendor@supplier.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-play action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 2 (Capital) -->
                                <tr class="row-item" data-type="capital">
                                    <td>
                                        <div class="budget-name">IT Infrastructure</div>
                                        <span class="budget-type-badge type-capital"><i class="fa-solid fa-building"></i> Capital</span>
                                    </td>
                                    <td><span class="period-badge">Q1 2024 Budget</span></td>
                                    <td><span class="amount">$75,000.00</span></td>
                                    <td><span class="status-badge status-active">Active</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=12" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Alex Vendor</h5>
                                                <p>alex.vendor@supplier.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-xmark action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 3 (Operational) -->
                                <tr class="row-item" data-type="operational">
                                    <td>
                                        <div class="budget-name">HR Operations</div>
                                        <span class="budget-type-badge type-operational"><i class="fa-regular fa-file"></i> Operational</span>
                                    </td>
                                    <td><span class="period-badge">Q1 2024 Budget</span></td>
                                    <td><span class="amount">$30,000.00</span></td>
                                    <td><span class="status-badge status-approved">Approved</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=13" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Elite Vendors Group</h5>
                                                <p>orders@elitevendors.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-play action-icon"></i>
                                    </td>
                                </tr>

                                <!-- Row 4 (Operational) -->
                                <tr class="row-item" data-type="operational">
                                    <td>
                                        <div class="budget-name">Office Supplies</div>
                                        <span class="budget-type-badge type-operational"><i class="fa-regular fa-file"></i> Operational</span>
                                    </td>
                                    <td><span class="period-badge">Q1 2024 Budget</span></td>
                                    <td><span class="amount">$15,000.00</span></td>
                                    <td><span class="status-badge status-draft">Draft</span></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="avatar"><img src="https://i.pravatar.cc/100?img=14" alt="User"></div>
                                            <div class="user-text">
                                                <h5>Sam Supplier</h5>
                                                <p>sam.supplier@vendor.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <i class="fa-solid fa-check action-icon"></i>
                                        <i class="fa-regular fa-pen-to-square action-icon"></i>
                                        <i class="fa-regular fa-trash-can action-icon"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="{{ asset('js/budgets.js') }}"></script>
</body>
</html>