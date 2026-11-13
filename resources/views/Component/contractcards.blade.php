<!-- =============================================
     MANAGE CONTRACTS & CREATE MODAL COMBINED
     ============================================= -->

<style>
  /* Force layout wrapper to be white and remove padding to fix white space at top/sides */
  body main, 
  .main-content, 
  .content-wrapper,
  #app > main {
      background-color: #ffffff !important;
      padding: 0 !important;
      margin: 0 !important;
  }
</style>

<!-- SECTION 1: MANAGE CONTRACTS -->
<section class="manage-contracts-section" aria-label="Manage Contracts">
  <style>
    .manage-contracts-section {
      position: relative;
      width: 100%;
      /* Changed background to white */
      background-color: #ffffff; 
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      /* Removed top padding to fix the empty space */
      padding: 24px; 
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      min-height: 100vh; /* Ensures it fills the screen */
    }
    .manage-contracts-section *, .manage-contracts-section *::before, .manage-contracts-section *::after {
      box-sizing: border-box; margin: 0; padding: 0;
    }
    .mc-container { width: 100%; max-width: 1200px; }
    /* Removed padding-top from header as the section now has standard padding */
    .mc-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
    .mc-header-text h1 { font-size: 20px; font-weight: 600; color: #0f172a; margin-bottom: 4px; }
    .mc-header-text p { font-size: 14px; color: #64748b; }
    .mc-add-btn { width: 40px; height: 40px; background-color: #10b981; border: none; border-radius: 6px; color: #ffffff; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background-color 0.2s ease; flex-shrink: 0; }
    .mc-add-btn:hover { background-color: #059669; }
    .mc-add-btn svg { width: 20px; height: 20px; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; fill: none; }
    .mc-cards { display: flex; gap: 16px; width: 100%; }
    .mc-card { flex: 1; min-width: 0; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; position: relative; border: 1px solid transparent; transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .mc-card:hover { transform: translateY(-2px); box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.08); }
    .mc-card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
    .mc-card-title { font-size: 14px; font-weight: 600; line-height: 1.3; max-width: 75%; }
    .mc-card-icon { width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; }
    .mc-card-icon svg { width: 24px; height: 24px; stroke: currentColor; stroke-width: 2; fill: none; stroke-linecap: round; stroke-linejoin: round; }
    .mc-card-value { font-size: 32px; font-weight: 700; line-height: 1; margin-bottom: 6px; }
    .mc-card-subtitle { font-size: 12px; font-weight: 500; opacity: 0.85; }
    
    .mc-card.theme-blue { background-color: #bfdbfe; border-color: #93c5fd; }
    .mc-card.theme-blue .mc-card-title, .mc-card.theme-blue .mc-card-icon { color: #1e40af; }
    .mc-card.theme-blue .mc-card-value { color: #1e3a8a; }
    .mc-card.theme-blue .mc-card-subtitle { color: #1e40af; }
    
    .mc-card.theme-green { background-color: #a7f3d0; border-color: #6ee7b7; }
    .mc-card.theme-green .mc-card-title, .mc-card.theme-green .mc-card-icon { color: #065f46; }
    .mc-card.theme-green .mc-card-value { color: #064e3b; }
    .mc-card.theme-green .mc-card-subtitle { color: #065f46; }
    
    .mc-card.theme-orange { background-color: #fed7aa; border-color: #fdba74; }
    .mc-card.theme-orange .mc-card-title, .mc-card.theme-orange .mc-card-icon { color: #9a3412; }
    .mc-card.theme-orange .mc-card-value { color: #7c2d12; }
    .mc-card.theme-orange .mc-card-subtitle { color: #9a3412; }
    
    .mc-card.theme-purple { background-color: #e9d5ff; border-color: #d8b4fe; }
    .mc-card.theme-purple .mc-card-title, .mc-card.theme-purple .mc-card-icon { color: #6b21a8; }
    .mc-card.theme-purple .mc-card-value { color: #4c1d95; }
    .mc-card.theme-purple .mc-card-subtitle { color: #6b21a8; }
    
    .mc-card.theme-red { background-color: #fecaca; border-color: #fca5a5; }
    .mc-card.theme-red .mc-card-title, .mc-card.theme-red .mc-card-icon { color: #991b1b; }
    .mc-card.theme-red .mc-card-value { color: #7f1d1d; }
    .mc-card.theme-red .mc-card-subtitle { color: #991b1b; }

    @media (max-width: 1024px) { .mc-cards { flex-wrap: wrap; } .mc-card { flex: 1 1 calc(33.333% - 16px); } }
    @media (max-width: 768px) { .manage-contracts-section { padding: 16px; } .mc-card { flex: 1 1 calc(50% - 16px); } }
    @media (max-width: 480px) { .mc-card { flex: 1 1 100%; } }
  </style>

  <div class="mc-container">
    <header class="mc-header">
      <div class="mc-header-text">
        <h1>Manage Contracts</h1>
        <p>Manage and track your contracts, assignment, value, and statuses.</p>
      </div>
      <!-- Added ID to this button to trigger the modal -->
      <button class="mc-add-btn" id="openContractModalBtn" aria-label="Add Contract">
        <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
      </button>
    </header>

    <div class="mc-cards">
      <div class="mc-card theme-blue">
        <div class="mc-card-top">
          <span class="mc-card-title">Total Contracts</span>
          <div class="mc-card-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg></div>
        </div>
        <div class="mc-card-value">20</div>
        <div class="mc-card-subtitle">All time</div>
      </div>
      <div class="mc-card theme-green">
        <div class="mc-card-top">
          <span class="mc-card-title">Active Contract</span>
          <div class="mc-card-icon"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3" /></svg></div>
        </div>
        <div class="mc-card-value">7</div>
        <div class="mc-card-subtitle">35% of total</div>
      </div>
      <div class="mc-card theme-orange">
        <div class="mc-card-top">
          <span class="mc-card-title">Pending Contract</span>
          <div class="mc-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="10" y1="9" x2="10" y2="15"/><line x1="14" y1="9" x2="14" y2="15"/></svg></div>
        </div>
        <div class="mc-card-value">2</div>
        <div class="mc-card-subtitle">10% of total</div>
      </div>
      <div class="mc-card theme-purple">
        <div class="mc-card-top">
          <span class="mc-card-title">Closed Contract</span>
          <div class="mc-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 12l3 3 5-5"/></svg></div>
        </div>
        <div class="mc-card-value">5</div>
        <div class="mc-card-subtitle">25% of total</div>
      </div>
      <div class="mc-card theme-red">
        <div class="mc-card-top">
          <span class="mc-card-title">Declined Contract</span>
          <div class="mc-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
        </div>
        <div class="mc-card-value">6</div>
        <div class="mc-card-subtitle">30% of total</div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 2: CREATE CONTRACT MODAL -->
<!-- Added inline style display: none so it is hidden by default -->
<section class="create-contract-section" id="createContractModal" aria-label="Create Contract Modal" style="display: none;">
  <style>
    .create-contract-section {
      position: fixed; /* Changed to fixed to overlay on top of the page */
      top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(15, 23, 42, 0.4); /* Dark overlay */
      z-index: 9999;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      display: flex; justify-content: center; align-items: center;
      padding: 20px; box-sizing: border-box;
    }
    .create-contract-section *, .create-contract-section *::before, .create-contract-section *::after {
      box-sizing: border-box; margin: 0; padding: 0;
    }
    .create-contract-section .modal-container {
      background: #ffffff; width: 100%; max-width: 480px; border-radius: 12px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 10px rgba(0, 0, 0, 0.04);
      overflow: hidden; border: 1px solid #e2e8f0; display: flex; flex-direction: column; max-height: 95vh;
    }
    .create-contract-section .modal-header { display: flex; justify-content: space-between; align-items: center; padding: 20px 24px 16px 24px; border-bottom: 1px solid #f1f5f9; }
    .create-contract-section .modal-header h2 { font-size: 18px; font-weight: 600; color: #0f172a; }
    .create-contract-section .modal-close { background: none; border: none; font-size: 24px; line-height: 1; color: #94a3b8; cursor: pointer; transition: color 0.15s; padding: 4px; margin-top: -4px; }
    .create-contract-section .modal-close:hover { color: #0f172a; }
    .create-contract-section .modal-body { padding: 20px 24px 24px 24px; display: flex; flex-direction: column; gap: 18px; overflow-y: auto; }
    .create-contract-section .form-group { display: flex; flex-direction: column; gap: 8px; }
    .create-contract-section .form-group label { font-size: 13px; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 4px; }
    .create-contract-section .required-star { color: #ef4444; font-size: 14px; }
    .create-contract-section .form-control { width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; color: #0f172a; background: #ffffff; transition: border-color 0.15s, box-shadow 0.15s; font-family: inherit; outline: none; }
    .create-contract-section .form-control::placeholder { color: #94a3b8; font-weight: 400; }
    .create-contract-section .form-control:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15); }
    .create-contract-section input[type="date"] { cursor: pointer; color-scheme: light; appearance: none; -webkit-appearance: none; padding-right: 12px; }
    .create-contract-section input[type="date"]::-webkit-calendar-picker-indicator { cursor: pointer; opacity: 0.6; transition: opacity 0.15s; font-size: 16px; }
    .create-contract-section input[type="date"]::-webkit-calendar-picker-indicator:hover { opacity: 1; }
    .create-contract-section .subject-wrapper { display: flex; gap: 10px; align-items: center; }
    .create-contract-section .subject-wrapper .form-control { flex: 1; }
    .create-contract-section .sparkle-btn { width: 48px; height: 48px; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #0f172a; flex-shrink: 0; cursor: default; }
    .create-contract-section .value-input-wrapper { position: relative; display: flex; align-items: center; }
    .create-contract-section .value-input-wrapper .dollar-sign { position: absolute; left: 14px; color: #64748b; font-size: 14px; font-weight: 500; pointer-events: none; }
    .create-contract-section .value-input-wrapper .form-control { padding-left: 32px; }
    .create-contract-section .date-row { display: flex; gap: 12px; }
    .create-contract-section .date-row .form-group { flex: 1; }
    .create-contract-section .select-wrapper { position: relative; width: 100%; }
    .create-contract-section .select-wrapper select { appearance: none; -webkit-appearance: none; padding-right: 36px; background: #ffffff; cursor: pointer; }
    .create-contract-section .select-wrapper::after { content: "\f078"; font-family: "Font Awesome 6 Free", "Font Awesome 6 Free Solid", sans-serif; font-weight: 900; font-size: 12px; color: #64748b; position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; }
    .create-contract-section .modal-footer { display: flex; justify-content: flex-end; gap: 12px; padding: 16px 24px 24px 24px; border-top: 1px solid #f1f5f9; background: #ffffff; }
    .create-contract-section .btn { padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; transition: background 0.15s, border-color 0.15s, box-shadow 0.15s; font-family: inherit; border: 1px solid transparent; line-height: 1.4; }
    .create-contract-section .btn-secondary { background: #ffffff; border-color: #cbd5e1; color: #0f172a; }
    .create-contract-section .btn-secondary:hover { background: #f8fafc; border-color: #94a3b8; }
    .create-contract-section .btn-primary { background: #10b981; border-color: #10b981; color: #ffffff; box-shadow: 0 4px 10px -2px rgba(16, 185, 129, 0.3); }
    .create-contract-section .btn-primary:hover { background: #059669; border-color: #059669; }
    @media (max-width: 480px) { .create-contract-section .date-row { flex-direction: column; gap: 18px; } .create-contract-section { padding: 10px; } }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <div class="modal-container">
    <div class="modal-header">
      <h2>Create Contract</h2>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    
    <div class="modal-body">
      <div class="form-group">
        <label>Subject <span class="required-star">*</span></label>
        <div class="subject-wrapper">
          <input type="text" class="form-control" placeholder="Enter Subject">
          <div class="sparkle-btn"><i class="fas fa-magic"></i></div>
        </div>
      </div>
      <div class="form-group">
        <label>Value <span class="required-star">*</span></label>
        <div class="value-input-wrapper">
          <span class="dollar-sign">$</span>
          <input type="number" step="0.01" class="form-control" placeholder="0.00">
        </div>
      </div>
      <div class="date-row">
        <div class="form-group">
          <label>Start Date <span class="required-star">*</span></label>
          <input type="date" class="form-control">
        </div>
        <div class="form-group">
          <label>End Date <span class="required-star">*</span></label>
          <input type="date" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label>Status <span class="required-star">*</span></label>
        <div class="select-wrapper">
          <select class="form-control">
            <option value="" disabled selected>Select Status</option>
            <option>Pending</option>
            <option>Active</option>
            <option>Closed</option>
            <option>Declined</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>Contract Type <span class="required-star">*</span></label>
        <div class="select-wrapper">
          <select class="form-control">
            <option value="" disabled selected>Select Contract Type</option>
            <option>Fixed Price</option>
            <option>Time & Materials</option>
            <option>Retainer</option>
            <option>Milestone Based</option>
            <option>Cost Plus</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>Users <span class="required-star">*</span></label>
        <div class="select-wrapper">
          <select class="form-control">
            <option value="" disabled selected>Select Users</option>
            <option>Alice Johnson</option>
            <option>Mark Stevens</option>
            <option>Sarah Chen</option>
            <option>David Kim</option>
            <option>Emma Wilson</option>
          </select>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn btn-secondary">Cancel</button>
      <button class="btn btn-primary">Create</button>
    </div>
  </div>
</section>

<!-- COMBINED JAVASCRIPT LOGIC -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // 1. Get DOM Elements
    const openBtn = document.getElementById('openContractModalBtn');
    const modalSection = document.getElementById('createContractModal');
    const closeBtn = modalSection.querySelector('.modal-close');
    const cancelBtn = modalSection.querySelector('.btn-secondary');
    const createBtn = modalSection.querySelector('.btn-primary');
    const inputs = modalSection.querySelectorAll('.form-control');

    // 2. Open Modal Function
    openBtn.addEventListener('click', function() {
      modalSection.style.display = 'flex'; // Show modal
    });

    // 3. Close Modal Function
    const closeModal = () => {
      modalSection.style.display = 'none'; // Hide modal
    };

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close modal if clicking outside the white box (on the dark overlay)
    modalSection.addEventListener('click', function(e) {
      if (e.target === modalSection) {
        closeModal();
      }
    });

    // 4. Create Button Logic
    createBtn.addEventListener('click', () => {
      const subject = modalSection.querySelector('input[type="text"]').value;
      const value = modalSection.querySelector('input[type="number"]').value;
      const startDate = modalSection.querySelectorAll('input[type="date"]')[0].value;
      const endDate = modalSection.querySelectorAll('input[type="date"]')[1].value;
      const status = modalSection.querySelectorAll('select')[0].value;
      const type = modalSection.querySelectorAll('select')[1].value;
      const user = modalSection.querySelectorAll('select')[2].value;

      if (!subject || !value || !startDate || !endDate || !status || !type || !user) {
        alert('Please fill out all required fields.');
        return;
      }

      alert(`Contract Created!\nSubject: ${subject}\nValue: $${value}\nStart: ${startDate}\nEnd: ${endDate}\nStatus: ${status}\nType: ${type}\nUser: ${user}`);
      
      // Reset form and close
      inputs.forEach(input => input.value = '');
      closeModal();
    });
  });
</script>