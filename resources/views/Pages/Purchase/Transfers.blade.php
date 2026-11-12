@extends('layout.dashboard')
@section('title', 'Transfer - LedgeInvo')

@section('content')
<section class="mt-section">
  <style>
    .mt-section{font-family:system-ui,sans-serif;background:#fff;padding:32px;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.05);border:1px solid #e2e8f0;max-width:1100px;margin:1px auto;color:#0f172a}
    .mt-section *{box-sizing:border-box;margin:0;padding:0}
    .mt-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:24px}
    .mt-header h1{font-size:20px;font-weight:600;color:#111827;margin-bottom:6px}
    .mt-header p{font-size:14px;color:#6b7280}
    .mt-add-btn{width:40px;height:40px;background:#3b82f6;border:none;border-radius:6px;color:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer}
    .mt-add-btn svg{width:20px;height:20px;stroke:currentColor;stroke-width:2;fill:none}
    .mt-box{border:1px solid #e2e8f0;border-radius:12px;background:#fff;display:flex;flex-direction:column}
    .mt-topbar{display:flex;justify-content:space-between;align-items:center;padding:16px;border-bottom:1px solid #e2e8f0;flex-wrap:wrap;gap:16px}
    .mt-search{display:flex;gap:10px;flex:1;max-width:400px;position:relative}
    .mt-search svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;stroke:#9ca3af;fill:none;stroke-width:2}
    .mt-search input{width:100%;padding:10px 12px 10px 36px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;outline:none}
    .mt-search button{padding:10px 20px;background:#3b82f6;color:#fff;border:none;border-radius:6px;font-weight:500;cursor:pointer}
    .mt-controls{display:flex;align-items:center;gap:12px}
    .mt-controls select{padding:10px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;outline:none;cursor:pointer}
    .mt-controls button{padding:10px 16px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:8px}
    .mt-controls button svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2}
    .mt-filter-panel{display:none;padding:24px;border-bottom:1px solid #e2e8f0;background:#f8fafc}
    .mt-filter-panel.show{display:block}
    .mt-filter-group{display:flex;flex-direction:column;gap:8px;max-width:500px}
    .mt-filter-label{font-size:14px;font-weight:600;color:#475569}
    .mt-filter-row{display:flex;gap:12px}
    .mt-filter-select{flex:1;padding:10px 14px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;color:#64748b;outline:none;cursor:pointer}
    .mt-btn-apply{padding:10px 24px;background:#3b82f6;color:#fff;border:none;border-radius:6px;font-weight:500;cursor:pointer}
    .mt-btn-cancel{padding:10px 24px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;cursor:pointer}
    .mt-table-wrapper{width:100%;max-height:500px;overflow-y:auto;overflow-x:auto;scroll-behavior:smooth}
    .mt-table{width:100%;border-collapse:collapse;table-layout:fixed;text-align:left}
    .mt-table th:nth-child(1),.mt-table td:nth-child(1){width:28%}
    .mt-table th:nth-child(2),.mt-table td:nth-child(2){width:20%}
    .mt-table th:nth-child(3),.mt-table td:nth-child(3){width:20%}
    .mt-table th:nth-child(4),.mt-table td:nth-child(4){width:10%;text-align:center}
    .mt-table th:nth-child(5),.mt-table td:nth-child(5){width:12%;text-align:center}
    .mt-table th:nth-child(6),.mt-table td:nth-child(6){width:10%;text-align:center}
    .mt-table th{background:#f8fafc;padding:16px;font-size:13px;font-weight:600;color:#4b5563;border-bottom:1px solid #e2e8f0;position:sticky;top:0;z-index:10}
    .mt-table td{padding:16px;font-size:14px;color:#374151;border-bottom:1px solid #f1f5f9;vertical-align:middle;white-space:nowrap}
    .mt-table tbody tr:last-child td{border-bottom:none}
    .mt-product{display:flex;align-items:center;gap:12px}
    .mt-img-box{width:40px;height:40px;border:1px solid #e2e8f0;border-radius:6px;display:flex;align-items:center;justify-content:center;background:#fff;flex-shrink:0}
    .mt-img-box img{width:24px;height:24px;object-fit:contain}
    .mt-details{display:flex;flex-direction:column}
    .mt-name{font-weight:500;color:#111827}
    .mt-sku{font-size:12px;color:#6b7280}
    .mt-tag{padding:4px 8px;border-radius:4px;font-size:12px;font-weight:500;border:1px solid transparent;display:inline-block}
    .t-green{background:#ecfdf5;color:#047857;border-color:#a7f3d0}.t-blue{background:#eff6ff;color:#1d4ed8;border-color:#bfdbfe}.t-purple{background:#faf5ff;color:#7e22ce;border-color:#e9d5ff}.t-orange{background:#fff7ed;color:#c2410c;border-color:#fed7aa}.t-yellow{background:#fefce8;color:#a16207;border-color:#fef08a}
    .mt-qty{padding:2px 8px;background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;border-radius:4px;font-size:12px;font-weight:600;display:inline-block}
    .mt-date{display:inline-flex;align-items:center;justify-content:center;gap:8px;font-size:13px;color:#4b5563}
    .mt-date svg{width:16px;height:16px;stroke:#9ca3af;fill:none;stroke-width:2}
    .mt-del-btn{background:none;border:none;cursor:pointer;color:#ef4444;padding:6px;border-radius:4px;display:inline-flex;align-items:center;justify-content:center;margin:0 auto}
    .mt-del-btn svg{width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2}
    .mt-table-wrapper::-webkit-scrollbar{width:6px;height:6px}
    .mt-table-wrapper::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:10px}
    .empty-row td{text-align:center;padding:32px!important;color:#6b7280}
    .mt-bottom-bar{display:flex;justify-content:space-between;align-items:center;padding:16px 24px;border-top:1px solid #e2e8f0;flex-wrap:wrap;gap:16px}
    .mt-results-text{font-size:14px;color:#64748b}
    .mt-pagination{display:flex;align-items:center;gap:8px}
    .mt-page-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 16px;background:#fff;border:1px solid #e2e8f0;border-radius:6px;font-size:14px;font-weight:500;color:#475569;cursor:pointer}
    .mt-page-btn:disabled{opacity:.5;cursor:not-allowed}
    .mt-page-btn svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2}
    .mt-page-num{display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 8px;background:#fff;border:1px solid #e2e8f0;border-radius:6px;font-size:14px;font-weight:500;color:#475569;cursor:pointer}
    .mt-page-num.active{background:#10b981;color:#fff;border-color:#10b981;font-weight:600}
  </style>

  <div class="mt-header">
    <div><h1>Manage Transfers</h1><p>Manage and track stock transfers between warehouses.</p></div>
    <button class="mt-add-btn"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14" /></svg></button>
  </div>

  <div class="mt-box">
    <div class="mt-topbar">
      <div class="mt-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
        <input type="text" id="searchInput" placeholder="Search transfers..." />
        <button id="searchBtn">Search</button>
      </div>
      <div class="mt-controls">
        <select id="topPerPageSelect">
          <option value="10">10 per page</option><option value="25">25 per page</option><option value="50" selected>50 per page</option>
        </select>
        <button id="filterToggleBtn"><svg viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" /></svg> Filters <svg viewBox="0 0 24 24" style="margin-left:4px"><path d="M6 9l6 6 6-6" /></svg></button>
      </div>
    </div>

    <div class="mt-filter-panel" id="filterPanel">
      <div class="mt-filter-group">
        <label class="mt-filter-label">Filter by warehouse</label>
        <div class="mt-filter-row">
          <select class="mt-filter-select" id="filterWarehouse"><option value="">All Warehouses</option></select>
          <button class="mt-btn-apply" id="applyFilterBtn">Apply</button>
          <button class="mt-btn-cancel" id="cancelFilterBtn">Cancel</button>
        </div>
      </div>
    </div>

    <div class="mt-table-wrapper">
      <table class="mt-table">
        <thead><tr><th>Product</th><th>From Warehouse</th><th>To Warehouse</th><th>Quantity</th><th>Date</th><th style="text-align:center">Actions</th></tr></thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>

    <div class="mt-bottom-bar">
      <div class="mt-results-text" id="resultsText">Showing 0 to 0 of 0 results</div>
      <div class="mt-pagination" id="paginationControls"></div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Compact deterministic data generation
      const prods = [
        { name: "T-Shirt", sku: "FASH-PROD-005", img: "https://cdn-icons-png.flaticon.com/512/892/892458.png" },
        { name: "Car Engine Oil", sku: "AUTO-PROD-029", img: "https://cdn-icons-png.flaticon.com/512/2933/2933856.png" },
        { name: "Coffee", sku: "FOOD-PROD-026", img: "https://cdn-icons-png.flaticon.com/512/704/704851.png" },
        { name: "Apple", sku: "FRUIT-PROD-022", img: "https://cdn-icons-png.flaticon.com/512/415/415733.png" },
        { name: "Laptop", sku: "TECH-PROD-112", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png" },
        { name: "Monitor", sku: "TECH-PROD-115", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png" },
        { name: "Desk Chair", sku: "FURN-PROD-008", img: "https://cdn-icons-png.flaticon.com/512/3081/3081559.png" },
        { name: "Keyboard", sku: "TECH-PROD-120", img: "https://cdn-icons-png.flaticon.com/512/2917/2917995.png" }
      ];
      const whs = [
        { name: "Mountain Region Warehouse", color: "green" }, { name: "Central Distribution Center", color: "purple" },
        { name: "Southern Distribution Hub", color: "green" }, { name: "Northeast Storage Complex", color: "purple" },
        { name: "Pacific Northwest Hub", color: "yellow" }, { name: "East Coast Logistics Hub", color: "purple" },
        { name: "Northern California Facility", color: "blue" }, { name: "Southwest Depot", color: "orange" },
        { name: "Florida Fulfillment Center", color: "green" }
      ];

      const allData = Array.from({ length: 50 }, (_, i) => {
        const date = new Date(2023, 11 - Math.floor(i / 5), 28 - (i % 5) * 3);
        return {
          p: prods[i % prods.length],
          fw: whs[(i * 3) % whs.length],
          tw: whs[(i * 5 + 2) % whs.length],
          qty: ((i * 17) % 100) + 5,
          date: date.toISOString().split('T')[0]
        };
      });

      const tbody = document.getElementById('tableBody');
      const searchInput = document.getElementById('searchInput');
      const searchBtn = document.getElementById('searchBtn');
      const perPageSelect = document.getElementById('topPerPageSelect');
      const filterPanel = document.getElementById('filterPanel');
      const filterToggleBtn = document.getElementById('filterToggleBtn');
      const filterWarehouse = document.getElementById('filterWarehouse');
      const applyFilterBtn = document.getElementById('applyFilterBtn');
      const cancelFilterBtn = document.getElementById('cancelFilterBtn');
      const resultsText = document.getElementById('resultsText');
      const paginationControls = document.getElementById('paginationControls');

      // Populate Dropdown
      [...new Set(allData.flatMap(d => [d.fw.name, d.tw.name]))].sort().forEach(name => {
        filterWarehouse.innerHTML += `<option value="${name}">${name}</option>`;
      });

      let currentData = [...allData];
      let rowsPerPage = 50;
      let currentPage = 1;
      let currentWarehouseFilter = "";

      function renderTable() {
        const totalResults = currentData.length;
        const totalPages = Math.ceil(totalResults / rowsPerPage) || 1;
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, totalResults);
        const displayData = currentData.slice(startIndex, endIndex);

        tbody.innerHTML = displayData.length === 0 
          ? `<tr class="empty-row"><td colspan="6">No transfers found.</td></tr>`
          : displayData.map(r => `
            <tr>
              <td><div class="mt-product"><div class="mt-img-box"><img src="${r.p.img}" alt="${r.p.name}"></div><div class="mt-details"><span class="mt-name">${r.p.name}</span><span class="mt-sku">SKU: ${r.p.sku}</span></div></div></td>
              <td><span class="mt-tag t-${r.fw.color}">${r.fw.name}</span></td>
              <td><span class="mt-tag t-${r.tw.color}">${r.tw.name}</span></td>
              <td><span class="mt-qty">${r.qty}</span></td>
              <td><div class="mt-date"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> ${r.date}</div></td>
              <td><button class="mt-del-btn"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button></td>
            </tr>`).join('');

        resultsText.textContent = `Showing ${totalResults === 0 ? 0 : startIndex + 1} to ${endIndex} of ${totalResults} results`;
        renderPagination(totalPages);
      }

      function renderPagination(totalPages) {
        let html = `<button class="mt-page-btn" id="btnPrev" ${currentPage === 1 ? 'disabled' : ''}><svg viewBox="0 0 24 24" style="margin-right:4px"><path d="M15 18l-6-6 6-6"/></svg>Previous</button>`;
        let startPage = Math.max(1, currentPage - 2), endPage = Math.min(totalPages, startPage + 4);
        if (endPage - startPage < 4) startPage = Math.max(1, endPage - 4);
        
        for (let i = startPage; i <= endPage; i++) html += `<button class="mt-page-num ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
        
        html += `<button class="mt-page-btn" id="btnNext" ${currentPage === totalPages ? 'disabled' : ''}>Next<svg viewBox="0 0 24 24" style="margin-left:4px"><path d="M9 18l6-6-6-6"/></svg></button>`;
        paginationControls.innerHTML = html;

        document.getElementById('btnPrev').onclick = () => { if (currentPage > 1) { currentPage--; renderTable(); } };
        document.getElementById('btnNext').onclick = () => { if (currentPage < totalPages) { currentPage++; renderTable(); } };
        paginationControls.querySelectorAll('.mt-page-num').forEach(btn => {
          btn.onclick = (e) => { currentPage = parseInt(e.target.dataset.page); renderTable(); };
        });
      }

      function applySearchAndFilter() {
        const query = searchInput.value.trim().toLowerCase();
        currentData = allData.filter(r => {
          const matchSearch = query === '' || r.p.name.toLowerCase().includes(query) || r.p.sku.toLowerCase().includes(query) || r.fw.name.toLowerCase().includes(query) || r.tw.name.toLowerCase().includes(query);
          const matchFilter = currentWarehouseFilter === '' || r.fw.name === currentWarehouseFilter || r.tw.name === currentWarehouseFilter;
          return matchSearch && matchFilter;
        });
        currentPage = 1; 
        renderTable();
      }

      searchBtn.onclick = applySearchAndFilter;
      searchInput.onkeyup = (e) => { if (e.key === 'Enter') applySearchAndFilter(); };
      perPageSelect.onchange = (e) => { rowsPerPage = parseInt(e.target.value); currentPage = 1; renderTable(); };
      filterToggleBtn.onclick = () => filterPanel.classList.toggle('show');
      filterWarehouse.onchange = (e) => { currentWarehouseFilter = e.target.value; };
      applyFilterBtn.onclick = (e) => { e.preventDefault(); currentWarehouseFilter = filterWarehouse.value; applySearchAndFilter(); filterPanel.classList.remove('show'); };
      cancelFilterBtn.onclick = (e) => { e.preventDefault(); filterWarehouse.value = ''; currentWarehouseFilter = ''; applySearchAndFilter(); filterPanel.classList.remove('show'); };

      renderTable();
    });
  </script>
</section>
@endsection