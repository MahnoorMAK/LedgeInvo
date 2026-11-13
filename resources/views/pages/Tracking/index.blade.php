<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tracking - AccountGo</title>
    <link rel="stylesheet" href="{{ asset('css/tracking.css') }}">
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
                <a href="#" class="menu-item active"><i class="fa-solid fa-bullseye"></i> Goal <i class="fa-solid fa-chevron-up arrow"></i></a>
                <a href="#" class="sub-menu-item active">Goals</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="breadcrumb">
                    <i class="fa-solid fa-bars"></i>
                    <span>Dashboard</span> <i class="fa-solid fa-chevron-right"></i>
                    <span>Goal</span> <i class="fa-solid fa-chevron-right"></i>
                    <span class="active-page">Tracking</span>
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
                        <h1>Manage Tracking</h1>
                        <p>Track and evaluate goal progress, contribution amounts, timeline pace, and performance indicators.</p>
                    </div>
                    <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                </div>

                <!-- Stat Cards -->
                <div class="stat-cards">
                    <div class="card purple-card">
                        <div class="card-top"><span>Total Trackings</span> <i class="fa-solid fa-chart-line"></i></div>
                        <h3>8</h3>
                        <p>All records</p>
                    </div>
                    <div class="card green-card">
                        <div class="card-top"><span>On Track</span> <i class="fa-regular fa-circle-check"></i></div>
                        <h3>6</h3>
                        <p>On track / Ahead</p>
                    </div>
                    <div class="card yellow-card">
                        <div class="card-top"><span>Behind</span> <i class="fa-regular fa-clock"></i></div>
                        <h3>2</h3>
                        <p>Requires focus</p>
                    </div>
                    <div class="card red-card">
                        <div class="card-top"><span>Critical</span> <i class="fa-solid fa-circle-exclamation"></i></div>
                        <h3>0</h3>
                        <p>Immediate action</p>
                    </div>
                    <div class="card teal-card">
                        <div class="card-top"><span>Total Contributions</span> <i class="fa-solid fa-arrow-trend-up"></i></div>
                        <h3>$16,250.00</h3>
                        <p>Cumulative contribution</p>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <!-- Filters -->
                    <div class="table-header-filters">
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Search Goals..." id="searchInput">
                            <button class="btn-clear-search" id="clearSearchBtn" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
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

                            <!-- UPDATED FILTER DROPDOWN WITH PANEL -->
                            <div class="dropdown custom-dropdown" id="filterDropdown">
                                <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                                
                                <!-- Filter Panel -->
                                <div class="filter-panel" id="filterPanel">
                                    <div class="filter-row">
                                        <div class="filter-group">
                                            <label>Goal</label>
                                            
                                            <!-- CUSTOM DROPDOWN START -->
                                            <div class="custom-select-wrapper">
                                                <div class="custom-select-trigger" id="goalSelectTrigger">
                                                    <span id="selectedGoalText">All Goals</span>
                                                    <i class="fa-solid fa-chevron-down"></i>
                                                </div>
                                                <div class="custom-options" id="goalOptions">
                                                    <div class="custom-option selected" data-value="all">All Goals</div>
                                                    <div class="custom-option" data-value="investment">Investment Portfolio</div>
                                                    <div class="custom-option" data-value="credit">Credit Card Debt</div>
                                                    <div class="custom-option" data-value="operational">Operational Cost Reduction</div>
                                                    <div class="custom-option" data-value="retirement">Retirement Savings</div>
                                                    <div class="custom-option" data-value="student">Student Loan Payoff</div>
                                                </div>
                                            </div>
                                            <!-- CUSTOM DROPDOWN END -->

                                        </div>
                                        <div class="filter-group">
                                            <label>Date Range</label>
                                            <input type="date" placeholder="Select date range">
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
                        <div class="tab active" data-target="all"><i class="fa-solid fa-border-all"></i> All <span class="badge">8</span></div>
                        <div class="tab" data-target="ahead"><i class="fa-solid fa-plane-up"></i> Ahead <span class="badge">3</span></div>
                        <div class="tab" data-target="ontrack"><i class="fa-regular fa-circle-check"></i> On Track <span class="badge">3</span></div>
                        <div class="tab" data-target="behind"><i class="fa-regular fa-clock"></i> Behind <span class="badge">2</span></div>
                        <div class="tab" data-target="critical"><i class="fa-solid fa-circle-exclamation"></i> Critical <span class="badge">0</span></div>
                    </div>

                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Goal <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Date <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Contribution / Current <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Progress <i class="fa-solid fa-arrow-up"></i></th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr class="row-item" data-status="behind">
                                    <td>
                                        <div class="goal-name">Investment Portfolio</div>
                                        <div class="goal-type"><i class="fa-regular fa-circle-dot"></i> Goal Type: Expense Reduction</div>
                                    </td>
                                    <td>
                                        <div class="date"><i class="fa-regular fa-calendar"></i> 2026-01-17</div>
                                        <div class="days-left">335 days left</div>
                                    </td>
                                    <td>
                                        <div class="amount">$5,000.00</div>
                                        <div class="current">$5,000.00</div>
                                    </td>
                                    <td>
                                        <div class="progress-text">5%</div>
                                        <div class="progress-bar"><div class="progress-fill" style="width: 5%;"></div></div>
                                    </td>
                                    <td><span class="status badge-behind">Behind</span></td>
                                    <td class="actions">
                                        <i class="fa-regular fa-eye action-icon"></i>
                                        <i class="fa-regular fa-pen-to-square action-icon"></i>
                                        <i class="fa-regular fa-trash-can action-icon delete"></i>
                                    </td>
                                </tr>
                                <tr class="row-item" data-status="behind">
                                    <td>
                                        <div class="goal-name">Credit Card Debt</div>
                                        <div class="goal-type"><i class="fa-regular fa-circle-dot"></i> Goal Type: Debt Reduction</div>
                                    </td>
                                    <td>
                                        <div class="date"><i class="fa-regular fa-calendar"></i> 2026-01-22</div>
                                        <div class="days-left">330 days left</div>
                                    </td>
                                    <td>
                                        <div class="amount">$2,500.00</div>
                                        <div class="current">$7,500.00</div>
                                    </td>
                                    <td>
                                        <div class="progress-text">8%</div>
                                        <div class="progress-bar"><div class="progress-fill" style="width: 8%;"></div></div>
                                    </td>
                                    <td><span class="status badge-behind">Behind</span></td>
                                    <td class="actions">
                                        <i class="fa-regular fa-eye action-icon"></i>
                                        <i class="fa-regular fa-pen-to-square action-icon"></i>
                                        <i class="fa-regular fa-trash-can action-icon delete"></i>
                                    </td>
                                </tr>
                                <tr class="row-item" data-status="ontrack">
                                    <td>
                                        <div class="goal-name">Retirement Savings</div>
                                        <div class="goal-type"><i class="fa-regular fa-circle-dot"></i> Goal Type: Savings</div>
                                    </td>
                                    <td>
                                        <div class="date"><i class="fa-regular fa-calendar"></i> 2026-02-01</div>
                                        <div class="days-left">320 days left</div>
                                    </td>
                                    <td>
                                        <div class="amount">$3,000.00</div>
                                        <div class="current">$11,500.00</div>
                                    </td>
                                    <td>
                                        <div class="progress-text">12%</div>
                                        <div class="progress-bar"><div class="progress-fill fill-green" style="width: 12%;"></div></div>
                                    </td>
                                    <td><span class="status badge-ontrack">On Track</span></td>
                                    <td class="actions">
                                        <i class="fa-regular fa-eye action-icon"></i>
                                        <i class="fa-regular fa-pen-to-square action-icon"></i>
                                        <i class="fa-regular fa-trash-can action-icon delete"></i>
                                    </td>
                                </tr>
                                <tr class="row-item" data-status="ahead">
                                    <td>
                                        <div class="goal-name">Student Loan Payoff</div>
                                        <div class="goal-type"><i class="fa-regular fa-circle-dot"></i> Goal Type: Debt Reduction</div>
                                    </td>
                                    <td>
                                        <div class="date"><i class="fa-regular fa-calendar"></i> 2026-02-06</div>
                                        <div class="days-left">315 days left</div>
                                    </td>
                                    <td>
                                        <div class="amount">$1,500.00</div>
                                        <div class="current">$13,000.00</div>
                                    </td>
                                    <td>
                                        <div class="progress-text">13%</div>
                                        <div class="progress-bar"><div class="progress-fill fill-green" style="width: 13%;"></div></div>
                                    </td>
                                    <td><span class="status badge-ahead">Ahead</span></td>
                                    <td class="actions">
                                        <i class="fa-regular fa-eye action-icon"></i>
                                        <i class="fa-regular fa-pen-to-square action-icon"></i>
                                        <i class="fa-regular fa-trash-can action-icon delete"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Pagination -->
                    <div class="table-footer">
                        <div class="showing-text">Showing 1 to 8 of 8 results</div>
                        <div class="pagination">
                            <button class="page-btn"><i class="fa-solid fa-chevron-left"></i> Previous</button>
                            <button class="page-btn active-page">1</button>
                            <button class="page-btn">Next <i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="{{ asset('js/tracking.js') }}"></script>
</body>
</html>