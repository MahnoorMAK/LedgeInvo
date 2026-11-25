<style>
  /* Force layout wrapper to be white and add standard padding so table doesn't cut */
  body main, 
  .main-content, 
  .content-wrapper,
  #app > main {
      background-color: #ffffff !important;
      padding: 24px !important; /* Padding wapas add ki taake table side se cut na ho */
      margin: 0 !important;
  }
</style>

<section class="contract-table-section">
<style>
.contract-table-section{
  font-family:system-ui,sans-serif;
  background:#ffffff;
  padding:24px;
  border-radius:12px;
  border:1px solid #e2e8f0;
  
  /* Table ko center karne aur side se cut hone se bachane ke liye */
  width: 100%; 
  max-width: 1400px; 
  margin: 0 auto; 
  box-sizing: border-box;
  color:#0f172a;
}

/* Baqi saara CSS same rahega */
.contract-table-section *{box-sizing:border-box;margin:0;padding:0}
.ct-topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;flex-wrap:wrap;gap:16px}
.ct-search-group{display:flex;gap:10px;flex:1;max-width:480px}
.ct-search-input{flex:1;padding:10px 14px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;outline:none}
.ct-search-input:focus{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.ct-btn-search,.ct-btn-apply{padding:10px 20px;background:#3b82f6;color:#fff;border:none;border-radius:6px;font-size:14px;font-weight:500;cursor:pointer}
.ct-btn-search:hover,.ct-btn-apply:hover{background:#2563eb}
.ct-btn-clear,.ct-btn-cancel-filter{padding:10px 20px;background:#fff;color:#0f172a;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;font-weight:500;cursor:pointer}
.ct-btn-clear:hover,.ct-btn-cancel-filter:hover{background:#f8fafc}
.ct-controls-group{display:flex;align-items:center;gap:16px}
.ct-view-toggles{display:flex;border:1px solid #cbd5e1;border-radius:6px;overflow:hidden}
.ct-view-btn{background:transparent;border:none;padding:8px 12px;cursor:pointer;color:#64748b}
.ct-view-btn:first-child{border-right:1px solid #cbd5e1}
.ct-view-btn.active{background:#bfdbfe;color:#1e40af}
.ct-view-btn svg{width:18px;height:18px;stroke:currentColor;stroke-width:2;fill:none}
.ct-per-page{padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;cursor:pointer}

.ct-btn-filter{padding:8px 16px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-size:14px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:8px}
.ct-btn-filter:hover,.ct-btn-filter.active{background:#f1f5f9;border-color:#94a3b8}

.ct-filter-dropdown{display:block;width:100%;max-height:0;overflow:hidden;opacity:0;transition:all .3s ease;background:#fff;border-radius:12px;margin-top:0}
.ct-filter-dropdown.show{max-height:800px;opacity:1;margin-top:8px;margin-bottom:20px;border:1px solid #e2e8f0;box-shadow:0 10px 25px -5px rgba(0,0,0,.1)}
.ct-filter-dropdown-inner{padding:24px}
.ct-filter-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:16px;margin-bottom:24px}
.ct-filter-label{display:block;font-size:13px;color:#334155;margin-bottom:8px;font-weight:600}
.ct-filter-input,.ct-filter-select{width:100%;padding:10px;border:1px solid #e2e8f0;border-radius:6px;font-size:14px;outline:none;background:#fff;height:42px}
.ct-filter-input:focus,.ct-filter-select:focus{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.1)}
.ct-filter-actions{display:flex;gap:12px}

.ct-active-filters{display:none;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:14px 16px;margin-bottom:16px;flex-wrap:wrap;align-items:center;gap:10px}
.ct-active-filters.show{display:flex}
.ct-filter-chip{display:inline-flex;align-items:center;gap:6px;background:#e0e7ff;color:#3730a3;border-radius:20px;padding:4px 10px;font-size:12px}
.ct-chip-remove{background:none;border:none;cursor:pointer;color:#4338ca;font-size:14px}
.ct-clear-all-filters{margin-left:auto;background:none;border:none;color:#dc2626;font-size:13px;cursor:pointer}

.ct-contract-badge{display:inline-block;padding:4px 12px;border-radius:6px;font-size:13px;font-weight:600;background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe;margin-bottom:6px}
.ct-contract-title{font-size:14px;color:#1e293b;font-weight:500;line-height:1.4}
.ct-user-cell{display:flex;align-items:center;gap:10px}
.ct-avatar-img{width:32px;height:32px;border-radius:50%;object-fit:cover;border:1px solid #e2e8f0}
.ct-table-container{width:100%;overflow:auto;border:1px solid #e2e8f0;border-radius:8px;max-height:600px;display:block}
.ct-table{width:100%;border-collapse:collapse;text-align:left}
.ct-table th{background:#f8fafc;padding:12px 16px;font-size:13px;font-weight:600;color:#475569;border-bottom:1px solid #e2e8f0;position:sticky;top:0}
.ct-table td{padding:14px 16px;font-size:14px;color:#1e293b;border-bottom:1px solid #e2e8f0;vertical-align:top}

.ct-grid-container{display:none;grid-template-columns:repeat(2, 1fr);gap:16px;max-height:600px;overflow-y:auto;padding-bottom:16px}
.ct-grid-card{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:16px;display:flex;flex-direction:column;gap:12px;position:relative}
.ct-grid-header{display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:12px}
.ct-grid-body{display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:13px}
.ct-grid-label{color:#64748b;font-size:11px;text-transform:uppercase;margin-bottom:4px;display:block}
.ct-data-container.view-list .ct-table-container{display:block}
.ct-data-container.view-list .ct-grid-container{display:none}
.ct-data-container.view-grid .ct-table-container{display:none}
.ct-data-container.view-grid .ct-grid-container{display:grid}

.ct-status{display:inline-block;padding:4px 14px;border-radius:20px;font-size:13px;font-weight:600;background:#fff}
.ct-status.active{color:#10b981;border:1px solid #10b981}
.ct-status.expired,.ct-status.declined{color:#ef4444;border:1px solid #ef4444}
.ct-status.closed{color:#8b5cf6;border:1px solid #8b5cf6}
.ct-status.pending{color:#eab308;border:1px solid #eab308}

.ct-duration-cell{display:flex;flex-direction:column;gap:6px;min-width:200px;max-width:240px}
.ct-duration-header{display:flex;justify-content:space-between;align-items:flex-end}
.ct-duration-label{font-size:13px;font-weight:600;color:#334155}
.ct-duration-pct{font-size:12px;color:#64748b}
.ct-duration-dates{display:flex;align-items:center;gap:6px;font-size:13px;color:#334155;font-weight:500}
.ct-icon-cal{width:14px;height:14px;stroke:#64748b}
.ct-timeline-track{position:relative;height:6px;background:#e2e8f0;border-radius:3px;overflow:hidden;margin-top:4px}
.ct-timeline-fill{position:absolute;left:0;top:0;bottom:0;border-radius:3px}
.ct-timeline-fill.active,.ct-timeline-fill.closed{background:#10b981}
.ct-timeline-fill.expired,.ct-timeline-fill.declined{background:#ef4444}
.ct-timeline-fill.pending{background:#eab308}

.ct-action-wrapper{position:relative;display:flex;justify-content:center}
.ct-action-btn{background:none;border:none;font-size:20px;color:#64748b;cursor:pointer;padding:4px 8px;border-radius:4px;line-height:1}
.ct-action-btn:hover{background:#f1f5f9;color:#0f172a}
.ct-action-menu{display:none;position:absolute;right:0;top:100%;background:#fff;border:1px solid #e2e8f0;border-radius:6px;box-shadow:0 4px 12px rgba(0,0,0,.1);z-index:100;min-width:140px;flex-direction:column;padding:6px 0}
.ct-action-menu.show{display:flex}
.ct-action-menu button{background:none;border:none;padding:8px 16px;text-align:left;font-size:13px;color:#334155;cursor:pointer;width:100%;display:flex;align-items:center;gap:10px}
.ct-action-menu button:hover{background:#f1f5f9;color:#0f172a}
.ct-action-menu button.del{color:#dc2626}
.ct-action-menu button.del:hover{background:#fee2e2}
.ct-action-menu svg{width:16px;height:16px;stroke:currentColor;stroke-width:2;fill:none;flex-shrink:0}

.ct-pagination{display:flex;justify-content:space-between;align-items:center;padding-top:16px;margin-top:16px;border-top:1px solid #e2e8f0}
.ct-page-btn{padding:6px 12px;border:1px solid #cbd5e1;background:#fff;border-radius:4px;font-size:13px;cursor:pointer}
.ct-page-btn.active{background:#3b82f6;color:#fff;border-color:#3b82f6}
.ct-page-btn:disabled{opacity:.5}

@media(max-width:900px){
  .ct-filter-grid{grid-template-columns:repeat(3,1fr)}
}
@media(max-width:650px){
  .ct-grid-container{grid-template-columns:1fr}
}
@media(max-width:600px){
  .ct-filter-grid{grid-template-columns:1fr}
}
</style>

<div class="ct-topbar">
  <div class="ct-search-group">
    <input type="text" class="ct-search-input" id="searchInput" placeholder="Search contracts...">
    <button class="ct-btn-search" id="searchBtn">Search</button>
    <button class="ct-btn-clear" id="clearBtn">Clear</button>
  </div>
  <div class="ct-controls-group">
    <div class="ct-view-toggles">
      <button class="ct-view-btn active" id="listViewBtn"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/></svg></button>
      <button class="ct-view-btn" id="gridViewBtn"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
    </div>
    <select class="ct-per-page" id="perPageSelect">
      <option value="10">10 per page</option><option value="25">25 per page</option><option value="50" selected>50 per page</option>
    </select>
    <button class="ct-btn-filter" id="filterToggleBtn">
      Filters 
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
    </button>
  </div>
</div>

<div class="ct-filter-dropdown" id="filterDropdown">
  <div class="ct-filter-dropdown-inner">
    <div class="ct-filter-grid">
      <div><label class="ct-filter-label">Type</label><select class="ct-filter-select" id="filterType"><option value="">All</option><option value="Fixed Price">Fixed Price</option><option value="Hourly">Hourly</option></select></div>
      <div><label class="ct-filter-label">Status</label><select class="ct-filter-select" id="filterStatus"><option value="">All</option><option value="Active">Active</option><option value="Expired">Expired</option><option value="Closed">Closed</option><option value="Pending">Pending</option><option value="Declined">Declined</option></select></div>
      <div><label class="ct-filter-label">User</label><select class="ct-filter-select" id="filterUser"><option value="">All</option></select></div>
      <div><label class="ct-filter-label">Start Date</label><input type="date" class="ct-filter-input" id="filterStartDate"></div>
      <div><label class="ct-filter-label">End Date</label><input type="date" class="ct-filter-input" id="filterEndDate"></div>
    </div>
    <div class="ct-filter-actions"><button class="ct-btn-apply" id="filterApplyBtn">Apply</button><button class="ct-btn-cancel-filter" id="filterCancelBtn">Clear</button></div>
  </div>
</div>

<div class="ct-active-filters" id="activeFiltersBox">
  <span class="ct-filter-chip" style="background:none;border:none;padding:0;font-weight:600">Active Filters:</span>
  <span id="activeFiltersChips"></span>
  <button class="ct-clear-all-filters" id="clearAllFiltersBtn">Clear All</button>
</div>

<div class="ct-data-container view-list" id="dataContainer">
  <div class="ct-table-container">
    <table class="ct-table">
      <thead><tr><th>#</th><th>Contract Details</th><th>Assigned To</th><th>Status</th><th>Contract Duration</th><th>Contract Amount</th><th style="text-align:center"></th></tr></thead>
      <tbody id="tableBody"></tbody>
    </table>
  </div>
  <div class="ct-grid-container" id="gridContainer"></div>
</div>

<div class="ct-pagination"><div class="ct-page-info" id="pageInfo"></div><div class="ct-page-controls" id="pageControls"></div></div>

<script>
(function(){
  let seed=12345;
  const rnd=()=>{const x=Math.sin(seed++)*10000;return x-Math.floor(x)};
  const fn=["John","Jane","Mike","Sarah","Robert","Emily","David","Laura","James","Michael","Linda","William","Elizabeth","Richard","Susan"];
  const ln=["Doe","Smith","Johnson","Williams","Brown","Jones","Garcia","Miller","Davis","Rodriguez","Martinez","Hernandez","Lopez","Gonzalez","Wilson"];
  const sts=["Active","Pending","Closed","Declined"];
  const stCls={Active:"active",Expired:"expired",Closed:"closed",Pending:"pending",Declined:"declined"};
  const tps=["Fixed Price","Hourly"];
  const titles=["Compliance Management System","Social Media Analytics Dashboard","Manufacturing ERP Integration","Cloud Infrastructure Migration","Customer Portal Redesign","Data Warehouse Optimization"];
  const fmt=d=>d.getFullYear()+'-'+String(d.getMonth()+1).padStart(2,'0')+'-'+String(d.getDate()).padStart(2,'0');
  const fmtDur=m=>{const y=Math.floor(m/12);const rm=m%12;return (y>0?y+(y>1?' Years':' Year'):'')+(y>0&&rm>0?' ':'')+(rm>0?rm+(rm>1?' Months':' Month'):'')};
  const $=id=>document.getElementById(id);
  
  const all=Array.from({length:50},(_,i)=>{
    i++;
    const name=fn[Math.floor(rnd()*fn.length)]+' '+ln[Math.floor(rnd()*ln.length)];
    let st=sts[Math.floor(rnd()*sts.length)];
    const tp=tps[Math.floor(rnd()*tps.length)];
    const title=tp+' '+titles[Math.floor(rnd()*titles.length)];
    const startStr=`${2023+Math.floor(rnd()*2)}-${String(Math.floor(rnd()*12)+1).padStart(2,'0')}-${String(Math.floor(rnd()*28)+1).padStart(2,'0')}`;
    const durMonths=Math.floor(rnd()*24)+1;
    const endObj=new Date(startStr+'T00:00:00');endObj.setMonth(endObj.getMonth()+durMonths);
    const endDate=fmt(endObj);
    if(new Date()>endObj && st!=='Closed' && st!=='Declined') st='Expired';
    
    return {id:i,number:'CON'+String(i).padStart(4,'0'),contractName:title,assignedTo:name,avatarUrl:`https://i.pravatar.cc/150?img=${(i%70)+1}`,status:st,statusClass:stCls[st],duration:fmtDur(durMonths),amount:'$'+(Math.floor(rnd()*150000)+5000).toLocaleString('en-US')+'.00',type:tp,startDate:startStr,endDate:endDate};
  });

  const tableBody=$('tableBody'),gridContainer=$('gridContainer'),pageInfo=$('pageInfo'),pageControls=$('pageControls');
  const searchInput=$('searchInput'),filterType=$('filterType'),filterUser=$('filterUser'),filterStatus=$('filterStatus'),filterStartDate=$('filterStartDate'),filterEndDate=$('filterEndDate');
  const activeFiltersBox=$('activeFiltersBox'),activeFiltersChips=$('activeFiltersChips');
  [...new Set(all.map(c=>c.assignedTo))].sort().forEach(n=>filterUser.add(new Option(n,n)));
  
  let currentPage=1,itemsPerPage=50,searchTerm='',activeFilters={type:'',user:'',status:'',start:'',end:''},filtered=[...all];

  const buildTimeline=c=>{
    const today=new Date();today.setHours(0,0,0,0);
    const s=new Date(c.startDate+'T00:00:00'),e=new Date(c.endDate+'T00:00:00'),totalMs=e-s;
    let pct = totalMs<=0||today>=e ? 100 : today<=s ? 0 : Math.round(((today-s)/totalMs)*100);
    
    return `<div class="ct-duration-cell">
      <div class="ct-duration-header"><span class="ct-duration-label">${c.duration}</span><span class="ct-duration-pct">(${pct}%)</span></div>
      <div class="ct-duration-dates"><svg class="ct-icon-cal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>${c.startDate}</span> — <span>${c.endDate}</span></div>
      <div class="ct-timeline-track"><div class="ct-timeline-fill ${c.statusClass}" style="width:${pct}%"></div></div>
    </div>`;
  };

  const actionMenu = id => `
    <div class="ct-action-wrapper">
      <button class="ct-action-btn" onclick="window.toggleActionMenu(this)">⋮</button>
      <div class="ct-action-menu">
        <button onclick="window.handleAction('Duplicate', ${id})"><svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>Duplicate</button>
        <button onclick="window.handleAction('Preview', ${id})"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>Preview</button>
        <button onclick="window.handleAction('View', ${id})"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>View</button>
        <button onclick="window.handleAction('Edit', ${id})"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Edit</button>
        <button class="del" onclick="window.handleAction('Delete', ${id})"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>Delete</button>
      </div>
    </div>`;

  const render=()=>{
    const total=filtered.length,totalPages=Math.ceil(total/itemsPerPage)||1;
    currentPage=Math.max(1,Math.min(currentPage,totalPages));
    const start=(currentPage-1)*itemsPerPage,pageData=filtered.slice(start,start+itemsPerPage);
    
    tableBody.innerHTML='';gridContainer.innerHTML='';
    pageData.forEach(c=>{
      tableBody.insertAdjacentHTML('beforeend',`<tr><td>${c.id}</td><td><div class="ct-contract-badge">${c.number}</div><div class="ct-contract-title">${c.contractName}</div></td><td><div class="ct-user-cell"><img src="${c.avatarUrl}" class="ct-avatar-img" loading="lazy"><span>${c.assignedTo}</span></div></td><td><span class="ct-status ${c.statusClass}">${c.status}</span></td><td>${buildTimeline(c)}</td><td>${c.amount}</td><td>${actionMenu(c.id)}</td></tr>`);
      
      gridContainer.insertAdjacentHTML('beforeend',`<div class="ct-grid-card"><div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:12px"><div><div class="ct-contract-badge">${c.number}</div><div class="ct-contract-title">${c.contractName}</div></div>${actionMenu(c.id)}</div><div class="ct-grid-header"><span class="ct-grid-label">Status</span><span class="ct-status ${c.statusClass}">${c.status}</span></div><div class="ct-grid-body"><div><span class="ct-grid-label">User</span><div class="ct-user-cell"><img src="${c.avatarUrl}" class="ct-avatar-img" style="width:24px;height:24px"><span>${c.assignedTo}</span></div></div><div><span class="ct-grid-label">Amount</span><span>${c.amount}</span></div><div style="grid-column:1/-1">${buildTimeline(c)}</div></div></div>`);
    });

    pageInfo.textContent=total===0?'No contracts found':`Showing ${start+1}-${Math.min(start+itemsPerPage,total)} of ${total}`;
    pageControls.innerHTML='';
    if(totalPages>1){
      pageControls.innerHTML=`<button class="ct-page-btn" ${currentPage===1?'disabled':''} onclick="window.changePage(${currentPage-1})">Prev</button>`;
      for(let i=1;i<=totalPages;i++) pageControls.insertAdjacentHTML('beforeend',`<button class="ct-page-btn ${i===currentPage?'active':''}" onclick="window.changePage(${i})">${i}</button>`);
      pageControls.insertAdjacentHTML('beforeend',`<button class="ct-page-btn" ${currentPage===totalPages?'disabled':''} onclick="window.changePage(${currentPage+1})">Next</button>`);
    }
  };

  window.changePage=p=>{currentPage=p;render()};

  window.toggleActionMenu=btn=>{
    document.querySelectorAll('.ct-action-menu').forEach(m=>{if(m!==btn.nextElementSibling)m.classList.remove('show')});
    btn.nextElementSibling.classList.toggle('show');
  };

  window.handleAction=(action,id)=>{
    document.querySelectorAll('.ct-action-menu').forEach(m=>m.classList.remove('show'));
    alert(`${action} action triggered for Contract ID: ${id}`);
  };

  document.addEventListener('click',e=>{if(!e.target.closest('.ct-action-wrapper'))document.querySelectorAll('.ct-action-menu').forEach(m=>m.classList.remove('show'))});

  window.applyFilters=()=>{
    let res=[...all];
    if(searchTerm){const t=searchTerm.toLowerCase();res=res.filter(c=>c.number.toLowerCase().includes(t)||c.assignedTo.toLowerCase().includes(t)||c.status.toLowerCase().includes(t)||c.contractName.toLowerCase().includes(t))}
    if(activeFilters.status)res=res.filter(c=>c.status===activeFilters.status);
    if(activeFilters.user)res=res.filter(c=>c.assignedTo===activeFilters.user);
    if(activeFilters.type)res=res.filter(c=>c.contractName.includes(activeFilters.type));
    if(activeFilters.start)res=res.filter(c=>c.startDate>=activeFilters.start);
    if(activeFilters.end)res=res.filter(c=>c.startDate<=activeFilters.end);
    
    filtered=res;currentPage=1;
    activeFiltersChips.innerHTML='';
    const chips=Object.entries(activeFilters).filter(([_,v])=>v);
    activeFiltersBox.classList.toggle('show',chips.length>0);
    chips.forEach(([k,v])=>activeFiltersChips.insertAdjacentHTML('beforeend',`<span class="ct-filter-chip">${k}: ${v}<button class="ct-chip-remove" onclick="window.removeFilter('${k}')">&times;</button></span>`));
    render();
  };

  window.removeFilter=k=>{
    activeFilters[k]='';
    if(k==='type')filterType.value='';if(k==='user')filterUser.value='';if(k==='status')filterStatus.value='';if(k==='start')filterStartDate.value='';if(k==='end')filterEndDate.value='';
    applyFilters();
  };

  $('searchBtn').onclick=()=>{searchTerm=searchInput.value;applyFilters()};
  $('clearBtn').onclick=()=>{searchInput.value='';searchTerm='';applyFilters()};
  $('filterToggleBtn').onclick=()=>$('filterDropdown').classList.toggle('show');
  $('filterCancelBtn').onclick=()=>{['type','user','status','start','end'].forEach(k=>removeFilter(k));$('filterDropdown').classList.remove('show')};
  $('filterApplyBtn').onclick=()=>{
    activeFilters={type:filterType.value,user:filterUser.value,status:filterStatus.value,start:filterStartDate.value,end:filterEndDate.value};
    $('filterDropdown').classList.remove('show');applyFilters();
  };
  $('clearAllFiltersBtn').onclick=()=>$('filterCancelBtn').click();
  $('perPageSelect').onchange=e=>{itemsPerPage=+e.target.value;currentPage=1;render()};
  
  $('listViewBtn').onclick=()=>{$('listViewBtn').classList.add('active');$('gridViewBtn').classList.remove('active');$('dataContainer').className='ct-data-container view-list'};
  $('gridViewBtn').onclick=()=>{$('gridViewBtn').classList.add('active');$('listViewBtn').classList.remove('active');$('dataContainer').className='ct-data-container view-grid'};

  render();
})();
</script>
</section>