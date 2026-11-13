<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - AccountGo</title>
    <!-- Laravel Asset Helper -->
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
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
                <p class="menu-label">Purchase & Inventory</p>
                <a href="#" class="menu-item"><i class="fa-solid fa-cart-shopping"></i> Purchase</a>
                <a href="#" class="menu-item"><i class="fa-solid fa-box"></i> Product & Service</a>
                
                <p class="menu-label">Accounting & Finance</p>
                <a href="#" class="menu-item"><i class="fa-solid fa-file-invoice"></i> Accounting</a>
                
                <!-- Goal Menu Active -->
                <a href="#" class="menu-item active"><i class="fa-solid fa-bullseye"></i> Goal <i class="fa-solid fa-chevron-up arrow"></i></a>
                <a href="#" class="sub-menu-item">Goals</a>
                <a href="#" class="sub-menu-item">Milestones</a>
                <a href="#" class="sub-menu-item">Contributions</a>
                <a href="#" class="sub-menu-item">Tracking</a>
                <a href="#" class="sub-menu-item active">Category</a>
                
                <a href="#" class="menu-item"><i class="fa-solid fa-wallet"></i> Budget Planner</a>
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
                    <span>Dashboard</span> <i class="fa-solid fa-chevron-right"></i>
                    <span>Goal</span> <i class="fa-solid fa-chevron-right"></i>
                    <span class="active-page">Categories</span>
                </div>
                <div class="topbar-right">
                    <div class="lang-dropdown"><i class="fa-solid fa-globe"></i> GB English <i class="fa-solid fa-chevron-down"></i></div>
                    <div class="profile-icon"><i class="fa-solid fa-user"></i></div>
                </div>
            </header>

            <div class="content-area">
                <!-- Page Title -->
                <div class="page-title">
                    <h1>Manage Categories</h1>
                    <p>Manage and organize goal categories, codes, descriptions, and status settings.</p>
                </div>

                <div class="categories-layout">
                    
                    <!-- Left Side: Add Form -->
                    <div class="form-container">
                        <h3>Add New Category</h3>
                        <p>Fill in the details to create a new category</p>
                        
                        <form>
                            <div class="form-group">
                                <label>Category Name <span>*</span></label>
                                <input type="text" placeholder="Enter category name">
                            </div>
                            
                            <div class="form-group">
                                <label>Category Code <span>*</span></label>
                                <input type="text" placeholder="Enter category code">
                            </div>
                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Enter description"></textarea>
                            </div>
                            
                            <div class="toggle-group">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                                <span>Status</span>
                            </div>
                            
                            <button type="button" class="btn-submit">Add Category</button>
                        </form>
                    </div>

                    <!-- Right Side: Table -->
                    <div class="table-container">
                        <!-- Filters -->
                        <div class="table-header-filters">
                            <div class="search-box">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" placeholder="Search categories..." id="searchInput">
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

                                <!-- UPDATED FILTER DROPDOWN -->
                                <div class="dropdown custom-dropdown" id="filterDropdown">
                                    <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                                    
                                    <!-- Filter Panel -->
                                    <div class="filter-panel" id="filterPanel">
                                        <div class="filter-row">
                                            <div class="filter-group">
                                                <label>Status</label>
                                                <div class="custom-select-wrapper">
                                                    <div class="custom-select-trigger" id="statusSelectTrigger">
                                                        <span id="selectedStatusText">All Status</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>
                                                    <div class="custom-options" id="statusOptions">
                                                        <div class="custom-option selected" data-value="all">All Status</div>
                                                        <div class="custom-option" data-value="active">Active</div>
                                                        <div class="custom-option" data-value="inactive">Inactive</div>
                                                    </div>
                                                </div>
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

                        <!-- Table -->
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category <i class="fa-solid fa-arrow-up"></i></th>
                                        <th>Code <i class="fa-solid fa-arrow-up"></i></th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <!-- Row 1 -->
                                    <tr class="row-item" data-status="active">
                                        <td>
                                            <div class="category-info">
                                                <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                                <div class="category-text">
                                                    <h4>Personal Development</h4>
                                                    <p>Goals focused on self-improvement and skill development</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="code-badge code-purple">PERSONAL_DEV</span></td>
                                        <td><span class="status-badge status-active">Active</span></td>
                                        <td class="actions">
                                            <i class="fa-regular fa-pen-to-square action-icon"></i>
                                            <i class="fa-regular fa-trash-can action-icon"></i>
                                        </td>
                                    </tr>
                                    
                                    <!-- Row 2 -->
                                    <tr class="row-item" data-status="active">
                                        <td>
                                            <div class="category-info">
                                                <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                                <div class="category-text">
                                                    <h4>Career Growth</h4>
                                                    <p>Professional advancement and career-related objectives</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="code-badge code-pink">CAREER</span></td>
                                        <td><span class="status-badge status-active">Active</span></td>
                                        <td class="actions">
                                            <i class="fa-regular fa-pen-to-square action-icon"></i>
                                            <i class="fa-regular fa-trash-can action-icon"></i>
                                        </td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr class="row-item" data-status="inactive">
                                        <td>
                                            <div class="category-info">
                                                <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                                <div class="category-text">
                                                    <h4>Health & Fitness</h4>
                                                    <p>Physical and mental wellness goals</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="code-badge code-green">HEALTH</span></td>
                                        <td><span class="status-badge status-inactive">Inactive</span></td>
                                        <td class="actions">
                                            <i class="fa-regular fa-pen-to-square action-icon"></i>
                                            <i class="fa-regular fa-trash-can action-icon"></i>
                                        </td>
                                    </tr>

                                    <!-- Row 4 -->
                                    <tr class="row-item" data-status="active">
                                        <td>
                                            <div class="category-info">
                                                <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                                <div class="category-text">
                                                    <h4>Financial</h4>
                                                    <p>Money management and financial planning goals</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="code-badge code-blue">FINANCE</span></td>
                                        <td><span class="status-badge status-active">Active</span></td>
                                        <td class="actions">
                                            <i class="fa-regular fa-pen-to-square action-icon"></i>
                                            <i class="fa-regular fa-trash-can action-icon"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
    
    <!-- Laravel Asset Helper for JS -->
    <script src="{{ asset('js/categories.js') }}"></script>
</body>
</html>