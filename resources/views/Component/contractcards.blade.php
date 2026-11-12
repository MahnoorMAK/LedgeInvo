<!-- ============================================================
     MANAGE CONTRACTS - STAT CARDS SECTION (SOFT LIGHT SHADES)
     Clean, flat, professional accounting dashboard style.
     ============================================================ -->
<section class="manage-contracts-section" aria-label="Manage Contracts">
  <style>
    /* Scoped styles for the component */
    .manage-contracts-section {
      position: relative;
      width: 100%;
      /* Removed min-height to eliminate unnecessary vertical space */
      background-color: #f8fafc;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      /* No top padding - removes extra space at the start of the page */
      padding: 0 24px 0 24px;
      box-sizing: border-box;
      display: flex;
      justify-content: center;
    }

    .manage-contracts-section *,
    .manage-contracts-section *::before,
    .manage-contracts-section *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .mc-container {
      width: 100%;
      max-width: 1200px;
    }

    /* ---------- Header Section ---------- */
    .mc-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      /* Reduced bottom margin to tighten the space above cards */
      margin-bottom: 16px;
    }

    .mc-header-text h1 {
      font-size: 20px;
      font-weight: 600;
      color: #0f172a;
      margin-bottom: 4px;
    }

    .mc-header-text p {
      font-size: 14px;
      color: #64748b;
    }

    .mc-add-btn {
      width: 40px;
      height: 40px;
      background-color: #10b981;
      border: none;
      border-radius: 6px;
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background-color 0.2s ease;
      flex-shrink: 0;
    }

    .mc-add-btn:hover {
      background-color: #059669;
    }

    .mc-add-btn svg {
      width: 20px;
      height: 20px;
      stroke: currentColor;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      fill: none;
    }

    /* ---------- Cards Grid ---------- */
    .mc-cards {
      display: flex;
      gap: 16px;
      width: 100%;
    }

    /* ---------- Individual Card ---------- */
    .mc-card {
      flex: 1;
      min-width: 0;
      border-radius: 12px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      position: relative;
      border: 1px solid transparent;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .mc-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.08);
    }

    /* Card Top Row */
    .mc-card-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 12px;
    }

    .mc-card-title {
      font-size: 14px;
      font-weight: 600;
      line-height: 1.3;
      max-width: 75%;
    }

    .mc-card-icon {
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .mc-card-icon svg {
      width: 24px;
      height: 24px;
      stroke: currentColor;
      stroke-width: 2;
      fill: none;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    /* Card Value */
    .mc-card-value {
      font-size: 32px;
      font-weight: 700;
      line-height: 1;
      margin-bottom: 6px;
    }

    /* Card Subtitle */
    .mc-card-subtitle {
      font-size: 12px;
      font-weight: 500;
      opacity: 0.85;
    }

    /* ---------- Card Light Pastel Color Themes ---------- */

    /* 1. Total (Soft Blue) */
    .mc-card.theme-blue {
      background-color: #bfdbfe;
      border-color: #93c5fd;
    }
    .mc-card.theme-blue .mc-card-title,
    .mc-card.theme-blue .mc-card-icon {
      color: #1e40af;
    }
    .mc-card.theme-blue .mc-card-value {
      color: #1e3a8a;
    }
    .mc-card.theme-blue .mc-card-subtitle {
      color: #1e40af;
    }

    /* 2. Active (Soft Green) */
    .mc-card.theme-green {
      background-color: #a7f3d0;
      border-color: #6ee7b7;
    }
    .mc-card.theme-green .mc-card-title,
    .mc-card.theme-green .mc-card-icon {
      color: #065f46;
    }
    .mc-card.theme-green .mc-card-value {
      color: #064e3b;
    }
    .mc-card.theme-green .mc-card-subtitle {
      color: #065f46;
    }

    /* 3. Pending (Soft Orange) */
    .mc-card.theme-orange {
      background-color: #fed7aa;
      border-color: #fdba74;
    }
    .mc-card.theme-orange .mc-card-title,
    .mc-card.theme-orange .mc-card-icon {
      color: #9a3412;
    }
    .mc-card.theme-orange .mc-card-value {
      color: #7c2d12;
    }
    .mc-card.theme-orange .mc-card-subtitle {
      color: #9a3412;
    }

    /* 4. Closed (Soft Purple) */
    .mc-card.theme-purple {
      background-color: #e9d5ff;
      border-color: #d8b4fe;
    }
    .mc-card.theme-purple .mc-card-title,
    .mc-card.theme-purple .mc-card-icon {
      color: #6b21a8;
    }
    .mc-card.theme-purple .mc-card-value {
      color: #4c1d95;
    }
    .mc-card.theme-purple .mc-card-subtitle {
      color: #6b21a8;
    }

    /* 5. Declined (Soft Red) */
    .mc-card.theme-red {
      background-color: #fecaca;
      border-color: #fca5a5;
    }
    .mc-card.theme-red .mc-card-title,
    .mc-card.theme-red .mc-card-icon {
      color: #991b1b;
    }
    .mc-card.theme-red .mc-card-value {
      color: #7f1d1d;
    }
    .mc-card.theme-red .mc-card-subtitle {
      color: #991b1b;
    }

    /* ---------- Responsive Layout ---------- */
    @media (max-width: 1024px) {
      .mc-cards {
        flex-wrap: wrap;
      }
      .mc-card {
        flex: 1 1 calc(33.333% - 16px);
      }
    }

    @media (max-width: 768px) {
      .manage-contracts-section {
        padding: 0 16px 0 16px;
      }
      .mc-card {
        flex: 1 1 calc(50% - 16px);
      }
    }

    @media (max-width: 480px) {
      .mc-card {
        flex: 1 1 100%;
      }
    }
  </style>

  <div class="mc-container">
    
    <!-- Header -->
    <header class="mc-header">
      <div class="mc-header-text">
        <h1>Manage Contracts</h1>
        <p>Manage and track your contracts, assignment, value, and statuses.</p>
      </div>
      <button class="mc-add-btn" aria-label="Add Contract">
        <svg viewBox="0 0 24 24">
          <path d="M12 5v14M5 12h14"/>
        </svg>
      </button>
      
    </header>

    <!-- Cards Container -->
    <div class="mc-cards">

      <!-- Card 1: Total Contracts -->
      <div class="mc-card theme-blue">
        <div class="mc-card-top">
          <span class="mc-card-title">Total Contracts</span>
          <div class="mc-card-icon">
            <svg viewBox="0 0 24 24">
              <rect x="3" y="3" width="7" height="7" rx="1"/>
              <rect x="14" y="3" width="7" height="7" rx="1"/>
              <rect x="14" y="14" width="7" height="7" rx="1"/>
              <rect x="3" y="14" width="7" height="7" rx="1"/>
            </svg>
          </div>
        </div>
        <div class="mc-card-value">20</div>
        <div class="mc-card-subtitle">All time</div>
      </div>

      <!-- Card 2: Active Contract -->
      <div class="mc-card theme-green">
        <div class="mc-card-top">
          <span class="mc-card-title">Active Contract</span>
          <div class="mc-card-icon">
            <svg viewBox="0 0 24 24">
              <polygon points="5 3 19 12 5 21 5 3" />
            </svg>
          </div>
        </div>
        <div class="mc-card-value">7</div>
        <div class="mc-card-subtitle">35% of total</div>
      </div>

      <!-- Card 3: Pending Contract -->
      <div class="mc-card theme-orange">
        <div class="mc-card-top">
          <span class="mc-card-title">Pending Contract</span>
          <div class="mc-card-icon">
            <svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <line x1="10" y1="9" x2="10" y2="15"/>
              <line x1="14" y1="9" x2="14" y2="15"/>
            </svg>
          </div>
        </div>
        <div class="mc-card-value">2</div>
        <div class="mc-card-subtitle">10% of total</div>
      </div>

      <!-- Card 4: Closed Contract -->
      <div class="mc-card theme-purple">
        <div class="mc-card-top">
          <span class="mc-card-title">Closed Contract</span>
          <div class="mc-card-icon">
            <svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <path d="M8 12l3 3 5-5"/>
            </svg>
          </div>
        </div>
        <div class="mc-card-value">5</div>
        <div class="mc-card-subtitle">25% of total</div>
      </div>

      <!-- Card 5: Declined Contract -->
      <div class="mc-card theme-red">
        <div class="mc-card-top">
          <span class="mc-card-title">Declined Contract</span>
          <div class="mc-card-icon">
            <svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <line x1="12" y1="8" x2="12" y2="12"/>
              <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
          </div>
        </div>
        <div class="mc-card-value">6</div>
        <div class="mc-card-subtitle">30% of total</div>
      </div>

    </div>
  </div>
</section>
<!-- END OF MANAGE CONTRACTS SECTION -->