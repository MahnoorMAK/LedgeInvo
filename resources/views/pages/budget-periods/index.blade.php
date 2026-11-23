@extends('Layout.app')

@section('title', 'Budget Periods')
@section('page-name', 'Budget Periods')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/budget-periods.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <!-- Page Title with Link -->
    <div class="page-title">
        <div>
            <h1>Budget Periods</h1>
            <p>Manage and configure budget periods, financial years, and approval workflows.</p>
        </div>
        <!-- + BUTTON NOW LINKS TO NEW PAGE -->
        <a href="{{ route('budget-periods.create') }}" class="btn-add" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <div class="table-container">
        <!-- Filters Top Bar -->
        <div class="table-header-filters">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Budget Periods..." id="searchInput">
                <button class="btn-search" id="searchBtn">Search</button>
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
                <button class="drop-btn" id="toggleFilterBtn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
            </div>
        </div>

        <!-- Filter Panel -->
        <div class="new-filter-panel" id="filterPanel">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Financial Year</label>
                    <input type="text" placeholder="Enter Financial Year" class="filter-input" id="filterYear">
                </div>
                <div class="filter-group">
                    <label>Date Range</label>
                    <input type="text" placeholder="Select date range" class="filter-input" id="dateRangePicker">
                </div>
                <div class="filter-group">
                    <label>Status</label>
                    <div class="custom-modal-dropdown" id="statusFilterDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedStatusFilter">All Status</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="all">All Status</div>
                            <div class="custom-modal-option" data-value="active">Active</div>
                            <div class="custom-modal-option" data-value="draft">Draft</div>
                            <div class="custom-modal-option" data-value="closed">Closed</div>
                        </div>
                    </div>
                </div>
                <div class="filter-actions-inline">
                    <button class="btn-apply" id="applyFilterBtn">Apply</button>
                    <button class="btn-clear" id="clearFilterBtn">Clear</button>
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
            <table id="budgetPeriodTable">
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
                <tbody id="table-body">
                    <!-- Aapke purane rows yahan aayenge -->
                    <tr class="row-item" data-status="active" data-year="2024">
                        <td><div class="period-name">Q1 2024 Budget</div></td>
                        <td><span class="year-badge">2024</span></td>
                        <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2023-12-31</div></td>
                        <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-03-30</div></td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <div class="user-info">
                                <div class="avatar"><img src="https://i.pravatar.cc/100?img=5" alt="User"></div>
                                <div class="user-text"><h5>Nicole Young</h5><p>nicole.young@client.com</p></div>
                            </div>
                        </td>
                        <td class="actions"><i class="fa-solid fa-xmark action-icon"></i></td>
                    </tr>
                    <tr class="row-item" data-status="active" data-year="2024">
                        <td><div class="period-name">Q2 2024 Budget</div></td>
                        <td><span class="year-badge">2024</span></td>
                        <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-03-31</div></td>
                        <td><div class="date-text"><i class="fa-regular fa-calendar"></i> 2024-06-29</div></td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <div class="user-info">
                                <div class="avatar"><img src="https://i.pravatar.cc/100?img=9" alt="User"></div>
                                <div class="user-text"><h5>XYZ Industries</h5><p>info@xyzind.com</p></div>
                            </div>
                        </td>
                        <td class="actions"><i class="fa-solid fa-xmark action-icon"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/budget-periods.js') }}"></script>
@endsection