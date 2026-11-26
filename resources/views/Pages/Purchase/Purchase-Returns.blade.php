@extends('layout.dashboard')
@section('title', 'Purchase Return Details - LedgeInvo')

@section('content')
@verbatim
<style>
    /* Global Reset to remove parent margins and backgrounds */
    body, html, #app, main, .main-content, .content-wrapper, .page-wrapper, .container-fluid {
        background-color: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
    }

    .pr-detail-section {
        font-family: system-ui, -apple-system, sans-serif;
        background: #ffffff;
        padding: 24px 32px;
        color: #0f172a;
        box-sizing: border-box;
        min-height: 100vh;
        width: 100%;
    }
    .pr-detail-section * { box-sizing: border-box; }

    /* Header */
    .pr-detail-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px; flex-wrap: wrap; gap: 16px; }
    .pr-detail-header h1 { font-size: 24px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0; }
    .pr-detail-header p { font-size: 14px; color: #64748b; margin: 0; }

    /* Layout Grid */
    .pr-detail-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start; }

    /* Cards */
    .pr-detail-card { border: 1px solid #e2e8f0; border-radius: 8px; background: #ffffff; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px; }
    .pr-detail-card-header { padding: 16px 20px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #ffffff; }
    .pr-detail-card-header h2 { font-size: 16px; font-weight: 600; color: #1e293b; margin: 0; }
    .pr-detail-card-body { padding: 20px; }

    /* Info Rows */
    .pr-info-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f1f5f9; }
    .pr-info-row:last-child { border-bottom: none; padding-bottom: 0; }
    .pr-info-label { color: #64748b; font-size: 14px; }
    .pr-info-value { color: #1e293b; font-weight: 500; font-size: 14px; text-align: right; }

    /* Vendor Box */
    .pr-vendor-box { display: flex; align-items: center; gap: 16px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9; }
    .pr-vendor-avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; background: #e2e8f0; }
    .pr-vendor-details h3 { margin: 0 0 4px 0; font-size: 16px; color: #1e293b; }
    .pr-vendor-details p { margin: 0; font-size: 14px; color: #64748b; }

    /* Table */
    .pr-detail-table { width: 100%; border-collapse: collapse; }
    .pr-detail-table th { text-align: left; padding: 12px 20px; background: #ffffff; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; }
    .pr-detail-table td { padding: 16px 20px; border-bottom: 1px solid #f1f5f9; color: #334155; font-size: 14px; }
    .pr-detail-table tr:last-child td { border-bottom: none; }

    /* Status Badges */
    .pr-badge { display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; }
    .pr-badge.completed { background: #dcfce7; color: #166534; }
    .pr-badge.approved { background: #dbeafe; color: #1e40af; }
    .pr-badge.drafted { background: #f1f5f9; color: #475569; }

    /* Buttons */
    .pr-btn-back { display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; color: #475569; font-weight: 500; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.2s; }
    .pr-btn-back:hover { background: #f8fafc; color: #0f172a; border-color: #94a3b8; }

    /* --- CUSTOM MODAL STYLES --- */
    .custom-modal-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
        display: none; 
        align-items: center; justify-content: center;
        z-index: 9999;
    }
    .custom-modal-overlay.active { display: flex; }
    
    .custom-modal {
        background: #ffffff;
        border-radius: 12px;
        padding: 24px;
        width: 100%;
        max-width: 440px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        font-family: system-ui, -apple-system, sans-serif;
        animation: modalFadeIn 0.2s ease-out;
    }
    
    @keyframes modalFadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    .custom-modal h3 { margin: 0 0 8px 0; font-size: 18px; font-weight: 600; color: #0f172a; }
    .custom-modal p { margin: 0 0 24px 0; font-size: 14px; color: #64748b; }
    .custom-modal-actions { display: flex; justify-content: flex-end; gap: 12px; }
    .custom-btn { padding: 8px 16px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; border: none; transition: all 0.2s; }
    .custom-btn.cancel { background: #ffffff; border: 1px solid #cbd5e1; color: #475569; }
    .custom-btn.cancel:hover { background: #f8fafc; border-color: #94a3b8; }
    .custom-btn.danger { background: #ef4444; color: #ffffff; }
    .custom-btn.danger:hover { background: #dc2626; }

    @media (max-width: 900px) {
        .pr-detail-grid { grid-template-columns: 1fr; }
        .pr-detail-section { padding: 16px; }
    }
</style>
@endverbatim

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.documentElement.style.setProperty('background-color', '#ffffff', 'important');
        document.body.style.setProperty('background-color', '#ffffff', 'important');
        document.body.style.setProperty('margin', '0', 'important');
        document.body.style.setProperty('padding', '0', 'important');

        let container = document.querySelector('.pr-detail-section');
        if (container) {
            let parent = container.parentElement;
            for (let i = 0; i < 3; i++) {
                if (parent) {
                    parent.style.setProperty('background-color', '#ffffff', 'important');
                    parent.style.setProperty('margin', '0', 'important');
                    parent.style.setProperty('padding', '0', 'important');
                    parent.style.setProperty('width', '100%', 'important');
                    parent.style.setProperty('max-width', '100%', 'important');
                    parent = parent.parentElement;
                }
            }
        }
    });
</script>

<div class="pr-detail-section">
    
    <!-- Header -->
    <div class="pr-detail-header">
        <div>
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                <h1>Purchase Return #PR-2023-{{ str_pad($id, 3, '0', STR_PAD_LEFT) }}</h1>
                <span class="pr-badge approved">Approved</span>
            </div>
            <p>View item details, vendor information, and return summary.</p>
        </div>
        <a href="{{ route('PurchaseReturns') }}" class="pr-btn-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Returns
        </a>
    </div>

    <!-- Main Grid -->
    <div class="pr-detail-grid">
        
        <!-- Left Column -->
        <div class="pr-detail-left">
            <!-- Items Card -->
            <div class="pr-detail-card">
                <div class="pr-detail-card-header">
                    <h2>Return Items</h2>
                </div>
                <table class="pr-detail-table">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th style="text-align:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="returnItemsTableBody">
                        <tr>
                            <td>
                                <div style="font-weight: 500; color: #1e293b;">Laptop Pro 15"</div>
                                <div style="font-size: 12px; color: #64748b; margin-top: 4px;">SKU: LAP-PRO-15</div>
                            </td>
                            <td>2</td>
                            <td>$1,200.00</td>
                            <td style="font-weight: 600; color: #1e293b;">$2,400.00</td>
                            <td style="text-align:right;">
                                <button onclick="triggerDeleteModal(this)" style="background:none; border:none; cursor:pointer; color:#ef4444; padding:6px;" title="Delete Item">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-weight: 500; color: #1e293b;">Wireless Mouse</div>
                                <div style="font-size: 12px; color: #64748b; margin-top: 4px;">SKU: MOU-WRL-01</div>
                            </td>
                            <td>2</td>
                            <td>$45.00</td>
                            <td style="font-weight: 600; color: #1e293b;">$90.00</td>
                            <td style="text-align:right;">
                                <button onclick="triggerDeleteModal(this)" style="background:none; border:none; cursor:pointer; color:#ef4444; padding:6px;" title="Delete Item">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding: 20px; border-top: 1px solid #e2e8f0; background: #f8fafc;">
                    <div style="display: flex; justify-content: flex-end; gap: 32px; margin-bottom: 8px;">
                        <span style="color: #64748b; font-size: 14px;">Subtotal:</span>
                        <span style="font-weight: 500; font-size: 14px; color: #1e293b; width: 80px; text-align: right;">$2,490.00</span>
                    </div>
                    <div style="display: flex; justify-content: flex-end; gap: 32px; margin-bottom: 8px;">
                        <span style="color: #64748b; font-size: 14px;">Tax (10%):</span>
                        <span style="font-weight: 500; font-size: 14px; color: #1e293b; width: 80px; text-align: right;">$249.00</span>
                    </div>
                    <div style="display: flex; justify-content: flex-end; gap: 32px; border-top: 1px solid #cbd5e1; padding-top: 12px; margin-top: 12px;">
                        <span style="font-weight: 600; font-size: 16px; color: #0f172a;">Total Amount:</span>
                        <span style="font-weight: 700; font-size: 16px; color: #0ea5e9; width: 80px; text-align: right;">$2,739.00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="pr-detail-right">
            <!-- Vendor Card -->
            <div class="pr-detail-card">
                <div class="pr-detail-card-header">
                    <h2>Vendor Details</h2>
                </div>
                <div class="pr-detail-card-body">
                    <div class="pr-vendor-box">
                        <img src="https://randomuser.me/api/portraits/men/30.jpg" alt="Vendor" class="pr-vendor-avatar">
                        <div class="pr-vendor-details">
                            <h3>Workers United</h3>
                            <p>contact@workersunited.com</p>
                        </div>
                    </div>
                    <div class="pr-info-row">
                        <span class="pr-info-label">Phone</span>
                        <span class="pr-info-value">+1 (555) 123-4567</span>
                    </div>
                    <div class="pr-info-row">
                        <span class="pr-info-label">Address</span>
                        <span class="pr-info-value">8-102, Ahmedabad<br>India</span>
                    </div>
                </div>
            </div>

            <!-- Return Summary Card -->
            <div class="pr-detail-card">
                <div class="pr-detail-card-header">
                    <h2>Return Summary</h2>
                </div>
                <div class="pr-detail-card-body">
                    <div class="pr-info-row">
                        <span class="pr-info-label">Return Date</span>
                        <span class="pr-info-value">Dec 28, 2023</span>
                    </div>
                    <div class="pr-info-row">
                        <span class="pr-info-label">Warehouse</span>
                        <span class="pr-info-value">
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 20px; font-size: 12px;">Main Hub</span>
                        </span>
                    </div>
                    <div class="pr-info-row">
                        <span class="pr-info-label">Reference No.</span>
                        <span class="pr-info-value">REF-{{ str_pad($id * 137, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="pr-info-row">
                        <span class="pr-info-label">Created By</span>
                        <span class="pr-info-value">Admin User</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- ========================================== -->
<!-- CUSTOM DELETE MODAL (HIDDEN BY DEFAULT)  -->
<!-- ========================================== -->
<div class="custom-modal-overlay" id="deleteModal">
    <div class="custom-modal">
        <h3>Delete Transfer</h3>
        <p>Are you sure you want to delete this transfer?</p>
        <div class="custom-modal-actions">
            <button class="custom-btn cancel" onclick="closeDeleteModal()">Cancel</button>
            <button class="custom-btn danger" onclick="confirmDelete()">Delete</button>
        </div>
    </div>
</div>

<script>
    let rowToDelete = null;

    // Triggered when the trash button is clicked
    window.triggerDeleteModal = function(btn) {
        // Find the closest table row (tr) and save it
        rowToDelete = btn.closest('tr');
        document.getElementById('deleteModal').classList.add('active');
    };

    window.closeDeleteModal = function() {
        document.getElementById('deleteModal').classList.remove('active');
        rowToDelete = null;
    };

    window.confirmDelete = function() {
        if (rowToDelete) {
            // Physically remove the row from the HTML table
            rowToDelete.remove();
            
            // Optional: Check if table is empty and show a message
            const tbody = document.getElementById('returnItemsTableBody');
            if (tbody.children.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:32px; color:#64748b;">No items left in this return.</td></tr>';
            }
        }
        closeDeleteModal();
    };

    // Close modal if user clicks outside of the white box
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>
@endsection