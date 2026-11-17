@extends('Layout.dashboard')

@section('title', 'Manage Tracking')
@section('page-name', 'Tracking')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tracking.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <!-- Page Title -->
    <div class="page-title">
        <div>
            <h1>Manage Tracking</h1>
            <p>Track and evaluate goal progress, contribution amounts, timeline pace, and performance indicators.</p>
        </div>
        <a href="{{ route('createtracking') }}" class="btn-add" style="display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="fa-solid fa-plus"></i></a>
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
        <!-- Filters Top Bar -->
        <div class="table-header-filters">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Goals..." id="searchInput">
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
                    <label>Status</label>
                    <div class="custom-modal-dropdown" id="statusFilterDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedStatusFilter">All Status</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="all">All Status</div>
                            <div class="custom-modal-option" data-value="ahead">Ahead</div>
                            <div class="custom-modal-option" data-value="ontrack">On Track</div>
                            <div class="custom-modal-option" data-value="behind">Behind</div>
                            <div class="custom-modal-option" data-value="critical">Critical</div>
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
            <div class="tab active" data-target="all"><i class="fa-solid fa-border-all"></i> All <span class="badge">8</span></div>
            <div class="tab" data-target="ahead"><i class="fa-solid fa-plane-up"></i> Ahead <span class="badge">3</span></div>
            <div class="tab" data-target="ontrack"><i class="fa-regular fa-circle-check"></i> On Track <span class="badge">3</span></div>
            <div class="tab" data-target="behind"><i class="fa-regular fa-clock"></i> Behind <span class="badge">2</span></div>
            <div class="tab" data-target="critical"><i class="fa-solid fa-circle-exclamation"></i> Critical <span class="badge">0</span></div>
        </div>

        <!-- Data Table -->
        <div class="table-responsive">
            <table id="trackingTable">
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
                    <!-- Rows (Aapke purane rows yahan aayenge) -->
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

    <!-- NOTE: Modal yahan se hata diya gaya hai -->

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/tracking.js') }}"></script>
@endsection