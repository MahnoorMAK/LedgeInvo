@extends('layout.dashboard')

@section('title', 'Item - LedgeInvo')

@section('content')
<section class="product-table-section">
  <style>
    /* Scoped CSS */
    .product-table-section { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; max-width: 1300px; margin: 40px auto; color: #0f172a; }
    .product-table-section * { box-sizing: border-box; margin: 0; padding: 0; }
    
    /* Page Header */
    .pt-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
    .pt-header-text h1 { font-size: 24px; font-weight: 600; color: #111827; margin-bottom: 6px; }
    .pt-header-text p { font-size: 14px; color: #6b7280; }
    .pt-header-actions { display: flex; gap: 12px; }
    .pt-btn-stock { display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; font-weight: 500; color: #374151; cursor: pointer; transition: background 0.2s; }
    .pt-btn-stock:hover { background: #f8fafc; }
    .pt-btn-stock svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
    .pt-btn-add { width: 40px; height: 40px; background: #3b82f6; border: none; border-radius: 6px; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.2s; }
    .pt-btn-add:hover { background: #2563eb; }
    .pt-btn-add svg { width: 20px; height: 20px; stroke: currentColor; fill: none; stroke-width: 2; }

    /* Top Bar */
    .pt-topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 16px; }
    
    /* Search */
    .pt-search-group { display: flex; gap: 10px; flex: 1; max-width: 400px; position: relative; }
    .pt-search-group svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; stroke: #9ca3af; fill: none; stroke-width: 2; }
    .pt-search-input { width: 100%; padding: 10px 12px 10px 36px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; color: #374151; transition: border 0.2s; }
    .pt-search-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .pt-btn-search { padding: 10px 20px; background: #3b82f6; color: #fff; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: background 0.2s; }
    .pt-btn-search:hover { background: #2563eb; }
    
    /* Controls */
    .pt-controls-group { display: flex; align-items: center; gap: 16px; }
    .pt-view-toggles { display: flex; border: 1px solid #cbd5e1; border-radius: 6px; overflow: hidden; background: #fff; }
    .pt-view-btn { background: transparent; border: none; padding: 8px 12px; cursor: pointer; display: flex; align-items: center; justify-content: center; color: #64748b; transition: all 0.2s; }
    .pt-view-btn:first-child { border-right: 1px solid #cbd5e1; }
    .pt-view-btn:hover:not(.active) { background: #f8fafc; color: #334155; }
    
    /* Active View Colors */
    .pt-view-btn.list-btn.active { background: #bfdbfe; color: #1e40af; }
    .pt-view-btn.grid-btn.active { background: #bfdbfe; color: #1e40af; }
    .pt-view-btn svg { width: 18px; height: 18px; stroke: currentColor; stroke-width: 2; fill: none; }
    
    .pt-per-page { padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; background: #fff; cursor: pointer; color: #374151; }
    .pt-btn-filter { padding: 8px 16px; background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; font-weight: 500; color: #374151; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: background 0.2s; }
    .pt-btn-filter:hover { background: #f8fafc; }
    .pt-btn-filter svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; }

    /* Filter Panel */
    .pt-filter-panel { display: none; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; margin-bottom: 20px; }
    .pt-filter-panel.show { display: block; animation: slideDown 0.2s ease-out; }
    @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    
    .pt-filter-row { display: flex; flex-wrap: wrap; gap: 16px; align-items: flex-end; }
    .pt-filter-item { flex: 1; min-width: 200px; display: flex; flex-direction: column; gap: 8px; }
    .pt-filter-label { font-size: 13px; font-weight: 600; color: #475569; }
    .pt-filter-select { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; color: #374151; outline: none; background: #fff; cursor: pointer; appearance: none; background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239ca3af%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E"); background-repeat: no-repeat; background-position: right 14px top 50%; background-size: 10px auto; }
    
    .pt-filter-actions { display: flex; gap: 10px; margin-left: auto; margin-top: 10px; }
    .pt-btn-apply { padding: 10px 24px; background: #3b82f6; color: #fff; border: none; border-radius: 6px; font-weight: 500; cursor: pointer; transition: background 0.2s; }
    .pt-btn-apply:hover { background: #2563eb; }
    .pt-btn-cancel { padding: 10px 24px; background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; font-weight: 500; color: #374151; cursor: pointer; transition: background 0.2s; }
    .pt-btn-cancel:hover { background: #f1f5f9; }

    /* Data Container */
    .pt-data-container { width: 100%; }
    
    /* Table View */
    .pt-table-wrapper { width: 100%; overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; }
    .pt-table { width: 100%; border-collapse: collapse; table-layout: fixed; text-align: left; }
    
    /* EQUAL COLUMN WIDTHS (8 Columns) */
    .pt-table th, .pt-table td { 
      width: 12.5%; 
      padding: 14px 16px; 
      border-bottom: 1px solid #f1f5f9; 
      vertical-align: middle; 
      white-space: nowrap; 
      text-align: right; 
    }
    
    /* Exceptions: Product aligns left, Actions center */
    .pt-table th:nth-child(1), .pt-table td:nth-child(1) { text-align: left; }
    .pt-table th:nth-child(8), .pt-table td:nth-child(8) { text-align: center; }

    .pt-table th { background: #f8fafc; font-size: 13px; font-weight: 600; color: #4b5563; border-bottom: 1px solid #e2e8f0; cursor: pointer; user-select: none; }
    .pt-table th:hover { background: #f1f5f9; }
    .pt-table tbody tr:last-child td { border-bottom: none; }
    .pt-table tbody tr:hover { background: #f8fafc; }
    
    /* Sortable Headers Content */
    .pt-th-content { display: flex; align-items: center; justify-content: flex-end; gap: 6px; }
    .pt-table th:nth-child(1) .pt-th-content { justify-content: flex-start; }
    .pt-th-content svg { width: 14px; height: 14px; stroke: #9ca3af; fill: none; stroke-width: 2; transition: stroke 0.2s; }
    .pt-table th:hover .pt-th-content svg { stroke: #64748b; }
    .pt-th-content.active svg { stroke: #3b82f6; }

    /* Product Layout with Image */
    .pt-product-cell { display: flex; align-items: center; gap: 12px; }
    .pt-product-img-box { width: 42px; height: 42px; border: 1px solid #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: #fff; flex-shrink: 0; }
    .pt-product-img { width: 26px; height: 26px; object-fit: contain; }
    .pt-product-info { display: flex; flex-direction: column; gap: 2px; }
    .pt-product-name { font-weight: 500; color: #111827; font-size: 14px; }
    .pt-product-sku { display: flex; align-items: center; gap: 4px; font-size: 11px; color: #6b7280; }
    .pt-product-sku svg { width: 12px; height: 12px; stroke: currentColor; fill: none; stroke-width: 2; }

    /* Badges & Prices */
    .pt-badge { padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; display: inline-block; border: 1px solid transparent; }
    .pt-badge-type { background: #faf5ff; color: #7e22ce; border-color: #e9d5ff; }
    .pt-badge-cat { background: #fff7ed; color: #c2410c; border-color: #fed7aa; }
    .pt-badge-cat.green { background: #ecfdf5; color: #047857; border-color: #a7f3d0; }
    .pt-badge-cat.blue { background: #eff6ff; color: #1d4ed8; border-color: #bfdbfe; }

    .pt-price-sale { color: #10b981; font-weight: 600; }
    .pt-price-purchase { color: #ef4444; font-weight: 500; }

    /* Actions Dropdown */
    .pt-action-menu { position: relative; display: inline-flex; justify-content: center; }
    .pt-action-btn { background: none; border: none; cursor: pointer; color: #64748b; padding: 6px; border-radius: 4px; display: flex; align-items: center; justify-content: center; }
    .pt-action-btn:hover { background: #e2e8f0; color: #0f172a; }
    .pt-action-btn svg { width: 18px; height: 18px; fill: currentColor; }
    .pt-action-dropdown { display: none; position: absolute; right: 0; top: 100%; background: #fff; border: 1px solid #e2e8f0; border-radius: 6px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); z-index: 20; min-width: 140px; padding: 4px 0; }
    .pt-action-dropdown.show { display: block; }
    .pt-action-item { display: flex; align-items: center; gap: 8px; padding: 8px 16px; font-size: 13px; color: #334155; text-decoration: none; cursor: pointer; text-align: left; }
    .pt-action-item:hover { background: #f8fafc; }
    .pt-action-item.delete { color: #ef4444; }
    .pt-action-item svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

    /* Grid View */
    .pt-grid-container { display: none; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; padding-right: 4px; }
    .pt-grid-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; display: flex; flex-direction: column; gap: 12px; transition: box-shadow 0.2s; }
    .pt-grid-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .pt-grid-header { display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; }
    .pt-grid-body { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 13px; }
    .pt-grid-item { display: flex; flex-direction: column; gap: 4px; }
    .pt-grid-label { font-size: 11px; font-weight: 600; color: #6b7280; text-transform: uppercase; }
    .pt-grid-value { font-weight: 500; color: #111827; }

    /* Toggle Views */
    .pt-data-container.view-list .pt-table-wrapper { display: block; }
    .pt-data-container.view-list .pt-grid-container { display: none; }
    .pt-data-container.view-grid .pt-table-wrapper { display: none; }
    .pt-data-container.view-grid .pt-grid-container { display: grid; }

    /* Pagination Bar */
    .pt-pagination { display: flex; justify-content: space-between; align-items: center; padding-top: 20px; margin-top: 10px; border-top: 1px solid #e2e8f0; flex-wrap: wrap; gap: 16px; }
    .pt-page-info { font-size: 14px; color: #64748b; }
    .pt-page-controls { display: flex; gap: 6px; }
    .pt-page-btn { padding: 8px 14px; border: 1px solid #e2e8f0; background: #fff; border-radius: 6px; font-size: 14px; font-weight: 500; color: #475569; cursor: pointer; transition: all 0.2s; }
    .pt-page-btn:hover:not(:disabled) { background: #f8fafc; color: #0f172a; }
    .pt-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
    .pt-page-num { padding: 8px 14px; border: 1px solid #e2e8f0; background: #fff; border-radius: 6px; font-size: 14px; font-weight: 500; color: #475569; cursor: pointer; transition: all 0.2s; }
    .pt-page-num:hover { background: #f8fafc; color: #0f172a; }
    .pt-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }

    .pt-table-wrapper::-webkit-scrollbar, .pt-grid-container::-webkit-scrollbar { width: 6px; height: 6px; }
    .pt-table-wrapper::-webkit-scrollbar-thumb, .pt-grid-container::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

    @media (max-width: 768px) {
      .pt-header { flex-direction: column; gap: 16px; }
      .pt-filter-row { flex-direction: column; align-items: stretch; }
      .pt-filter-actions { margin-left: 0; justify-content: flex-end; }
    }
  </style>

  <!-- Page Header -->
  <div class="pt-header">
    <div class="pt-header-text">
      <h1>Manage Items</h1>
      <p>Manage and track your products, services, pricing, and stock details.</p>
    </div>
    <div class="pt-header-actions">
      <button class="pt-btn-stock">
        <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
        Stock
      </button>
    <button class="pt-btn-add" title="Add Item" onclick="window.location.href='{{ route('create-item') }}'">
  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
</button>
    </div>
  </div>

  <!-- Top Bar -->
  <div class="pt-topbar">
    <div class="pt-search-group">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" class="pt-search-input" id="searchInput" placeholder="Search products...">
      <button class="pt-btn-search" id="searchBtn">Search</button>
    </div>

    <div class="pt-controls-group">
      <div class="pt-view-toggles">
        <button class="pt-view-btn list-btn active" id="listViewBtn" title="List View">
          <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="pt-view-btn grid-btn" id="gridViewBtn" title="Grid View">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>

      <select class="pt-per-page" id="perPageSelect">
        <option value="5">5 per page</option>
        <option value="10" selected>10 per page</option>
        <option value="25">25 per page</option>
      </select>

      <button class="pt-btn-filter" id="filterToggleBtn">
        <svg viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> Filters
      </button>
    </div>
  </div>

  <!-- Filter Panel -->
  <div class="pt-filter-panel" id="filterPanel">
    <div class="pt-filter-row">
      <div class="pt-filter-item">
        <label class="pt-filter-label">Item Type</label>
        <select class="pt-filter-select" id="filterType">
          <option value="">Filter by item type</option>
        </select>
      </div>
      <div class="pt-filter-item">
        <label class="pt-filter-label">Category</label>
        <select class="pt-filter-select" id="filterCategory">
          <option value="">Filter by category</option>
        </select>
      </div>
      <div class="pt-filter-actions">
        <button class="pt-btn-apply" id="applyFilterBtn">Apply</button>
        <button class="pt-btn-cancel" id="cancelFilterBtn">Cancel</button>
      </div>
    </div>
  </div>

  <!-- Data Container -->
  <div class="pt-data-container view-list" id="dataContainer">
    <div class="pt-table-wrapper">
      <table class="pt-table">
        <thead>
          <tr>
            <th data-sort="name"><div class="pt-th-content">Product <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
            <th data-sort="sp"><div class="pt-th-content">Sale Price <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
            <th data-sort="pp"><div class="pt-th-content">Purchase Price <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
            <th>Category</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th data-sort="type"><div class="pt-th-content">Type <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>

    <div class="pt-grid-container" id="gridContainer"></div>
  </div>

  <!-- Pagination Bar -->
  <div class="pt-pagination">
    <div class="pt-page-info" id="pageInfo">Showing 1-10 of 25</div>
    <div class="pt-page-controls" id="pageControls"></div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // 1. FIXED DATA (25 Records)
      const allData = [
        { id: 1, name: "Plant Pot", img: "https://cdn-icons-png.flaticon.com/512/2829/2829610.png", sku: "HOME-PROD-012", type: "Product", cat: "Home & Garden", catColor: "orange", sp: "24.99", pp: "12.00", unit: "Pot", qty: 34 },
        { id: 2, name: "Raspberry", img: "https://cdn-icons-png.flaticon.com/512/2909/2909761.png", sku: "FRUIT-PROD-023", type: "Product", cat: "Fruits & Vegetables", catColor: "purple", sp: "6.99", pp: "4.00", unit: "Basket", qty: 159 },
        { id: 3, name: "Laptop", img: "https://cdn-icons-png.flaticon.com/512/1813/1813813.png", sku: "ELEC-PROD-001", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "899.99", pp: "650.00", unit: "Piece", qty: 24 },
        { id: 4, name: "Football", img: "https://cdn-icons-png.flaticon.com/512/53/53283.png", sku: "SPORT-PROD-015", type: "Product", cat: "Sports & Fitness", catColor: "green", sp: "39.99", pp: "22.00", unit: "Ball", qty: 272 },
        { id: 5, name: "Laptop Battery", img: "https://cdn-icons-png.flaticon.com/512/3126/3126571.png", sku: "ELEC-PART-004", type: "Part", cat: "Electronics & Technology", catColor: "orange", sp: "89.99", pp: "45.00", unit: "Piece", qty: 221 },
        { id: 6, name: "Desk Chair", img: "https://cdn-icons-png.flaticon.com/512/3081/3081559.png", sku: "FURN-PROD-008", type: "Product", cat: "Office Furniture", catColor: "blue", sp: "149.50", pp: "90.00", unit: "Piece", qty: 45 },
        { id: 7, name: "Coffee Beans", img: "https://cdn-icons-png.flaticon.com/512/704/704851.png", sku: "FOOD-PROD-026", type: "Product", cat: "Beverages", catColor: "green", sp: "18.50", pp: "10.00", unit: "Pack", qty: 112 },
        { id: 8, name: "Monitor", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-115", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "299.00", pp: "210.00", unit: "Piece", qty: 67 },
        { id: 9, name: "Wireless Mouse", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-120", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "29.99", pp: "15.00", unit: "Piece", qty: 340 },
        { id: 10, name: "Notebook", img: "https://cdn-icons-png.flaticon.com/512/3145/3145736.png", sku: "STAT-PROD-055", type: "Product", cat: "Office Supplies", catColor: "blue", sp: "4.99", pp: "2.50", unit: "Pack", qty: 500 },
        { id: 11, name: "Water Bottle", img: "https://cdn-icons-png.flaticon.com/512/2447/2447774.png", sku: "HOME-PROD-040", type: "Product", cat: "Home & Garden", catColor: "orange", sp: "15.99", pp: "8.00", unit: "Piece", qty: 88 },
        { id: 12, name: "Printer", img: "https://cdn-icons-png.flaticon.com/512/3031/3031121.png", sku: "ELEC-PROD-202", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "199.99", pp: "140.00", unit: "Piece", qty: 15 },
        { id: 13, name: "Headphones", img: "https://cdn-icons-png.flaticon.com/512/724/724765.png", sku: "ELEC-PROD-310", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "79.99", pp: "45.00", unit: "Piece", qty: 95 },
        { id: 14, name: "Keyboard", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-121", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "49.99", pp: "25.00", unit: "Piece", qty: 130 },
        { id: 15, name: "Apple", img: "https://cdn-icons-png.flaticon.com/512/415/415733.png", sku: "FRUIT-PROD-022", type: "Product", cat: "Fruits & Vegetables", catColor: "purple", sp: "1.99", pp: "0.50", unit: "Basket", qty: 400 },
        { id: 16, name: "Banana", img: "https://cdn-icons-png.flaticon.com/512/1093/1093255.png", sku: "FRUIT-PROD-024", type: "Product", cat: "Fruits & Vegetables", catColor: "purple", sp: "2.99", pp: "1.00", unit: "Basket", qty: 300 },
        { id: 17, name: "Office Desk", img: "https://cdn-icons-png.flaticon.com/512/3081/3081559.png", sku: "FURN-PROD-012", type: "Product", cat: "Office Furniture", catColor: "blue", sp: "250.00", pp: "180.00", unit: "Piece", qty: 12 },
        { id: 18, name: "Webcam", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-130", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "69.99", pp: "40.00", unit: "Piece", qty: 55 },
        { id: 19, name: "Microphone", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-135", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "129.99", pp: "85.00", unit: "Piece", qty: 30 },
        { id: 20, name: "Docking Station", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-140", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "179.99", pp: "120.00", unit: "Piece", qty: 20 },
        { id: 21, name: "Smartphone", img: "https://cdn-icons-png.flaticon.com/512/15/15874.png", sku: "ELEC-PROD-500", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "699.99", pp: "550.00", unit: "Piece", qty: 18 },
        { id: 22, name: "Tablet", img: "https://cdn-icons-png.flaticon.com/512/15/15874.png", sku: "ELEC-PROD-501", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "399.99", pp: "300.00", unit: "Piece", qty: 25 },
        { id: 23, name: "USB Cable", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png", sku: "ELEC-PROD-150", type: "Product", cat: "Electronics & Technology", catColor: "orange", sp: "9.99", pp: "3.00", unit: "Piece", qty: 600 },
        { id: 24, name: "Stapler", img: "https://cdn-icons-png.flaticon.com/512/3145/3145736.png", sku: "STAT-PROD-060", type: "Product", cat: "Office Supplies", catColor: "blue", sp: "12.99", pp: "6.00", unit: "Piece", qty: 80 },
        { id: 25, name: "Whiteboard", img: "https://cdn-icons-png.flaticon.com/512/3145/3145736.png", sku: "STAT-PROD-065", type: "Product", cat: "Office Supplies", catColor: "blue", sp: "45.00", pp: "25.00", unit: "Piece", qty: 15 }
      ];

      // 2. Populate Filters
      const filterType = document.getElementById('filterType');
      const filterCategory = document.getElementById('filterCategory');
      [...new Set(allData.map(d => d.type))].sort().forEach(t => filterType.innerHTML += `<option value="${t}">${t}</option>`);
      [...new Set(allData.map(d => d.cat))].sort().forEach(c => filterCategory.innerHTML += `<option value="${c}">${c}</option>`);

      // 3. State Variables
      let currentData = [...allData];
      let rowsPerPage = 10;
      let currentPage = 1;
      let sortCol = 'name';
      let sortAsc = true;

      const tableBody = document.getElementById('tableBody');
      const gridContainer = document.getElementById('gridContainer');
      const pageInfo = document.getElementById('pageInfo');
      const pageControls = document.getElementById('pageControls');

      // 4. Action Menu HTML Generator
      const getActionMenu = () => `
        <div class="pt-action-menu">
          <button class="pt-action-btn" onclick="toggleMenu(this)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg></button>
          <div class="pt-action-dropdown">
            <a class="pt-action-item"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> View</a>
            <a class="pt-action-item"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit</a>
            <a class="pt-action-item delete"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</a>
          </div>
        </div>
      `;

      // 5. Render Function
      const render = () => {
        const totalResults = currentData.length;
        const totalPages = Math.ceil(totalResults / rowsPerPage) || 1;
        
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, totalResults);
        const displayData = currentData.slice(startIndex, endIndex);

        // Render Table
        if (displayData.length === 0) {
          tableBody.innerHTML = `<tr><td colspan="8" style="text-align: center; padding: 24px; color: #6b7280;">No products found.</td></tr>`;
          gridContainer.innerHTML = '';
        } else {
          tableBody.innerHTML = displayData.map(r => `
            <tr>
              <td>
                <div class="pt-product-cell">
                  <div class="pt-product-img-box"><img src="${r.img}" class="pt-product-img" alt="${r.name}"></div>
                  <div class="pt-product-info">
                    <span class="pt-product-name">${r.name}</span>
                    <span class="pt-product-sku"><svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg> ${r.sku}</span>
                  </div>
                </div>
              </td>
              <td><span class="pt-price-sale">$${r.sp}</span></td>
              <td><span class="pt-price-purchase">$${r.pp}</span></td>
              <td><span class="pt-badge pt-badge-cat ${r.catColor}">${r.cat}</span></td>
              <td>${r.unit}</td>
              <td>${r.qty}</td>
              <td><span class="pt-badge pt-badge-type">${r.type}</span></td>
              <td>${getActionMenu()}</td>
            </tr>
          `).join('');

          // Render Grid
          gridContainer.innerHTML = displayData.map(r => `
            <div class="pt-grid-card">
              <div class="pt-grid-header">
                <div class="pt-product-cell">
                  <div class="pt-product-img-box"><img src="${r.img}" class="pt-product-img" alt="${r.name}"></div>
                  <div class="pt-product-info">
                    <span class="pt-product-name">${r.name}</span>
                    <span class="pt-product-sku">${r.sku}</span>
                  </div>
                </div>
                ${getActionMenu()}
              </div>
              <div class="pt-grid-body">
                <div class="pt-grid-item">
                  <span class="pt-grid-label">Sale Price</span>
                  <span class="pt-grid-value pt-price-sale">$${r.sp}</span>
                </div>
                <div class="pt-grid-item">
                  <span class="pt-grid-label">Purchase Price</span>
                  <span class="pt-grid-value pt-price-purchase">$${r.pp}</span>
                </div>
                <div class="pt-grid-item">
                  <span class="pt-grid-label">Category</span>
                  <span class="pt-grid-value"><span class="pt-badge pt-badge-cat ${r.catColor}" style="font-size:10px; padding:2px 6px;">${r.cat}</span></span>
                </div>
                <div class="pt-grid-item">
                  <span class="pt-grid-label">Quantity</span>
                  <span class="pt-grid-value">${r.qty} ${r.unit}</span>
                </div>
                <div class="pt-grid-item">
                  <span class="pt-grid-label">Type</span>
                  <span class="pt-grid-value"><span class="pt-badge pt-badge-type" style="font-size:10px; padding:2px 6px;">${r.type}</span></span>
                </div>
              </div>
            </div>
          `).join('');
        }

        // Update Pagination Info
        if (totalResults === 0) {
          pageInfo.textContent = "Showing 0 to 0 of 0 results";
        } else {
          pageInfo.textContent = `Showing ${startIndex + 1} to ${endIndex} of ${totalResults} results`;
        }

        // Render Pagination Buttons
        let controlsHTML = '';
        controlsHTML += `<button class="pt-page-btn" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>Previous</button>`;
        
        for (let i = 1; i <= totalPages; i++) {
          controlsHTML += `<button class="pt-page-num ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</button>`;
        }
        
        controlsHTML += `<button class="pt-page-btn" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Next</button>`;
        pageControls.innerHTML = controlsHTML;
      };

      // 6. Interactions
      
      const applySearchAndFilter = () => {
        const q = document.getElementById('searchInput').value.toLowerCase();
        const sType = filterType.value;
        const sCat = filterCategory.value;

        currentData = allData.filter(r => {
          const matchSearch = r.name.toLowerCase().includes(q) || r.cat.toLowerCase().includes(q) || r.type.toLowerCase().includes(q);
          const matchType = sType ? r.type === sType : true;
          const matchCat = sCat ? r.cat === sCat : true;
          return matchSearch && matchType && matchCat;
        });

        currentData.sort((a, b) => {
          let valA = a[sortCol];
          let valB = b[sortCol];
          
          if (sortCol === 'name') { valA = a.name; valB = b.name; }
          else if (sortCol === 'type') { valA = a.type; valB = b.type; }
          else if (sortCol === 'sp') { valA = parseFloat(a.sp); valB = parseFloat(b.sp); }
          else if (sortCol === 'pp') { valA = parseFloat(a.pp); valB = parseFloat(b.pp); }

          if (valA < valB) return sortAsc ? -1 : 1;
          if (valA > valB) return sortAsc ? 1 : -1;
          return 0;
        });

        currentPage = 1;
        render();
      };

      window.changePage = (page) => {
        currentPage = page;
        render();
      };

      document.getElementById('searchBtn').addEventListener('click', applySearchAndFilter);
      document.getElementById('searchInput').addEventListener('keyup', (e) => {
        if (e.key === 'Enter') applySearchAndFilter();
      });

      document.getElementById('perPageSelect').addEventListener('change', (e) => {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1;
        render();
      });

      const filterPanel = document.getElementById('filterPanel');
      document.getElementById('filterToggleBtn').addEventListener('click', () => {
        filterPanel.classList.toggle('show');
      });

      document.getElementById('applyFilterBtn').addEventListener('click', () => {
        applySearchAndFilter();
        filterPanel.classList.remove('show');
      });

      document.getElementById('cancelFilterBtn').addEventListener('click', () => {
        filterType.value = '';
        filterCategory.value = '';
        filterPanel.classList.remove('show');
        applySearchAndFilter();
      });

      const dataContainer = document.getElementById('dataContainer');
      document.getElementById('listViewBtn').addEventListener('click', () => {
        document.getElementById('listViewBtn').classList.add('active');
        document.getElementById('gridViewBtn').classList.remove('active');
        dataContainer.classList.replace('view-grid', 'view-list');
      });
      document.getElementById('gridViewBtn').addEventListener('click', () => {
        document.getElementById('gridViewBtn').classList.add('active');
        document.getElementById('listViewBtn').classList.remove('active');
        dataContainer.classList.replace('view-list', 'view-grid');
      });

      const iconUp = `<svg viewBox="0 0 24 24"><path d="M12 5l-5 5h10z"/></svg>`;
      const iconDown = `<svg viewBox="0 0 24 24"><path d="M12 19l5-5H7z"/></svg>`;
      
      document.querySelectorAll('.pt-table th[data-sort]').forEach(th => {
        th.addEventListener('click', () => {
          const col = th.getAttribute('data-sort');
          if (sortCol === col) {
            sortAsc = !sortAsc;
          } else {
            sortCol = col;
            sortAsc = true;
          }
          
          document.querySelectorAll('.pt-th-content').forEach(el => el.classList.remove('active'));
          const contentDiv = th.querySelector('.pt-th-content');
          contentDiv.classList.add('active');
          contentDiv.innerHTML = `${th.textContent.trim()} ${sortAsc ? iconUp : iconDown}`;
          
          applySearchAndFilter();
        });
      });

      window.toggleMenu = (btn) => {
        document.querySelectorAll('.pt-action-dropdown').forEach(el => {
          if (el !== btn.nextElementSibling) el.classList.remove('show');
        });
        btn.nextElementSibling.classList.toggle('show');
      };

      document.addEventListener('click', (e) => {
        if (!e.target.closest('.pt-action-menu')) {
          document.querySelectorAll('.pt-action-dropdown').forEach(el => el.classList.remove('show'));
        }
      });

      applySearchAndFilter();
    });
  </script>
</section>
@endsection