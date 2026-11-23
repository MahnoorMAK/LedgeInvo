@extends('Layout.app')

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
        <button class="btn-add" id="openCreateModalBtn"><i class="fa-solid fa-plus"></i></button>
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

        <!-- NEW FILTER PANEL (AccountGo Style) -->
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

    <!-- CREATE TRACKING MODAL -->
    <div class="modal-overlay" id="createTrackingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Tracking</h2>
                <button class="close-modal" id="closeModalBtn"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="createTrackingForm">
                <div class="form-group">
                    <label>Goal</label>
                    <div class="custom-modal-dropdown" id="goalDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedGoalText">Select Goal</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="Investment Portfolio">Investment Portfolio</div>
                            <div class="custom-modal-option" data-value="Credit Card Debt">Credit Card Debt</div>
                            <div class="custom-modal-option" data-value="Retirement Savings">Retirement Savings</div>
                            <div class="custom-modal-option" data-value="Student Loan Payoff">Student Loan Payoff</div>
                        </div>
                    </div>
                    <input type="hidden" id="goalName" required>
                </div>
                <div class="form-group">
                    <label>Tracking Date <span>*</span></label>
                    <input type="text" id="trackingDate" placeholder="Select tracking date" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Previous Amount <span>*</span></label>
                        <div class="input-with-prefix"><span>$</span><input type="number" id="prevAmount" placeholder="0" required></div>
                    </div>
                    <div class="form-group">
                        <label>Contribution Amount <span>*</span></label>
                        <div class="input-with-prefix"><span>$</span><input type="number" id="contribAmount" placeholder="0" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Current Amount <span>*</span></label>
                        <div class="input-with-prefix"><span>$</span><input type="number" id="currentAmount" placeholder="0" required></div>
                    </div>
                    <div class="form-group">
                        <label>Progress Percentage <span>*</span></label>
                        <div class="input-with-suffix"><input type="number" id="progressPercent" placeholder="0" required><span>%</span></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Days Remaining <span>*</span></label>
                        <input type="number" id="daysRemaining" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label>Projected Completion Date</label>
                        <input type="text" id="projectedDate" placeholder="Select projected date">
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" id="cancelModalBtn">Cancel</button>
                    <button type="submit" class="btn-save">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/tracking.js') }}"></script>
@endsection