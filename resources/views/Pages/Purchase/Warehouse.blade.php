@extends('Layout.dashboard')

@section('title', 'Manage Warehouses - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Purchase/Warehouse.css') }}">
@endsection

@section('content')
<div class="warehouse-page-wrapper">
    
    <!-- Page Header -->
    <div class="wh-header">
        <div>
            <h1 class="wh-title">Manage Warehouses</h1>
            <p class="wh-subtitle">Manage warehouse locations, addresses, and contacts.</p>
        </div>
        <a href="#" class="wh-add-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
    </div>

    <!-- Main Card -->
    <div class="wh-card">
        
        <!-- Controls Row -->
        <div class="wh-controls">
            <div class="wh-search-group">
                <div class="wh-search-wrapper">
                    <svg class="wh-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="wh-search-input" placeholder="Search warehouses...">
                </div>
                <button class="wh-search-btn">Search</button>
            </div>

            <div class="wh-action-group">
                <!-- View Toggles (List / Grid) -->
                <div class="wh-view-toggle">
                    <button class="wh-view-btn active" title="List View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="wh-view-btn" title="Grid View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <!-- Custom Dropdown (Per Page) -->
                <div class="wh-custom-dropdown" id="whPerPageDropdown">
                    <button type="button" class="wh-custom-dropdown-btn" id="whPerPageToggle">
                        <span id="whPerPageLabel">10 per page</span>
                        <svg class="wh-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <ul class="wh-custom-dropdown-menu" id="whPerPageMenu">
                        <li class="wh-custom-dropdown-item active" data-value="10">10 per page</li>
                        <li class="wh-custom-dropdown-item" data-value="25">25 per page</li>
                        <li class="wh-custom-dropdown-item" data-value="50">50 per page</li>
                    </ul>
                </div>

                <!-- Filter Toggle -->
                <button class="wh-filter-btn" id="whFilterToggle">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Filter Panel (Hidden by default) -->
        <div class="wh-filter-panel" id="whFilterPanel">
            <div class="wh-filter-row">
                <!-- City Filter -->
                <div class="wh-filter-group">
                    <label>City</label>
                    <div class="wh-custom-dropdown filter-dropdown" data-filter="city">
                        <button type="button" class="wh-custom-dropdown-btn">
                            <span class="dropdown-label">Filter by city</span>
                            <svg class="wh-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <ul class="wh-custom-dropdown-menu">
                            <li class="wh-custom-dropdown-item active" data-value="">All Cities</li>
                            <li class="wh-custom-dropdown-item" data-value="Los Angeles">Los Angeles</li>
                            <li class="wh-custom-dropdown-item" data-value="Atlanta">Atlanta</li>
                            <li class="wh-custom-dropdown-item" data-value="Seattle">Seattle</li>
                            <li class="wh-custom-dropdown-item" data-value="Chicago">Chicago</li>
                        </ul>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="wh-filter-group">
                    <label>Status</label>
                    <div class="wh-custom-dropdown filter-dropdown" data-filter="status">
                        <button type="button" class="wh-custom-dropdown-btn">
                            <span class="dropdown-label">Filter by status</span>
                            <svg class="wh-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <ul class="wh-custom-dropdown-menu">
                            <li class="wh-custom-dropdown-item active" data-value="">All Status</li>
                            <li class="wh-custom-dropdown-item" data-value="Active">Active</li>
                            <li class="wh-custom-dropdown-item" data-value="Inactive">Inactive</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wh-filter-actions">
                <button class="wh-search-btn wh-btn-apply" id="whApplyFiltersBtn">Apply</button>
                <button class="wh-search-btn wh-btn-clear" id="whClearFiltersBtn">Clear</button>
            </div>
        </div>

        <!-- Table -->
        <div class="wh-table-wrapper">
            <table class="wh-table">
                <thead>
                    <tr>
                        <th>Name <span class="sort-icon">↕</span></th>
                        <th>
                            <div class="th-icon-wrapper">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                Address
                            </div>
                        </th>
                        <th>City <span class="sort-icon">↕</span></th>
                        <th>Zip Code</th>
                        <th>
                            <div class="th-icon-wrapper">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                Phone
                            </div>
                        </th>
                        <th>Status <span class="sort-icon">↕</span></th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>
                            <div class="wh-user-cell">
                                <div class="wh-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                                <div class="wh-user-info">
                                    <span class="wh-user-name">Central Distribution Center</span>
                                    <span class="wh-user-email">central@warehouse.com</span>
                                </div>
                            </div>
                        </td>
                        <td>1250 Industrial Blvd</td>
                        <td>Los Angeles</td>
                        <td>90021</td>
                        <td>+12135550101</td>
                        <td><span class="wh-status wh-status-active">Active</span></td>
                        <td class="wh-actions-cell">
                            <button class="wh-action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td>
                            <div class="wh-user-cell">
                                <div class="wh-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                                <div class="wh-user-info">
                                    <span class="wh-user-name">East Coast Logistics Hub</span>
                                    <span class="wh-user-email">eastcoast@warehouse.com</span>
                                </div>
                            </div>
                        </td>
                        <td>875 Commerce Drive</td>
                        <td>Atlanta</td>
                        <td>30309</td>
                        <td>+14045550102</td>
                        <td><span class="wh-status wh-status-active">Active</span></td>
                        <td class="wh-actions-cell">
                            <button class="wh-action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td>
                            <div class="wh-user-cell">
                                <div class="wh-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                                <div class="wh-user-info">
                                    <span class="wh-user-name">West Coast Storage Facility</span>
                                    <span class="wh-user-email">westcoast@warehouse.com</span>
                                </div>
                            </div>
                        </td>
                        <td>2100 Pacific Avenue</td>
                        <td>Seattle</td>
                        <td>98101</td>
                        <td>+12065550103</td>
                        <td><span class="wh-status wh-status-active">Active</span></td>
                        <td class="wh-actions-cell">
                            <button class="wh-action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td>
                            <div class="wh-user-cell">
                                <div class="wh-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                                <div class="wh-user-info">
                                    <span class="wh-user-name">Midwest Regional Warehouse</span>
                                    <span class="wh-user-email">midwest@warehouse.com</span>
                                </div>
                            </div>
                        </td>
                        <td>3456 Manufacturing Way</td>
                        <td>Chicago</td>
                        <td>60601</td>
                        <td>+13125550104</td>
                        <td><span class="wh-status wh-status-active">Active</span></td>
                        <td class="wh-actions-cell">
                            <button class="wh-action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="wh-footer">
            <div class="wh-results-info">Showing 1 to 10 of 15 results</div>
            <div class="wh-pagination">
                <button class="wh-page-btn disabled">&lt; Previous</button>
                <button class="wh-page-btn active">1</button>
                <button class="wh-page-btn">2</button>
                <button class="wh-page-btn">Next &gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/Purchase/Warehouse.js') }}"></script>
@endsection