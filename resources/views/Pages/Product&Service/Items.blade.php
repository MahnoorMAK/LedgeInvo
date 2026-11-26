@extends('layout.dashboard')
@section('title', 'Item Details - LedgeInvo')

@section('content')
<style>
    /* 1. NUCLEAR RESET FOR PARENT LAYOUT */
    body, html, #app, main, .main-content, .content-wrapper, .page-wrapper, .container-fluid {
        background-color: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
        overflow-x: hidden;
    }
    
    /* 2. PAGE SPECIFIC STYLES */
    .item-page-wrapper {
        font-family: system-ui, -apple-system, sans-serif;
        background: #ffffff;
        padding: 24px 32px;
        color: #0f172a;
        box-sizing: border-box;
        min-height: 100vh;
        width: 100%;
        display: block !important; /* Forces display */
    }
    .item-page-wrapper * { box-sizing: border-box; }

    /* Header */
    .item-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
    .item-header h1 { font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0; }
    .item-header p { font-size: 13px; color: #64748b; margin: 0; }
    .btn-back { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; color: #475569; font-weight: 500; font-size: 13px; text-decoration: none; transition: 0.2s; cursor: pointer; }
    .btn-back:hover { background: #f8fafc; color: #0f172a; border-color: #94a3b8; }

    /* Grid */
    .item-grid { display: grid; grid-template-columns: 1fr 1.8fr; gap: 24px; align-items: start; }

    /* Cards */
    .item-card { border: 1px solid #e2e8f0; border-radius: 8px; background: #ffffff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); margin-bottom: 24px; }
    .item-card-header { padding: 12px 16px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: #64748b; background: #f8fafc; }
    .item-card-header svg { width: 16px; height: 16px; stroke: #94a3b8; fill: none; stroke-width: 2; }
    .item-card-body { padding: 16px; }

    /* Images */
    .main-image-container { display: flex; justify-content: center; align-items: center; padding: 32px; background: #f8fafc; border-radius: 8px; border: 1px dashed #cbd5e1; min-height: 250px; }
    .main-image { max-width: 100%; height: auto; object-fit: contain; max-height: 250px; border-radius: 4px; display: block; }
    
    .thumb-container { position: relative; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; justify-content: center; align-items: center; min-height: 200px; overflow: hidden; }
    .thumb-image { max-width: 100%; height: auto; object-fit: contain; max-height: 200px; display: block; }

    /* Tags & Titles */
    .tag-container { display: flex; gap: 8px; margin-bottom: 12px; }
    .tag { font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .tag-blue { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
    .tag-orange { background: #ffedd5; color: #c2410c; border: 1px solid #fed7aa; }
    .product-title { font-size: 24px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; }
    .product-sku { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #64748b; margin-bottom: 24px; }
    .product-sku svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2; }

    /* Stats */
    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-bottom: 24px; }
    .stat-box { padding: 16px; border-radius: 8px; border: 1px solid transparent; }
    .stat-box.green { background: #f0fdf4; border-color: #bbf7d0; }
    .stat-box.blue { background: #eff6ff; border-color: #bfdbfe; }
    .stat-box.orange { background: #fff7ed; border-color: #fed7aa; }
    .stat-label { display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 600; margin-bottom: 8px; }
    .stat-label svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2; }
    .stat-box.green .stat-label { color: #166534; }
    .stat-box.blue .stat-label { color: #1e40af; }
    .stat-box.orange .stat-label { color: #9a3412; }
    .stat-value { font-size: 22px; font-weight: 700; }
    .stat-box.green .stat-value { color: #15803d; }
    .stat-box.blue .stat-value { color: #1d4ed8; }
    .stat-box.orange .stat-value { color: #ea580c; }

    /* Warehouse */
    .warehouse-list { display: flex; flex-direction: column; gap: 8px; }
    .warehouse-item { display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; color: #334155; }
    .warehouse-badge { background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600; }

    /* Bottom Details */
    .bottom-details-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; }
    .detail-label { display: flex; align-items: center; gap: 6px; color: #64748b; font-size: 12px; font-weight: 600; margin-bottom: 6px; }
    .detail-label svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2; }
    .detail-value { color: #1e293b; font-weight: 600; font-size: 14px; }
    .tax-badges { display: flex; gap: 8px; flex-wrap: wrap; }
    .tax-badge { border: 1px solid #cbd5e1; padding: 4px 10px; border-radius: 20px; font-size: 12px; color: #475569; background: #fff; }

    .description-box { border: 1px solid #e2e8f0; border-radius: 6px; padding: 12px 16px; font-size: 14px; color: #334155; line-height: 1.5; background: #f8fafc; }

    @media (max-width: 900px) {
        .item-grid { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: 1fr; }
        .bottom-details-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="item-page-wrapper">
    <div class="item-header">
        <div>
            <h1>Item Details</h1>
            <p>View comprehensive details, pricing and stock levels for this item.</p>
        </div>
        <a href="{{ route('Items') }}" class="btn-back">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back
        </a>
    </div>

    <div class="item-grid">
        <!-- LEFT COLUMN (IMAGES) -->
        <div class="item-left-col">
            <div class="item-card">
                <div class="item-card-header">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Product Image
                </div>
                <div class="item-card-body" style="padding: 24px;">
                    <div class="main-image-container">
                        <!-- Embedded SVG for the Plant Pot -->
                        <svg class="main-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 50 80 L 150 80 L 140 180 C 140 190, 60 190, 60 180 Z" fill="#d9774b" />
                            <ellipse cx="100" cy="80" rx="50" ry="10" fill="#c05a30" />
                            <path d="M 40 80 L 160 80 L 155 95 C 155 100, 45 100, 45 95 Z" fill="#b84f26" />
                            <path d="M 0 190 Q 100 170, 200 190 L 200 200 L 0 200 Z" fill="#e5e7eb" />
                            <ellipse cx="100" cy="195" rx="70" ry="15" fill="#d1d5db" opacity="0.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="item-card">
                <div class="item-card-header">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Additional Images
                </div>
                <div class="item-card-body" style="padding: 24px;">
                    <div class="thumb-container">
                        <span style="position: absolute; top: 12px; left: 12px; background: #1e293b; color: #fff; font-size: 12px; font-weight: 500; padding: 4px 10px; border-radius: 4px; z-index: 10;">2 / 3</span>
                        <div style="position: absolute; top: 12px; right: 12px; display: flex; gap: 8px; z-index: 10;">
                            <button style="background:#fff; border:1px solid #cbd5e1; border-radius:4px; padding:6px; cursor:pointer; display:flex;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                            <button style="background:#fff; border:1px solid #cbd5e1; border-radius:4px; padding:6px; cursor:pointer; display:flex;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                        </div>
                        <!-- Embedded SVG for the Alternate Angle -->
                        <svg class="thumb-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 50 100 L 150 100 L 140 180 C 140 190, 60 190, 60 180 Z" fill="#d9774b" />
                            <ellipse cx="100" cy="100" rx="50" ry="10" fill="#c05a30" />
                            <path d="M 40 100 L 160 100 L 155 115 C 155 120, 45 120, 45 115 Z" fill="#b84f26" />
                            <path d="M 0 190 Q 100 170, 200 190 L 200 200 L 0 200 Z" fill="#e5e7eb" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN (DETAILS) -->
        <div class="item-right-col">
            <div class="item-card">
                <div class="item-card-body" style="padding: 24px;">
                    <div class="tag-container">
                        <span class="tag tag-blue">Product</span>
                        <span class="tag tag-orange">Home & Garden</span>
                    </div>
                    
                    <h2 class="product-title">Plant Pot</h2>
                    
                    <div class="product-sku">
                        <svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        SKU: HOME-PROD-012
                    </div>

                    <div class="stats-grid">
                        <div class="stat-box green">
                            <div class="stat-label">
                                <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                Sale Price
                            </div>
                            <div class="stat-value">$24.99</div>
                        </div>
                        <div class="stat-box blue">
                            <div class="stat-label">
                                <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                Purchase Price
                            </div>
                            <div class="stat-value">$12.00</div>
                        </div>
                        <div class="stat-box orange">
                            <div class="stat-label">
                                <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                Total Stock
                            </div>
                            <div class="stat-value">34</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-card">
                <div class="item-card-header">
                    <svg viewBox="0 0 24 24"><path d="M3 21h18"></path><path d="M5 21V7l8-4 8 4v14"></path><path d="M9 10a2 2 0 1 1-4 0v11h4z"></path><path d="M19 10a2 2 0 1 1-4 0v11h4z"></path></svg>
                    Warehouse Stock Allocation
                </div>
                <div class="item-card-body" style="padding: 16px;">
                    <div class="warehouse-list">
                        <div class="warehouse-item"><span>West Coast Storage Facility</span><span class="warehouse-badge">24</span></div>
                        <div class="warehouse-item"><span>East Coast Logistics Hub</span><span class="warehouse-badge">10</span></div>
                    </div>
                </div>
            </div>

            <div class="bottom-details-grid">
                <div>
                    <div class="detail-label">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        Unit of Measurement
                    </div>
                    <div class="detail-value">Pot</div>
                </div>
                <div>
                    <div class="detail-label">
                        <svg viewBox="0 0 24 24"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
                        Taxes
                    </div>
                    <div class="tax-badges">
                        <span class="tax-badge">GST (18.00%)</span>
                        <span class="tax-badge">VAT (12.00%)</span>
                    </div>
                </div>
            </div>

            <div class="item-card">
                <div class="item-card-header">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Short Description
                </div>
                <div class="item-card-body" style="padding: 16px;">
                    <div class="description-box">
                        Decorative ceramic plant pot perfect for indoor plant cultivation with drainage
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection