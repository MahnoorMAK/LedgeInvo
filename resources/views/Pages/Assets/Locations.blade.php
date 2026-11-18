@extends('layout.dashboard')
@section('title', 'Manage Locations')
@section('content')


<section id="manage-locations-app">
    <style>
        /* Base & Reset */
        #manage-locations-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #fff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
        }
        #manage-locations-app * { box-sizing: border-box; }
        
        /* Header */
        .ml-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .ml-title h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .ml-title p { margin: 0; color: #6b7280; font-size: 13px; }
        
        .ml-btn-add { background: #10b981; color: white; border: none; border-radius: 6px; width: 36px; height: 36px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .ml-btn-add:hover { background: #059669; }

        /* Main Container */
        .ml-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .ml-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        .ml-search-group { display: flex; gap: 8px; flex: 1; max-width: 450px; }
        .ml-search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .ml-search-input:focus { border-color: #10b981; box-shadow: 0 0 0 2px rgba(16,185,129,0.2); }
        
        .ml-btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .ml-btn:hover { background: #f9fafb; }
        .ml-btn-primary { background: #10b981; color: white; border-color: #10b981; }
        .ml-btn-primary:hover { background: #059669; border-color: #059669; }
        
        .ml-view-toggles { display: flex; border: 1px solid #d1d5db; border-radius: 6px; overflow: hidden; }
        .ml-view-btn { padding: 8px 12px; background: #fff; border: none; border-right: 1px solid #d1d5db; cursor: pointer; color: #6b7280; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .ml-view-btn:last-child { border-right: none; }
        .ml-view-btn.active { background: #10b981; color: #fff; }
        
        .ml-select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Filter Tabs */
        .ml-filter-tabs { display: flex; gap: 20px; padding: 12px 16px; border-bottom: 1px solid #e5e7eb; background: #f9fafb; overflow-x: auto; }
        .ml-filter-tab { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #6b7280; cursor: pointer; padding: 4px 8px; border-radius: 4px; transition: all 0.2s; user-select: none; white-space: nowrap; }
        .ml-filter-tab:hover { color: #111; }
        .ml-filter-tab.active { color: #10b981; font-weight: 600; }
        .ml-filter-tab svg { color: currentColor; }
        .ml-filter-count { font-size: 13px; color: inherit; }

        /* List View (Table) */
        .ml-list-view { display: block; width: 100%; overflow-x: auto; }
        .ml-table { width: 100%; border-collapse: collapse; text-align: left; }
        .ml-table th, .ml-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .ml-table th { background: #fff; font-weight: 500; color: #4b5563; font-size: 12px; cursor: pointer; user-select: none; border-bottom: 1px solid #e5e7eb; }
        .ml-table th:hover { background: #f9fafb; }
        .ml-table tbody tr:hover { background: #f9fafb; }
        
        /* Grid View */
        .ml-grid-view { display: none; padding: 16px; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; background: #f9fafb; }
        
        /* Card Styling for Grid */
        .ml-grid-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; flex-direction: column; gap: 12px; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
        .ml-grid-card-header { display: flex; justify-content: space-between; align-items: flex-start; }

        /* Shared Cell Elements */
        .ml-item-cell { display: flex; align-items: center; gap: 12px; }
        .ml-icon-box { width: 32px; height: 32px; border-radius: 50%; background: #f0fdf4; color: #10b981; display: flex; justify-content: center; align-items: center; flex-shrink: 0; }
        .ml-item-info { display: flex; flex-direction: column; gap: 2px; }
        .ml-item-name { font-weight: 500; color: #111; font-size: 13px; }
        .ml-item-id { font-size: 11px; color: #6b7280; }

        .ml-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; border: 1px solid transparent; }
        .ml-badge-type { background: #faf5ff; color: #7e22ce; border-color: #f3e8ff; }
        .ml-badge-status { background: #ecfdf5; color: #059669; border-radius: 12px; }

        .ml-text-muted { color: #6b7280; }

        .ml-actions { display: flex; gap: 12px; justify-content: flex-end; }
        .ml-action-btn { background: none; border: none; cursor: pointer; color: #6b7280; padding: 0; transition: color 0.2s; display: flex; align-items: center; justify-content: center; }
        .ml-action-btn:hover { color: #111; }
        .ml-action-btn.ml-view:hover { color: #10b981; }
        .ml-action-btn.ml-edit:hover { color: #3b82f6; }
        .ml-action-btn.ml-delete:hover { color: #ef4444; }

        /* Pagination Area */
        .ml-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; background: #fff; }
        .ml-page-info { font-size: 13px; color: #6b7280; }
        .ml-page-controls { display: flex; gap: 6px; align-items: center; }
        .ml-page-btn { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; transition: all 0.2s; display: flex; align-items: center; gap: 4px; }
        .ml-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .ml-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .ml-page-num { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; min-width: 32px; text-align: center; }
        .ml-page-num.active { background: #10b981; color: #fff; border-color: #10b981; }
    </style>

    <!-- Header -->
    <div class="ml-header">
        <div class="ml-title">
            <h2>Manage Locations</h2>
            <p>Organize different asset locations within your company, from buildings and floors to individual rooms.</p>
        </div>
        <button class="ml-btn-add" id="ml-add-btn" title="Add New Location">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Main Container -->
    <div class="ml-main-container">
        <!-- Toolbar -->
        <div class="ml-toolbar">
            <div class="ml-search-group">
                <input type="text" id="ml-search-input" class="ml-search-input" placeholder="Search locations...">
                <button class="ml-btn ml-btn-primary" id="ml-search-btn">Search</button>
                <button class="ml-btn" id="ml-clear-btn">Clear</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <div class="ml-view-toggles">
                    <button class="ml-view-btn active" id="ml-view-list" title="List View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="ml-view-btn" id="ml-view-grid" title="Grid View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <select class="ml-select-input" id="ml-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                </select>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="ml-filter-tabs" id="ml-filter-tabs">
            <div class="ml-filter-tab active" data-filter="all">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="ml-filter-count">10</span>
            </div>
            <div class="ml-filter-tab" data-filter="Building">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>
                Building <span class="ml-filter-count">2</span>
            </div>
            <div class="ml-filter-tab" data-filter="Floor">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 12 12 17 22 12"></polyline><polyline points="2 17 12 22 22 17"></polyline></svg>
                Floor <span class="ml-filter-count">3</span>
            </div>
            <div class="ml-filter-tab" data-filter="Room">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Room <span class="ml-filter-count">2</span>
            </div>
            <div class="ml-filter-tab" data-filter="Warehouse">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                Warehouse <span class="ml-filter-count">2</span>
            </div>
            <div class="ml-filter-tab" data-filter="Site">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                Site <span class="ml-filter-count">1</span>
            </div>
        </div>

        <!-- List View -->
        <div class="ml-list-view" id="ml-list-container">
            <table class="ml-table">
                <thead>
                    <tr>
                        <th data-sort="name">Name <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                        <th data-sort="type">Type <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                        <th>Parent Location</th>
                        <th>Status</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="ml-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Grid View -->
        <div class="ml-grid-view" id="ml-grid-container">
            <!-- Cards injected via JS -->
        </div>

        <!-- Pagination -->
        <div class="ml-pagination">
            <div class="ml-page-info" id="ml-page-info">Showing 1 to 10 of 10 results</div>
            <div class="ml-page-controls">
                <button class="ml-page-btn" id="ml-prev-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Previous
                </button>
                <div id="ml-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="ml-page-btn" id="ml-next-btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mock Data
            const initialData = [
                { id: "MLOC-001", name: "Main Office Building", type: "Building", parent: "-", status: "Active" },
                { id: "WH-A-001", name: "Warehouse District A", type: "Warehouse", parent: "-", status: "Active" },
                { id: "TECH-001", name: "Tech Campus Site", type: "Site", parent: "-", status: "Active" },
                { id: "FL2-ADM-001", name: "Floor 2 - Administration", type: "Floor", parent: "-", status: "Active" },
                { id: "FL3-IT-001", name: "Floor 3 - IT Department", type: "Floor", parent: "-", status: "Active" },
                { id: "CONF-A-001", name: "Conference Room A", type: "Room", parent: "-", status: "Active" },
                { id: "SRV-001", name: "Server Room", type: "Room", parent: "-", status: "Active" },
                { id: "WH-B-001", name: "Warehouse District B", type: "Warehouse", parent: "-", status: "Active" },
                { id: "BLD-B-002", name: "Building B - East Wing", type: "Building", parent: "-", status: "Active" },
                { id: "FL4-HR-001", name: "Floor 4 - HR", type: "Floor", parent: "-", status: "Active" }
            ];

            // State Management
            let state = {
                data: [...initialData],
                filteredData: [...initialData],
                currentPage: 1,
                pageSize: 10,
                sortColumn: null,
                sortAsc: true,
                searchQuery: '',
                activeFilter: 'all',
                viewMode: 'list'
            };

            // DOM Elements
            const tableBody = document.getElementById('ml-table-body');
            const gridContainer = document.getElementById('ml-grid-container');
            const listContainer = document.getElementById('ml-list-container');
            const pageInfo = document.getElementById('ml-page-info');
            const prevBtn = document.getElementById('ml-prev-btn');
            const nextBtn = document.getElementById('ml-next-btn');
            const pageNumbers = document.getElementById('ml-page-numbers');
            const searchInput = document.getElementById('ml-search-input');
            const pageSizeSelect = document.getElementById('ml-page-size');
            
            // Helper: Get Icon by Type
            const getTypeIcon = (type) => {
                const icons = {
                    Building: `<rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path>`,
                    Floor: `<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 12 12 17 22 12"></polyline><polyline points="2 17 12 22 22 17"></polyline>`,
                    Room: `<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>`,
                    Warehouse: `<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>`,
                    Site: `<circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>`
                };
                return `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${icons[type] || icons.Room}</svg>`;
            };

            // Function: Apply Filters & Search
            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    // Filter by tab
                    const matchesCondition = state.activeFilter === 'all' || item.type === state.activeFilter;
                    
                    // Filter by search
                    const query = state.searchQuery.toLowerCase();
                    const matchesSearch = query === '' || 
                        item.name.toLowerCase().includes(query) || 
                        item.id.toLowerCase().includes(query);
                    
                    return matchesCondition && matchesSearch;
                });

                state.currentPage = 1;
                renderView();
            };

            // Function: Render View
            const renderView = () => {
                const totalItems = state.filteredData.length;
                const totalPages = Math.ceil(totalItems / state.pageSize);
                
                if (state.currentPage > totalPages && totalPages > 0) state.currentPage = totalPages;
                if (state.currentPage < 1) state.currentPage = 1;

                const startIndex = (state.currentPage - 1) * state.pageSize;
                const endIndex = Math.min(startIndex + state.pageSize, totalItems);
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                // Update Text
                pageInfo.textContent = totalItems === 0 
                    ? "Showing 0 results" 
                    : `Showing ${startIndex + 1} to ${endIndex} of ${totalItems} results`;

                // Render Content
                if (state.viewMode === 'list') {
                    listContainer.style.display = 'block';
                    gridContainer.style.display = 'none';
                    renderTableRows(paginatedData, startIndex);
                } else {
                    listContainer.style.display = 'none';
                    gridContainer.style.display = 'grid';
                    renderGridCards(paginatedData, startIndex);
                }

                // Update Pagination
                renderPagination(totalPages);
            };

            // Render Table
            const renderTableRows = (data, startIndex) => {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="5" style="text-align: center; padding: 24px; color: #6b7280;">No locations found.</td></tr>`;
                    return;
                }

                data.forEach((row, index) => {
                    const actualIndex = startIndex + index;
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="ml-item-cell">
                                <div class="ml-icon-box">${getTypeIcon(row.type)}</div>
                                <div class="ml-item-info">
                                    <span class="ml-item-name">${row.name}</span>
                                    <span class="ml-item-id">${row.id}</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="ml-badge ml-badge-type">${row.type}</span></td>
                        <td class="ml-text-muted">${row.parent}</td>
                        <td><span class="ml-badge ml-badge-status">${row.status}</span></td>
                        <td>
                            <div class="ml-actions">
                                <button class="ml-action-btn ml-view" onclick="viewLocation(${actualIndex})" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button class="ml-action-btn ml-edit" onclick="editLocation(${actualIndex})" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="ml-action-btn ml-delete" onclick="deleteLocation(${actualIndex})" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });
            };

            // Render Grid
            const renderGridCards = (data, startIndex) => {
                gridContainer.innerHTML = '';
                if (data.length === 0) {
                    gridContainer.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 24px; color: #6b7280;">No locations found.</div>`;
                    return;
                }

                data.forEach((row, index) => {
                    const actualIndex = startIndex + index;
                    const div = document.createElement('div');
                    div.className = 'ml-grid-card';
                    div.innerHTML = `
                        <div class="ml-grid-card-header">
                            <div class="ml-item-cell">
                                <div class="ml-icon-box">${getTypeIcon(row.type)}</div>
                                <div class="ml-item-info">
                                    <span class="ml-item-name">${row.name}</span>
                                    <span class="ml-item-id">${row.id}</span>
                                </div>
                            </div>
                            <span class="ml-badge ml-badge-type">${row.type}</span>
                        </div>
                        <div style="border-top: 1px solid #e5e7eb; margin: 8px 0;"></div>
                        <div style="display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 8px;">
                            <span class="ml-text-muted">Parent:</span>
                            <span style="font-weight: 500;">${row.parent}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="ml-badge ml-badge-status">${row.status}</span>
                            <div class="ml-actions">
                                <button class="ml-action-btn ml-view" onclick="viewLocation(${actualIndex})">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button class="ml-action-btn ml-edit" onclick="editLocation(${actualIndex})">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="ml-action-btn ml-delete" onclick="deleteLocation(${actualIndex})">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </div>
                    `;
                    gridContainer.appendChild(div);
                });
            };

            // Render Pagination
            const renderPagination = (totalPages) => {
                prevBtn.disabled = state.currentPage === 1 || totalPages === 0;
                nextBtn.disabled = state.currentPage === totalPages || totalPages === 0;
                
                pageNumbers.innerHTML = '';
                
                let startPage = Math.max(1, state.currentPage - 2);
                let endPage = Math.min(totalPages, startPage + 4);
                
                if (endPage - startPage < 4) {
                    startPage = Math.max(1, endPage - 4);
                }

                for (let i = startPage; i <= endPage; i++) {
                    const btn = document.createElement('button');
                    btn.className = `ml-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => {
                        state.currentPage = i;
                        renderView();
                    };
                    pageNumbers.appendChild(btn);
                }
            };

            // Action Handlers (Simulated, no loading text)
            window.viewLocation = (index) => { console.log("View", state.filteredData[index].name); };
            window.editLocation = (index) => { console.log("Edit", state.filteredData[index].name); };
            window.deleteLocation = (index) => {
                const item = state.filteredData[index];
                // In a real app, confirm before deleting
                state.data = state.data.filter(a => a.id !== item.id);
                applyFilters();
            };

            // Event: Search
            document.getElementById('ml-search-btn').addEventListener('click', () => {
                state.searchQuery = searchInput.value;
                applyFilters();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value;
                    applyFilters();
                }
            });

            // Event: Clear (Clears search input only once and resets)
            document.getElementById('ml-clear-btn').addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
            });

            // Event: Filter Tabs
            document.querySelectorAll('.ml-filter-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    document.querySelectorAll('.ml-filter-tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    state.activeFilter = tab.getAttribute('data-filter');
                    applyFilters();
                });
            });

            // Event: View Toggles
            document.getElementById('ml-view-list').addEventListener('click', () => {
                document.getElementById('ml-view-list').classList.add('active');
                document.getElementById('ml-view-grid').classList.remove('active');
                state.viewMode = 'list';
                renderView();
            });
            document.getElementById('ml-view-grid').addEventListener('click', () => {
                document.getElementById('ml-view-grid').classList.add('active');
                document.getElementById('ml-view-list').classList.remove('active');
                state.viewMode = 'grid';
                renderView();
            });

            // Event: Page Size
            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderView();
            });

            // Event: Pagination
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

            // Event: Sorting
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

            // Event: Add Location
            document.getElementById('ml-add-btn').addEventListener('click', () => { console.log("Open Add Form"); });

            // Initialize
            applyFilters();
        });
    </script>
</section>
@endsection