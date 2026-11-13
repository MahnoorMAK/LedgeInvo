@extends('layout.dashboard')
@section('title', 'Item - LedgeInvo')

@section('content')
<section class="pts">
<style>
.pts{font-family:system-ui,sans-serif;background:#fff;padding:24px;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.05);border:1px solid #e2e8f0;max-width:1300px;margin:40px auto;color:#0f172a}
.pts *{box-sizing:border-box;margin:0;padding:0}
.pts-head{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:24px;gap:16px;flex-wrap:wrap}
.pts-head h1{font-size:24px;font-weight:600;color:#111827;margin-bottom:6px}
.pts-head p{font-size:14px;color:#6b7280}
.pts-actions{display:flex;gap:12px}
.pts-btn{display:flex;align-items:center;gap:8px;padding:10px 16px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;font-weight:500;color:#374151;cursor:pointer}
.pts-btn:hover{background:#f8fafc}
.pts-btn svg{width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2}
.pts-add{width:40px;height:40px;padding:0;justify-content:center;background:#3b82f6;border:none;color:#fff}
.pts-add:hover{background:#2563eb}
.pts-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;flex-wrap:wrap;gap:16px}
.pts-search{display:flex;gap:10px;flex:1;max-width:500px;position:relative}
.pts-search>svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;stroke:#9ca3af;fill:none;stroke-width:2}
.pts-input{width:100%;padding:10px 12px 10px 36px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;outline:none;color:#374151}
.pts-input:focus{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.pts-search button{padding:10px 20px;border-radius:6px;font-size:14px;font-weight:500;cursor:pointer;white-space:nowrap}
.pts-search .primary{background:#3b82f6;color:#fff;border:none}
.pts-search .primary:hover{background:#2563eb}
.pts-search .ghost{background:#fff;color:#475569;border:1px solid #cbd5e1}
.pts-search .ghost:hover{background:#f1f5f9}
.pts-controls{display:flex;align-items:center;gap:16px}
.pts-views{display:flex;border:1px solid #cbd5e1;border-radius:6px;overflow:hidden;background:#fff}
.pts-views button{background:transparent;border:none;padding:8px 12px;cursor:pointer;color:#64748b}
.pts-views button:first-child{border-right:1px solid #cbd5e1}
.pts-views button.active{background:#bfdbfe;color:#1e40af}
.pts-views svg{width:18px;height:18px;stroke:currentColor;stroke-width:2;fill:none}
.pts-controls select,.pts-filter{padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;background:#fff;color:#374151;cursor:pointer}
.pts-filter{display:flex;align-items:center;gap:8px;font-weight:500}
.pts-filter svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2}
.pts-panel{display:none;padding:20px;border:1px solid #e2e8f0;border-radius:8px;background:#f8fafc;margin-bottom:20px}
.pts-panel.show{display:block}
.pts-frow{display:flex;flex-wrap:wrap;gap:16px;align-items:flex-end}
.pts-fitem{flex:1;min-width:200px;display:flex;flex-direction:column;gap:8px}
.pts-fitem label{font-size:13px;font-weight:600;color:#475569}
.pts-fitem select{width:100%;padding:10px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;color:#374151;background:#fff;cursor:pointer}
.pts-factions{display:flex;gap:10px;margin-left:auto}
.pts-apply{padding:10px 24px;background:#3b82f6;color:#fff;border:none;border-radius:6px;font-weight:500;cursor:pointer}
.pts-cancel{padding:10px 24px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-weight:500;color:#374151;cursor:pointer}
.pts-table-wrap{width:100%;overflow-x:auto;border:1px solid #e2e8f0;border-radius:8px}
.pts-table{width:100%;border-collapse:collapse;table-layout:fixed;text-align:left}
.pts-table th,.pts-table td{width:12.5%;padding:14px 16px;border-bottom:1px solid #f1f5f9;vertical-align:middle;white-space:nowrap;text-align:right}
.pts-table th:first-child,.pts-table td:first-child{text-align:left}
.pts-table th:last-child,.pts-table td:last-child{text-align:center}
.pts-table th{background:#f8fafc;font-size:13px;font-weight:600;color:#4b5563;border-bottom:1px solid #e2e8f0;cursor:pointer;user-select:none}
.pts-table th:hover{background:#f1f5f9}
.pts-table tbody tr:last-child td{border-bottom:none}
.pts-table tbody tr:hover{background:#f8fafc}
.pts-thc{display:flex;align-items:center;justify-content:flex-end;gap:6px}
.pts-table th:first-child .pts-thc{justify-content:flex-start}
.pts-thc svg{width:14px;height:14px;stroke:#9ca3af;fill:none;stroke-width:2}
.pts-thc.active svg{stroke:#3b82f6}
.pts-prod{display:flex;align-items:center;gap:12px}
.pts-img{width:42px;height:42px;border:1px solid #e2e8f0;border-radius:8px;display:flex;align-items:center;justify-content:center;background:#fff;flex-shrink:0}
.pts-img img{width:26px;height:26px;object-fit:contain}
.pts-pinfo{display:flex;flex-direction:column;gap:2px}
.pts-pname{font-weight:500;color:#111827;font-size:14px}
.pts-psku{font-size:11px;color:#6b7280}
.pts-badge{padding:4px 10px;border-radius:4px;font-size:12px;font-weight:500;display:inline-block;border:1px solid transparent}
.pts-btype{background:#faf5ff;color:#7e22ce;border-color:#e9d5ff}
.pts-bcat{background:#fff7ed;color:#c2410c;border-color:#fed7aa}
.pts-bcat.green{background:#ecfdf5;color:#047857;border-color:#a7f3d0}
.pts-bcat.blue{background:#eff6ff;color:#1d4ed8;border-color:#bfdbfe}
.pts-sp{color:#10b981;font-weight:600}
.pts-pp{color:#ef4444;font-weight:500}
.pts-menu{position:relative;display:inline-flex;justify-content:center}
.pts-mbtn{background:none;border:none;cursor:pointer;color:#64748b;padding:6px;border-radius:4px}
.pts-mbtn:hover{background:#e2e8f0;color:#0f172a}
.pts-mbtn svg{width:18px;height:18px;fill:currentColor}
.pts-drop{display:none;position:absolute;right:0;top:100%;background:#fff;border:1px solid #e2e8f0;border-radius:6px;box-shadow:0 4px 6px rgba(0,0,0,.1);z-index:20;min-width:140px;padding:4px 0}
.pts-drop.show{display:block}
.pts-drop a{display:flex;align-items:center;gap:8px;padding:8px 16px;font-size:13px;color:#334155;cursor:pointer}
.pts-drop a:hover{background:#f8fafc}
.pts-drop a.delete{color:#ef4444}
.pts-drop svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2}
.pts-grid{display:none;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px}
.pts-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px;display:flex;flex-direction:column;gap:12px}
.pts-card:hover{box-shadow:0 4px 12px rgba(0,0,0,.05)}
.pts-card-head{display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:12px}
.pts-card-body{display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px}
.pts-card-body>div{display:flex;flex-direction:column;gap:4px}
.pts-card-body .lbl{font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase}
.pts-card-body .val{font-weight:500;color:#111827}
.pts-data.view-list .pts-table-wrap{display:block}
.pts-data.view-list .pts-grid{display:none}
.pts-data.view-grid .pts-table-wrap{display:none}
.pts-data.view-grid .pts-grid{display:grid}
.pts-pag{display:flex;justify-content:space-between;align-items:center;padding-top:20px;margin-top:10px;border-top:1px solid #e2e8f0;flex-wrap:wrap;gap:16px}
.pts-info{font-size:14px;color:#64748b}
.pts-pages{display:flex;gap:6px}
.pts-pages button{padding:8px 14px;border:1px solid #e2e8f0;background:#fff;border-radius:6px;font-size:14px;font-weight:500;color:#475569;cursor:pointer}
.pts-pages button:hover:not(:disabled){background:#f8fafc;color:#0f172a}
.pts-pages button:disabled{opacity:.5;cursor:not-allowed}
.pts-pages .active{background:#3b82f6;color:#fff;border-color:#3b82f6}
@media(max-width:768px){.pts-head{flex-direction:column}.pts-frow{flex-direction:column;align-items:stretch}.pts-factions{margin-left:0;justify-content:flex-end}}
</style>

<div class="pts-head">
  <div><h1>Manage Items</h1><p>Manage and track your products, services, pricing, and stock details.</p></div>
  <div class="pts-actions">
    <button class="pts-btn"><svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg> Stock</button>
    <button class="pts-btn pts-add" title="Add Item" onclick="window.location.href='{{ route('Create-Item') }}'"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></button>
  </div>
</div>

<div class="pts-top">
  <div class="pts-search">
    <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input type="text" class="pts-input" id="searchInput" placeholder="Search products...">
    <button class="primary" id="searchBtn">Search</button>
    <button class="ghost" id="clearBtn">Clear</button>
  </div>
  <div class="pts-controls">
    <div class="pts-views">
      <button class="list-btn active" id="listViewBtn" title="List View"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></button>
      <button class="grid-btn" id="gridViewBtn" title="Grid View"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
    </div>
    <select id="perPageSelect"><option value="5">5 per page</option><option value="10" selected>10 per page</option><option value="25">25 per page</option></select>
    <button class="pts-filter" id="filterToggleBtn"><svg viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> Filters</button>
  </div>
</div>

<div class="pts-panel" id="filterPanel">
  <div class="pts-frow">
    <div class="pts-fitem"><label>Item Type</label><select id="filterType"><option value="">Filter by item type</option></select></div>
    <div class="pts-fitem"><label>Category</label><select id="filterCategory"><option value="">Filter by category</option></select></div>
    <div class="pts-factions"><button class="pts-apply" id="applyFilterBtn">Apply</button><button class="pts-cancel" id="cancelFilterBtn">Cancel</button></div>
  </div>
</div>

<div class="pts-data view-list" id="dataContainer">
  <div class="pts-table-wrap">
    <table class="pts-table">
      <thead><tr>
        <th data-sort="name"><div class="pts-thc">Product <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
        <th data-sort="sp"><div class="pts-thc">Sale Price <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
        <th data-sort="pp"><div class="pts-thc">Purchase Price <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
        <th>Category</th><th>Unit</th><th>Quantity</th>
        <th data-sort="type"><div class="pts-thc">Type <svg viewBox="0 0 24 24"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg></div></th>
        <th>Actions</th>
      </tr></thead>
      <tbody id="tableBody"></tbody>
    </table>
  </div>
  <div class="pts-grid" id="gridContainer"></div>
</div>

<div class="pts-pag">
  <div class="pts-info" id="pageInfo">Showing 1-10 of 25</div>
  <div class="pts-pages" id="pageControls"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const mk = (n,i,img,sku,type,cat,cc,sp,pp,unit,qty) => ({name:n,img,sku,type,cat,catColor:cc,sp,pp,unit,qty});
  const allData = [
    mk("Plant Pot",1,"https://cdn-icons-png.flaticon.com/512/2829/2829610.png","HOME-PROD-012","Product","Home & Garden","orange","24.99","12.00","Pot",34),
    mk("Raspberry",2,"https://cdn-icons-png.flaticon.com/512/2909/2909761.png","FRUIT-PROD-023","Product","Fruits & Vegetables","purple","6.99","4.00","Basket",159),
    mk("Laptop",3,"https://cdn-icons-png.flaticon.com/512/1813/1813813.png","ELEC-PROD-001","Product","Electronics & Technology","orange","899.99","650.00","Piece",24),
    mk("Football",4,"https://cdn-icons-png.flaticon.com/512/53/53283.png","SPORT-PROD-015","Product","Sports & Fitness","green","39.99","22.00","Ball",272),
    mk("Laptop Battery",5,"https://cdn-icons-png.flaticon.com/512/3126/3126571.png","ELEC-PART-004","Part","Electronics & Technology","orange","89.99","45.00","Piece",221),
    mk("Desk Chair",6,"https://cdn-icons-png.flaticon.com/512/3081/3081559.png","FURN-PROD-008","Product","Office Furniture","blue","149.50","90.00","Piece",45),
    mk("Coffee Beans",7,"https://cdn-icons-png.flaticon.com/512/704/704851.png","FOOD-PROD-026","Product","Beverages","green","18.50","10.00","Pack",112),
    mk("Monitor",8,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-115","Product","Electronics & Technology","orange","299.00","210.00","Piece",67),
    mk("Wireless Mouse",9,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-120","Product","Electronics & Technology","orange","29.99","15.00","Piece",340),
    mk("Notebook",10,"https://cdn-icons-png.flaticon.com/512/3145/3145736.png","STAT-PROD-055","Product","Office Supplies","blue","4.99","2.50","Pack",500),
    mk("Water Bottle",11,"https://cdn-icons-png.flaticon.com/512/2447/2447774.png","HOME-PROD-040","Product","Home & Garden","orange","15.99","8.00","Piece",88),
    mk("Printer",12,"https://cdn-icons-png.flaticon.com/512/3031/3031121.png","ELEC-PROD-202","Product","Electronics & Technology","orange","199.99","140.00","Piece",15),
    mk("Headphones",13,"https://cdn-icons-png.flaticon.com/512/724/724765.png","ELEC-PROD-310","Product","Electronics & Technology","orange","79.99","45.00","Piece",95),
    mk("Keyboard",14,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-121","Product","Electronics & Technology","orange","49.99","25.00","Piece",130),
    mk("Apple",15,"https://cdn-icons-png.flaticon.com/512/415/415733.png","FRUIT-PROD-022","Product","Fruits & Vegetables","purple","1.99","0.50","Basket",400),
    mk("Banana",16,"https://cdn-icons-png.flaticon.com/512/1093/1093255.png","FRUIT-PROD-024","Product","Fruits & Vegetables","purple","2.99","1.00","Basket",300),
    mk("Office Desk",17,"https://cdn-icons-png.flaticon.com/512/3081/3081559.png","FURN-PROD-012","Product","Office Furniture","blue","250.00","180.00","Piece",12),
    mk("Webcam",18,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-130","Product","Electronics & Technology","orange","69.99","40.00","Piece",55),
    mk("Microphone",19,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-135","Product","Electronics & Technology","orange","129.99","85.00","Piece",30),
    mk("Docking Station",20,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-140","Product","Electronics & Technology","orange","179.99","120.00","Piece",20),
    mk("Smartphone",21,"https://cdn-icons-png.flaticon.com/512/15/15874.png","ELEC-PROD-500","Product","Electronics & Technology","orange","699.99","550.00","Piece",18),
    mk("Tablet",22,"https://cdn-icons-png.flaticon.com/512/15/15874.png","ELEC-PROD-501","Product","Electronics & Technology","orange","399.99","300.00","Piece",25),
    mk("USB Cable",23,"https://cdn-icons-png.flaticon.com/512/2917/2917995.png","ELEC-PROD-150","Product","Electronics & Technology","orange","9.99","3.00","Piece",600),
    mk("Stapler",24,"https://cdn-icons-png.flaticon.com/512/3145/3145736.png","STAT-PROD-060","Product","Office Supplies","blue","12.99","6.00","Piece",80),
    mk("Whiteboard",25,"https://cdn-icons-png.flaticon.com/512/3145/3145736.png","STAT-PROD-065","Product","Office Supplies","blue","45.00","25.00","Piece",15)
  ];

  const $ = id => document.getElementById(id);
  const filterType = $('filterType'), filterCategory = $('filterCategory');
  [...new Set(allData.map(d=>d.type))].sort().forEach(t => filterType.innerHTML += `<option>${t}</option>`);
  [...new Set(allData.map(d=>d.cat))].sort().forEach(c => filterCategory.innerHTML += `<option>${c}</option>`);

  let data = [...allData], perPage = 10, page = 1, sortCol = 'name', asc = true;

  const menu = () => `<div class="pts-menu"><button class="pts-mbtn" onclick="toggleMenu(this)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg></button><div class="pts-drop"><a><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> View</a><a><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit</a><a class="delete"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> Delete</a></div></div>`;

  const render = () => {
    const total = data.length, pages = Math.ceil(total/perPage) || 1;
    page = Math.min(Math.max(page, 1), pages);
    const start = (page-1)*perPage, end = Math.min(start+perPage, total), rows = data.slice(start, end);

    $('tableBody').innerHTML = rows.length ? rows.map(r => `<tr>
      <td><div class="pts-prod"><div class="pts-img"><img src="${r.img}" alt="${r.name}"></div><div class="pts-pinfo"><span class="pts-pname">${r.name}</span><span class="pts-psku">${r.sku}</span></div></div></td>
      <td><span class="pts-sp">$${r.sp}</span></td><td><span class="pts-pp">$${r.pp}</span></td>
      <td><span class="pts-badge pts-bcat ${r.catColor}">${r.cat}</span></td><td>${r.unit}</td><td>${r.qty}</td>
      <td><span class="pts-badge pts-btype">${r.type}</span></td><td>${menu()}</td></tr>`).join('')
      : `<tr><td colspan="8" style="text-align:center;padding:24px;color:#6b7280">No products found.</td></tr>`;

    $('gridContainer').innerHTML = rows.map(r => `<div class="pts-card">
      <div class="pts-card-head"><div class="pts-prod"><div class="pts-img"><img src="${r.img}" alt="${r.name}"></div><div class="pts-pinfo"><span class="pts-pname">${r.name}</span><span class="pts-psku">${r.sku}</span></div></div>${menu()}</div>
      <div class="pts-card-body">
        <div><span class="lbl">Sale Price</span><span class="val pts-sp">$${r.sp}</span></div>
        <div><span class="lbl">Purchase Price</span><span class="val pts-pp">$${r.pp}</span></div>
        <div><span class="lbl">Category</span><span class="val"><span class="pts-badge pts-bcat ${r.catColor}" style="font-size:10px;padding:2px 6px">${r.cat}</span></span></div>
        <div><span class="lbl">Quantity</span><span class="val">${r.qty} ${r.unit}</span></div>
        <div><span class="lbl">Type</span><span class="val"><span class="pts-badge pts-btype" style="font-size:10px;padding:2px 6px">${r.type}</span></span></div>
      </div></div>`).join('');

    $('pageInfo').textContent = total ? `Showing ${start+1} to ${end} of ${total} results` : 'Showing 0 to 0 of 0 results';
    let html = `<button onclick="goPage(${page-1})" ${page===1?'disabled':''}>Previous</button>`;
    for (let i=1; i<=pages; i++) html += `<button class="${i===page?'active':''}" onclick="goPage(${i})">${i}</button>`;
    html += `<button onclick="goPage(${page+1})" ${page===pages?'disabled':''}>Next</button>`;
    $('pageControls').innerHTML = html;
  };

  const apply = () => {
    const q = $('searchInput').value.toLowerCase(), t = filterType.value, c = filterCategory.value;
    data = allData.filter(r =>
      (r.name.toLowerCase().includes(q) || r.cat.toLowerCase().includes(q) || r.type.toLowerCase().includes(q)) &&
      (!t || r.type === t) && (!c || r.cat === c)
    );
    data.sort((a,b) => {
      const va = sortCol==='sp'||sortCol==='pp' ? parseFloat(a[sortCol]) : a[sortCol];
      const vb = sortCol==='sp'||sortCol==='pp' ? parseFloat(b[sortCol]) : b[sortCol];
      return va < vb ? (asc?-1:1) : va > vb ? (asc?1:-1) : 0;
    });
    page = 1;
    render();
  };

  window.goPage = p => { page = p; render(); };
  window.toggleMenu = btn => {
    document.querySelectorAll('.pts-drop').forEach(el => el !== btn.nextElementSibling && el.classList.remove('show'));
    btn.nextElementSibling.classList.toggle('show');
  };

  $('searchBtn').onclick = apply;
  $('searchInput').onkeyup = e => e.key === 'Enter' && apply();
  $('clearBtn').onclick = () => { $('searchInput').value = ''; apply(); $('searchInput').focus(); };
  $('perPageSelect').onchange = e => { perPage = +e.target.value; page = 1; render(); };
  $('filterToggleBtn').onclick = () => $('filterPanel').classList.toggle('show');
  $('applyFilterBtn').onclick = () => { apply(); $('filterPanel').classList.remove('show'); };
  $('cancelFilterBtn').onclick = () => { filterType.value = ''; filterCategory.value = ''; $('filterPanel').classList.remove('show'); apply(); };

  const dc = $('dataContainer');
  $('listViewBtn').onclick = () => { $('listViewBtn').classList.add('active'); $('gridViewBtn').classList.remove('active'); dc.classList.replace('view-grid','view-list'); };
  $('gridViewBtn').onclick = () => { $('gridViewBtn').classList.add('active'); $('listViewBtn').classList.remove('active'); dc.classList.replace('view-list','view-grid'); };

  const up = `<svg viewBox="0 0 24 24"><path d="M12 5l-5 5h10z"/></svg>`, down = `<svg viewBox="0 0 24 24"><path d="M12 19l5-5H7z"/></svg>`;
  document.querySelectorAll('.pts-table th[data-sort]').forEach(th => th.onclick = () => {
    const col = th.dataset.sort;
    asc = sortCol === col ? !asc : true;
    sortCol = col;
    document.querySelectorAll('.pts-thc').forEach(el => el.classList.remove('active'));
    const c = th.querySelector('.pts-thc');
    c.classList.add('active');
    c.innerHTML = `${th.textContent.trim()} ${asc ? up : down}`;
    apply();
  });

  document.addEventListener('click', e => !e.target.closest('.pts-menu') && document.querySelectorAll('.pts-drop').forEach(el => el.classList.remove('show')));

  apply();
});
</script>
</section>
@endsection