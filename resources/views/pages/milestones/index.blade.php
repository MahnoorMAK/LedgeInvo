<!-- resources/views/pages/milestones/index.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/milestones.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Header -->
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Goal › Milestones</div>
            <h1 class="ag-title">Manage Milestones</h1>
            <p class="ag-subtitle">Manage and track goal milestones, target dates, progress amounts, and achievement statuses.</p>
        </div>
        <button class="ag-btn-create">+</button>
    </div>

    <!-- Summary Cards -->
    <div class="ag-summary-grid">
        <div class="ag-summary-card card-blue">
            <div class="ag-card-top"><span class="ag-card-label">Total Milestones</span><div class="ag-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg></div></div>
            <div class="ag-card-value">6</div><div class="ag-card-desc">All time</div>
        </div>
        <div class="ag-summary-card card-green">
            <div class="ag-card-top"><span class="ag-card-label">Achieved</span><div class="ag-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></div></div>
            <div class="ag-card-value">3</div><div class="ag-card-desc">Current page</div>
        </div>
        <div class="ag-summary-card card-yellow">
            <div class="ag-card-top"><span class="ag-card-label">Pending</span><div class="ag-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></div></div>
            <div class="ag-card-value">3</div><div class="ag-card-desc">Current page</div>
        </div>
        <div class="ag-summary-card card-red">
            <div class="ag-card-top"><span class="ag-card-label">Overdue</span><div class="ag-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></div></div>
            <div class="ag-card-value">1</div><div class="ag-card-desc">Requires action</div>
        </div>
        <div class="ag-summary-card card-teal">
            <div class="ag-card-top"><span class="ag-card-label">Current Progress</span><div class="ag-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></div></div>
            <div class="ag-card-value">$42,000.00</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 4px;"><div class="ag-card-desc">Total Achieved</div><div class="ag-card-desc" style="color: #0d9488; font-weight: 600;">Achieved Ratio 16%</div></div>
            <div class="ag-progress-bar"><div class="ag-progress-fill" style="width: 16%;"></div></div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="ag-main-card">
        
        <!-- Toolbar -->
        <div class="ag-toolbar">
            <div class="ag-search-box">
                <svg class="ag-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" class="ag-search-input" placeholder="Search Milestones...">
                <button class="ag-btn-purple">Search</button>
            </div>
            <div class="ag-toolbar-right">
                <select class="ag-select"><option>10 per page</option><option>25 per page</option></select>
                <button class="ag-btn-outline" id="toggle-filter-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                </button>
            </div>
        </div>

        <!-- Filters Panel (Initially Hidden) -->
        <div class="ag-filters-panel" id="filters-panel">
            <!-- Goal Dropdown -->
            <div class="ag-filter-group">
                <label class="ag-filter-label">Goal</label>
                <div class="ag-filter-select-wrapper" id="filter-goal-dd">
                    <div class="ag-filter-select" onclick="toggleFilterDropdown('filter-goal-dd')">
                        <span>All Goals</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <div class="custom-dropdown-menu" style="width: 100%;">
                        <div class="custom-dropdown-item" onclick="selectFilterItem('filter-goal-dd', this)">All Goals</div>
                        <div class="custom-dropdown-item" onclick="selectFilterItem('filter-goal-dd', this)">Investment Portfolio</div>
                        <div class="custom-dropdown-item" onclick="selectFilterItem('filter-goal-dd', this)">Credit Card Debt</div>
                    </div>
                </div>
            </div>

            <!-- Target Date Range -->
            <div class="ag-filter-group">
                <label class="ag-filter-label">Target Date Range</label>
                <div class="ag-date-range-wrapper" id="filter-date-range">
                    <div class="ag-date-range-display" onclick="toggleDateRangePicker('filter-date-range')">
                        <span id="date-range-text">Select date range</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <!-- Custom Purple Calendar -->
                    <div class="custom-calendar-popup" id="cal-range">
                        <div class="cal-header">
                            <button type="button" onclick="changeMonth('cal-range', -1)">‹</button>
                            <span class="month-year">Loading...</span>
                            <button type="button" onclick="changeMonth('cal-range', 1)">›</button>
                        </div>
                        <div class="cal-days-grid"></div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 8px; margin-bottom: 4px;">
                <button class="ag-btn-purple" style="padding: 10px 20px;">Apply</button>
                <button class="ag-btn-outline" style="padding: 10px 20px;">Clear</button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="ag-tabs">
            <div class="ag-tab active">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="ag-tab-count">6</span>
            </div>
            <div class="ag-tab">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                Pending <span class="ag-tab-count">3</span>
            </div>
            <div class="ag-tab">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                Achieved <span class="ag-tab-count">3</span>
            </div>
        </div>

        <!-- Data Table -->
        <table class="ag-table">
            <thead>
                <tr>
                    <th>Milestone / Goal ⇅</th>
                    <th>Target / Achieved ⇅</th>
                    <th>Progress</th>
                    <th>Achieved Date</th>
                    <th>Target Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td><div class="ag-m-title">First Quarter Target</div><div class="ag-m-goal"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Investment Portfolio</div></td>
                    <td><div class="ag-m-title">$25,000.00</div><div class="ag-m-sub">$22,000.00</div></td>
                    <td><div class="ag-m-progress-text">88%</div><div class="ag-m-progress-bar"><div class="ag-m-progress-fill" style="width: 88%;"></div></div></td>
                    <td><div style="display: flex; align-items: center; gap: 6px; color: #475569; font-size: 13px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg> 2026-02-11</div></td>
                    <td><div style="display: flex; align-items: center; gap: 6px; color: #475569; font-size: 13px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg> 2026-05-16</div></td>
                    <td><span class="ag-badge badge-green">Achieved</span></td>
                    <td><button class="ag-action-btn ag-action-edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button><button class="ag-action-btn ag-action-delete"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                </tr>
                <!-- Row 2 -->
                <tr>
                    <td><div class="ag-m-title">Mid-Year Milestone</div><div class="ag-m-goal"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Credit Card Debt</div></td>
                    <td><div class="ag-m-title">$50,000.00</div><div class="ag-m-sub">$0.00</div></td>
                    <td><div class="ag-m-progress-text">0%</div><div class="ag-m-progress-bar"><div class="ag-m-progress-fill" style="width: 0%;"></div></div></td>
                    <td>-</td>
                    <td><div class="badge-red-text"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg> 2026-08-16<span style="display: block; font-size: 11px;">Overdue</span></div></td>
                    <td><span class="ag-badge badge-yellow">Pending</span></td>
                    <td><button class="ag-action-btn ag-action-edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button><button class="ag-action-btn ag-action-delete"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                </tr>
                <!-- Row 3 -->
                <tr>
                    <td><div class="ag-m-title">Third Quarter Goal</div><div class="ag-m-goal"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Operational Cost Reduction</div></td>
                    <td><div class="ag-m-title">$75,000.00</div><div class="ag-m-sub">$0.00</div></td>
                    <td><div class="ag-m-progress-text">0%</div><div class="ag-m-progress-bar"><div class="ag-m-progress-fill" style="width: 0%;"></div></div></td>
                    <td>-</td>
                    <td><div style="display: flex; align-items: center; gap: 6px; color: #475569; font-size: 13px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg> 2026-11-16</div></td>
                    <td><span class="ag-badge badge-yellow">Pending</span></td>
                    <td><button class="ag-action-btn ag-action-edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button><button class="ag-action-btn ag-action-delete"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="ag-pagination">
            <span>Showing 1 to 6 of 6 results</span>
            <div class="ag-page-btns">
                <button class="ag-page-btn">‹ Previous</button>
                <button class="ag-page-btn active">1</button>
                <button class="ag-page-btn">Next ›</button>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/milestones.js') }}"></script>
@endpush