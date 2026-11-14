@extends('layout.dashboard')
@section('title', 'Manage Roles - LedgeInvo')
@section('content')

<!-- Force pure page background to white to remove grey gaps -->
<style>
  body, html, #app, .main-content, .content-wrapper, main {
      background-color: #ffffff !important;
  }
</style>

<section id="manage-roles-app">
    <style>
        /* Base & Reset */
        #manage-roles-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #ffffff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 15px; /* Increased base size */
            position: relative;
            
            /* FIX: Wrapper Margin Issue */
            margin: -24px; 
            width: calc(100% + 48px);
            min-height: calc(100vh - 1px); 
        }
        #manage-roles-app * { box-sizing: border-box; }
        
        /* Header */
        .mr-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .mr-title h2 { margin: 0 0 6px 0; font-size: 24px; font-weight: 700; color: #111; } /* Bigger and bolder title */
        .mr-title p { margin: 0; color: #6b7280; font-size: 14px; }
        
        .mr-btn-add { background: #3b82f6; color: white; border: none; border-radius: 6px; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .mr-btn-add:hover { background: #2563eb; }

        /* Main Container */
        .mr-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .mr-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        
        /* Search Group */
        .mr-search-group { display: flex; gap: 8px; flex: 1; max-width: 420px; }
        .mr-search-input { flex: 1; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none; }
        .mr-search-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
        
        .mr-btn { padding: 10px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; white-space: nowrap; }
        .mr-btn:hover { background: #f9fafb; }
        .mr-btn-primary { background: #3b82f6; color: white; border-color: #3b82f6; }
        .mr-btn-primary:hover { background: #2563eb; border-color: #2563eb; }
        
        /* Clear Button Style */
        .mr-btn-clear { background: #f3f4f6; color: #4b5563; border-color: #d1d5db; }
        .mr-btn-clear:hover { background: #e5e7eb; color: #111827; }
        
        .mr-view-toggles { display: flex; border: 1px solid #d1d5db; border-radius: 6px; overflow: hidden; }
        .mr-view-btn { padding: 10px 14px; background: #fff; border: none; border-right: 1px solid #d1d5db; cursor: pointer; color: #6b7280; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .mr-view-btn:last-child { border-right: none; }
        .mr-view-btn.active { background: #bfdbfe; color: #1e40af; }
        
        .mr-select-input { padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none; background: #fff; cursor: pointer; }

        /* List View (Table) */
        .mr-list-view { display: block; width: 100%; overflow-x: auto; }
        .mr-table { width: 100%; border-collapse: collapse; text-align: left; }
        .mr-table th, .mr-table td { padding: 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        
        /* Bigger and Bolder Table Headers */
        .mr-table th { 
            background: #f9fafb; 
            font-weight: 700; /* Bold */
            color: #1f2937; 
            font-size: 14px; /* Bigger font */
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer; 
            user-select: none; 
        }
        .mr-table th:hover { background: #f3f4f6; }
        .mr-table tbody tr:hover { background: #f9fafb; }
        
        /* Grid View */
        .mr-grid-view { display: none; padding: 16px; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; background: #f9fafb; }
        
        /* Card Styling for Grid */
        .mr-grid-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; display: flex; flex-direction: column; gap: 16px; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
        .mr-grid-card-header { display: flex; justify-content: space-between; align-items: flex-start; }

        /* Shared Cell Elements */
        .mr-role-cell { display: flex; align-items: center; gap: 12px; }
        .mr-icon-box { width: 40px; height: 40px; border-radius: 8px; background: #eff6ff; color: #3b82f6; display: flex; justify-content: center; align-items: center; flex-shrink: 0; }
        .mr-item-name { font-weight: 600; color: #111; font-size: 15px; } /* Bolder name */

        .mr-permission-badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600; background: #eff6ff; color: #1d4ed8; }
        
        .mr-users-cell { display: flex; align-items: center; }
        .mr-avatar-group { display: flex; align-items: center; }
        .mr-avatar { width: 34px; height: 34px; border-radius: 50%; object-fit: cover; border: 2px solid #fff; margin-left: -8px; position: relative; }
        .mr-avatar:first-child { margin-left: 0; }
        .mr-avatar-more { width: 34px; height: 34px; border-radius: 50%; background: #f3f4f6; color: #4b5563; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; border: 2px solid #fff; margin-left: -8px; z-index: 10; }

        .mr-actions { display: flex; gap: 12px; justify-content: center; }
        .mr-action-btn { background: none; border: none; cursor: pointer; color: #3b82f6; padding: 6px; border-radius: 4px; transition: background 0.2s; display: flex; align-items: center; justify-content: center; }
        .mr-action-btn:hover { background: #eff6ff; }

        /* Pagination Area */
        .mr-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; background: #fff; }
        .mr-page-info { font-size: 14px; color: #6b7280; font-weight: 500; }
        .mr-page-controls { display: flex; gap: 6px; align-items: center; }
        .mr-page-btn { padding: 8px 14px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: 500; color: #374151; transition: all 0.2s; display: flex; align-items: center; gap: 4px; }
        .mr-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .mr-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .mr-page-num { padding: 8px 14px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: 500; color: #374151; min-width: 36px; text-align: center; }
        .mr-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }
    </style>

    <!-- Header -->
    <div class="mr-header">
        <div class="mr-title">
            <h2>Manage Roles</h2>
            <p>Manage roles and set permissions for users across system.</p>
        </div>
        <button class="mr-btn-add" id="mr-add-btn" title="Add New Role">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Main Container -->
    <div class="mr-main-container">
        <!-- Toolbar -->
        <div class="mr-toolbar">
            <div class="mr-search-group">
                <input type="text" id="mr-search-input" class="mr-search-input" placeholder="Search roles...">
                <button class="mr-btn mr-btn-primary" id="mr-search-btn">Search</button>
                <button class="mr-btn mr-btn-clear" id="mr-clear-btn">Clear</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <div class="mr-view-toggles">
                    <button class="mr-view-btn active" id="mr-view-list" title="List View">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="mr-view-btn" id="mr-view-grid" title="Grid View">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <select class="mr-select-input" id="mr-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                    <option value="25">25 per page</option>
                </select>
            </div>
        </div>

        <!-- List View -->
        <div class="mr-list-view" id="mr-list-container">
            <table class="mr-table">
                <thead>
                    <tr>
                        <th data-sort="name" style="width: 25%;">Role ↕</th>
                        <th data-sort="permissions" style="width: 25%;">Permissions</th>
                        <th style="width: 30%;">Users</th>
                        <th style="text-align: center; width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody id="mr-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Grid View -->
        <div class="mr-grid-view" id="mr-grid-container">
            <!-- Cards injected via JS -->
        </div>

        <!-- Pagination -->
        <div class="mr-pagination">
            <div class="mr-page-info" id="mr-page-info">Showing 1 to 10 of 25 results</div>
            <div class="mr-page-controls">
                <button class="mr-page-btn" id="mr-prev-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Previous
                </button>
                <div id="mr-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="mr-page-btn" id="mr-next-btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // --- 1. Generate 25 Mock Entities ---
            const roleNames = ["Staff", "Client", "Vendor", "Admin", "Manager", "Editor", "Viewer", "Accountant", "Auditor", "Support", "Sales", "Marketing"];
            const avatars = [
                "https://i.pravatar.cc/150?u=1", "https://i.pravatar.cc/150?u=2", "https://i.pravatar.cc/150?u=3", 
                "https://i.pravatar.cc/150?u=4", "https://i.pravatar.cc/150?u=5", "https://i.pravatar.cc/150?u=6",
                "https://i.pravatar.cc/150?u=7", "https://i.pravatar.cc/150?u=8"
            ];

            let initialData = [];
            for (let i = 0; i < 25; i++) {
                const roleName = i < 3 ? roleNames[i] : `${roleNames[i % roleNames.length]} ${Math.floor(i / roleNames.length) + 1}`;
                const permissions = Math.floor(Math.random() * 100) + 1;
                
                const userCount = Math.floor(Math.random() * 4) + 2;
                const users = [];
                for(let j=0; j<userCount; j++) {
                    users.push(avatars[Math.floor(Math.random() * avatars.length)]);
                }

                initialData.push({
                    id: i + 1,
                    name: roleName,
                    permissions: permissions,
                    users: users,
                    totalUsers: Math.floor(Math.random() * 10) + 3
                });
            }

            // --- 2. State Management ---
            let state = {
                data: [...initialData],
                filteredData: [...initialData],
                currentPage: 1,
                pageSize: 10,
                sortColumn: null,
                sortAsc: true,
                searchQuery: '',
                viewMode: 'list'
            };

            // DOM Elements
            const tableBody = document.getElementById('mr-table-body');
            const gridContainer = document.getElementById('mr-grid-container');
            const listContainer = document.getElementById('mr-list-container');
            const pageInfo = document.getElementById('mr-page-info');
            const prevBtn = document.getElementById('mr-prev-btn');
            const nextBtn = document.getElementById('mr-next-btn');
            const pageNumbers = document.getElementById('mr-page-numbers');
            const searchInput = document.getElementById('mr-search-input');
            const pageSizeSelect = document.getElementById('mr-page-size');

            // --- 3. Helper Functions ---
            const renderAvatars = (users, total) => {
                let html = '<div class="mr-avatar-group">';
                users.forEach((url, i) => {
                    html += `<img src="${url}" class="mr-avatar" style="z-index: ${10 - i}" alt="user">`;
                });
                if (total > users.length) {
                    html += `<div class="mr-avatar-more">+${total - users.length}</div>`;
                }
                html += '</div>';
                return html;
            };

            // --- 4. Core Logic ---
            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    const query = state.searchQuery.toLowerCase();
                    return query === '' || item.name.toLowerCase().includes(query);
                });

                if (state.sortColumn) {
                    state.filteredData.sort((a, b) => {
                        let valA = a[state.sortColumn];
                        let valB = b[state.sortColumn];
                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();
                        if (valA < valB) return state.sortAsc ? -1 : 1;
                        if (valA > valB) return state.sortAsc ? 1 : -1;
                        return 0;
                    });
                }

                state.currentPage = 1;
                renderView();
            };

            const renderView = () => {
                const totalItems = state.filteredData.length;
                const totalPages = Math.ceil(totalItems / state.pageSize) || 1;
                
                if (state.currentPage > totalPages) state.currentPage = totalPages;
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
                    renderTableRows(paginatedData);
                } else {
                    listContainer.style.display = 'none';
                    gridContainer.style.display = 'grid';
                    renderGridCards(paginatedData);
                }

                renderPagination(totalPages);
            };

            const renderTableRows = (data) => {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="4" style="text-align: center; padding: 24px; color: #6b7280; font-size: 15px;">No roles found.</td></tr>`;
                    return;
                }

                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="mr-role-cell">
                                <div class="mr-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                </div>
                                <span class="mr-item-name">${row.name}</span>
                            </div>
                        </td>
                        <td>
                            <span class="mr-permission-badge">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                ${row.permissions} Permissions
                            </span>
                        </td>
                        <td>
                            ${renderAvatars(row.users, row.totalUsers)}
                        </td>
                        <td>
                            <div class="mr-actions">
                                <button class="mr-action-btn" onclick="editRole(${row.id})" title="Edit">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });
            };

            const renderGridCards = (data) => {
                gridContainer.innerHTML = '';
                if (data.length === 0) {
                    gridContainer.innerHTML = `<div style="grid-column: 1/-1; text-align: center; padding: 24px; color: #6b7280; font-size: 15px;">No roles found.</div>`;
                    return;
                }

                data.forEach(row => {
                    const div = document.createElement('div');
                    div.className = 'mr-grid-card';
                    div.innerHTML = `
                        <div class="mr-grid-card-header">
                            <div class="mr-role-cell">
                                <div class="mr-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                </div>
                                <span class="mr-item-name">${row.name}</span>
                            </div>
                            <button class="mr-action-btn" onclick="editRole(${row.id})">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </button>
                        </div>
                        <div style="border-top: 1px solid #e5e7eb; margin: 8px 0;"></div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="mr-permission-badge">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                ${row.permissions} Permissions
                            </span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; font-weight: 500; color: #6b7280;">Users:</span>
                            ${renderAvatars(row.users, row.totalUsers)}
                        </div>
                    `;
                    gridContainer.appendChild(div);
                });
            };

            const renderPagination = (totalPages) => {
                prevBtn.disabled = state.currentPage === 1 || totalPages === 0;
                nextBtn.disabled = state.currentPage === totalPages || totalPages === 0;
                
                pageNumbers.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.className = `mr-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => { state.currentPage = i; renderView(); };
                    pageNumbers.appendChild(btn);
                }
            };

            // Global Action
            window.editRole = (id) => {
                console.log("Editing Role ID:", id);
            };

            // --- 5. Event Listeners ---
            document.getElementById('mr-search-btn').addEventListener('click', () => {
                state.searchQuery = searchInput.value.trim();
                applyFilters();
            });

            // Clear Button Logic
            document.getElementById('mr-clear-btn').addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
                searchInput.focus();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value.trim();
                    applyFilters();
                }
            });

            document.getElementById('mr-view-list').addEventListener('click', () => {
                document.getElementById('mr-view-list').classList.add('active');
                document.getElementById('mr-view-grid').classList.remove('active');
                state.viewMode = 'list';
                renderView();
            });

            document.getElementById('mr-view-grid').addEventListener('click', () => {
                document.getElementById('mr-view-grid').classList.add('active');
                document.getElementById('mr-view-list').classList.remove('active');
                state.viewMode = 'grid';
                renderView();
            });

            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderView();
            });

            prevBtn.addEventListener('click', () => {
                if (state.currentPage > 1) { state.currentPage--; renderView(); }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                if (state.currentPage < totalPages) { state.currentPage++; renderView(); }
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
                    applyFilters();
                });
            });

            // Initialize
            renderView();
        });
    </script>
</section>
@endsection