@extends('layout.dashboard')
@section('title', 'Assignments')
@section('content')

<!-- Force pure page background to white to remove grey gaps -->
<style>
  body, html, #app, .main-content, .content-wrapper, main {
      background-color: #ffffff !important;
  }
</style>

<section id="manage-assignments-app">
    <style>
        /* Base & Reset */
        #manage-assignments-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #ffffff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
            
            /* FIX: Wrapper Margin Issue */
            margin: -24px; 
            width: calc(100% + 48px);
            min-height: calc(100vh - 1px);
        }
        #manage-assignments-app * { box-sizing: border-box; }
        
        /* Header */
        .as-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .as-title h2 { margin: 0 0 6px 0; font-size: 24px; font-weight: 700; color: #111; }
        .as-title p { margin: 0; color: #6b7280; font-size: 14px; }
        
        .as-btn-add { background: #3b82f6; color: white; border: none; border-radius: 6px; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .as-btn-add:hover { background: #2563eb; }

        /* Summary Cards */
        .as-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
        .as-card { border-radius: 8px; padding: 20px; border: 1px solid transparent; display: flex; justify-content: space-between; align-items: flex-start; }
        .as-card-blue { background: #eff6ff; border-color: #dbeafe; }
        .as-card-green { background: #ecfdf5; border-color: #d1fae5; }
        .as-card-purple { background: #faf5ff; border-color: #f3e8ff; }
        .as-card-yellow { background: #fffbeb; border-color: #fef3c7; }
        
        .as-card-content h4 { margin: 0 0 8px 0; font-size: 14px; font-weight: 600; }
        .as-card-blue h4, .as-card-blue h2 { color: #1e3a8a; }
        .as-card-green h4, .as-card-green h2 { color: #065f46; }
        .as-card-purple h4, .as-card-purple h2 { color: #4c1d95; }
        .as-card-yellow h4, .as-card-yellow h2 { color: #92400e; }
        
        .as-card-content h2 { margin: 0 0 4px 0; font-size: 28px; font-weight: 700; }
        .as-card-content p { margin: 0; font-size: 13px; opacity: 0.8; }
        
        .as-card-icon { display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; }
        .as-card-blue .as-card-icon { background: #dbeafe; color: #3b82f6; }
        .as-card-green .as-card-icon { background: #d1fae5; color: #10b981; }
        .as-card-purple .as-card-icon { background: #f3e8ff; color: #8b5cf6; }
        .as-card-yellow .as-card-icon { background: #fef3c7; color: #f59e0b; }

        /* Main Container */
        .as-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .as-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        .as-search-group { display: flex; gap: 8px; flex: 1; max-width: 450px; }
        .as-search-input { flex: 1; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none; }
        .as-search-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
        
        .as-btn { padding: 10px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .as-btn:hover { background: #f9fafb; }
        .as-btn-primary { background: #3b82f6; color: white; border-color: #3b82f6; }
        .as-btn-primary:hover { background: #2563eb; border-color: #2563eb; }
        
        .as-view-toggles { display: flex; border: 1px solid #d1d5db; border-radius: 6px; overflow: hidden; }
        .as-view-btn { padding: 10px 14px; background: #fff; border: none; border-right: 1px solid #d1d5db; cursor: pointer; color: #6b7280; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .as-view-btn:last-child { border-right: none; }
        .as-view-btn.active { background: #bfdbfe; color: #1e40af; }
        
        .as-select-input { padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none; background: #fff; cursor: pointer; }

        /* Filter Tabs */
        .as-filter-tabs { display: flex; gap: 16px; padding: 12px 16px; border-bottom: 1px solid #e5e7eb; background: #f9fafb; }
        .as-filter-tab { display: flex; align-items: center; gap: 6px; font-size: 14px; color: #6b7280; cursor: pointer; padding: 6px 12px; border-radius: 6px; transition: all 0.2s; user-select: none; }
        .as-filter-tab:hover { background: #e5e7eb; }
        .as-filter-tab.active { background: #fff; color: #111; border: 1px solid #e5e7eb; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .as-filter-count { background: #e5e7eb; color: #4b5563; font-size: 12px; padding: 2px 8px; border-radius: 10px; font-weight: 600; }
        .as-filter-tab.active .as-filter-count { background: #bfdbfe; color: #1e40af; }

        /* List View (Table) */
        .as-list-view { display: block; width: 100%; overflow-x: auto; }
        .as-table { width: 100%; border-collapse: collapse; text-align: left; }
        .as-table th, .as-table td { padding: 16px 20px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        
        /* Bigger & Bolder Table Headers */
        .as-table th { 
            background: #f9fafb; 
            font-weight: 700; 
            color: #1f2937; 
            font-size: 13px; 
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer; 
            user-select: none; 
            white-space: nowrap;
        }
        .as-table th:hover { background: #f3f4f6; }
        .as-table tbody tr:hover { background: #f9fafb; }
        
        /* Grid View (2 Columns) */
        .as-grid-view { display: none; padding: 16px; grid-template-columns: repeat(2, 1fr); gap: 16px; background: #f9fafb; }
        
        /* Card Styling for Grid */
        .as-grid-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; display: flex; flex-direction: column; gap: 16px; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
        .as-grid-card-header { display: flex; justify-content: space-between; align-items: flex-start; }
        .as-grid-card-actions { display: flex; gap: 8px; }

        /* Shared Cell Elements */
        .as-item-cell { display: flex; align-items: center; gap: 12px; }
        .as-item-img { width: 40px; height: 40px; border-radius: 6px; object-fit: cover; background: #e5e7eb; }
        .as-item-info { display: flex; flex-direction: column; gap: 4px; }
        .as-item-name { font-weight: 600; color: #111; font-size: 14px; }
        .as-item-id { font-size: 12px; color: #6b7280; display: flex; align-items: center; gap: 4px; }
        
        .as-user-cell { display: flex; align-items: center; gap: 12px; }
        .as-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; background: #e5e7eb; }
        .as-user-info { display: flex; flex-direction: column; gap: 2px; }
        .as-user-name { font-weight: 600; color: #111; font-size: 14px; }
        .as-user-email { font-size: 12px; color: #6b7280; }

        .as-date-cell { display: flex; flex-direction: column; gap: 4px; font-size: 14px; color: #4b5563; }
        .as-date-val { display: flex; align-items: center; gap: 6px; font-weight: 500; }
        .as-date-overdue { color: #dc2626; }
        .as-date-overdue-text { font-size: 12px; color: #dc2626; font-weight: 600; }

        .as-badge { display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 12px; font-size: 13px; font-weight: 600; }
        .as-badge-active { background: #eff6ff; color: #1d4ed8; }
        .as-badge-excellent { background: #f0fdf4; color: #166534; }
        .as-badge-good { background: #eff6ff; color: #1d4ed8; }
        .as-badge-fair { background: #fffbeb; color: #b45309; }
        .as-badge-poor { background: #fef2f2; color: #b91c1c; }

        .as-actions { display: flex; gap: 12px; justify-content: flex-end; }
        .as-action-btn { background: none; border: none; cursor: pointer; color: #6b7280; padding: 4px; border-radius: 4px; transition: color 0.2s; display: flex; align-items: center; justify-content: center; }
        .as-action-btn:hover { background: #f3f4f6; }
        .as-action-btn.as-view:hover { color: #3b82f6; }
        .as-action-btn.as-return:hover { color: #f59e0b; }
        .as-action-btn.as-edit:hover { color: #10b981; }
        .as-action-btn.as-delete:hover { color: #ef4444; }

        /* Pagination Area */
        .as-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-top: 1px solid #e5e7eb; background: #fff; }
        .as-page-info { font-size: 14px; color: #6b7280; font-weight: 500; }
        .as-page-controls { display: flex; gap: 6px; align-items: center; }
        .as-page-btn { padding: 8px 14px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 14px; color: #374151; transition: all 0.2s; font-weight: 500; }
        .as-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .as-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .as-page-num { padding: 8px 14px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 14px; color: #374151; min-width: 36px; text-align: center; font-weight: 500; }
        .as-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }

        /* Toast Notification */
        .as-toast { visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 4px; padding: 12px; position: fixed; z-index: 1000; bottom: 30px; left: 50%; transform: translateX(-50%); font-size: 14px; opacity: 0; transition: opacity 0.3s, visibility 0.3s; }
        .as-toast.show { visibility: visible; opacity: 1; }
    </style>

    <!-- Header -->
    <div class="as-header">
        <div class="as-title">
            <h2>Manage Assignments</h2>
            <p>Track and manage assets assigned to employees, log expected return dates, record asset condition states, and process returned assets.</p>
        </div>
        <button class="as-btn-add" id="as-add-btn" title="Add New Assignment">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Summary Cards -->
    <div class="as-cards">
        <div class="as-card as-card-blue">
            <div class="as-card-content">
                <h4>Total Assignments</h4>
                <h2>8</h2>
                <p>All time assignments</p>
            </div>
            <div class="as-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </div>
        </div>
        <div class="as-card as-card-green">
            <div class="as-card-content">
                <h4>Active Assignments</h4>
                <h2>7</h2>
                <p>Currently active (88%)</p>
            </div>
            <div class="as-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </div>
        </div>
        <div class="as-card as-card-purple">
            <div class="as-card-content">
                <h4>Returned Assets</h4>
                <h2>1</h2>
                <p>Successfully returned (13%)</p>
            </div>
            <div class="as-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
        </div>
        <div class="as-card as-card-yellow">
            <div class="as-card-content">
                <h4>Overdue Assignments</h4>
                <h2>7</h2>
                <p>Require attention (88%)</p>
            </div>
            <div class="as-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="as-main-container">
        <!-- Toolbar -->
        <div class="as-toolbar">
            <div class="as-search-group">
                <input type="text" id="as-search-input" class="as-search-input" placeholder="Search by asset name...">
                <button class="as-btn as-btn-primary" id="as-search-btn">Search</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <div class="as-view-toggles">
                    <button class="as-view-btn active" id="as-view-list" title="List View">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="as-view-btn" id="as-view-grid" title="Grid View">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <select class="as-select-input" id="as-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                </select>
                
                <button class="as-btn" id="as-filter-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                </button>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="as-filter-tabs" id="as-filter-tabs">
            <div class="as-filter-tab active" data-filter="all">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="as-filter-count">8</span>
            </div>
            <div class="as-filter-tab" data-filter="Excellent">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                Excellent <span class="as-filter-count">4</span>
            </div>
            <div class="as-filter-tab" data-filter="Good">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                Good <span class="as-filter-count">3</span>
            </div>
            <div class="as-filter-tab" data-filter="Fair">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                Fair <span class="as-filter-count">1</span>
            </div>
            <div class="as-filter-tab" data-filter="Poor">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                Poor <span class="as-filter-count">0</span>
            </div>
        </div>

        <!-- List View -->
        <div class="as-list-view" id="as-list-container">
            <table class="as-table">
                <thead>
                    <tr>
                        <th data-sort="assetName">Asset ↕</th>
                        <th data-sort="assignedTo">Assigned To ↕</th>
                        <th data-sort="assignedDate">Assigned Date ↕</th>
                        <th data-sort="expectedReturn">Expected Return ↕</th>
                        <th data-sort="status">Status ↕</th>
                        <th data-sort="condition">Condition ↕</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="as-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Grid View -->
        <div class="as-grid-view" id="as-grid-container">
            <!-- Cards injected via JS -->
        </div>

        <!-- Pagination -->
        <div class="as-pagination">
            <div class="as-page-info" id="as-page-info">Showing 1 to 5 of 8 results</div>
            <div class="as-page-controls">
                <button class="as-page-btn" id="as-prev-btn" disabled>Previous</button>
                <div id="as-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="as-page-btn" id="as-next-btn">Next</button>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="as-toast" class="as-toast"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Extended Mock Data to allow pagination testing
            const initialData = [
                {
                    id: "AS-001", assetId: "DL-LAP-001", assetName: "Dell Latitude 5520 Laptop", icon: "laptop",
                    assignedTo: "John Smith", email: "john.smith@company.com", avatar: "https://i.pravatar.cc/150?u=john",
                    assignedDate: "2024-01-19", expectedReturn: "2024-12-30", isOverdue: true,
                    status: "Active", condition: "Excellent"
                },
                {
                    id: "AS-002", assetId: "HP-DSK-002", assetName: "HP ProDesk Desktop", icon: "desktop",
                    assignedTo: "Sarah Johnson", email: "sarah.johnson@client.com", avatar: "https://i.pravatar.cc/150?u=sarah",
                    assignedDate: "2024-01-31", expectedReturn: "2024-11-29", isOverdue: true,
                    status: "Active", condition: "Good"
                },
                {
                    id: "AS-003", assetId: "FUR-DSK-003", assetName: "Executive Office Desk", icon: "desk",
                    assignedTo: "Michael Brown", email: "michael.brown@company.com", avatar: "https://i.pravatar.cc/150?u=michael",
                    assignedDate: "2024-01-14", expectedReturn: "2024-06-29", isOverdue: true,
                    status: "Active", condition: "Excellent"
                },
                {
                    id: "AS-004", assetId: "VEH-CAR-004", assetName: "Toyota Camry 2024", icon: "car",
                    assignedTo: "Emily Davis", email: "emily.davis@client.com", avatar: "https://i.pravatar.cc/150?u=emily",
                    assignedDate: "2024-02-29", expectedReturn: "2024-09-29", isOverdue: true,
                    status: "Active", condition: "Good"
                },
                {
                    id: "AS-005", assetId: "MAC-PRT-005", assetName: "Industrial Printer MX-5000", icon: "printer",
                    assignedTo: "David Wilson", email: "david.wilson@company.com", avatar: "https://i.pravatar.cc/150?u=david",
                    assignedDate: "2024-02-14", expectedReturn: "2024-08-14", isOverdue: true,
                    status: "Active", condition: "Fair"
                },
                {
                    id: "AS-006", assetId: "ELC-TV-006", assetName: "Samsung 55\" Smart TV", icon: "tv",
                    assignedTo: "Jessica Lee", email: "jessica.lee@company.com", avatar: "https://i.pravatar.cc/150?u=jessica",
                    assignedDate: "2024-03-01", expectedReturn: "2024-10-01", isOverdue: false,
                    status: "Active", condition: "Excellent"
                },
                {
                    id: "AS-007", assetId: "DL-LAP-001", assetName: "Dell Latitude 5520 Laptop", icon: "laptop",
                    assignedTo: "Robert Taylor", email: "robert.t@client.com", avatar: "https://i.pravatar.cc/150?u=robert",
                    assignedDate: "2024-03-05", expectedReturn: "2024-12-05", isOverdue: false,
                    status: "Returned", condition: "Good"
                },
                {
                    id: "AS-008", assetId: "HP-DSK-002", assetName: "HP ProDesk Desktop", icon: "desktop",
                    assignedTo: "Amanda Clark", email: "amanda.c@company.com", avatar: "https://i.pravatar.cc/150?u=amanda",
                    assignedDate: "2024-03-10", expectedReturn: "2024-11-10", isOverdue: true,
                    status: "Active", condition: "Excellent"
                }
            ];

            // State Management
            let state = {
                data: [...initialData],
                filteredData: [...initialData],
                currentPage: 1,
                pageSize: 5,
                sortColumn: null,
                sortAsc: true,
                searchQuery: '',
                activeFilter: 'all',
                viewMode: 'list'
            };

            // DOM Elements
            const tableBody = document.getElementById('as-table-body');
            const gridContainer = document.getElementById('as-grid-container');
            const listContainer = document.getElementById('as-list-container');
            const pageInfo = document.getElementById('as-page-info');
            const prevBtn = document.getElementById('as-prev-btn');
            const nextBtn = document.getElementById('as-next-btn');
            const pageNumbers = document.getElementById('as-page-numbers');
            const toastEl = document.getElementById('as-toast');
            const searchInput = document.getElementById('as-search-input');
            const searchBtn = document.getElementById('as-search-btn');
            const pageSizeSelect = document.getElementById('as-page-size');
            
            // Helper: Format Date
            const formatDate = (dateStr) => `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:4px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>${dateStr}`;

            // Helper: Show Toast
            const showToast = (msg) => {
                toastEl.textContent = msg;
                toastEl.className = "as-toast show";
                setTimeout(() => { toastEl.className = toastEl.className.replace("show", ""); }, 3000);
            };

            // Helper: Get Asset Icon
            const getAssetIcon = (type) => {
                const svgs = {
                    laptop: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="2" ry="2"></rect><line x1="2" y1="20" x2="22" y2="20"></line></svg>`,
                    desktop: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>`,
                    desk: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 10h20M4 10v10m16-10v10M2 16h20M8 4v6m8-6v6"></path></svg>`,
                    car: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>`,
                    printer: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>`,
                    tv: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg>`
                };
                return `<div style="background:#eff6ff; width:40px; height:40px; border-radius:6px; display:flex; justify-content:center; align-items:center;">${svgs[type] || svgs.laptop}</div>`;
            };

            // Function: Apply Filters & Search
            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    const matchesCondition = state.activeFilter === 'all' || item.condition === state.activeFilter;
                    
                    const query = state.searchQuery.toLowerCase();
                    const matchesSearch = query === '' || 
                        item.assetName.toLowerCase().includes(query) || 
                        item.assetId.toLowerCase().includes(query) || 
                        item.assignedTo.toLowerCase().includes(query);
                    
                    return matchesCondition && matchesSearch;
                });

                state.currentPage = 1; 
                renderView();
            };

            // Function: Render View (List or Grid)
            const renderView = () => {
                const totalItems = state.filteredData.length;
                const totalPages = Math.ceil(totalItems / state.pageSize);
                
                if (state.currentPage > totalPages && totalPages > 0) state.currentPage = totalPages;
                if (state.currentPage < 1) state.currentPage = 1;

                const startIndex = (state.currentPage - 1) * state.pageSize;
                const endIndex = Math.min(startIndex + state.pageSize, totalItems);
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                pageInfo.textContent = totalItems === 0 
                    ? "Showing 0 results" 
                    : `Showing ${startIndex + 1} to ${endIndex} of ${totalItems} results`;

                if (state.viewMode === 'list') {
                    listContainer.style.display = 'block';
                    gridContainer.style.display = 'none';
                    renderTableRows(paginatedData, startIndex);
                } else {
                    listContainer.style.display = 'none';
                    gridContainer.style.display = 'grid'; // Grid now uses 2 columns via CSS
                    renderGridCards(paginatedData, startIndex);
                }

                renderPagination(totalPages);
            };

            // Render Table Rows
            const renderTableRows = (data, startIndex) => {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="7" style="text-align: center; padding: 24px; color: #6b7280; font-size: 15px;">No records found.</td></tr>`;
                    return;
                }

                data.forEach((row, index) => {
                    const actualIndex = startIndex + index; 
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="as-item-cell">
                                ${getAssetIcon(row.icon)}
                                <div class="as-item-info">
                                    <span class="as-item-name">${row.assetName}</span>
                                    <span class="as-item-id">${row.assetId}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="as-user-cell">
                                <img src="${row.avatar}" alt="${row.assignedTo}" class="as-avatar">
                                <div class="as-user-info">
                                    <span class="as-user-name">${row.assignedTo}</span>
                                    <span class="as-user-email">${row.email}</span>
                                </div>
                            </div>
                        </td>
                        <td><div class="as-date-cell"><span class="as-date-val">${formatDate(row.assignedDate)}</span></div></td>
                        <td>
                            <div class="as-date-cell">
                                <span class="as-date-val ${row.isOverdue ? 'as-date-overdue' : ''}">${formatDate(row.expectedReturn)}</span>
                                ${row.isOverdue ? '<span class="as-date-overdue-text">Overdue</span>' : ''}
                            </div>
                        </td>
                        <td><span class="as-badge as-badge-active">${row.status}</span></td>
                        <td><span class="as-badge as-badge-${row.condition.toLowerCase()}">${row.condition}</span></td>
                        <td>
                            <div class="as-actions">
                                <button class="as-action-btn as-view" onclick="viewAssignment(${actualIndex})" title="View">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button class="as-action-btn as-return" onclick="returnAsset(${actualIndex})" title="Return">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline></svg>
                                </button>
                                <button class="as-action-btn as-edit" onclick="editAssignment(${actualIndex})" title="Edit">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="as-action-btn as-delete" onclick="deleteAssignment(${actualIndex})" title="Delete">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });
            };

            // Render Grid Cards (2 Columns)
            const renderGridCards = (data, startIndex) => {
                gridContainer.innerHTML = '';
                if (data.length === 0) {
                    gridContainer.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 24px; color: #6b7280; font-size: 15px;">No records found.</div>`;
                    return;
                }

                data.forEach((row, index) => {
                    const actualIndex = startIndex + index;
                    const div = document.createElement('div');
                    div.className = 'as-grid-card';
                    div.innerHTML = `
                        <div class="as-grid-card-header">
                            <div class="as-item-cell">
                                ${getAssetIcon(row.icon)}
                                <div class="as-item-info">
                                    <span class="as-item-name">${row.assetName}</span>
                                    <span class="as-item-id">${row.assetId}</span>
                                </div>
                            </div>
                            <div class="as-grid-card-actions">
                                <button class="as-action-btn as-edit" onclick="editAssignment(${actualIndex})" title="Edit">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                            </div>
                        </div>
                        <div style="border-top: 1px solid #e5e7eb; margin: 8px 0;"></div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="as-user-cell">
                                <img src="${row.avatar}" alt="${row.assignedTo}" class="as-avatar">
                                <div class="as-user-info">
                                    <span class="as-user-name">${row.assignedTo}</span>
                                    <span class="as-user-email">${row.email}</span>
                                </div>
                            </div>
                            <span class="as-badge as-badge-${row.condition.toLowerCase()}">${row.condition}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 13px; color: #6b7280; margin-top: 8px;">
                            <div>Assigned: <strong style="color: #111;">${row.assignedDate}</strong></div>
                            <div style="${row.isOverdue ? 'color:#dc2626; font-weight:700;' : ''}">Due: ${row.expectedReturn}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
                            <span class="as-badge as-badge-active">${row.status}</span>
                            <div class="as-actions">
                                <button class="as-action-btn as-view" onclick="viewAssignment(${actualIndex})" title="View">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button class="as-action-btn as-return" onclick="returnAsset(${actualIndex})" title="Return">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><polyline points="3 3 3 8 8 8"></polyline></svg>
                                </button>
                                <button class="as-action-btn as-delete" onclick="deleteAssignment(${actualIndex})" title="Delete">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </div>
                    `;
                    gridContainer.appendChild(div);
                });
            };

            // Render Pagination Controls
            const renderPagination = (totalPages) => {
                prevBtn.disabled = state.currentPage === 1;
                nextBtn.disabled = state.currentPage === totalPages || totalPages === 0;
                
                pageNumbers.innerHTML = '';
                
                let startPage = Math.max(1, state.currentPage - 2);
                let endPage = Math.min(totalPages, startPage + 4);
                
                if (endPage - startPage < 4) {
                    startPage = Math.max(1, endPage - 4);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const btn = document.createElement('button');
                    btn.className = `as-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => {
                        state.currentPage = i;
                        renderView();
                    };
                    pageNumbers.appendChild(btn);
                }
            };

            // Global Action Handlers
            window.viewAssignment = (index) => {
                const item = state.filteredData[index];
                showToast(`Viewing details for ${item.assetName} assigned to ${item.assignedTo}`);
            };

            window.returnAsset = (index) => {
                const item = state.filteredData[index];
                showToast(`Processing return for ${item.assetName}`);
                item.status = "Returned";
                item.isOverdue = false;
                renderView();
            };

            window.editAssignment = (index) => {
                const item = state.filteredData[index];
                showToast(`Editing assignment for ${item.assetName}`);
            };

            window.deleteAssignment = (index) => {
                const item = state.filteredData[index];
                if(confirm(`Are you sure you want to delete assignment for ${item.assetName}?`)) {
                    state.data = state.data.filter(a => a.id !== item.id);
                    showToast(`Deleted assignment for ${item.assetName}`);
                    applyFilters(); 
                }
            };

            // Event Listeners
            searchBtn.addEventListener('click', () => {
                state.searchQuery = searchInput.value;
                applyFilters();
            });
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value;
                    applyFilters();
                }
            });

            document.querySelectorAll('.as-filter-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    document.querySelectorAll('.as-filter-tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    state.activeFilter = tab.getAttribute('data-filter');
                    applyFilters();
                });
            });

            document.getElementById('as-view-list').addEventListener('click', () => {
                document.getElementById('as-view-list').classList.add('active');
                document.getElementById('as-view-grid').classList.remove('active');
                state.viewMode = 'list';
                renderView();
            });
            document.getElementById('as-view-grid').addEventListener('click', () => {
                document.getElementById('as-view-grid').classList.add('active');
                document.getElementById('as-view-list').classList.remove('active');
                state.viewMode = 'grid';
                renderView();
            });

            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderView();
                showToast(`Showing ${state.pageSize} items per page.`);
            });

            prevBtn.addEventListener('click', () => {
                if (state.currentPage > 1) {
                    state.currentPage--;
                    renderView();
                }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                if (state.currentPage < totalPages) {
                    state.currentPage++;
                    renderView();
                }
            });

            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const column = th.getAttribute('data-sort');
                    if (state.sortColumn === column) {
                        state.sortAsc = !state.sortAsc;
                    } else {
                        state.sortColumn = column;
                        state.sortAsc = true;
                    }

                    state.filteredData.sort((a, b) => {
                        let valA = a[column] || '';
                        let valB = b[column] || '';
                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();
                        if (valA < valB) return state.sortAsc ? -1 : 1;
                        if (valA > valB) return state.sortAsc ? 1 : -1;
                        return 0;
                    });
                    renderView();
                });
            });

            document.getElementById('as-add-btn').addEventListener('click', () => showToast("Opening 'Add New Assignment' form..."));
            document.getElementById('as-filter-btn').addEventListener('click', () => showToast("Advanced filter panel toggled."));

            applyFilters();
        });
    </script>
</section>
@endsection