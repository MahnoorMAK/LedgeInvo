@extends('Layout.app')

@section('title', 'Manage Milestones')
@section('page-name', 'Milestones')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/milestones.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <div class="page-title">
        <div>
            <h1>Manage Milestones</h1>
            <p>Track and manage milestones for your goals and objectives.</p>
        </div>
        <button class="btn-add" id="openCreateModalBtn"><i class="fa-solid fa-plus"></i></button>
    </div>

    <div class="table-container">
        <div class="table-header-filters">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Milestones..." id="searchInput">
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

        <div class="new-filter-panel" id="filterPanel">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Status</label>
                    <div class="custom-modal-dropdown" id="filterStatusDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedFilterStatus">Filter by Status</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="all">All Status</div>
                            <div class="custom-modal-option" data-value="Pending">Pending</div>
                            <div class="custom-modal-option" data-value="In Progress">In Progress</div>
                            <div class="custom-modal-option" data-value="Completed">Completed</div>
                        </div>
                    </div>
                </div>
                <div class="filter-actions-inline">
                    <button class="btn-apply" id="applyFilterBtn">Apply</button>
                    <button class="btn-clear" id="clearFilterBtn">Clear</button>
                </div>
            </div>
        </div>

        <div class="tabs">
            <div class="tab active" data-target="all"><i class="fa-solid fa-border-all"></i> All <span class="badge">5</span></div>
            <div class="tab" data-target="pending"><i class="fa-regular fa-clock"></i> Pending <span class="badge">2</span></div>
            <div class="tab" data-target="inprogress"><i class="fa-solid fa-spinner"></i> In Progress <span class="badge">2</span></div>
            <div class="tab" data-target="completed"><i class="fa-regular fa-circle-check"></i> Completed <span class="badge">1</span></div>
        </div>

        <div class="table-responsive">
            <table id="milestoneTable">
                <thead>
                    <tr>
                        <th>Milestone Name <i class="fa-solid fa-arrow-up"></i></th>
                        <th>Associated Goal</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr class="row-item" data-status="Completed" data-type="completed">
                        <td><div class="milestone-name">Research Phase</div><span class="badge-sub text-muted">M-001</span></td>
                        <td><span class="goal-badge">Personal Development</span></td>
                        <td><span class="date-text"><i class="fa-regular fa-calendar"></i> 2024-01-15</span></td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td>
                            <div class="progress-bar"><div class="progress-fill" style="width: 100%;"></div></div>
                            <span class="progress-text">100%</span>
                        </td>
                        <td class="actions"><i class="fa-regular fa-eye action-icon"></i></td>
                    </tr>
                    <tr class="row-item" data-status="In Progress" data-type="inprogress">
                        <td><div class="milestone-name">Client Acquisition</div><span class="badge-sub text-muted">M-002</span></td>
                        <td><span class="goal-badge">Career Growth</span></td>
                        <td><span class="date-text"><i class="fa-regular fa-calendar"></i> 2024-03-10</span></td>
                        <td><span class="status-badge status-inprogress">In Progress</span></td>
                        <td>
                            <div class="progress-bar"><div class="progress-fill" style="width: 60%;"></div></div>
                            <span class="progress-text">60%</span>
                        </td>
                        <td class="actions"><i class="fa-regular fa-pen-to-square action-icon"></i></td>
                    </tr>
                    <tr class="row-item" data-status="Pending" data-type="pending">
                        <td><div class="milestone-name">Gym Routine</div><span class="badge-sub text-muted">M-003</span></td>
                        <td><span class="goal-badge">Health & Fitness</span></td>
                        <td><span class="date-text"><i class="fa-regular fa-calendar"></i> 2024-04-01</span></td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <div class="progress-bar"><div class="progress-fill" style="width: 0%;"></div></div>
                            <span class="progress-text">0%</span>
                        </td>
                        <td class="actions"><i class="fa-regular fa-trash-can action-icon"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- CREATE MILESTONE MODAL -->
    <div class="modal-overlay" id="createMilestoneModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Milestone</h2>
                <button class="close-modal" id="closeModalBtn"><i class="fa-solid fa-xmark"></i></button>
            </div>
            
            <form id="createMilestoneForm">
                <div class="form-group">
                    <label>Milestone Name <span>*</span></label>
                    <input type="text" id="milestoneName" placeholder="Enter Milestone Name" required>
                </div>
                
                <div class="form-group">
                    <label>Goal <span>*</span></label>
                    <div class="custom-modal-dropdown" id="goalDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedGoalText">Select Goal</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="Personal Development">Personal Development</div>
                            <div class="custom-modal-option" data-value="Career Growth">Career Growth</div>
                            <div class="custom-modal-option" data-value="Health & Fitness">Health & Fitness</div>
                            <div class="custom-modal-option" data-value="Financial">Financial</div>
                        </div>
                    </div>
                    <input type="hidden" id="milestoneGoal" required>
                </div>

                <div class="form-group">
                    <label>Due Date <span>*</span></label>
                    <input type="text" id="dueDate" placeholder="Select Due Date" required>
                </div>

                <div class="form-group">
                    <label>Status <span>*</span></label>
                    <div class="custom-modal-dropdown" id="statusDropdown">
                        <div class="custom-modal-trigger">
                            <span id="selectedStatusText">Select Status</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-modal-options">
                            <div class="custom-modal-option" data-value="Pending">Pending</div>
                            <div class="custom-modal-option" data-value="In Progress">In Progress</div>
                            <div class="custom-modal-option" data-value="Completed">Completed</div>
                        </div>
                    </div>
                    <input type="hidden" id="milestoneStatus" required>
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
    <script src="{{ asset('js/milestones.js') }}"></script>
@endsection