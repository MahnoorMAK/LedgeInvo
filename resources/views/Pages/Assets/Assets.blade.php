@extends('layout.dashboard')
@section('title', 'Manage Assets')
@section('content')
<section id="manage-assets-app">
    <style>
        /* Base & Reset */
        #manage-assets-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #fff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
        }
        #manage-assets-app * { box-sizing: border-box; }
        
        /* Header */
        .ma-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .ma-title h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .ma-title p { margin: 0; color: #6b7280; font-size: 13px; }
        
        .ma-btn-add { background: #10b981; color: white; border: none; border-radius: 6px; width: 36px; height: 36px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .ma-btn-add:hover { background: #059669; }

        /* Summary Cards */
        .ma-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
        .ma-card { border-radius: 8px; padding: 20px; border: 1px solid transparent; display: flex; justify-content: space-between; align-items: flex-start; }
        .ma-card-blue { background: #eff6ff; border-color: #dbeafe; }
        .ma-card-green { background: #ecfdf5; border-color: #d1fae5; }
        .ma-card-yellow { background: #fffbeb; border-color: #fef3c7; }
        .ma-card-purple { background: #faf5ff; border-color: #f3e8ff; }
        
        .ma-card-content h4 { margin: 0 0 4px 0; font-size: 13px; font-weight: 500; }
        .ma-card-blue h4, .ma-card-blue h2 { color: #1e3a8a; }
        .ma-card-green h4, .ma-card-green h2 { color: #065f46; }
        .ma-card-yellow h4, .ma-card-yellow h2 { color: #92400e; }
        .ma-card-purple h4, .ma-card-purple h2 { color: #4c1d95; }
        
        .ma-card-content h2 { margin: 0 0 6px 0; font-size: 24px; font-weight: 600; }
        .ma-card-content p { margin: 0; font-size: 12px; opacity: 0.8; }
        
        .ma-card-icon { display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; }
        .ma-card-blue .ma-card-icon { color: #3b82f6; }
        .ma-card-green .ma-card-icon { color: #10b981; }
        .ma-card-yellow .ma-card-icon { color: #f59e0b; }
        .ma-card-purple .ma-card-icon { color: #8b5cf6; }

        /* Toolbar */
        .ma-toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 16px; flex-wrap: wrap; }
        .ma-search-group { display: flex; gap: 8px; flex: 1; max-width: 400px; }
        .ma-search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .ma-search-input:focus { border-color: #10b981; box-shadow: 0 0 0 2px rgba(16,185,129,0.2); }
        
        .ma-btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .ma-btn:hover { background: #f9fafb; }
        .ma-btn-primary { background: #10b981; color: white; border-color: #10b981; }
        .ma-btn-primary:hover { background: #059669; border-color: #059669; }
        
        .ma-view-toggles { display: flex; border: 1px solid #d1d5db; border-radius: 6px; overflow: hidden; }
        .ma-view-btn { padding: 8px 12px; background: #fff; border: none; border-right: 1px solid #d1d5db; cursor: pointer; color: #6b7280; display: flex; align-items: center; justify-content: center; }
        .ma-view-btn:last-child { border-right: none; }
        .ma-view-btn.active { background: #10b981; color: #fff; }
        
        .ma-filter-group { display: flex; gap: 12px; align-items: center; }
        .ma-select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Table */
        .ma-table-wrapper { border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; max-height: 500px; overflow-y: auto; }
        .ma-table { width: 100%; border-collapse: collapse; text-align: left; }
        .ma-table th, .ma-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .ma-table th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; position: sticky; top: 0; z-index: 10; cursor: pointer; user-select: none; }
        .ma-table th:hover { background: #f3f4f6; }
        .ma-table tbody tr:hover { background: #f9fafb; }
        
        /* Table Cell Elements */
        .ma-item-cell { display: flex; align-items: center; gap: 12px; }
        .ma-item-img { width: 40px; height: 40px; border-radius: 6px; object-fit: cover; background: #e5e7eb; }
        .ma-item-info { display: flex; flex-direction: column; gap: 4px; }
        .ma-item-name { font-weight: 500; color: #111; font-size: 13px; }
        .ma-item-id { font-size: 11px; color: #6b7280; display: flex; align-items: center; gap: 4px; }
        
        .ma-badge { display: inline-flex; align-items: center; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; border: 1px solid transparent; }
        .ma-badge-blue { background: #eff6ff; color: #1d4ed8; border-color: #dbeafe; }
        .ma-badge-yellow { background: #fefce8; color: #a16207; border-color: #fef08a; }
        .ma-badge-gray { background: #f9fafb; color: #4b5563; border-color: #e5e7eb; }
        .ma-badge-pink { background: #fdf2f8; color: #be185d; border-color: #fce7f3; }
        .ma-badge-green { background: #ecfdf5; color: #059669; border-color: #d1fae5; }
        .ma-badge-purple { background: #faf5ff; color: #7e22ce; border-color: #f3e8ff; }
        .ma-badge-orange { background: #fff7ed; color: #c2410c; border-color: #ffedd5; }
        .ma-badge-teal { background: #f0fdfa; color: #0f766e; border-color: #ccfbf1; }

        .ma-date { display: flex; align-items: center; gap: 6px; color: #4b5563; font-size: 13px; }
        .ma-qty { display: inline-block; background: #eff6ff; color: #1d4ed8; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; }
        
        .ma-text-green { color: #16a34a; font-weight: 500; }
        .ma-text-orange { color: #ea580c; font-weight: 500; }
        
        .ma-actions { display: flex; gap: 12px; justify-content: flex-end; }
        .ma-action-btn { background: none; border: none; cursor: pointer; color: #6b7280; padding: 0; transition: color 0.2s; display: flex; align-items: center; justify-content: center; }
        .ma-action-btn:hover { color: #111; }
        .ma-action-btn.ma-view:hover { color: #10b981; }
        .ma-action-btn.ma-edit:hover { color: #3b82f6; }
        .ma-action-btn.ma-delete:hover { color: #ef4444; }

        /* Toast Notification */
        .ma-toast { visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 4px; padding: 12px; position: fixed; z-index: 1000; bottom: 30px; left: 50%; transform: translateX(-50%); font-size: 14px; opacity: 0; transition: opacity 0.3s, visibility 0.3s; }
        .ma-toast.show { visibility: visible; opacity: 1; }
    </style>

    <!-- Header -->
    <div class="ma-header">
        <div class="ma-title">
            <h2>Manage Assets</h2>
            <p>View, filter, manage, track quantities, unit prices, locations and depreciation values of your company assets.</p>
        </div>
        <button class="ma-btn-add" id="ma-add-btn" title="Add New Asset">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Summary Cards -->
    <div class="ma-cards">
        <div class="ma-card ma-card-blue">
            <div class="ma-card-content">
                <h4>Total Assets</h4>
                <h2>15</h2>
                <p>All time</p>
            </div>
            <div class="ma-card-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 12 12 17 22 12"></polyline><polyline points="2 17 12 22 22 17"></polyline></svg>
            </div>
        </div>
        <div class="ma-card ma-card-green">
            <div class="ma-card-content">
                <h4>Available Assets</h4>
                <h2>10</h2>
                <p>Ready for use</p>
            </div>
            <div class="ma-card-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
        </div>
        <div class="ma-card ma-card-yellow">
            <div class="ma-card-content">
                <h4>Under Maintenance</h4>
                <h2>5</h2>
                <p>Active maintenance</p>
            </div>
            <div class="ma-card-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
            </div>
        </div>
        <div class="ma-card ma-card-purple">
            <div class="ma-card-content">
                <h4>Total Purchase Cost</h4>
                <h2>$307,650.00</h2>
                <p>Total investment</p>
            </div>
            <div class="ma-card-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
            </div>
        </div>
    </div>

    <!-- Toolbar -->
    <div class="ma-toolbar">
        <div class="ma-search-group">
            <input type="text" id="ma-search-input" class="ma-search-input" placeholder="Search Assets...">
            <button class="ma-btn ma-btn-primary" id="ma-search-btn">Search</button>
        </div>
        
        <div style="display: flex; gap: 12px; align-items: center;">
            <div class="ma-view-toggles">
                <button class="ma-view-btn active" title="List View">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                </button>
                <button class="ma-view-btn" title="Grid View">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                </button>
            </div>
            
            <select class="ma-select-input" id="ma-page-size">
                <option value="10">10 per page</option>
                <option value="20">20 per page</option>
                <option value="50">50 per page</option>
            </select>
            
            <button class="ma-btn" id="ma-filter-btn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                Filters
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="ma-table-wrapper">
        <table class="ma-table">
            <thead>
                <tr>
                    <th data-sort="name">Asset <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="category">Category <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="date">Purchase Date <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="qty">Quantity <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="unitPrice">Unit Price <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="totalCost">Purchase Cost <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th data-sort="location">Location <span style="font-size:10px; color:#9ca3af;">↕</span></th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody id="ma-table-body">
                <!-- Rows injected via JS -->
            </tbody>
        </table>
    </div>

    <!-- Toast -->
    <div id="ma-toast" class="ma-toast"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initial Mock Data based on screenshot
            const initialAssets = [
                {
                    id: "DL-LAP-001", name: "Dell Latitude 5520 Laptop", category: "Computer Equipment", catClass: "ma-badge-blue",
                    date: "2024-01-14", qty: 5, unitPrice: 1200.00, totalCost: 6000.00, 
                    location: "Floor 3 - IT Department", locClass: "ma-badge-purple", icon: "laptop"
                },
                {
                    id: "HP-DSK-002", name: "HP ProDesk Desktop", category: "Office Furniture", catClass: "ma-badge-yellow",
                    date: "2024-02-09", qty: 10, unitPrice: 800.00, totalCost: 8000.00, 
                    location: "Floor 2 - Administration", locClass: "ma-badge-green", icon: "desktop"
                },
                {
                    id: "FUR-DSK-003", name: "Executive Office Desk", category: "Vehicles", catClass: "ma-badge-blue",
                    date: "2024-01-19", qty: 15, unitPrice: 450.00, totalCost: 6750.00, 
                    location: "Floor 3 - IT Department", locClass: "ma-badge-purple", icon: "desk"
                },
                {
                    id: "VEH-CAR-004", name: "Toyota Camry 2024", category: "Machinery", catClass: "ma-badge-pink",
                    date: "2024-02-29", qty: 2, unitPrice: 28000.00, totalCost: 56000.00, 
                    location: "Main Office Building", locClass: "ma-badge-pink", icon: "car"
                },
                {
                    id: "MAC-PRT-005", name: "Industrial Printer MX-5000", category: "Electronics", catClass: "ma-badge-blue",
                    date: "2024-02-14", qty: 3, unitPrice: 3500.00, totalCost: 10500.00, 
                    location: "Production Floor", locClass: "ma-badge-green", icon: "printer"
                },
                {
                    id: "ELC-TV-006", name: "Samsung 55\" Smart TV", category: "Software Licenses", catClass: "ma-badge-purple",
                    date: "2024-01-24", qty: 8, unitPrice: 650.00, totalCost: 5200.00, 
                    location: "Conference Room A", locClass: "ma-badge-orange", icon: "tv"
                }
            ];

            // State
            let state = {
                data: [...initialAssets],
                filteredData: [...initialAssets],
                sortColumn: 'name',
                sortAsc: true
            };

            // DOM Elements
            const tbody = document.getElementById('ma-table-body');
            const toastEl = document.getElementById('ma-toast');
            const searchInput = document.getElementById('ma-search-input');
            const searchBtn = document.getElementById('ma-search-btn');

            // Helper: Format Currency
            const formatMoney = (val) => {
                return "$" + val.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            };

            // Helper: Format Date (to YYYY-MM-DD as shown in image)
            const formatDate = (dateStr) => {
                return `📅 ${dateStr}`; 
            };

            // Helper: Show Toast
            const showToast = (msg) => {
                toastEl.textContent = msg;
                toastEl.className = "ma-toast show";
                setTimeout(() => { toastEl.className = toastEl.className.replace("show", ""); }, 3000);
            };

            // Helper: Get Icon SVG (Fallback placeholder for images)
            const getAssetIcon = (type) => {
                // Using generic SVGs to simulate the images in the screenshot
                const svgs = {
                    laptop: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="2" ry="2"></rect><line x1="2" y1="20" x2="22" y2="20"></line></svg>`,
                    desktop: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>`,
                    desk: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 10h20M4 10v10m16-10v10M2 16h20M8 4v6m8-6v6"></path></svg>`,
                    car: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>`,
                    printer: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>`,
                    tv: `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg>`
                };
                return `<div style="background:#f3f4f6; width:40px; height:40px; border-radius:6px; display:flex; justify-content:center; align-items:center;">${svgs[type] || svgs.laptop}</div>`;
            };

            // Function: Render Table
            const renderTable = () => {
                tbody.innerHTML = '';
                
                if (state.filteredData.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="8" style="text-align: center; color: #6b7280; padding: 24px;">No assets found matching your search.</td></tr>`;
                    return;
                }

                state.filteredData.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="ma-item-cell">
                                ${getAssetIcon(row.icon)}
                                <div class="ma-item-info">
                                    <span class="ma-item-name">${row.name}</span>
                                    <span class="ma-item-id">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                        ${row.id}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td><span class="ma-badge ${row.catClass}">${row.category}</span></td>
                        <td><span class="ma-date">${formatDate(row.date)}</span></td>
                        <td><span class="ma-qty">${row.qty}</span></td>
                        <td><span class="ma-text-green">${formatMoney(row.unitPrice)}</span></td>
                        <td><span class="ma-text-orange">${formatMoney(row.totalCost)}</span></td>
                        <td><span class="ma-badge ${row.locClass}">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            ${row.location}
                        </span></td>
                        <td>
                            <div class="ma-actions">
                                <button class="ma-action-btn ma-view" onclick="viewAsset('${row.id}')" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                                <button class="ma-action-btn ma-edit" onclick="editAsset('${row.id}')" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="ma-action-btn ma-delete" onclick="deleteAsset(${index})" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            };

            // Global functions for inline onclick handlers
            window.viewAsset = function(id) {
                showToast(`Opening details for asset: ${id}`);
            };

            window.editAsset = function(id) {
                showToast(`Editing asset: ${id}`);
            };

            window.deleteAsset = function(index) {
                // In a real app, show a confirmation modal here
                const assetToDelete = state.filteredData[index];
                showToast(`Deleted asset: ${assetToDelete.name}`);
                
                // Remove from data
                state.filteredData.splice(index, 1);
                // Also remove from master data
                state.data = state.data.filter(a => a.id !== assetToDelete.id);
                
                renderTable();
            };

            // Search Functionality
            const performSearch = () => {
                const query = searchInput.value.toLowerCase().trim();
                if (query === '') {
                    state.filteredData = [...state.data];
                } else {
                    state.filteredData = state.data.filter(item => 
                        item.name.toLowerCase().includes(query) || 
                        item.id.toLowerCase().includes(query) ||
                        item.category.toLowerCase().includes(query) ||
                        item.location.toLowerCase().includes(query)
                    );
                }
                renderTable();
                showToast(`Found ${state.filteredData.length} assets.`);
            };

            searchBtn.addEventListener('click', performSearch);
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') performSearch();
            });

            // Sorting Functionality
            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const column = th.getAttribute('data-sort');
                    
                    if (state.sortColumn === column) {
                        state.sortAsc = !state.sortAsc;
                    } else {
                        state.sortColumn = column;
                        state.sortAsc = true;
                    }

                    // Update Icons
                    document.querySelectorAll('th span').forEach(span => span.textContent = '↕');
                    th.querySelector('span').textContent = state.sortAsc ? '↑' : '↓';

                    // Sort
                    state.filteredData.sort((a, b) => {
                        let valA = a[column];
                        let valB = b[column];

                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();

                        if (valA < valB) return state.sortAsc ? -1 : 1;
                        if (valA > valB) return state.sortAsc ? 1 : -1;
                        return 0;
                    });
                    
                    renderTable();
                });
            });

            // Other Buttons
            document.getElementById('ma-add-btn').addEventListener('click', () => {
                showToast("Opening 'Add New Asset' form...");
            });

            document.getElementById('ma-filter-btn').addEventListener('click', () => {
                showToast("Filter panel toggled.");
            });

            document.getElementById('ma-page-size').addEventListener('change', (e) => {
                showToast(`Showing ${e.target.value} items per page.`);
                // Note: Pagination logic isn't fully implemented here as the mock data is small,
                // but this is where you would slice the data and re-render.
            });

            // View Toggles (List/Grid)
            const viewBtns = document.querySelectorAll('.ma-view-btn');
            viewBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    viewBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    
                    if (btn.title === "Grid View") {
                        showToast("Switched to Grid View (UI placeholder).");
                        // In a real app, you would hide the table and show a CSS grid layout here.
                    } else {
                        showToast("Switched to List View.");
                    }
                });
            });

            // Initialize
            renderTable();
        });
    </script>
</section>
@endsection