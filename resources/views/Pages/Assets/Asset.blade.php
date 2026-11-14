@extends('layout.dashboard')
@section('title', 'Manage Assets')
@section('content')
<style>body,html,#app,.main-content,.content-wrapper,main{background:#fff!important}</style>

<section id="manage-assets-app">
<style>
#manage-assets-app{font-family:system-ui,sans-serif;color:#374151;background:#fff;padding:24px;margin:-24px;width:calc(100% + 48px);min-height:100vh;box-sizing:border-box;font-size:14px}
#manage-assets-app *{box-sizing:border-box}
.ma-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:24px}
.ma-title h2{margin:0 0 6px;font-size:24px;font-weight:700;color:#111}
.ma-title p{margin:0;color:#6b7280;font-size:14px}
.ma-btn-add{background:#3b82f6;color:#fff;border:none;border-radius:6px;width:40px;height:40px;display:flex;justify-content:center;align-items:center;cursor:pointer;transition:0.2s}
.ma-btn-add:hover{background:#2563eb}

/* Cards */
.ma-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px}
.ma-card{border-radius:8px;padding:20px;border:1px solid transparent;display:flex;justify-content:space-between;align-items:center}
.ma-card-blue{background:#eff6ff;border-color:#dbeafe}
.ma-card-green{background:#ecfdf5;border-color:#d1fae5}
.ma-card-yellow{background:#fffbeb;border-color:#fef3c7}
.ma-card-purple{background:#faf5ff;border-color:#f3e8ff}
.ma-card-content h4{margin:0 0 8px;font-size:15px;font-weight:600}
.ma-card-blue h4,.ma-card-blue h2{color:#1e3a8a}
.ma-card-green h4,.ma-card-green h2{color:#065f46}
.ma-card-yellow h4,.ma-card-yellow h2{color:#92400e}
.ma-card-purple h4,.ma-card-purple h2{color:#4c1d95}
.ma-card-content h2{margin:0 0 8px;font-size:24px;font-weight:700}
.ma-card-content p{margin:0;font-size:13px;opacity:0.8}
.ma-card-blue .ma-card-content p{color:#1e3a8a}
.ma-card-green .ma-card-content p{color:#065f46}
.ma-card-yellow .ma-card-content p{color:#92400e}
.ma-card-purple .ma-card-content p{color:#4c1d95}
.ma-card-icon{display:flex;align-items:flex-start;padding-top:4px}
.ma-card-blue .ma-card-icon{color:#3b82f6}
.ma-card-green .ma-card-icon{color:#10b981}
.ma-card-yellow .ma-card-icon{color:#f59e0b}
.ma-card-purple .ma-card-icon{color:#8b5cf6}

/* Toolbar */
.ma-toolbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;gap:16px;flex-wrap:wrap}
.ma-search-group{display:flex;gap:8px;flex:1;max-width:400px}
.ma-search-input{flex:1;padding:10px 14px;border:1px solid #d1d5db;border-radius:6px;font-size:14px;outline:none}
.ma-search-input:focus{border-color:#3b82f6;box-shadow:0 0 0 2px rgba(59,130,246,0.2)}
.ma-btn{padding:10px 16px;border-radius:6px;border:1px solid #d1d5db;background:#fff;cursor:pointer;font-size:14px;font-weight:500;display:inline-flex;align-items:center;gap:6px;transition:0.2s;color:#374151;white-space:nowrap}
.ma-btn:hover{background:#f9fafb}
.ma-btn-primary{background:#3b82f6;color:#fff;border-color:#3b82f6}
.ma-btn-primary:hover{background:#2563eb;border-color:#2563eb}
.ma-btn-clear{background:#f3f4f6;color:#4b5563;border-color:#d1d5db}
.ma-btn-clear:hover{background:#e5e7eb;color:#111827}

.ma-view-toggles{display:flex;border:1px solid #d1d5db;border-radius:6px;overflow:hidden}
.ma-view-btn{padding:10px 14px;background:#fff;border:none;border-right:1px solid #d1d5db;cursor:pointer;color:#6b7280;display:flex;align-items:center;justify-content:center}
.ma-view-btn:last-child{border-right:none}
.ma-view-btn.active{background:#bfdbfe;color:#1e40af}
.ma-select-input{padding:10px 14px;border:1px solid #d1d5db;border-radius:6px;font-size:14px;outline:none;background:#fff;cursor:pointer}

/* Table */
.ma-table-wrapper{border:1px solid #e5e7eb;border-radius:8px;overflow:visible}
.ma-table{width:100%;border-collapse:collapse;text-align:left}
.ma-table th,.ma-table td{padding:16px 20px;border-bottom:1px solid #e5e7eb;vertical-align:middle}
.ma-table th{background:#f9fafb;font-weight:700;color:#1f2937;font-size:13px;text-transform:uppercase;letter-spacing:0.05em;cursor:pointer;user-select:none;white-space:nowrap}
.ma-table th:hover{background:#f3f4f6}
.ma-table tbody tr:hover{background:#f9fafb}

/* Cells */
.ma-item-cell{display:flex;align-items:center;gap:16px;min-width:220px}
.ma-item-icon{width:40px;height:40px;border-radius:6px;background:#eff6ff;display:flex;justify-content:center;align-items:center;flex-shrink:0}
.ma-item-info{display:flex;flex-direction:column;gap:4px}
.ma-item-name{font-weight:600;color:#111;font-size:14px}
.ma-item-id{font-size:12px;color:#6b7280;display:flex;align-items:center;gap:4px}
.ma-badge{display:inline-flex;align-items:center;padding:4px 10px;border-radius:4px;font-size:12px;font-weight:600;border:1px solid transparent;white-space:nowrap}
.ma-badge-blue{background:#eff6ff;color:#1d4ed8;border-color:#dbeafe}
.ma-badge-yellow{background:#fefce8;color:#a16207;border-color:#fef08a}
.ma-badge-pink{background:#fdf2f8;color:#be185d;border-color:#fce7f3}
.ma-badge-green{background:#ecfdf5;color:#059669;border-color:#d1fae5}
.ma-badge-purple{background:#faf5ff;color:#7e22ce;border-color:#f3e8ff}
.ma-badge-orange{background:#fff7ed;color:#c2410c;border-color:#ffedd5}
.ma-date{display:flex;align-items:center;gap:6px;color:#4b5563;font-size:14px;white-space:nowrap}
.ma-qty{display:inline-block;background:#eff6ff;color:#1d4ed8;padding:4px 10px;border-radius:4px;font-size:13px;font-weight:600;text-align:center}
.ma-text-green{color:#16a34a;font-weight:600;white-space:nowrap}
.ma-text-orange{color:#ea580c;font-weight:600;white-space:nowrap}

/* Grid View (2 columns) */
.ma-grid-wrapper{display:none;grid-template-columns:repeat(2, 1fr);gap:16px}
.ma-grid-card{border:1px solid #e5e7eb;border-radius:8px;padding:20px;background:#fff;display:flex;flex-direction:column;gap:16px;box-shadow:0 1px 2px rgba(0,0,0,0.02)}
.ma-grid-header{display:flex;justify-content:space-between;align-items:flex-start}
.ma-grid-body{display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px;border-top:1px solid #e5e7eb;padding-top:16px}
.ma-grid-label{color:#6b7280;font-size:12px;text-transform:uppercase;margin-bottom:4px;display:block}

/* Dropdown */
.ma-action-menu{position:relative;display:flex;justify-content:flex-end}
.ma-action-trigger{background:none;border:none;cursor:pointer;color:#6b7280;padding:6px;border-radius:4px;display:flex;align-items:center;justify-content:center;transition:0.2s}
.ma-action-trigger:hover{background:#f3f4f6;color:#111}
.ma-dropdown{display:none;position:absolute;right:0;top:100%;background:#fff;border:1px solid #e5e7eb;border-radius:6px;box-shadow:0 4px 12px rgba(0,0,0,0.1);z-index:100;min-width:140px;padding:6px 0;flex-direction:column}
.ma-dropdown.show{display:flex}
.ma-dropdown-btn{background:none;border:none;padding:10px 16px;text-align:left;font-size:14px;font-weight:500;cursor:pointer;width:100%;display:flex;align-items:center;gap:10px;transition:0.2s;font-family:inherit}
.ma-dropdown-btn:hover{background:#f9fafb}
.ma-dropdown-btn.view{color:#3b82f6}
.ma-dropdown-btn.view:hover{background:#eff6ff}
.ma-dropdown-btn.edit{color:#f59e0b}
.ma-dropdown-btn.edit:hover{background:#fffbeb}
.ma-dropdown-btn.delete{color:#ef4444}
.ma-dropdown-btn.delete:hover{background:#fef2f2}
.ma-dropdown-btn svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2}

/* Pagination matching the screenshot */
.ma-pagination{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;margin-top:24px;border:1px solid #e5e7eb;border-radius:8px;background:#fff}
.ma-page-info{font-size:14px;color:#374151}
.ma-page-controls{display:flex;gap:6px;align-items:center}
.ma-page-btn{padding:6px 12px;border:1px solid #e5e7eb;background:#fff;border-radius:6px;cursor:pointer;font-size:14px;font-weight:500;color:#6b7280;transition:0.2s}
.ma-page-btn:hover:not(:disabled){background:#f9fafb;color:#111827}
.ma-page-btn:disabled{opacity:0.5;cursor:not-allowed}
.ma-page-num{padding:6px 12px;border:1px solid #e5e7eb;background:#fff;border-radius:6px;cursor:pointer;font-size:14px;font-weight:500;color:#374151;min-width:34px;text-align:center;transition:0.2s}
.ma-page-num:hover{background:#f9fafb}
.ma-page-num.active{background:#3b82f6;color:#fff;border-color:#3b82f6}

.ma-toast{visibility:hidden;min-width:250px;background:#333;color:#fff;text-align:center;border-radius:4px;padding:12px;position:fixed;z-index:1000;bottom:30px;left:50%;transform:translateX(-50%);font-size:14px;opacity:0;transition:0.3s}
.ma-toast.show{visibility:visible;opacity:1}
</style>

<div class="ma-header">
    <div class="ma-title">
        <h2>Manage Assets</h2>
        <p>View, filter, manage, track quantities, unit prices, locations and depreciation values of your company assets.</p>
    </div>
    <button class="ma-btn-add" id="ma-add-btn"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
</div>

<div class="ma-cards">
    <div class="ma-card ma-card-blue">
        <div class="ma-card-content"><h4>Total Assets</h4><h2>15</h2><p>All time</p></div>
        <div class="ma-card-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 12 12 17 22 12"></polyline><polyline points="2 17 12 22 22 17"></polyline></svg></div>
    </div>
    <div class="ma-card ma-card-green">
        <div class="ma-card-content"><h4>Available Assets</h4><h2>10</h2><p>Ready for use</p></div>
        <div class="ma-card-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></div>
    </div>
    <div class="ma-card ma-card-yellow">
        <div class="ma-card-content"><h4>Under Maintenance</h4><h2>5</h2><p>Active maintenance</p></div>
        <div class="ma-card-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg></div>
    </div>
    <div class="ma-card ma-card-purple">
        <div class="ma-card-content"><h4>Total Purchase Cost</h4><h2>$307,650.00</h2><p>Total investment</p></div>
        <div class="ma-card-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg></div>
    </div>
</div>

<div class="ma-toolbar">
    <div class="ma-search-group">
        <input type="text" id="ma-search-input" class="ma-search-input" placeholder="Search Assets...">
        <button class="ma-btn ma-btn-primary" id="ma-search-btn">Search</button>
        <button class="ma-btn ma-btn-clear" id="ma-clear-btn">Clear</button>
    </div>
    <div style="display:flex;gap:12px;align-items:center">
        <div class="ma-view-toggles">
            <button class="ma-view-btn active" id="ma-view-list"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></button>
            <button class="ma-view-btn" id="ma-view-grid"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></button>
        </div>
        <select class="ma-select-input" id="ma-page-size">
            <option value="5">5 per page</option>
            <option value="10">10 per page</option>
            <option value="20">20 per page</option>
        </select>
        <button class="ma-btn" id="ma-filter-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>Filters</button>
    </div>
</div>

<!-- List View -->
<div class="ma-table-wrapper" id="ma-list-container">
    <table class="ma-table">
        <thead>
            <tr>
                <th data-sort="name" style="width:25%">Asset ↕</th>
                <th data-sort="category" style="width:15%">Category ↕</th>
                <th data-sort="date" style="width:12%">Purchase Date ↕</th>
                <th data-sort="qty" style="width:8%">Qty ↕</th>
                <th data-sort="unitPrice" style="width:10%">Unit Price ↕</th>
                <th data-sort="totalCost" style="width:12%">Cost ↕</th>
                <th data-sort="location" style="width:15%">Location ↕</th>
                <th style="text-align:right;width:3%"></th>
            </tr>
        </thead>
        <tbody id="ma-table-body"></tbody>
    </table>
</div>

<!-- Grid View -->
<div class="ma-grid-wrapper" id="ma-grid-container"></div>

<!-- Pagination -->
<div class="ma-pagination">
    <div class="ma-page-info" id="ma-page-info">Showing 0 of 0 results</div>
    <div class="ma-page-controls" id="ma-page-controls">
        <!-- Pagination buttons injected via JS -->
    </div>
</div>

<div id="ma-toast" class="ma-toast"></div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const assets = [
        { id:"DL-LAP-001", name:"Dell Latitude 5520 Laptop", category:"Computer Equipment", catClass:"ma-badge-blue", date:"2024-01-14", qty:5, unitPrice:1200, totalCost:6000, location:"Floor 3 - IT Department", locClass:"ma-badge-purple", icon:"laptop" },
        { id:"HP-DSK-002", name:"HP ProDesk Desktop", category:"Office Furniture", catClass:"ma-badge-yellow", date:"2024-02-09", qty:10, unitPrice:800, totalCost:8000, location:"Floor 2 - Administration", locClass:"ma-badge-green", icon:"desktop" },
        { id:"FUR-DSK-003", name:"Executive Office Desk", category:"Vehicles", catClass:"ma-badge-blue", date:"2024-01-19", qty:15, unitPrice:450, totalCost:6750, location:"Floor 3 - IT Department", locClass:"ma-badge-purple", icon:"desk" },
        { id:"VEH-CAR-004", name:"Toyota Camry 2024", category:"Machinery", catClass:"ma-badge-pink", date:"2024-02-29", qty:2, unitPrice:28000, totalCost:56000, location:"Main Office Building", locClass:"ma-badge-pink", icon:"car" },
        { id:"MAC-PRT-005", name:"Industrial Printer MX-5000", category:"Electronics", catClass:"ma-badge-blue", date:"2024-02-14", qty:3, unitPrice:3500, totalCost:10500, location:"Production Floor", locClass:"ma-badge-green", icon:"printer" },
        { id:"ELC-TV-006", name:"Samsung 55\" Smart TV", category:"Software Licenses", catClass:"ma-badge-purple", date:"2024-01-24", qty:8, unitPrice:650, totalCost:5200, location:"Conference Room A", locClass:"ma-badge-orange", icon:"tv" },
        { id:"OFF-CHR-007", name:"Ergonomic Office Chair", category:"Furniture", catClass:"ma-badge-yellow", date:"2024-03-01", qty:25, unitPrice:150, totalCost:3750, location:"Floor 2 - Administration", locClass:"ma-badge-green", icon:"desk" },
        { id:"NET-SWT-008", name:"Cisco 24-Port Switch", category:"Networking", catClass:"ma-badge-blue", date:"2024-03-05", qty:4, unitPrice:600, totalCost:2400, location:"Server Room", locClass:"ma-badge-gray", icon:"desktop" },
        { id:"PRJ-EPS-009", name:"Epson Projector X500", category:"Electronics", catClass:"ma-badge-blue", date:"2024-01-10", qty:2, unitPrice:850, totalCost:1700, location:"Conference Room B", locClass:"ma-badge-orange", icon:"tv" },
        { id:"FRK-LFT-010", name:"Forklift Truck 2T", category:"Machinery", catClass:"ma-badge-pink", date:"2024-02-15", qty:1, unitPrice:15000, totalCost:15000, location:"Warehouse", locClass:"ma-badge-purple", icon:"car" },
        { id:"SRV-DEL-011", name:"Dell PowerEdge Server", category:"IT Infrastructure", catClass:"ma-badge-gray", date:"2024-03-10", qty:3, unitPrice:4500, totalCost:13500, location:"Server Room", locClass:"ma-badge-gray", icon:"desktop" },
        { id:"TBL-CNF-012", name:"Conference Room Table", category:"Furniture", catClass:"ma-badge-yellow", date:"2024-01-28", qty:1, unitPrice:2200, totalCost:2200, location:"Conference Room A", locClass:"ma-badge-orange", icon:"desk" }
    ];

    let state = { 
        data: [...assets], 
        filtered: [...assets], 
        sortCol: 'name', 
        sortAsc: true,
        currentPage: 1,
        pageSize: 5,
        viewMode: 'list'
    };

    const tableBody = document.getElementById('ma-table-body');
    const gridContainer = document.getElementById('ma-grid-container');
    const listContainer = document.getElementById('ma-list-container');
    const toast = document.getElementById('ma-toast');
    const searchInput = document.getElementById('ma-search-input');
    const pageInfo = document.getElementById('ma-page-info');
    const pageControls = document.getElementById('ma-page-controls');
    const pageSizeSelect = document.getElementById('ma-page-size');

    const formatMoney = v => "$" + v.toLocaleString('en-US',{minimumFractionDigits:2});
    
    const icons = {
        laptop:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><rect x="3" y="4" width="18" height="12" rx="2" ry="2"></rect><line x1="2" y1="20" x2="22" y2="20"></line></svg>`,
        desktop:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>`,
        desk:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><path d="M2 10h20M4 10v10m16-10v10M2 16h20M8 4v6m8-6v6"></path></svg>`,
        car:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>`,
        printer:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>`,
        tv:`<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg>`
    };

    window.showToast = msg => {
        toast.textContent = msg;
        toast.className = "ma-toast show";
        setTimeout(() => toast.classList.remove("show"), 3000);
    };

    window.toggleMenu = btn => {
        document.querySelectorAll('.ma-dropdown').forEach(m => { if (m !== btn.nextElementSibling) m.classList.remove('show'); });
        btn.nextElementSibling.classList.toggle('show');
    };
    document.addEventListener('click', e => {
        if (!e.target.closest('.ma-action-menu')) document.querySelectorAll('.ma-dropdown').forEach(m => m.classList.remove('show'));
    });

    const actionMenu = id => `
        <div class="ma-action-menu">
            <button class="ma-action-trigger" onclick="toggleMenu(this)"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
            <div class="ma-dropdown">
                <button class="ma-dropdown-btn view" onclick="viewAsset('${id}')">View</button>
                <button class="ma-dropdown-btn edit" onclick="editAsset('${id}')">Edit</button>
                <button class="ma-dropdown-btn delete" onclick="deleteAsset('${id}')">Delete</button>
            </div>
        </div>`;

    window.viewAsset = id => showToast(`Opening details for: ${id}`);
    window.editAsset = id => showToast(`Editing: ${id}`);
    window.deleteAsset = id => {
        state.data = state.data.filter(a => a.id !== id);
        applyFilters();
        showToast(`Asset deleted.`);
    };

    const applyFilters = () => {
        const q = searchInput.value.toLowerCase().trim();
        state.filtered = state.data.filter(a => 
            a.name.toLowerCase().includes(q) || a.id.toLowerCase().includes(q)
        );
        
        if (state.sortCol) {
            state.filtered.sort((a, b) => (a[state.sortCol] > b[state.sortCol] ? 1 : -1) * (state.sortAsc ? 1 : -1));
        }
        state.currentPage = 1;
        render();
    };

    const render = () => {
        const totalItems = state.filtered.length;
        const totalPages = Math.ceil(totalItems / state.pageSize) || 1;
        
        if (state.currentPage > totalPages) state.currentPage = totalPages;
        if (state.currentPage < 1) state.currentPage = 1;

        const startIndex = (state.currentPage - 1) * state.pageSize;
        const endIndex = Math.min(startIndex + state.pageSize, totalItems);
        const pageData = state.filtered.slice(startIndex, endIndex);

        // Update Pagination UI
        pageInfo.textContent = totalItems === 0 ? 'Showing 0 results' : `Showing ${startIndex + 1}-${endIndex} of ${totalItems}`;
        
        let paginationHTML = `<button class="ma-page-btn" onclick="goPage(${state.currentPage - 1})" ${state.currentPage === 1 ? 'disabled' : ''}>Prev</button>`;
        
        // Generate Numbered Pages
        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `<button class="ma-page-num ${i === state.currentPage ? 'active' : ''}" onclick="goPage(${i})">${i}</button>`;
        }
        
        paginationHTML += `<button class="ma-page-btn" onclick="goPage(${state.currentPage + 1})" ${state.currentPage === totalPages ? 'disabled' : ''}>Next</button>`;
        pageControls.innerHTML = paginationHTML;

        // Toggle View mode
        if (state.viewMode === 'list') {
            listContainer.style.display = 'block';
            gridContainer.style.display = 'none';
            
            tableBody.innerHTML = pageData.length === 0 
                ? `<tr><td colspan="8" style="text-align:center;padding:24px;color:#6b7280">No assets found.</td></tr>` 
                : pageData.map(row => `
                    <tr>
                        <td><div class="ma-item-cell">
                            <div class="ma-item-icon">${icons[row.icon]}</div>
                            <div class="ma-item-info"><span class="ma-item-name">${row.name}</span><span class="ma-item-id">${row.id}</span></div>
                        </div></td>
                        <td><span class="ma-badge ${row.catClass}">${row.category}</span></td>
                        <td><span class="ma-date">📅 ${row.date}</span></td>
                        <td><span class="ma-qty">${row.qty}</span></td>
                        <td><span class="ma-text-green">${formatMoney(row.unitPrice)}</span></td>
                        <td><span class="ma-text-orange">${formatMoney(row.totalCost)}</span></td>
                        <td><span class="ma-badge ${row.locClass}">${row.location}</span></td>
                        <td>${actionMenu(row.id)}</td>
                    </tr>`).join('');
        } else {
            listContainer.style.display = 'none';
            gridContainer.style.display = 'grid';
            
            gridContainer.innerHTML = pageData.length === 0 
                ? `<div style="grid-column:1/-1;text-align:center;padding:24px;color:#6b7280">No assets found.</div>` 
                : pageData.map(row => `
                    <div class="ma-grid-card">
                        <div class="ma-grid-header">
                            <div class="ma-item-cell">
                                <div class="ma-item-icon">${icons[row.icon]}</div>
                                <div class="ma-item-info"><span class="ma-item-name">${row.name}</span><span class="ma-item-id">${row.id}</span></div>
                            </div>
                            ${actionMenu(row.id)}
                        </div>
                        <div class="ma-grid-body">
                            <div><span class="ma-grid-label">Category</span><span class="ma-badge ${row.catClass}">${row.category}</span></div>
                            <div><span class="ma-grid-label">Location</span><span class="ma-badge ${row.locClass}">${row.location}</span></div>
                            <div><span class="ma-grid-label">Qty</span><span class="ma-qty">${row.qty}</span></div>
                            <div><span class="ma-grid-label">Date</span><span class="ma-date" style="font-size:13px">${row.date}</span></div>
                            <div><span class="ma-grid-label">Unit Price</span><span class="ma-text-green">${formatMoney(row.unitPrice)}</span></div>
                            <div><span class="ma-grid-label">Total Cost</span><span class="ma-text-orange">${formatMoney(row.totalCost)}</span></div>
                        </div>
                    </div>`).join('');
        }
    };

    window.goPage = p => {
        state.currentPage = p;
        render();
    };

    document.getElementById('ma-search-btn').addEventListener('click', applyFilters);
    document.getElementById('ma-clear-btn').addEventListener('click', () => {
        searchInput.value = '';
        applyFilters();
        searchInput.focus();
    });

    pageSizeSelect.addEventListener('change', e => {
        state.pageSize = parseInt(e.target.value);
        state.currentPage = 1;
        render();
    });

    document.getElementById('ma-view-list').addEventListener('click', () => {
        document.getElementById('ma-view-list').classList.add('active');
        document.getElementById('ma-view-grid').classList.remove('active');
        state.viewMode = 'list';
        render();
    });

    document.getElementById('ma-view-grid').addEventListener('click', () => {
        document.getElementById('ma-view-grid').classList.add('active');
        document.getElementById('ma-view-list').classList.remove('active');
        state.viewMode = 'grid';
        render();
    });

    document.querySelectorAll('th[data-sort]').forEach(th => {
        th.addEventListener('click', () => {
            const col = th.dataset.sort;
            state.sortAsc = state.sortCol === col ? !state.sortAsc : true;
            state.sortCol = col;
            applyFilters();
        });
    });

    // Init
    render();
});
</script>
</section>
@endsection