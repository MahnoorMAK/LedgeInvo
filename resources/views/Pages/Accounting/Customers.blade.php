@extends('layout.dashboard')

@section('title', 'Customer-Management')

@section('content')
<!-- ============================================================
     MANAGE CUSTOMERS PAGE (OVERLAP FIXED)
     ============================================================ -->
<div class="page-wrapper">
  
  <div class="page-header">
    <div>
      <h1>Manage Customers</h1>
      <p>Manage your customers, view details and perform actions.</p>
    </div>
    <button class="btn-create" onclick="window.location.href='/create-customer'">
      <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg> 
      Create Customer
    </button>
  </div>

  <section class="ct-section">
    <style>
      .page-wrapper { max-width: 1400px; margin: 0 auto; font-family: system-ui, -apple-system, sans-serif; color: #0f172a; padding: 24px 24px 40px 24px; }
      .page-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
      .page-header h1 { font-size: 24px; font-weight: 600; margin-bottom: 6px; color: #111827; }
      .page-header p { font-size: 14px; color: #6b7280; }
      .btn-create { display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: #3b82f6; color: #fff; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; }
      .btn-create svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }

      .ct-section { background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.05); border: 1px solid #e2e8f0; }
      .ct-section * { box-sizing: border-box; margin: 0; padding: 0; }
      
      .ct-topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 16px; }
      .ct-search-group { display: flex; gap: 10px; flex: 1; max-width: 400px; position: relative; }
      .ct-search-group svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; stroke: #9ca3af; fill: none; stroke-width: 2; }
      .ct-search-input { width: 100%; padding: 10px 12px 10px 36px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
      .ct-btn-search { padding: 10px 20px; background: #3b82f6; color: #fff; border: none; border-radius: 6px; font-weight: 500; cursor: pointer; }
      
      .ct-controls { display: flex; align-items: center; gap: 16px; }
      .ct-view-toggles { display: flex; border: 1px solid #cbd5e1; border-radius: 6px; overflow: hidden; }
      .ct-view-btn { background: transparent; border: none; padding: 8px 12px; cursor: pointer; display: flex; align-items: center; justify-content: center; color: #64748b; }
      .ct-view-btn:first-child { border-right: 1px solid #cbd5e1; }
      .ct-view-btn.active { background: #bfdbfe; color: #1e40af; }
      .ct-view-btn svg { width: 18px; height: 18px; stroke: currentColor; stroke-width: 2; fill: none; }
      .ct-per-page { padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; }
      .ct-btn-filter { padding: 8px 16px; background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; font-weight: 500; cursor: pointer; display: flex; align-items: center; gap: 8px; }

      .ct-filter-panel { display: none; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; margin-bottom: 20px; }
      .ct-filter-panel.show { display: block; }
      .ct-filter-row { display: flex; flex-wrap: wrap; gap: 16px; align-items: flex-end; }
      .ct-filter-item { flex: 1; min-width: 200px; display: flex; flex-direction: column; gap: 8px; }
      .ct-filter-label { font-size: 13px; font-weight: 600; color: #475569; }
      .ct-filter-input { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; }
      .ct-filter-actions { display: flex; gap: 10px; margin-left: auto; margin-top: 10px; }
      .ct-btn-apply { padding: 10px 24px; background: #3b82f6; color: #fff; border: none; border-radius: 6px; font-weight: 500; cursor: pointer; }
      .ct-btn-cancel { padding: 10px 24px; background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; font-weight: 500; cursor: pointer; }

      /* Table - Overlap fixed */
      .ct-table-wrapper { width: 100%; overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; }
      .ct-table { width: 100%; border-collapse: collapse; table-layout: fixed; text-align: left; }
      
      /* Adjusted Widths to prevent overlap */
      .ct-table th:nth-child(1) { width: 18%; } /* User */
      .ct-table th:nth-child(2) { width: 12%; } /* Code */
      .ct-table th:nth-child(3) { width: 16%; } /* Company */
      .ct-table th:nth-child(4) { width: 16%; } /* Contact */
      .ct-table th:nth-child(5) { width: 22%; } /* Email - wider */
      .ct-table th:nth-child(6) { width: 12%; } /* Tax */
      .ct-table th:nth-child(7) { width: 4%; }  /* Actions */

      .ct-table th, .ct-table td { padding: 16px 12px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
      
      /* Crucial fix for overlapping text */
      .ct-table td { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

      .ct-table th { background: #f8fafc; font-size: 13px; font-weight: 600; color: #4b5563; border-bottom: 1px solid #e2e8f0; }
      .ct-table tbody tr:hover { background: #f8fafc; }
      
      .ct-user-cell { display: flex; align-items: center; gap: 12px; }
      .ct-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0; flex-shrink: 0; }
      .ct-user-name { font-weight: 500; color: #111827; overflow: hidden; text-overflow: ellipsis; }
      .ct-user-code { font-size: 12px; color: #6b7280; display: none; }
      .ct-badge-code { background: #eff6ff; color: #1d4ed8; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600; border: 1px solid #bfdbfe; white-space: nowrap; }
      .ct-text { color: #374151; overflow: hidden; text-overflow: ellipsis; display: block; }
      .ct-email { color: #3b82f6; overflow: hidden; text-overflow: ellipsis; display: block; }

      .ct-action-menu { position: relative; display: inline-flex; justify-content: center; width: 100%; }
      .ct-action-btn { background: transparent; border: none; cursor: pointer; color: #64748b; padding: 6px; }
      .ct-action-btn svg { width: 18px; height: 18px; fill: currentColor; }
      .ct-action-dropdown { display: none; position: absolute; right: 0; top: 100%; background: #fff; border: 1px solid #e2e8f0; border-radius: 6px; box-shadow: 0 4px 6px rgba(0,0,0,.1); z-index: 20; min-width: 160px; padding: 4px 0; }
      .ct-action-dropdown.show { display: block; }
      .ct-action-item { display: flex; align-items: center; gap: 8px; padding: 8px 16px; font-size: 13px; color: #334155; cursor: pointer; white-space: nowrap; }
      .ct-action-item:hover { background: #f8fafc; }
      .ct-action-item svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

      .ct-grid-container { display: none; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; }
      .ct-grid-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; display: flex; flex-direction: column; gap: 12px; }
      .ct-grid-header { display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; }
      .ct-grid-body { display: flex; flex-direction: column; gap: 8px; font-size: 13px; }
      .ct-grid-row { display: flex; justify-content: space-between; gap: 10px; }
      .ct-grid-label { color: #6b7280; flex-shrink: 0; }
      .ct-grid-value { font-weight: 500; color: #111827; text-align: right; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

      .ct-data-container.view-list .ct-table-wrapper { display: block; } .ct-data-container.view-list .ct-grid-container { display: none; }
      .ct-data-container.view-grid .ct-table-wrapper { display: none; } .ct-data-container.view-grid .ct-grid-container { display: grid; }
      .ct-pagination { display: flex; justify-content: space-between; align-items: center; padding-top: 20px; margin-top: 10px; border-top: 1px solid #e2e8f0; flex-wrap: wrap; gap: 16px; }
      .ct-page-info { font-size: 14px; color: #64748b; }
      .ct-page-controls { display: flex; gap: 6px; }
      .ct-page-btn, .ct-page-num { padding: 8px 14px; border: 1px solid #e2e8f0; background: #fff; border-radius: 6px; font-size: 14px; font-weight: 500; color: #475569; cursor: pointer; }
      .ct-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }
      .ct-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
    </style>

    <div class="ct-topbar">
      <div class="ct-search-group">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" class="ct-search-input" id="searchInput" placeholder="Search customers...">
        <button class="ct-btn-search" id="searchBtn">Search</button>
      </div>
      <div class="ct-controls">
        <div class="ct-view-toggles">
          <button class="ct-view-btn active" id="listViewBtn"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></button>
          <button class="ct-view-btn" id="gridViewBtn"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></button>
        </div>
        <select class="ct-per-page" id="perPageSelect"><option value="10">10 per page</option><option value="25">25 per page</option><option value="50">50 per page</option><option value="100">100 per page</option></select>
        <button class="ct-btn-filter" id="filterToggleBtn"><svg viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> Filters</button>
      </div>
    </div>

    <div class="ct-filter-panel" id="filterPanel">
      <div class="ct-filter-row">
        <div class="ct-filter-item"><label class="ct-filter-label">Customer Code</label><input type="text" class="ct-filter-input" id="filterCode" placeholder="Filter by customer code"></div>
        <div class="ct-filter-item"><label class="ct-filter-label">Company Name</label><input type="text" class="ct-filter-input" id="filterCompany" placeholder="Filter by company name"></div>
        <div class="ct-filter-item"><label class="ct-filter-label">Tax Number</label><input type="text" class="ct-filter-input" id="filterTax" placeholder="Filter by tax number"></div>
        <div class="ct-filter-actions"><button class="ct-btn-apply" id="applyFilterBtn">Apply</button><button class="ct-btn-cancel" id="cancelFilterBtn">Cancel</button></div>
      </div>
    </div>

    <div class="ct-data-container view-list" id="dataContainer">
      <div class="ct-table-wrapper">
        <table class="ct-table">
          <thead>
            <tr>
              <th>User</th>
              <th>Customer Code</th>
              <th>Company Name</th>
              <th>Contact Person</th>
              <th>Email</th>
              <th>Tax Number</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>
      <div class="ct-grid-container" id="gridContainer"></div>
    </div>

    <div class="ct-pagination">
      <div class="ct-page-info" id="pageInfo">Showing 0 of 0 results</div>
      <div class="ct-page-controls" id="pageControls"></div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var fNames = ["John","Jane","Michael","Emily","David","Sarah","James","Emma","William","Olivia"];
        var lNames = ["Doe","Smith","Johnson","Brown","Jones","Garcia","Miller","Davis","Rodriguez","Martinez"];
        var comps = ["Acme Corp","Globex","Initech","Umbrella Corp","Stark Industries","Wayne Enterprises","Wonka Industries","Soylent Corp","Massive Dynamic","Cyberdyne Systems"];
        
        var allData = [];
        for (var i = 0; i < 100; i++) {
          var f = fNames[i % 10], l = lNames[i % 10], c = comps[i % 10] + " " + (Math.floor(i/10)+1);
          var gen = (i % 2 === 0) ? "men" : "women";
          allData.push({
            name: f + " " + l, 
            code: "CUS-" + String(i+1).padStart(4,'0'), 
            company: c, 
            contact: f + " " + l,
            email: f.toLowerCase() + "." + l.toLowerCase() + "@" + c.split(' ')[0].toLowerCase() + ".com",
            tax: "TAX-" + (Math.floor(Math.random()*900000)+100000),
            avatar: "https://randomuser.me/api/portraits/" + gen + "/" + ((i%90)+1) + ".jpg"
          });
        }

        var currentData = allData.slice();
        var perPage = 10;
        var page = 1;
        var tbody = document.getElementById('tableBody');
        var grid = document.getElementById('gridContainer');
        
        var menu = '<div class="ct-action-menu"><button class="ct-action-btn" onclick="toggleMenu(this)"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg></button><div class="ct-action-dropdown"><a class="ct-action-item"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg> View Reports</a><a class="ct-action-item"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> View</a><a class="ct-action-item"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit</a></div></div>';

        function render() {
          var total = currentData.length;
          var totalP = Math.ceil(total / perPage) || 1;
          if (page > totalP) page = totalP;
          if (page < 1) page = 1;
          
          var start = (page - 1) * perPage;
          var end = Math.min(start + perPage, total);
          var data = currentData.slice(start, end);

          if (data.length === 0) {
            tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:24px">No customers found.</td></tr>';
            grid.innerHTML = '';
          } else {
            var tHtml = '';
            var gHtml = '';
            for (var j = 0; j < data.length; j++) {
              var r = data[j];
              
              // Fixed HTML to use .ct-text and .ct-email classes for proper truncation
              tHtml += '<tr>' +
                '<td><div class="ct-user-cell"><img src="' + r.avatar + '" class="ct-avatar"><span class="ct-user-name">' + r.name + '</span></div></td>' +
                '<td><span class="ct-badge-code">' + r.code + '</span></td>' +
                '<td><span class="ct-text" title="' + r.company + '">' + r.company + '</span></td>' +
                '<td><span class="ct-text" title="' + r.contact + '">' + r.contact + '</span></td>' +
                '<td><span class="ct-email" title="' + r.email + '">' + r.email + '</span></td>' +
                '<td><span class="ct-text" title="' + r.tax + '">' + r.tax + '</span></td>' +
                '<td>' + menu + '</td>' +
              '</tr>';
              
              gHtml += '<div class="ct-grid-card"><div class="ct-grid-header"><div class="ct-user-cell"><img src="' + r.avatar + '" class="ct-avatar"><div><span class="ct-user-name">' + r.name + '</span><br><span class="ct-user-code">' + r.code + '</span></div></div>' + menu + '</div><div class="ct-grid-body"><div class="ct-grid-row"><span class="ct-grid-label">Company</span><span class="ct-grid-value" title="' + r.company + '">' + r.company + '</span></div><div class="ct-grid-row"><span class="ct-grid-label">Contact</span><span class="ct-grid-value" title="' + r.contact + '">' + r.contact + '</span></div><div class="ct-grid-row"><span class="ct-grid-label">Email</span><span class="ct-grid-value" style="color:#3b82f6" title="' + r.email + '">' + r.email + '</span></div><div class="ct-grid-row"><span class="ct-grid-label">Tax</span><span class="ct-grid-value">' + r.tax + '</span></div></div></div>';
            }
            tbody.innerHTML = tHtml;
            grid.innerHTML = gHtml;
          }

          document.getElementById('pageInfo').textContent = 'Showing ' + (total === 0 ? 0 : start + 1) + ' to ' + end + ' of ' + total + ' results (Page ' + page + ' of ' + totalP + ')';
          
          var ctrl = '<button class="ct-page-btn" onclick="changePage(' + (page - 1) + ')" ' + (page === 1 ? 'disabled' : '') + '>Previous</button>';
          for (var k = 1; k <= totalP; k++) {
            ctrl += '<button class="ct-page-num ' + (k === page ? 'active' : '') + '" onclick="changePage(' + k + ')">' + k + '</button>';
          }
          ctrl += '<button class="ct-page-btn" onclick="changePage(' + (page + 1) + ')" ' + (page === totalP ? 'disabled' : '') + '>Next</button>';
          document.getElementById('pageControls').innerHTML = ctrl;
        }

        function applyFilter() {
          var q = document.getElementById('searchInput').value.toLowerCase();
          var c = document.getElementById('filterCode').value.toLowerCase();
          var n = document.getElementById('filterCompany').value.toLowerCase();
          var t = document.getElementById('filterTax').value.toLowerCase();

          currentData = allData.filter(function(r) {
            return (r.name.toLowerCase().indexOf(q) !== -1 || r.code.toLowerCase().indexOf(q) !== -1 || r.email.toLowerCase().indexOf(q) !== -1) &&
                   (!c || r.code.toLowerCase().indexOf(c) !== -1) && 
                   (!n || r.company.toLowerCase().indexOf(n) !== -1) && 
                   (!t || r.tax.toLowerCase().indexOf(t) !== -1);
          });
          page = 1;
          render();
        }

        window.changePage = function(p) { page = p; render(); };
        window.toggleMenu = function(btn) {
          var drops = document.querySelectorAll('.ct-action-dropdown');
          for (var i = 0; i < drops.length; i++) {
            if (drops[i] !== btn.nextElementSibling) drops[i].classList.remove('show');
          }
          btn.nextElementSibling.classList.toggle('show');
        };

        document.addEventListener('click', function(e) {
          if (!e.target.closest('.ct-action-menu')) {
            var drops = document.querySelectorAll('.ct-action-dropdown');
            for (var i = 0; i < drops.length; i++) drops[i].classList.remove('show');
          }
        });

        document.getElementById('searchBtn').onclick = applyFilter;
        document.getElementById('searchInput').onkeyup = function(e) { if (e.key === 'Enter') applyFilter(); };
        document.getElementById('perPageSelect').onchange = function(e) { perPage = parseInt(e.target.value); page = 1; render(); };
        
        document.getElementById('filterToggleBtn').onclick = function() { document.getElementById('filterPanel').classList.toggle('show'); };
        document.getElementById('applyFilterBtn').onclick = function() { applyFilter(); document.getElementById('filterPanel').classList.remove('show'); };
        document.getElementById('cancelFilterBtn').onclick = function() {
          document.getElementById('filterCode').value = '';
          document.getElementById('filterCompany').value = '';
          document.getElementById('filterTax').value = '';
          applyFilter();
          document.getElementById('filterPanel').classList.remove('show');
        };
        
        document.getElementById('listViewBtn').onclick = function() {
          document.getElementById('listViewBtn').classList.add('active');
          document.getElementById('gridViewBtn').classList.remove('active');
          document.getElementById('dataContainer').className = 'ct-data-container view-list';
        };
        document.getElementById('gridViewBtn').onclick = function() {
          document.getElementById('gridViewBtn').classList.add('active');
          document.getElementById('listViewBtn').classList.remove('active');
          document.getElementById('dataContainer').className = 'ct-data-container view-grid';
        };

        applyFilter();
      });
    </script>
  </section>
</div>
@endsection