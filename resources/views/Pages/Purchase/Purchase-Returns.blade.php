@extends('layout.dashboard')
@section('title', 'Manage Purchase Returns - LedgeInvo')

@section('content')
@verbatim
<style>
    body, html, #app, main, .main-content, .content-wrapper, .page-wrapper, .container-fluid {
        background-color: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
    }

    .mpr-section {
        font-family: system-ui, -apple-system, sans-serif;
        background: #ffffff;
        padding: 24px 32px;
        color: #0f172a;
        box-sizing: border-box;
        min-height: 100vh;
        width: 100%;
    }
    .mpr-section * { box-sizing: border-box; }

    /* Header */
    .mpr-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
    .mpr-header h1 { font-size: 22px; font-weight: 600; color: #1e293b; margin: 0 0 6px 0; }
    .mpr-header p { font-size: 14px; color: #64748b; margin: 0; }
    .mpr-add-btn { display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #16a34a; border: none; border-radius: 6px; color: #fff; cursor: pointer; transition: background 0.2s; }
    .mpr-add-btn:hover { background: #15803d; }

    /* Toolbar */
    .mpr-toolbar { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; }
    .mpr-search-wrap { display: flex; gap: 8px; flex: 1; max-width: 480px; }
    .mpr-search-input { flex: 1; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; color: #1e293b; background: #fff url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'><circle cx='11' cy='11' r='8'/><line x1='21' y1='21' x2='16.65' y2='16.65'/></svg>") no-repeat 12px center; outline: none; transition: border 0.2s; }
    .mpr-search-input:focus { border-color: #16a34a; }
    .mpr-search-btn { padding: 9px 20px; background: #16a34a; border: none; border-radius: 6px; color: #fff; font-size: 14px; font-weight: 500; cursor: pointer; transition: background 0.2s; }
    .mpr-search-btn:hover { background: #15803d; }

    .mpr-toolbar-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

    .mpr-view-toggle { display: inline-flex; border: 1px solid #e2e8f0; border-radius: 6px; overflow: hidden; }
    .mpr-view-toggle button { width: 38px; height: 36px; border: none; background: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; color: #64748b; transition: all 0.2s; }
    .mpr-view-toggle button.active { background: #16a34a; color: #fff; }
    .mpr-view-toggle button:not(.active):hover { background: #f1f5f9; }
    .mpr-view-toggle button + button { border-left: 1px solid #e2e8f0; }

    .mpr-select { padding: 8px 32px 8px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; background: #fff; color: #334155; cursor: pointer; appearance: none; background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2'><polyline points='6 9 12 15 18 9'/></svg>"); background-repeat: no-repeat; background-position: right 10px center; outline: none; }

    .mpr-filter-btn { display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border: 1px solid #e2e8f0; border-radius: 6px; background: #fff; font-size: 14px; font-weight: 500; color: #334155; cursor: pointer; transition: all 0.2s; }
    .mpr-filter-btn:hover { background: #f8fafc; border-color: #cbd5e1; }

    /* Table */
    .mpr-table-wrap { border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; background: #fff; }
    .mpr-table { width: 100%; border-collapse: collapse; }
    .mpr-table th { text-align: left; padding: 14px 16px; background: #f8fafc; font-size: 13px; font-weight: 600; color: #475569; border-bottom: 1px solid #e2e8f0; white-space: nowrap; }
    .mpr-table th.sortable { cursor: pointer; user-select: none; }
    .mpr-table th.sortable:hover { background: #f1f5f9; }
    .mpr-table th .sort-icon { display: inline-block; margin-left: 4px; opacity: 0.5; }
    .mpr-table th.sorted-asc .sort-icon, .mpr-table th.sorted-desc .sort-icon { opacity: 1; }
    .mpr-table td { padding: 14px 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #334155; vertical-align: middle; }
    .mpr-table tbody tr:hover { background: #f8fafc; }
    .mpr-table tbody tr:last-child td { border-bottom: none; }

    /* Cells */
    .mpr-return-badge { display: inline-block; padding: 5px 10px; border: 1px solid #bfdbfe; background: #eff6ff; color: #1d4ed8; font-size: 12px; font-weight: 500; border-radius: 6px; }
    .mpr-vendor-cell { display: flex; align-items: center; gap: 10px; }
    .mpr-vendor-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; background: #e2e8f0; flex-shrink: 0; }
    .mpr-vendor-info { display: flex; flex-direction: column; min-width: 0; }
    .mpr-vendor-info strong { font-size: 14px; font-weight: 500; color: #1e293b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .mpr-vendor-info small { font-size: 12px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .mpr-warehouse-badge { display: inline-block; padding: 5px 10px; border-radius: 6px; font-size: 12px; font-weight: 500; border: 1px solid; }
    .mpr-warehouse-badge.blue   { background: #eff6ff; color: #1d4ed8; border-color: #bfdbfe; }
    .mpr-warehouse-badge.purple { background: #faf5ff; color: #7e22ce; border-color: #e9d5ff; }
    .mpr-warehouse-badge.green  { background: #f0fdf4; color: #15803d; border-color: #bbf7d0; }
    .mpr-warehouse-badge.orange { background: #fff7ed; color: #c2410c; border-color: #fed7aa; }

    .mpr-date { display: inline-flex; align-items: center; gap: 6px; color: #475569; font-size: 13px; white-space: nowrap; }
    .mpr-date svg { color: #94a3b8; }

    .mpr-amount { font-weight: 500; color: #1e293b; white-space: nowrap; }

    .mpr-items { display: flex; align-items: center; gap: 6px; }
    .mpr-items small { color: #64748b; font-size: 13px; }

    .mpr-status { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; white-space: nowrap; }
    .mpr-status.completed { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
    .mpr-status.approved  { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
    .mpr-status.draft     { background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; }

    .mpr-actions { display: flex; align-items: center; gap: 6px; }
    .mpr-icon-btn { width: 32px; height: 32px; border: none; background: transparent; border-radius: 6px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; color: #64748b; transition: all 0.15s; }
    .mpr-icon-btn:hover { background: #f1f5f9; }
    .mpr-icon-btn.approve { color: #2563eb; }
    .mpr-icon-btn.approve:hover { background: #eff6ff; color: #1d4ed8; }
    .mpr-icon-btn.view    { color: #16a34a; }
    .mpr-icon-btn.view:hover { background: #f0fdf4; color: #15803d; }
    .mpr-icon-btn.delete  { color: #dc2626; }
    .mpr-icon-btn.delete:hover { background: #fef2f2; color: #b91c1c; }

    /* Grid View */
    .mpr-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px; }
    .mpr-grid-card { border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; background: #fff; display: flex; flex-direction: column; gap: 12px; transition: box-shadow 0.2s; }
    .mpr-grid-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.06); }
    .mpr-grid-card-header { display: flex; justify-content: space-between; align-items: center; }
    .mpr-grid-card-body { display: flex; align-items: center; gap: 10px; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; }
    .mpr-grid-card-info { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; font-size: 13px; }
    .mpr-grid-card-info div span { display: block; color: #64748b; font-size: 11px; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 0.3px; }
    .mpr-grid-card-info div strong { color: #1e293b; font-weight: 500; font-size: 13px; }
    .mpr-grid-card-actions { display: flex; gap: 6px; justify-content: flex-end; padding-top: 8px; border-top: 1px solid #f1f5f9; }

    /* Empty state */
    .mpr-empty { padding: 48px 16px; text-align: center; color: #64748b; font-size: 14px; }

    /* Modal */
    .mpr-modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.4); display: none; align-items: center; justify-content: center; z-index: 9999; }
    .mpr-modal-overlay.active { display: flex; }
    .mpr-modal { background: #fff; border-radius: 12px; padding: 24px; width: 100%; max-width: 440px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); animation: mprModalFadeIn 0.2s ease-out; }
    @keyframes mprModalFadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
    .mpr-modal h3 { margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #0f172a; }
    .mpr-modal p { margin: 0 0 24px 0; font-size: 14px; color: #64748b; }
    .mpr-modal-actions { display: flex; justify-content: flex-end; gap: 12px; }
    .mpr-btn { padding: 8px 16px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; border: none; transition: all 0.2s; }
    .mpr-btn.cancel { background: #fff; border: 1px solid #cbd5e1; color: #475569; }
    .mpr-btn.cancel:hover { background: #f8fafc; }
    .mpr-btn.danger { background: #ef4444; color: #fff; }
    .mpr-btn.danger:hover { background: #dc2626; }
    .mpr-btn.approve { background: #2563eb; color: #fff; }
    .mpr-btn.approve:hover { background: #1d4ed8; }

    @media (max-width: 900px) {
        .mpr-section { padding: 16px; }
        .mpr-toolbar { flex-direction: column; align-items: stretch; }
        .mpr-search-wrap { max-width: 100%; }
        .mpr-table-wrap { overflow-x: auto; }
    }
</style>
@endverbatim

<div class="mpr-section">

    <!-- Header -->
    <div class="mpr-header">
        <div>
            <h1>Manage Purchase Returns</h1>
            <p>Manage and track your purchase returns, statuses, and values.</p>
        </div>
        <button class="mpr-add-btn" title="Add New Return" onclick="alert('Open create purchase return form')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Toolbar -->
    <div class="mpr-toolbar">
        <div class="mpr-search-wrap">
            <input type="text" id="mprSearchInput" class="mpr-search-input" placeholder="Search by return number...">
            <button class="mpr-search-btn" id="mprSearchBtn">Search</button>
        </div>

        <div class="mpr-toolbar-right">
            <div class="mpr-view-toggle" role="group" aria-label="View toggle">
                <button type="button" id="mprBtnListView" class="active" title="List View">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                </button>
                <button type="button" id="mprBtnGridView" title="Grid View">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                </button>
            </div>

            <select class="mpr-select" id="mprPerPage">
                <option value="10" selected>10 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
                <option value="100">100 per page</option>
            </select>

            <select class="mpr-select" id="mprStatusFilter" title="Filter by status">
                <option value="">All Statuses</option>
                <option value="Completed">Completed</option>
                <option value="Approved">Approved</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>

    <!-- List View -->
    <div id="mprListView">
        <div class="mpr-table-wrap">
            <table class="mpr-table" id="mprTable">
                <thead>
                    <tr>
                        <th class="sortable" data-sort="number">Return Number <span class="sort-icon">↕</span></th>
                        <th class="sortable" data-sort="vendor">Vendor <span class="sort-icon">↕</span></th>
                        <th>Warehouse</th>
                        <th class="sortable" data-sort="date">Return Date <span class="sort-icon">↕</span></th>
                        <th class="sortable" data-sort="amount">Total Amount <span class="sort-icon">↕</span></th>
                        <th>Items</th>
                        <th class="sortable" data-sort="status">Status <span class="sort-icon">↕</span></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="mprTableBody"></tbody>
            </table>
            <div id="mprEmptyState" class="mpr-empty" style="display:none;">No purchase returns found.</div>
        </div>
    </div>

    <!-- Grid View (hidden by default) -->
    <div id="mprGridView" style="display:none;">
        <div class="mpr-grid" id="mprGridBody"></div>
        <div id="mprGridEmptyState" class="mpr-empty" style="display:none;">No purchase returns found.</div>
    </div>

</div>

<!-- Delete Modal -->
<div class="mpr-modal-overlay" id="mprDeleteModal">
    <div class="mpr-modal">
        <h3>Delete Purchase Return</h3>
        <p>Are you sure you want to delete this purchase return? This action cannot be undone.</p>
        <div class="mpr-modal-actions">
            <button class="mpr-btn cancel" onclick="closeMprDeleteModal()">Cancel</button>
            <button class="mpr-btn danger" onclick="confirmMprDelete()">Delete</button>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="mpr-modal-overlay" id="mprApproveModal">
    <div class="mpr-modal">
        <h3>Approve Purchase Return</h3>
        <p>Are you sure you want to approve this purchase return?</p>
        <div class="mpr-modal-actions">
            <button class="mpr-btn cancel" onclick="closeMprApproveModal()">Cancel</button>
            <button class="mpr-btn approve" onclick="confirmMprApprove()">Approve</button>
        </div>
    </div>
</div>

<script>
(function () {
    // ==== DATA ====
    let data = [
        { id: 1, number: 'PR-2026-02-012', vendor: 'Sam Supplier', vendorEmail: 'sam.supplier@vendor.com', avatar: 'https://randomuser.me/api/portraits/men/32.jpg', warehouse: 'Central Distribution Center', warehouseColor: 'blue', date: '2026-07-06', amount: 174.00, item: 'Watch', qty: 1, status: 'Completed' },
        { id: 2, number: 'PR-2026-02-011', vendor: 'Alex Vendor', vendorEmail: 'alex.vendor@supplier.com', avatar: 'https://randomuser.me/api/portraits/men/45.jpg', warehouse: 'Texas Distribution Point', warehouseColor: 'purple', date: '2026-07-04', amount: 70.80, item: 'T-Shirt', qty: 5, status: 'Approved' },
        { id: 3, number: 'PR-2026-02-010', vendor: 'Quality Parts Corp', vendorEmail: 'support@qualityparts.com', avatar: 'https://randomuser.me/api/portraits/women/44.jpg', warehouse: 'Midwest Regional Warehouse', warehouseColor: 'green', date: '2026-06-14', amount: 174.00, item: 'Brake Pad Set', qty: 3, status: 'Completed' },
        { id: 4, number: 'PR-2026-02-009', vendor: 'Prime Materials Ltd', vendorEmail: 'sales@primematerials.com', avatar: 'https://randomuser.me/api/portraits/women/68.jpg', warehouse: 'East Coast Logistics Hub', warehouseColor: 'purple', date: '2026-05-24', amount: 130.50, item: 'Shampoo', qty: 10, status: 'Draft' },
        { id: 5, number: 'PR-2026-02-008', vendor: 'Global Supplies Co', vendorEmail: 'info@globalsupplies.com', avatar: 'https://randomuser.me/api/portraits/women/12.jpg', warehouse: 'Central Distribution Center', warehouseColor: 'blue', date: '2026-05-14', amount: 174.00, item: 'Watch', qty: 1, status: 'Approved' },
        { id: 6, number: 'PR-2026-02-007', vendor: 'Sam Supplier', vendorEmail: 'sam.supplier@vendor.com', avatar: 'https://randomuser.me/api/portraits/men/32.jpg', warehouse: 'Midwest Regional Warehouse', warehouseColor: 'green', date: '2026-05-01', amount: 47.20, item: 'Coffee', qty: 5, status: 'Approved' },
        { id: 7, number: 'PR-2026-02-006', vendor: 'Alex Vendor', vendorEmail: 'alex.vendor@supplier.com', avatar: 'https://randomuser.me/api/portraits/men/45.jpg', warehouse: 'West Coast Storage Facility', warehouseColor: 'orange', date: '2026-04-17', amount: 767.00, item: 'Laptop', qty: 1, status: 'Completed' },
        { id: 8, number: 'PR-2026-02-005', vendor: 'Quality Parts Corp', vendorEmail: 'support@qualityparts.com', avatar: 'https://randomuser.me/api/portraits/women/44.jpg', warehouse: 'Texas Distribution Point', warehouseColor: 'purple', date: '2026-04-03', amount: 520.00, item: 'Engine Oil', qty: 4, status: 'Draft' },
        { id: 9, number: 'PR-2026-02-004', vendor: 'Prime Materials Ltd', vendorEmail: 'sales@primematerials.com', avatar: 'https://randomuser.me/api/portraits/women/68.jpg', warehouse: 'Central Distribution Center', warehouseColor: 'blue', date: '2026-03-22', amount: 315.00, item: 'Printer Paper', qty: 15, status: 'Approved' },
        { id: 10, number: 'PR-2026-02-003', vendor: 'Global Supplies Co', vendorEmail: 'info@globalsupplies.com', avatar: 'https://randomuser.me/api/portraits/women/12.jpg', warehouse: 'East Coast Logistics Hub', warehouseColor: 'purple', date: '2026-03-10', amount: 88.90, item: 'Notebook', qty: 8, status: 'Completed' }
    ];

    // ==== STATE ====
    let state = {
        search: '',
        status: '',
        sortKey: null,
        sortDir: 'asc',
        perPage: 10,
        view: 'list'
    };

    let pendingDeleteId = null;
    let pendingApproveId = null;

    // ==== HELPERS ====
    const $ = (sel) => document.querySelector(sel);

    const fmtMoney = (n) => '$' + Number(n).toFixed(2);
    const fmtDate = (iso) => {
        const d = new Date(iso + 'T00:00:00');
        if (isNaN(d)) return iso;
        return d.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' });
    };

    const STATUS_CLASS = {
        'Completed': 'completed',
        'Approved': 'approved',
        'Draft': 'draft'
    };

    // ==== FILTER + SORT ====
    function getFiltered() {
        let list = data.slice();

        if (state.search) {
            const q = state.search.toLowerCase();
            list = list.filter(r => r.number.toLowerCase().includes(q));
        }
        if (state.status) {
            list = list.filter(r => r.status === state.status);
        }
        if (state.sortKey) {
            list.sort((a, b) => {
                let va, vb;
                switch (state.sortKey) {
                    case 'number': va = a.number; vb = b.number; break;
                    case 'vendor': va = a.vendor.toLowerCase(); vb = b.vendor.toLowerCase(); break;
                    case 'date': va = a.date; vb = b.date; break;
                    case 'amount': va = a.amount; vb = b.amount; break;
                    case 'status': va = a.status; vb = b.status; break;
                    default: return 0;
                }
                if (va < vb) return state.sortDir === 'asc' ? -1 : 1;
                if (va > vb) return state.sortDir === 'asc' ? 1 : -1;
                return 0;
            });
        }
        return list;
    }

    // ==== RENDER LIST ====
    function renderList() {
        const tbody = $('#mprTableBody');
        const empty = $('#mprEmptyState');
        const list = getFiltered();

        if (list.length === 0) {
            tbody.innerHTML = '';
            empty.style.display = 'block';
            return;
        }
        empty.style.display = 'none';

        tbody.innerHTML = list.map(r => `
            <tr data-id="${r.id}">
                <td><span class="mpr-return-badge">${r.number}</span></td>
                <td>
                    <div class="mpr-vendor-cell">
                        <img src="${r.avatar}" alt="" class="mpr-vendor-avatar" onerror="this.style.background='#cbd5e1';this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2394a3b8%22><circle cx=%2212%22 cy=%228%22 r=%224%22/><path d=%22M4 20c0-4 4-6 8-6s8 2 8 6v2H4v-2z%22/></svg>';">
                        <div class="mpr-vendor-info">
                            <strong>${r.vendor}</strong>
                            <small>${r.vendorEmail}</small>
                        </div>
                    </div>
                </td>
                <td><span class="mpr-warehouse-badge ${r.warehouseColor}">${r.warehouse}</span></td>
                <td>
                    <span class="mpr-date">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        ${fmtDate(r.date)}
                    </span>
                </td>
                <td><span class="mpr-amount">${fmtMoney(r.amount)}</span></td>
                <td>
                    <div class="mpr-items">
                        <span>${r.item}</span>
                        <small>×${r.qty}</small>
                    </div>
                </td>
                <td><span class="mpr-status ${STATUS_CLASS[r.status]}">${r.status}</span></td>
                <td>
                    <div class="mpr-actions">
                        ${r.status === 'Draft' ? `
                            <button class="mpr-icon-btn approve" title="Approve" onclick="openMprApproveModal(${r.id})">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </button>
                        ` : ''}
                        <button class="mpr-icon-btn view" title="View" onclick="viewMprReturn(${r.id})">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                        <button class="mpr-icon-btn delete" title="Delete" onclick="openMprDeleteModal(${r.id})">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    // ==== RENDER GRID ====
    function renderGrid() {
        const grid = $('#mprGridBody');
        const empty = $('#mprGridEmptyState');
        const list = getFiltered();

        if (list.length === 0) {
            grid.innerHTML = '';
            empty.style.display = 'block';
            return;
        }
        empty.style.display = 'none';

        grid.innerHTML = list.map(r => `
            <div class="mpr-grid-card" data-id="${r.id}">
                <div class="mpr-grid-card-header">
                    <span class="mpr-return-badge">${r.number}</span>
                    <span class="mpr-status ${STATUS_CLASS[r.status]}">${r.status}</span>
                </div>
                <div class="mpr-grid-card-body">
                    <img src="${r.avatar}" alt="" class="mpr-vendor-avatar" onerror="this.style.background='#cbd5e1';this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2394a3b8%22><circle cx=%2212%22 cy=%228%22 r=%224%22/><path d=%22M4 20c0-4 4-6 8-6s8 2 8 6v2H4v-2z%22/></svg>';">
                    <div class="mpr-vendor-info">
                        <strong>${r.vendor}</strong>
                        <small>${r.vendorEmail}</small>
                    </div>
                </div>
                <div class="mpr-grid-card-info">
                    <div><span>Warehouse</span><strong>${r.warehouse}</strong></div>
                    <div><span>Return Date</span><strong>${fmtDate(r.date)}</strong></div>
                    <div><span>Total</span><strong>${fmtMoney(r.amount)}</strong></div>
                    <div><span>Items</span><strong>${r.item} ×${r.qty}</strong></div>
                </div>
                <div class="mpr-grid-card-actions">
                    ${r.status === 'Draft' ? `
                        <button class="mpr-icon-btn approve" title="Approve" onclick="openMprApproveModal(${r.id})">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        </button>
                    ` : ''}
                    <button class="mpr-icon-btn view" title="View" onclick="viewMprReturn(${r.id})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                    <button class="mpr-icon-btn delete" title="Delete" onclick="openMprDeleteModal(${r.id})">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>
                </div>
            </div>
        `).join('');
    }

    function renderAll() {
        renderList();
        renderGrid();
    }

    // ==== SEARCH ====
    $('#mprSearchBtn').addEventListener('click', () => {
        state.search = $('#mprSearchInput').value.trim();
        renderAll();
    });

    $('#mprSearchInput').addEventListener('input', (e) => {
        state.search = e.target.value.trim();
        renderAll();
    });

    $('#mprSearchInput').addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            state.search = e.target.value.trim();
            renderAll();
        }
    });

    // ==== STATUS FILTER ====
    $('#mprStatusFilter').addEventListener('change', (e) => {
        state.status = e.target.value;
        renderAll();
    });

    // ==== PER PAGE ====
    $('#mprPerPage').addEventListener('change', (e) => {
        state.perPage = parseInt(e.target.value, 10);
        renderAll();
    });

    // ==== VIEW TOGGLE ====
    $('#mprBtnListView').addEventListener('click', () => {
        state.view = 'list';
        $('#mprBtnListView').classList.add('active');
        $('#mprBtnGridView').classList.remove('active');
        $('#mprListView').style.display = 'block';
        $('#mprGridView').style.display = 'none';
    });

    $('#mprBtnGridView').addEventListener('click', () => {
        state.view = 'grid';
        $('#mprBtnGridView').classList.add('active');
        $('#mprBtnListView').classList.remove('active');
        $('#mprListView').style.display = 'none';
        $('#mprGridView').style.display = 'block';
    });

    // ==== SORT ====
    document.querySelectorAll('.mpr-table th.sortable').forEach(th => {
        th.addEventListener('click', () => {
            const key = th.getAttribute('data-sort');
            if (state.sortKey === key) {
                state.sortDir = state.sortDir === 'asc' ? 'desc' : 'asc';
            } else {
                state.sortKey = key;
                state.sortDir = 'asc';
            }
            document.querySelectorAll('.mpr-table th.sortable').forEach(h => {
                h.classList.remove('sorted-asc', 'sorted-desc');
            });
            th.classList.add(state.sortDir === 'asc' ? 'sorted-asc' : 'sorted-desc');
            th.querySelector('.sort-icon').textContent = state.sortDir === 'asc' ? '↑' : '↓';
            renderAll();
        });
    });

    // ==== DELETE ====
    window.openMprDeleteModal = function (id) {
        pendingDeleteId = id;
        $('#mprDeleteModal').classList.add('active');
    };

    window.closeMprDeleteModal = function () {
        pendingDeleteId = null;
        $('#mprDeleteModal').classList.remove('active');
    };

    window.confirmMprDelete = function () {
        if (pendingDeleteId !== null) {
            data = data.filter(r => r.id !== pendingDeleteId);
            renderAll();
        }
        closeMprDeleteModal();
    };

    // ==== APPROVE ====
    window.openMprApproveModal = function (id) {
        pendingApproveId = id;
        $('#mprApproveModal').classList.add('active');
    };

    window.closeMprApproveModal = function () {
        pendingApproveId = null;
        $('#mprApproveModal').classList.remove('active');
    };

    window.confirmMprApprove = function () {
        if (pendingApproveId !== null) {
            const row = data.find(r => r.id === pendingApproveId);
            if (row) row.status = 'Approved';
            renderAll();
        }
        closeMprApproveModal();
    };

    // ==== VIEW ====
    window.viewMprReturn = function (id) {
        // For demo: navigate to detail page.
        // In a real app: window.location.href = '/purchase-returns/' + id;
        alert('View purchase return #' + id);
    };

    // ==== MODAL BACKDROP CLOSE ====
    $('#mprDeleteModal').addEventListener('click', function (e) {
        if (e.target === this) closeMprDeleteModal();
    });
    $('#mprApproveModal').addEventListener('click', function (e) {
        if (e.target === this) closeMprApproveModal();
    });

    // ==== INIT ====
    renderAll();
})();
</script>
@endsection