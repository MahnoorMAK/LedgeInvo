@extends('layout.Fizadashboard') 

@section('content')
<style>
    /* =========================================
       BACKGROUND (Page khulte hi form dikhega)
       ========================================= */
    .modal-background {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: #f8fafc; /* Light clean background */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* =========================================
       EXACT FORM DESIGN
       ========================================= */
    .transfer-modal {
        background: #ffffff; 
        width: 100%; 
        max-width: 520px;
        border-radius: 12px; 
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Soft shadow */
        border: 1px solid #e2e8f0;
        margin: 20px;
    }

    /* Header */
    .modal-header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin-bottom: 20px; 
        border-bottom: 1px solid #e2e8f0; 
        padding-bottom: 15px; 
    }
    .modal-header h2 { 
        font-size: 18px; 
        font-weight: 600; 
        margin: 0; 
        color: #0f172a; 
    }
    .btn-close { 
        background: none; border: none; font-size: 22px; 
        color: #94a3b8; cursor: pointer; transition: 0.3s;
    }
    .btn-close:hover { color: #ef4444; }

    /* Form Fields */
    .form-group { margin-bottom: 18px; display: flex; flex-direction: column; position: relative; }
    .form-group label { font-size: 13px; font-weight: 600; margin-bottom: 8px; color: #1e293b; }
    .required { color: #ef4444; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }

    .form-input { 
        width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; 
        border-radius: 8px; font-size: 14px; outline: none; 
        transition: 0.3s; color: #1e293b; box-sizing: border-box; 
        background: white; 
    }
    .form-input:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
    .form-input:disabled { background: #f8fafc; cursor: not-allowed; border-color: #e2e8f0; color: #94a3b8; }

    /* Custom Dropdown (Purple Hover) */
    .custom-dropdown { position: relative; width: 100%; user-select: none; }
    .custom-dropdown-select { 
        width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; 
        border-radius: 8px; font-size: 14px; background: white; 
        cursor: pointer; display: flex; justify-content: space-between; 
        align-items: center; color: #64748b; transition: 0.3s;
    }
    .custom-dropdown-select:hover:not(.disabled) { border-color: #10b981; }
    .custom-dropdown.active .custom-dropdown-select { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
    .custom-dropdown.disabled .custom-dropdown-select { background: #f8fafc; color: #94a3b8; cursor: not-allowed; border-color: #e2e8f0; }

    .custom-dropdown-menu { 
        position: absolute; top: 100%; left: 0; right: 0; background: white; 
        border: 1px solid #cbd5e1; border-radius: 8px; margin-top: 5px; 
        box-shadow: 0 10px 20px rgba(0,0,0,0.1); z-index: 100; 
        display: none; max-height: 200px; overflow-y: auto; 
    }
    .custom-dropdown.active .custom-dropdown-menu { display: block; }
    
    /* Yahan Purple Hover laga hai */
    .custom-dropdown-item { 
        padding: 10px 12px; font-size: 14px; cursor: pointer; 
        color: #1e293b; transition: 0.2s;
    }
    .custom-dropdown-item:hover { background: #f3e8ff; color: #7c3aed; }
    .custom-dropdown-item.selected { background: #7c3aed; color: white; }
    
    .custom-dropdown input[type="hidden"] { display: none; }

    /* Footer Buttons */
    .modal-footer { 
        display: flex; justify-content: flex-end; gap: 12px; 
        margin-top: 25px; padding-top: 15px; border-top: 1px solid #e2e8f0; 
    }
    .btn-cancel { 
        background: white; color: #475569; border: 1px solid #cbd5e1; 
        padding: 10px 20px; border-radius: 8px; font-weight: 500; 
        cursor: pointer; transition: 0.3s; 
    }
    .btn-cancel:hover { background: #f1f5f9; }
    
    /* Exact Green Create Button */
    .btn-create { 
        background: #10b981; color: white; border: none; 
        padding: 10px 20px; border-radius: 8px; font-weight: 500; 
        cursor: pointer; transition: 0.2s; 
    }
    .btn-create:hover { background: #059669; }

    @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }
</style>

<!-- Background overlay jo form ko center mein rakhega -->
<div class="modal-background">
    
    <!-- Form Box -->
    <div class="transfer-modal">
        <div class="modal-header">
            <h2>Create Transfer</h2>
            <!-- Close button (Goes back) -->
            <button class="btn-close" onclick="window.history.back()">&times;</button>
        </div>

        <form action="" method="Post">
            
            <!-- From Warehouse -->
            <div class="form-group">
                <label>From Warehouse</label>
                <div class="custom-dropdown" id="fromWh">
                    <div class="custom-dropdown-select" onclick="toggleDropdown('fromWh')">
                        <span class="selected-text">Select warehouse</span>
                        <span style="font-size: 10px;">▼</span>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item" onclick="selectItem('fromWh', 'Main Warehouse', 'wh1')">Main Warehouse</div>
                        <div class="custom-dropdown-item" onclick="selectItem('fromWh', 'Secondary Warehouse', 'wh2')">Secondary Warehouse</div>
                    </div>
                    <input type="hidden" name="from_warehouse" id="fromWhInput" required>
                </div>
            </div>

            <!-- To Warehouse -->
            <div class="form-group">
                <label>To Warehouse</label>
                <div class="custom-dropdown disabled" id="toWh">
                    <div class="custom-dropdown-select" onclick="toggleDropdown('toWh')">
                        <span class="selected-text">Select from warehouse first</span>
                        <span style="font-size: 10px;">▼</span>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item" onclick="selectItem('toWh', 'Secondary Warehouse', 'wh2')">Secondary Warehouse</div>
                        <div class="custom-dropdown-item" onclick="selectItem('toWh', 'Third Warehouse', 'wh3')">Third Warehouse</div>
                    </div>
                    <input type="hidden" name="to_warehouse" id="toWhInput" required>
                </div>
            </div>

            <!-- Product -->
            <div class="form-group">
                <label>Product</label>
                <div class="custom-dropdown disabled" id="prodDd">
                    <div class="custom-dropdown-select" onclick="toggleDropdown('prodDd')">
                        <span class="selected-text">Select from warehouse first</span>
                        <span style="font-size: 10px;">▼</span>
                    </div>
                    <div class="custom-dropdown-menu">
                        <div class="custom-dropdown-item" onclick="selectItem('prodDd', 'T-Shirt (TS-001)', 'p1')">T-Shirt (TS-001)</div>
                        <div class="custom-dropdown-item" onclick="selectItem('prodDd', 'Car Engine (CE-002)', 'p2')">Car Engine (CE-002)</div>
                    </div>
                    <input type="hidden" name="product" id="prodInput" required>
                </div>
            </div>

            <!-- Quantity & Date -->
            <div class="form-row">
                <div class="form-group">
                    <label>Quantity <span class="required">*</span></label>
                    <input type="number" name="quantity" class="form-input" id="qtyInput" placeholder="Select product first" disabled required>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-input" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn-create">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- =========================================
     JAVASCRIPT (Fully Working)
     ========================================= -->
<script>
    function toggleDropdown(id) {
        var dd = document.getElementById(id);
        if(dd.classList.contains('disabled')) return;
        
        // Close others
        var all = document.querySelectorAll('.custom-dropdown');
        for(var i=0; i<all.length; i++) {
            if(all[i].id !== id) all[i].classList.remove('active');
        }
        dd.classList.toggle('active');
    }

    function selectItem(dropdownId, text, value) {
        var dd = document.getElementById(dropdownId);
        dd.querySelector('.selected-text').textContent = text;
        dd.querySelector('input[type="hidden"]').value = value;
        dd.classList.remove('active');

        // Flow Logic
        if(dropdownId === 'fromWh') {
            document.getElementById('toWh').classList.remove('disabled');
            document.getElementById('prodDd').classList.remove('disabled');
            document.getElementById('toWh').querySelector('.selected-text').textContent = "Select warehouse";
            document.getElementById('prodDd').querySelector('.selected-text').textContent = "Select product";
        }
        
        if(dropdownId === 'prodDd') {
            var qty = document.getElementById('qtyInput');
            qty.disabled = false;
            qty.placeholder = "Enter quantity";
            qty.focus();
        }
    }

    document.addEventListener('click', function(e) {
        if(!e.target.closest('.custom-dropdown-select')) {
            var all = document.querySelectorAll('.custom-dropdown');
            for(var i=0; i<all.length; i++) {
                all[i].classList.remove('active');
            }
        }
    });
</script>
@endsectionp