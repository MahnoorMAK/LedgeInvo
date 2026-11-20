@extends('layout.dashboard')
@section('title', 'Purchase Return View')
@section('content')
<section style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f8f9fa; color: #1e293b; padding: 2rem; font-size: 14px; min-height: 100vh; box-sizing: border-box;">

    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
        <div>
            <h1 style="font-size: 1.25rem; font-weight: 600; margin: 0 0 0.25rem 0;">Purchase Return #PR-2026-02-012</h1>
            <p style="color: #64748b; font-size: 0.875rem; margin: 0;">View items returned, debit amount, approval state, and vendor address info.</p>
        </div>
        <button style="background-color: #ffffff; border: 1px solid #e2e8f0; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; color: #1e293b; font-weight: 500;">
            <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back
        </button>
    </div>

    <!-- Layout Grid -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">

        <!-- Left Column -->
        <div>
            <!-- Billing Card -->
            <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div style="width: 32px; height: 32px; border-radius: 6px; background-color: #e0f2f1; color: #0f766e; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"/></svg>
                    </div>
                    <h2 style="font-size: 1rem; font-weight: 600; margin: 0;">Billing & Shipping Addresses</h2>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <h3 style="font-size: 0.875rem; color: #64748b; font-weight: 500; margin: 0 0 0.75rem 0;">Billed To</h3>
                        <p style="margin: 0 0 0.25rem 0; line-height: 1.4; font-weight: 600;">WorkDo</p>
                        <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">8-102, Orbit Heights, Lakeview Lane</p>
                        <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">Ahmedabad, Gujarat 380015</p>
                        <p style="margin: 0; line-height: 1.4;">India</p>
                    </div>
                    <div>
                        <h3 style="font-size: 0.875rem; color: #64748b; font-weight: 500; margin: 0 0 0.75rem 0;">Billed From</h3>
                        <p style="margin: 0 0 0.25rem 0; line-height: 1.4; font-weight: 600;">Sam Supplier</p>
                        <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">sam.supplier@vendor.com</p>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 1rem;">
                            <div>
                                <h3 style="font-size: 0.875rem; color: #64748b; font-weight: 500; margin: 0 0 0.75rem 0;">Billing Address</h3>
                                <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">Reta Swanandri</p>
                                <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">7816 Heathcote Vista</p>
                                <p style="margin: 0; line-height: 1.4;">Port Miller, Idaho 77534-4354</p>
                            </div>
                            <div>
                                <h3 style="font-size: 0.875rem; color: #64748b; font-weight: 500; margin: 0 0 0.75rem 0;">Shipping Address</h3>
                                <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">Rose Schamberger</p>
                                <p style="margin: 0 0 0.25rem 0; line-height: 1.4;">5367 Ross Tunnel</p>
                                <p style="margin: 0; line-height: 1.4;">Weberborough, Massachusetts 22195-0725</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Return Items Card -->
            <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div style="width: 32px; height: 32px; border-radius: 6px; background-color: #e0f2f1; color: #0f766e; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                    </div>
                    <h2 style="font-size: 1rem; font-weight: 600; margin: 0;">Return Items</h2>
                </div>

                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
                    <thead>
                        <tr>
                            <th style="text-align: left; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Product</th>
                            <th style="text-align: left; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Qty</th>
                            <th style="text-align: left; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Unit Price</th>
                            <th style="text-align: left; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Discount</th>
                            <th style="text-align: left; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Tax</th>
                            <th style="text-align: right; padding: 1rem 0; border-bottom: 1px solid #e2e8f0; color: #64748b; font-weight: 500; font-size: 0.875rem;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top;">
                                <div style="display: flex; gap: 1rem; align-items: flex-start;">
                                    <div style="width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">⌚</div>
                                    <div>
                                        <h4 style="font-weight: 600; margin: 0 0 0.25rem 0;">Watch</h4>
                                        <p style="font-size: 0.75rem; color: #64748b; margin: 0 0 0.25rem 0;">SKU: JEWEL-PROD-033</p>
                                        <p style="font-size: 0.75rem; color: #64748b; margin: 0;">Elegant stainless steel watch with water resistance and precision quartz movement</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top;">1</td>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top;">$120.00</td>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top;">-</td>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top;">
                                45.00%<br>
                                <span style="font-size: 0.75rem; color: #64748b;">($54.00)</span>
                            </td>
                            <td style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0; vertical-align: top; text-align: right;">$174.00</td>
                        </tr>
                    </tbody>
                </table>

                <div style="display: flex; justify-content: flex-end; border-top: 1px solid #e2e8f0; padding-top: 1rem;">
                    <div style="width: 300px;">
                        <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; color: #64748b;">
                            <span>Subtotal</span>
                            <span>$120.00</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; color: #64748b;">
                            <span>Tax</span>
                            <span>$54.00</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; border-top: 1px solid #e2e8f0; margin-top: 0.5rem; padding-top: 1rem; font-weight: 600; color: #1e293b; font-size: 1.1rem;">
                            <span>Total Return Amount</span>
                            <span style="color: #10b981;">$174.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column (Sidebar) -->
        <div>
            <!-- Summary & Actions -->
            <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div style="width: 32px; height: 32px; border-radius: 6px; background-color: #e0f2f1; color: #0f766e; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h2 style="font-size: 1rem; font-weight: 600; margin: 0;">Summary & Actions</h2>
                </div>
                <p style="color: #64748b; font-size: 0.875rem; margin: 0;">Total Return Amount</p>
                <div style="font-size: 2rem; font-weight: 700; margin: 1rem 0;">$174.00</div>
                <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 500; background-color: #e0e7ff; color: #4338ca;">Completed</span>
            </div>

            <!-- Vendor Info -->
            <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div style="width: 32px; height: 32px; border-radius: 6px; background-color: #e0f2f1; color: #0f766e; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h2 style="font-size: 1rem; font-weight: 600; margin: 0;">Vendor Info</h2>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">👨🏽‍💼</div>
                    <div>
                        <p style="font-weight: 600; margin: 0;">Sam Supplier</p>
                        <p style="font-size: 0.875rem; color: #64748b; margin: 0;">sam.supplier@vendor.com</p>
                    </div>
                </div>
            </div>

            <!-- Return Details -->
            <div style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                    <div style="width: 32px; height: 32px; border-radius: 6px; background-color: #e0f2f1; color: #0f766e; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <h2 style="font-size: 1rem; font-weight: 600; margin: 0;">Return Details</h2>
                </div>

                <div style="margin-top: 1rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; color: #64748b; font-size: 0.875rem;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <span>Return Date</span>
                        <span style="color: #1e293b; font-weight: 500; margin-left: auto;">2026-07-06</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; color: #64748b; font-size: 0.875rem;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        <span>Warehouse</span>
                        <span style="background-color: #e0e7ff; color: #4338ca; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.75rem; margin-left: auto;">Central Distribution Center</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem; color: #64748b; font-size: 0.875rem;">
                        <svg style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        <span>Reason</span>
                        <span style="color: #1e293b; font-weight: 500; margin-left: auto;">Other</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection