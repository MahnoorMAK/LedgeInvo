@extends('layout.dashboard')
@section('title', 'Purchase-Return - LedgeInvo')

@section('content')
<section class="pr-section">
<style>
/* Changed margin to 1px to remove extra starting space */
.pr-section{font-family:system-ui,sans-serif;background:#fff;padding:24px 32px;max-width:1200px;margin:1px auto;color:#0f172a;box-sizing:border-box}
.pr-section *,.pr-section *::before,.pr-section *::after{box-sizing:border-box;margin:0;padding:0}
/* Header */
.pr-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:24px}
.pr-header h1{font-size:20px;font-weight:600;color:#1e293b;margin-bottom:6px}
.pr-header p{font-size:14px;color:#64748b}
/* Layout */
.pr-card{border:1px solid #e2e8f0;border-radius:8px;background:#fff;overflow:hidden;box-shadow:0 1px 2px rgba(0,0,0,.02)}
.pr-topbar{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid #e2e8f0;gap:16px;flex-wrap:wrap}
.pr-controls-group,.pr-filter-actions,.pr-page-controls{display:flex;align-items:center;gap:12px}
/* Search */
.pr-search-group{display:flex;gap:12px;flex:1;max-width:550px}
.pr-search-wrapper{position:relative;flex:1}
.pr-search-wrapper svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;stroke:#94a3b8;fill:none;stroke-width:2}
.pr-search-input{width:100%;padding:9px 12px 9px 36px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;outline:none;color:#334155;transition:border .2s}
.pr-search-input:focus{border-color:#0ea5e9;box-shadow:0 0 0 3px rgba(14,165,233,.15)}
/* Buttons */
.pr-btn-add{background:#0ea5e9;color:#fff;border:none;border-radius:6px;width:38px;height:38px;font-size:24px;line-height:1;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s}
.pr-btn-add:hover{background:#0284c7;box-shadow:0 4px 6px -1px rgba(14,165,233,.3)}
.pr-btn-search{padding:9px 20px;background:#0ea5e9;color:#fff;border:none;border-radius:6px;font-weight:500;font-size:14px;cursor:pointer;transition:all .2s}
.pr-btn-search:hover{background:#0284c7;box-shadow:0 2px 4px rgba(14,165,233,.3)}
.pr-btn-clear{padding:9px 20px;background:#f1f5f9;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;font-size:14px;cursor:pointer;color:#475569;transition:all .2s}
.pr-btn-clear:hover{background:#e2e8f0;color:#0f172a}
.pr-btn-filter{padding:8px 16px;background:#f8fafc;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;color:#475569;cursor:pointer;display:flex;align-items:center;gap:8px;font-size:14px;transition:all .2s}
.pr-btn-filter:hover{background:#e2e8f0;color:#0f172a}
.pr-view-toggles{display:flex;border:1px solid #cbd5e1;border-radius:6px;overflow:hidden;background:#fff}
.pr-view-btn{background:transparent;border:none;padding:8px 10px;cursor:pointer;color:#94a3b8;display:flex;align-items:center;transition:all .2s}
.pr-view-btn:first-child{border-right:1px solid #cbd5e1}
.pr-view-btn.active{background:#e0f2fe;color:#0284c7}
.pr-view-btn:hover:not(.active){background:#f8fafc}
.pr-view-btn svg{width:18px;height:18px;stroke:currentColor;stroke-width:2;fill:none}
.pr-per-page{padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;outline:none;color:#475569;font-size:14px;background:#fff;cursor:pointer}
/* Filter Panel */
.pr-filter-panel{display:none;background:#f8fafc;border-bottom:1px solid #e2e8f0;padding:20px}
.pr-filter-panel.show{display:block}
.pr-filter-row{display:flex;flex-wrap:wrap;gap:16px;align-items:flex-end}
.pr-filter-item{flex:1;min-width:150px;display:flex;flex-direction:column}
.pr-filter-label{font-size:12px;font-weight:600;color:#475569;margin-bottom:6px;text-transform:uppercase}
.pr-filter-input,.pr-filter-select{width:100%;padding:10px 12px;border:1px solid #cbd5e1;border-radius:6px;outline:none;background:#fff;color:#334155;font-size:14px}
.pr-btn-apply{padding:10px 24px;background:#0ea5e9;color:#fff;border:none;border-radius:6px;font-weight:500;cursor:pointer;transition:background .2s}
.pr-btn-apply:hover{background:#0284c7}
.pr-btn-cancel{padding:10px 24px;background:#f1f5f9;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;cursor:pointer;color:#475569;transition:background .2s}
.pr-btn-cancel:hover{background:#e2e8f0}
/* Table */
.pr-table-container{width:100%;overflow-x:auto;max-height:600px}
.pr-table{width:100%;border-collapse:collapse;table-layout:fixed;text-align:left}
.pr-table th{background:#f8fafc;padding:14px 16px;font-size:13px;color:#475569;font-weight:600;border-bottom:1px solid #e2e8f0;position:sticky;top:0;z-index:10;white-space:nowrap}
.pr-table td{padding:14px 16px;font-size:14px;border-bottom:1px solid #e2e8f0;vertical-align:middle;white-space:nowrap}
/* Adjusted Column Widths to give Items and Status more room */
.pr-table th:nth-child(1){width:14%}
.pr-table th:nth-child(2){width:22%}
.pr-table th:nth-child(3){width:13%}
.pr-table th:nth-child(4){width:13%}
.pr-table th:nth-child(5){width:12%}
.pr-table th:nth-child(6){width:12%}
.pr-table th:nth-child(7){width:9%}
.pr-table th:nth-child(8){width:5%}

.pr-table th:nth-child(8),.pr-table td:nth-child(8){padding:14px 8px;text-align:center}
.pr-table tbody tr:hover{background:#f8fafc}
.pr-th-sort{cursor:pointer;user-select:none}.pr-th-sort:hover{color:#1e293b}
/* Data Elements */
.pr-date-inline{display:inline-flex;align-items:center;gap:8px;color:#334155}
.pr-date-inline svg{width:16px;height:16px;stroke:#94a3b8;fill:none;stroke-width:2;flex-shrink:0}
.pr-items-cell{display:flex;justify-content:space-between;align-items:center;width:100%}
.pr-items-qty{color:#64748b;font-size:13px}
.pr-return-badge{background:#e0f2fe;color:#0284c7;padding:6px 10px;border-radius:6px;font-weight:600;font-size:12px}
.pr-vendor-info{display:flex;align-items:center;gap:12px}
.pr-avatar-img{width:32px;height:32px;border-radius:50%;object-fit:cover;background:#e2e8f0}
.pr-vendor-details{display:flex;flex-direction:column;overflow:hidden}
.pr-vendor-name{font-weight:500;color:#1e293b;font-size:14px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.pr-vendor-email{font-size:12px;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
/* Pills & Badges */
.pr-status,.pr-wh-badge{display:inline-block;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;white-space:nowrap}
.pr-status.completed{background:#dcfce7;color:#166534}.pr-status.drafted{background:#f1f5f9;color:#475569}.pr-status.approved{background:#dbeafe;color:#1e40af}
.pr-wh-WarehouseA{background:#e0f2fe;color:#0369a1}.pr-wh-MainHub{background:#f3e8ff;color:#7e22ce}.pr-wh-WarehouseB{background:#fef3c7;color:#b45309}
.pr-wh-EastBranch{background:#ccfbf1;color:#0f766e}.pr-wh-WestBranch{background:#fce7f3;color:#be185d}.pr-wh-WarehouseC{background:#e0e7ff;color:#4338ca}
/* Menu */
.pr-action-menu{position:relative;display:inline-flex}
.pr-action-btn{background:0 0;border:none;cursor:pointer;color:#64748b;padding:6px;border-radius:4px;display:flex;align-items:center;transition:all .2s}
.pr-action-btn:hover{background:#e2e8f0;color:#0f172a}
.pr-action-btn svg{width:18px;height:18px;fill:currentColor}
.pr-action-dropdown{display:none;position:absolute;right:0;top:100%;background:#fff;border:1px solid #e2e8f0;border-radius:6px;box-shadow:0 4px 6px -1px rgba(0,0,0,.1);z-index:20;min-width:160px;padding:4px 0;margin-top:4px}
.pr-action-dropdown.show{display:block}
.pr-action-item{display:flex;align-items:center;gap:8px;padding:8px 16px;font-size:13px;color:#334155;cursor:pointer}
.pr-action-item:hover{background:#f1f5f9}.pr-action-item.delete{color:#ef4444}.pr-action-item.delete:hover{background:#fef2f2}
/* Icons */
.pr-sort-icon{display:inline-flex;margin-left:4px;width:14px;height:14px;vertical-align:middle}
.pr-sort-icon svg{fill:#cbd5e1;transition:fill .2s}.pr-sort-icon.asc svg,.pr-sort-icon.desc svg{fill:#0ea5e9}
/* Grid */
.pr-grid-container{display:none;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px;max-height:600px;overflow-y:auto;padding:20px;background:#f8fafc}
.pr-grid-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px;display:flex;flex-direction:column;gap:12px}
.pr-grid-header{display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:12px}
.pr-grid-header-right{display:flex;align-items:center;gap:12px}
.pr-grid-number{font-weight:600;font-size:14px;color:#1e293b}
.pr-grid-body{display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px}
.pr-grid-label{color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;display:block;margin-bottom:2px}
.pr-grid-value{color:#334155;font-weight:500}
.pr-grid-body>div:nth-child(1){grid-column:span 2}
.pr-data-container.view-list .pr-table-container{display:block}.pr-data-container.view-list .pr-grid-container{display:none}
.pr-data-container.view-grid .pr-table-container{display:none}.pr-data-container.view-grid .pr-grid-container{display:grid}
/* Pagination */
.pr-pagination{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-top:1px solid #e2e8f0;background:#fff;flex-wrap:wrap;gap:12px}
.pr-page-info{font-size:13px;color:#64748b;font-weight:500}
.pr-page-btn{padding:6px 14px;border:1px solid #cbd5e1;background:#fff;border-radius:6px;cursor:pointer;color:#475569;font-size:13px;font-weight:500;transition:all .2s}
.pr-page-btn:hover:not(.active):not(:disabled){background:#e0f2fe;color:#0284c7;border-color:#7dd3fc}
.pr-page-btn.active{background:#0ea5e9;color:#fff;border-color:#0ea5e9;box-shadow:0 2px 4px rgba(14,165,233,.3)}
.pr-page-btn:disabled{opacity:.5;cursor:not-allowed;background:#f1f5f9}
#prevPageBtn,#nextPageBtn{background:#e0f2fe;color:#0284c7;border-color:#bae6fd;font-weight:600}
#prevPageBtn:hover:not(:disabled),#nextPageBtn:hover:not(:disabled){background:#bae6fd;color:#0369a1;border-color:#7dd3fc}
#prevPageBtn:disabled,#nextPageBtn:disabled{background:#f1f5f9;color:#94a3b8;border-color:#e2e8f0}
</style>

<div class="pr-header">
  <div><h1>Manage Purchase Returns</h1><p>Manage and track your purchase returns, statuses, and values.</p></div>
  <!-- Added title="Create" to the add button -->
  <button class="pr-btn-add" title="Create">+</button>
</div>

<div class="pr-card">
  <div class="pr-topbar">
    <div class="pr-search-group">
      <div class="pr-search-wrapper">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" class="pr-search-input" id="searchInput" placeholder="Search by return number...">
      </div>
      <button class="pr-btn-search">Search</button>
      <button class="pr-btn-clear" id="btnClearSearch">Clear</button>
    </div>
    
    <div class="pr-controls-group">
      <div class="pr-view-toggles">
        <button class="pr-view-btn active" id="listViewBtn"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></button>
        <button class="pr-view-btn" id="gridViewBtn"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
      </div>
      <select class="pr-per-page" id="perPageSelect">
        <option value="10">10 per page</option><option value="25">25 per page</option><option value="50" selected>50 per page</option>
      </select>
      <button class="pr-btn-filter" id="filterToggleBtn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> Filters</button>
    </div>
  </div>

  <div class="pr-filter-panel" id="filterPanel">
    <div class="pr-filter-row">
      <div class="pr-filter-item"><label class="pr-filter-label">Vendor</label><select class="pr-filter-select" id="filterVendor"><option value="">All Vendors</option></select></div>
      <div class="pr-filter-item"><label class="pr-filter-label">Warehouse</label><select class="pr-filter-select" id="filterWarehouse"><option value="">All Warehouses</option></select></div>
      <div class="pr-filter-item"><label class="pr-filter-label">Status</label><select class="pr-filter-select" id="filterStatus"><option value="">All Statuses</option></select></div>
      <div class="pr-filter-item"><label class="pr-filter-label">Date Range</label><input type="date" class="pr-filter-input"></div>
      <div class="pr-filter-actions">
        <button class="pr-btn-apply" id="applyFiltersBtn">Apply</button>
        <button class="pr-btn-cancel" id="filterCancelBtn">Cancel</button>
      </div>
    </div>
  </div>

  <div class="pr-data-container view-list" id="dataContainer">
    <div class="pr-table-container">
      <table class="pr-table">
        <thead>
          <tr>
            <th class="pr-th-sort" data-sort="returnNumber">Return Number <span class="pr-sort-icon"></span></th>
            <th>Vendor</th><th>Warehouse</th>
            <th class="pr-th-sort" data-sort="returnDate">Return Date <span class="pr-sort-icon"></span></th>
            <th class="pr-th-sort" data-sort="totalAmount">Total Amount <span class="pr-sort-icon"></span></th>
            <th>Items</th>
            <th class="pr-th-sort" data-sort="status">Status <span class="pr-sort-icon"></span></th><th></th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>
    <div class="pr-grid-container" id="gridContainer"></div>
  </div>

  <div class="pr-pagination">
    <div class="pr-page-info" id="pageInfo">Showing 1-50 of 50</div>
    <div class="pr-page-controls">
      <button class="pr-page-btn" id="prevPageBtn" onclick="changePage(page-1)">Previous</button>
      <div id="pageNumbers" style="display:flex; gap:4px; margin:0 8px;"></div>
      <button class="pr-page-btn" id="nextPageBtn" onclick="changePage(page+1)">Next</button>
    </div>
  </div>
</div>

<script>
let page=1, per=50, sortCol='returnNumber', asc=true, filtered=[], data=[];
const $ = id => document.getElementById(id);

document.addEventListener('DOMContentLoaded', () => {
  const names = ["Jack Wilson","Chloe Smith","Liam Johnson","Olivia Brown","Noah Davis","Ava Martinez","William Garcia","Mia Rodriguez","James Lee","Charlotte White","Henry Taylor","Amelia Thomas","Lucas Jackson","Harper Harris","Mason Martin","Evelyn Thompson","Logan Garcia","Abigail Martinez","Ethan Robinson","Emily Clark","Alexander Lewis","Madison Walker","Daniel Hall","Sofia Allen","Matthew Young","Ella King","Jackson Wright","Grace Scott","Aiden Green","Chloe Baker","David Adams","Zoe Nelson","Carter Hill","Lily Campbell","Owen Mitchell","Nora Roberts","Wyatt Carter","Hannah Phillips","Julian Evans","Aria Turner","Levi Torres","Scarlett Parker","Gabriel Collins","Penelope Edwards","Isaac Stewart","Layla Morris","Anthony Murphy","Aurora Cook","Caleb Rogers","Stella Morgan"];
  const whs = ["Warehouse A","Main Hub","Warehouse B","East Branch","West Branch","Warehouse C"];
  const items = ["Laptop","T-Shirt","Monitor","Desk Chair","Keyboard","Mouse","Headphones","Notebook","Printer","USB Cable"];
  const stats = [["completed","Completed"],["drafted","Drafted"],["approved","Approved"]];

  data = names.map((name,i) => {
    const pseudoRandom = ((i * 13 + 7) % 97) / 97;
    const amount = (pseudoRandom * 1000 + 45).toFixed(2);

    return {
      returnNumber: `PR-2023-${String(i+1).padStart(3,'0')}`,
      vendor: { name: name, email: name.toLowerCase().replace(/\s/g,'.')+'@example.com', img: `https://randomuser.me/api/portraits/${i%2===0?'men':'women'}/${30+i}.jpg` },
      warehouse: whs[i%6], returnDate: `2023-${String(12-Math.floor(i/5)).padStart(2,'0')}-${String(28-(i%5)*4).padStart(2,'0')}`,
      totalAmount: amount, itemName: items[i%10], itemQty: (i%15)+1,
      status: stats[i%3][0], statusDisplay: stats[i%3][1]
    };
  });
  filtered = [...data];

  [...new Set(data.map(d=>d.vendor.name))].sort().forEach(n=>$('filterVendor').innerHTML+=`<option>${n}</option>`);
  [...new Set(data.map(d=>d.warehouse))].sort().forEach(n=>$('filterWarehouse').innerHTML+=`<option>${n}</option>`);
  [...new Set(data.map(d=>d.statusDisplay))].sort().forEach(n=>$('filterStatus').innerHTML+=`<option>${n}</option>`);

  $('searchInput').addEventListener('input',()=>{page=1;render()});
  $('perPageSelect').addEventListener('change',e=>{per=+e.target.value;page=1;render()});
  $('btnClearSearch').addEventListener('click',()=>{$('searchInput').value='';page=1;render()});
  $('filterToggleBtn').addEventListener('click',()=>$('filterPanel').classList.toggle('show'));
  $('applyFiltersBtn').addEventListener('click',()=>{page=1;render();$('filterPanel').classList.remove('show')});
  $('filterCancelBtn').addEventListener('click',()=>{['filterVendor','filterWarehouse','filterStatus'].forEach(id=>$(id).value='');page=1;render();$('filterPanel').classList.remove('show')});
  $('listViewBtn').addEventListener('click',()=>{$('dataContainer').className='pr-data-container view-list';$('listViewBtn').classList.add('active');$('gridViewBtn').classList.remove('active')});
  $('gridViewBtn').addEventListener('click',()=>{$('dataContainer').className='pr-data-container view-grid';$('gridViewBtn').classList.add('active');$('listViewBtn').classList.remove('active')});

  const iUp=`<svg viewBox="0 0 24 24"><path d="M12 5l-5 5h10z"/></svg>`, iDown=`<svg viewBox="0 0 24 24"><path d="M12 19l5-5H7z"/></svg>`;
  document.querySelectorAll('.pr-th-sort').forEach(th=>th.addEventListener('click',()=>{
    const col=th.dataset.sort; asc=(sortCol===col)?!asc:true; sortCol=col;
    document.querySelectorAll('.pr-sort-icon').forEach(el=>el.innerHTML='');
    th.querySelector('.pr-sort-icon').innerHTML=asc?iUp:iDown; render();
  }));
  document.querySelector('[data-sort="returnNumber"] .pr-sort-icon').innerHTML=iUp;
  render();
});

window.changePage = p => { if (p >= 1 && p <= Math.ceil(filtered.length/per)) { page = p; render(); } };
window.toggleMenu = btn => { document.querySelectorAll('.pr-action-dropdown').forEach(el=>{ if(el!==btn.nextElementSibling) el.classList.remove('show') }); btn.nextElementSibling.classList.toggle('show'); };
document.addEventListener('click', e => { if(!e.target.closest('.pr-action-menu')) document.querySelectorAll('.pr-action-dropdown').forEach(el=>el.classList.remove('show')) });

const render = () => {
  const q=$('searchInput').value.toLowerCase(), fV=$('filterVendor').value, fW=$('filterWarehouse').value, fS=$('filterStatus').value;
  
  filtered = data.filter(i => (i.returnNumber.toLowerCase().includes(q)||i.vendor.name.toLowerCase().includes(q)) && (!fV||i.vendor.name===fV) && (!fW||i.warehouse===fW) && (!fS||i.statusDisplay===fS));
  filtered.sort((a,b)=>{ let vA=sortCol==='vendor'?a.vendor.name:sortCol==='status'?a.statusDisplay:a[sortCol], vB=sortCol==='vendor'?b.vendor.name:sortCol==='status'?b.statusDisplay:b[sortCol]; if(sortCol==='totalAmount'){vA=+vA;vB=+vB} return asc?(vA>vB?1:-1):(vA<vB?1:-1) });
  
  const totalPages = Math.ceil(filtered.length/per);
  if (page > totalPages && totalPages > 0) page = totalPages;
  if (page < 1) page = 1;

  const start=(page-1)*per, end=Math.min(start+per,filtered.length), pg=filtered.slice(start,end);
  $('pageInfo').textContent = filtered.length === 0 ? 'Showing 0 of 0' : `Showing ${start+1}-${end} of ${filtered.length}`;

  const menu = `<div class="pr-action-menu"><button class="pr-action-btn" onclick="toggleMenu(this)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg></button><div class="pr-action-dropdown"><a class="pr-action-item">Complete</a><a class="pr-action-item">View</a><a class="pr-action-item">Approve</a><a class="pr-action-item delete">Delete</a></div></div>`;
  const money = v => '$'+Number(v).toLocaleString('en-US',{minimumFractionDigits:2});
  const calendarIcon = `<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>`;
  const whClass = wh => 'pr-wh-' + wh.replace(/\s+/g, '');
  const vendorRow = i => `<div class="pr-vendor-info"><img src="${i.vendor.img}" class="pr-avatar-img" alt="${i.vendor.name}"><div class="pr-vendor-details"><span class="pr-vendor-name">${i.vendor.name}</span><span class="pr-vendor-email">${i.vendor.email}</span></div></div>`;
  
  $('tableBody').innerHTML = pg.map(i => `<tr>
    <td><span class="pr-return-badge">${i.returnNumber}</span></td><td>${vendorRow(i)}</td><td><span class="pr-wh-badge ${whClass(i.warehouse)}">${i.warehouse}</span></td>
    <td><span class="pr-date-inline">${calendarIcon} ${i.returnDate}</span></td><td>${money(i.totalAmount)}</td>
    <td><div class="pr-items-cell"><span>${i.itemName}</span><span class="pr-items-qty">x${i.itemQty}</span></div></td>
    <td><span class="pr-status ${i.status}">${i.statusDisplay}</span></td><td>${menu}</td></tr>`).join('');
    
  $('gridContainer').innerHTML = pg.map(i => `<div class="pr-grid-card">
    <div class="pr-grid-header"><span class="pr-grid-number">${i.returnNumber}</span><div class="pr-grid-header-right"><span class="pr-status ${i.status}">${i.statusDisplay}</span>${menu}</div></div>
    <div class="pr-grid-body">
      <div><span class="pr-grid-label">Vendor</span><div class="pr-vendor-info"><img src="${i.vendor.img}" class="pr-avatar-img" style="width:24px;height:24px"><span class="pr-grid-value">${i.vendor.name}</span></div></div>
      <div><span class="pr-grid-label">Warehouse</span><span class="pr-wh-badge ${whClass(i.warehouse)}">${i.warehouse}</span></div>
      <div><span class="pr-grid-label">Date</span><span class="pr-grid-value pr-date-inline" style="font-size:12px">${calendarIcon} ${i.returnDate}</span></div>
      <div><span class="pr-grid-label">Amount</span><span class="pr-grid-value">${money(i.totalAmount)}</span></div>
      <div style="grid-column: span 2;"><span class="pr-grid-label">Items</span><div class="pr-items-cell"><span class="pr-grid-value">${i.itemName}</span><span class="pr-items-qty">x${i.itemQty}</span></div></div>
    </div></div>`).join('');

  $('prevPageBtn').disabled = page === 1;
  $('nextPageBtn').disabled = page === totalPages || totalPages === 0;
  $('pageNumbers').innerHTML = Array.from({length:totalPages},(_,i)=>`<button class="pr-page-btn ${i+1===page?'active':''}" onclick="changePage(${i+1})">${i+1}</button>`).join('');
};
</script>
</section>
@endsection