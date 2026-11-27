@extends('layout.Fizadashboard')

@section('title', 'Create Purchase Return')

@section('content')
<style>
    :root {
      --purple-main: #7c3aed;
      --purple-light: #a78bfa;
      --purple-dark: #5b21b6;
      --purple-soft: #8b5cf6;
      --purple-bg: #f8f6fc;
      --text-main: #1f2937;
      --text-muted: #6b7280;
      --border-color: #e5e7eb;
    }

    .pr-container {
      background-color: var(--purple-bg);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-main);
      padding: 25px;
      border-radius: 12px;
      margin: -20px 0 0 0; 
      box-sizing: border-box;
      width: 100%;
      overflow-x: hidden; /* Side se bahar nikalne se rokta hai */
    }

    .page-header { margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;}
    .page-header h1 { font-size: 24px; color: var(--purple-dark); margin: 0 0 5px 0; font-weight: 700; }
    .page-header p { color: var(--text-muted); font-size: 14px; margin: 0; }

    .page-layout { display: flex; gap: 25px; align-items: flex-start; flex-wrap: wrap; width: 100%; }
    .main-content { flex: 2; min-width: 350px; }
    .side-content { flex: 1; min-width: 300px; display: flex; flex-direction: column; gap: 20px; }

    /* === 3D BLINKING CARDS === */
    .card {
      background: #fff; border-radius: 12px; padding: 25px;
      border: 1px solid rgba(167, 139, 250, 0.3);
      box-shadow: 0 10px 20px rgba(124, 58, 237, 0.1), 0 0 0 1px rgba(167, 139, 250, 0.1);
      transition: all 0.4s ease;
      animation: purpleBlink 3s infinite alternate;
      margin-bottom: 20px;
      box-sizing: border-box;
      width: 100%;
    }

    @keyframes purpleBlink {
      0% { box-shadow: 0 10px 20px rgba(124, 58, 237, 0.1), 0 0 0 1px rgba(167, 139, 250, 0.1); }
      100% { box-shadow: 0 15px 35px rgba(124, 58, 237, 0.4), 0 0 25px rgba(167, 139, 250, 0.5); }
    }

    .card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 25px; border-bottom: 1px solid var(--border-color); padding-bottom: 15px; }
    .card-header h2 { font-size: 16px; margin: 0; color: var(--purple-dark); font-weight: 600; }
    .icon-box { background: #ede9fe; color: var(--purple-main); padding: 8px; border-radius: 8px; display: flex; }

    /* === FIXED 2-COLUMN LAYOUT (No Overlapping) === */
    .form-row { 
      display: flex; 
      flex-wrap: wrap; 
      margin: 0 -12px; /* Gap manage karne ke liye negative margin */
      width: calc(100% + 24px);
    }
    
    .form-group { 
      flex: 0 0 50%; /* 2 boxes in one line */
      max-width: 50%;
      padding: 0 12px; /* Boxes ke darmiyan gap */
      box-sizing: border-box;
      margin-bottom: 20px; /* Lines ke darmiyan gap */
    }
    
    .form-group label { 
      display: block; 
      font-size: 13px; 
      font-weight: 600; 
      color: var(--purple-dark); 
      margin-bottom: 8px; 
    }
    
    .form-control {
      width: 100%; padding: 10px 12px; border: 1px solid var(--border-color); border-radius: 8px;
      font-size: 14px; color: var(--text-main); background-color: #fafafa; box-sizing: border-box;
      outline: none; transition: 0.3s;
    }
    .form-control:focus {
      border-color: var(--purple-main); box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2); background-color: #fff;
    }

    /* === CUSTOM DROPDOWN CSS === */
    .custom-dropdown {
      position: relative;
      user-select: none;
      width: 100%;
    }
    
    .custom-dropdown-select {
      width: 100%; padding: 10px 12px; border: 1px solid var(--border-color); border-radius: 8px;
      font-size: 14px; color: var(--text-main); background-color: #fafafa; cursor: pointer;
      display: flex; justify-content: space-between; align-items: center; transition: 0.3s;
      box-sizing: border-box;
    }
    .custom-dropdown-select:hover {
      border-color: var(--purple-main);
    }
    .custom-dropdown.active .custom-dropdown-select {
      border-color: var(--purple-main); box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
    }

    .custom-dropdown-menu {
      position: absolute; top: 100%; left: 0; right: 0;
      background: #fff; border: 1px solid var(--border-color); border-radius: 8px;
      margin-top: 5px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      z-index: 100; display: none; max-height: 200px; overflow-y: auto;
    }
    .custom-dropdown.active .custom-dropdown-menu {
      display: block;
    }

    .custom-dropdown-item {
      padding: 10px 12px; font-size: 14px; color: var(--text-main); cursor: pointer; transition: 0.2s;
    }
    
    .custom-dropdown-item:hover {
      background-color: var(--purple-soft); color: white;
    }
    .custom-dropdown-item.selected {
      background-color: var(--purple-soft); color: white; font-weight: 600;
    }

    .custom-dropdown.has-value .custom-dropdown-select {
      background-color: #f3e8ff; 
      color: var(--purple-dark); 
      font-weight: 600; 
      border-color: var(--purple-light);
    }

    .custom-dropdown input[type="hidden"] { display: none; }

    /* Right Side Summary */
    .summary-row { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px; color: var(--text-muted); }
    .summary-row.total { font-weight: bold; color: var(--text-main); font-size: 16px; margin-top: 15px; padding-top: 15px; border-top: 1px dashed var(--border-color); }
    .text-purple { color: var(--purple-main); font-weight: 700; }
    .notes-area { width: 100%; resize: vertical; min-height: 100px; box-sizing: border-box; }

    /* Buttons */
    .btn-create {
      width: 100%; padding: 12px; background: linear-gradient(135deg, var(--purple-main), var(--purple-light));
      color: white; border: none; border-radius: 8px; font-weight: bold; font-size: 15px; cursor: pointer;
      margin-bottom: 10px; box-shadow: 0 5px 0 var(--purple-dark), 0 10px 15px rgba(124,58,237,0.3);
      transition: all 0.1s; animation: btnBlink 2s infinite alternate; box-sizing: border-box;
    }
    @keyframes btnBlink {
      0% { box-shadow: 0 5px 0 var(--purple-dark), 0 10px 15px rgba(124,58,237,0.3); }
      100% { box-shadow: 0 5px 0 var(--purple-dark), 0 0 25px rgba(167,139,250,0.8); }
    }
    .btn-create:active { transform: translateY(5px); box-shadow: 0 0 0 var(--purple-dark); }

    .btn-cancel {
      width: 100%; padding: 12px; background: #fff; color: var(--text-muted); border: 1px solid var(--border-color);
      border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s; box-sizing: border-box;
    }
    .btn-cancel:hover { background: #f3f4f6; color: var(--text-main); }

    .btn-back {
      display: inline-flex; align-items: center; padding: 8px 16px; background: #fff; border: 1px solid var(--border-color);
      border-radius: 8px; text-decoration: none; color: var(--text-main); font-size: 14px; font-weight: 500; transition: 0.3s;
    }
    .btn-back:hover { background: #f9fafb; box-shadow: 0 4px 10px rgba(124, 58, 237, 0.1); }

    /* Mobile Responsive (1 Column) */
    @media (max-width: 768px) {
        .form-group { flex: 0 0 100%; max-width: 100%; }
        .form-row { margin: 0; width: 100%; }
    }
</style>

<div class="pr-container">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Create Purchase Return</h1>
            <p>Initiate a purchase return from a previously posted invoice. Select invoice, specify quantities to return, warehouse, and reasons.</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn-back">&larr; Back</a>
    </div>

    <!-- Main Layout -->
    <div class="page-layout">
        
        <!-- Left Side: Form Details -->
        <div class="main-content">
            <div class="card">
                <div class="card-header">
                    <div class="icon-box">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h2>Purchase Return Details</h2>
                </div>

                <form action="" method="POST" id="returnForm">
                    @csrf
                    <div class="form-row">
                        <!-- Date Box -->
                        <div class="form-group">
                            <label>Return Date *</label>
                            <input type="date" name="return_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        
                        <!-- Invoice Box -->
                        <div class="form-group">
                            <label>Original Invoice *</label>
                            <div class="custom-dropdown" data-name="invoice_id" id="invoiceDropdown">
                                <div class="custom-dropdown-select">
                                    <span class="selected-text">Select Invoice</span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="inv1">INV-001</div>
                                    <div class="custom-dropdown-item" data-value="inv2">INV-002</div>
                                </div>
                                <input type="hidden" name="invoice_id" required>
                            </div>
                        </div>

                        <!-- Warehouse Box -->
                        <div class="form-group">
                            <label>Warehouse *</label>
                            <div class="custom-dropdown" data-name="warehouse_id" id="warehouseDropdown">
                                <div class="custom-dropdown-select">
                                    <span class="selected-text">Select Warehouse</span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="wh1">Main Warehouse</div>
                                    <div class="custom-dropdown-item" data-value="wh2">Secondary Warehouse</div>
                                </div>
                                <input type="hidden" name="warehouse_id" required>
                            </div>
                        </div>

                        <!-- Reason Box -->
                        <div class="form-group">
                            <label>Return Reason *</label>
                            <div class="custom-dropdown" data-name="reason" id="reasonDropdown">
                                <div class="custom-dropdown-select">
                                    <span class="selected-text">Select Reason</span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="defective">Defective</div>
                                    <div class="custom-dropdown-item" data-value="wrong">Wrong Item</div>
                                    <div class="custom-dropdown-item" data-value="damaged">Damaged in Transit</div>
                                </div>
                                <input type="hidden" name="reason" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side: Summary & Notes -->
        <div class="side-content">
            <div class="card">
                <div class="card-header">
                    <div class="icon-box">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h2>Return Summary</h2>
                </div>
                
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$0.00</span>
                </div>
                <div class="summary-row total">
                    <span>Total Amount</span>
                    <span class="text-purple">$0.00</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="icon-box">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h2>Additional Notes</h2>
                </div>
                <div class="form-group" style="padding: 0; margin: 0;">
                    <label>Notes</label>
                    <textarea name="notes" class="form-control notes-area" placeholder="Additional notes..."></textarea>
                </div>
            </div>

            <div class="card">
                <p style="font-size: 13px; color: var(--text-muted); margin-top:0;">
                    <span style="color:var(--purple-main); font-weight:bold;">0</span> items selected for return
                </p>
                <button type="button" id="createReturnBtn" class="btn-create">Create Return</button>
                <button type="button" onclick="window.history.back()" class="btn-cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdowns = document.querySelectorAll('.custom-dropdown');

        dropdowns.forEach(dropdown => {
            const selectBox = dropdown.querySelector('.custom-dropdown-select');
            const items = dropdown.querySelectorAll('.custom-dropdown-item');
            const hiddenInput = dropdown.querySelector('input[type="hidden"]');
            const selectedText = dropdown.querySelector('.selected-text');

            selectBox.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdowns.forEach(d => { if (d !== dropdown) d.classList.remove('active'); });
                dropdown.classList.toggle('active');
            });

            items.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.stopPropagation();
                    items.forEach(i => i.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedText.textContent = this.textContent;
                    hiddenInput.value = this.getAttribute('data-value');
                    dropdown.classList.add('has-value');
                    dropdown.classList.remove('active');
                });
            });
        });

        document.addEventListener('click', function() {
            dropdowns.forEach(d => d.classList.remove('active'));
        });

        const returnBtn = document.getElementById('createReturnBtn');
        if(returnBtn) {
            returnBtn.addEventListener('click', function(e) {
                e.preventDefault(); 
                this.style.transform = "translateY(5px)";
                this.style.boxShadow = "0 0 0 var(--purple-dark)";
                setTimeout(() => {
                    this.style.transform = "translateY(0)";
                    alert("Purchase Return Created Successfully!");
                }, 150);
            });
        }
    });
</script>
@endsection