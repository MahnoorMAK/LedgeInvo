<section class="create-contract-section" aria-label="Create Contract Modal">
  <style>
    /* Scoped styles for the Create Contract component */
    .create-contract-section {
      position: relative;
      width: 100%;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      box-sizing: border-box;
      background-color: #f8fafc; /* Light background to show the modal clearly */
    }

    .create-contract-section *,
    .create-contract-section *::before,
    .create-contract-section *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    /* Modal Container */
    .create-contract-section .modal-container {
      background: #ffffff;
      width: 100%;
      max-width: 480px;
      border-radius: 12px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 10px rgba(0, 0, 0, 0.04);
      overflow: hidden;
      border: 1px solid #e2e8f0;
      display: flex;
      flex-direction: column;
      max-height: 95vh;
    }

    /* Header */
    .create-contract-section .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 24px 16px 24px;
      border-bottom: 1px solid #f1f5f9;
    }

    .create-contract-section .modal-header h2 {
      font-size: 18px;
      font-weight: 600;
      color: #0f172a;
    }

    .create-contract-section .modal-close {
      background: none;
      border: none;
      font-size: 24px;
      line-height: 1;
      color: #94a3b8;
      cursor: pointer;
      transition: color 0.15s;
      padding: 4px;
      margin-top: -4px;
    }

    .create-contract-section .modal-close:hover {
      color: #0f172a;
    }

    /* Body / Form */
    .create-contract-section .modal-body {
      padding: 20px 24px 24px 24px;
      display: flex;
      flex-direction: column;
      gap: 18px;
      overflow-y: auto;
    }

    .create-contract-section .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .create-contract-section .form-group label {
      font-size: 13px;
      font-weight: 600;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .create-contract-section .required-star {
      color: #ef4444;
      font-size: 14px;
    }

    /* Base Input / Select styling */
    .create-contract-section .form-control {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 14px;
      color: #0f172a;
      background: #ffffff;
      transition: border-color 0.15s, box-shadow 0.15s;
      font-family: inherit;
      outline: none;
    }

    .create-contract-section .form-control::placeholder {
      color: #94a3b8;
      font-weight: 400;
    }

    /* Focus state - matching the green glow from the image */
    .create-contract-section .form-control:focus {
      border-color: #10b981; /* Emerald green */
      box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
    }

    /* Specific styling for Date Inputs to ensure calendar picker is visible */
    .create-contract-section input[type="date"] {
      cursor: pointer;
      color-scheme: light;
      appearance: none;
      -webkit-appearance: none;
      padding-right: 12px;
    }

    .create-contract-section input[type="date"]::-webkit-calendar-picker-indicator {
      cursor: pointer;
      opacity: 0.6;
      transition: opacity 0.15s;
      font-size: 16px;
    }

    .create-contract-section input[type="date"]::-webkit-calendar-picker-indicator:hover {
      opacity: 1;
    }

    /* Subject wrapper with magic wand icon */
    .create-contract-section .subject-wrapper {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .create-contract-section .subject-wrapper .form-control {
      flex: 1;
    }

    .create-contract-section .sparkle-btn {
      width: 48px;
      height: 48px;
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: #0f172a;
      flex-shrink: 0;
      cursor: default;
    }

    /* Value wrapper with dollar sign */
    .create-contract-section .value-input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .create-contract-section .value-input-wrapper .dollar-sign {
      position: absolute;
      left: 14px;
      color: #64748b;
      font-size: 14px;
      font-weight: 500;
      pointer-events: none;
    }

    .create-contract-section .value-input-wrapper .form-control {
      padding-left: 32px;
    }

    /* Date row (Start / End) */
    .create-contract-section .date-row {
      display: flex;
      gap: 12px;
    }

    .create-contract-section .date-row .form-group {
      flex: 1;
    }

    /* Select wrapper for custom dropdown arrow */
    .create-contract-section .select-wrapper {
      position: relative;
      width: 100%;
    }

    .create-contract-section .select-wrapper select {
      appearance: none;
      -webkit-appearance: none;
      padding-right: 36px;
      background: #ffffff;
      cursor: pointer;
    }

    .create-contract-section .select-wrapper::after {
      content: "\f078"; /* FontAwesome chevron-down */
      font-family: "Font Awesome 6 Free", "Font Awesome 6 Free Solid", sans-serif;
      font-weight: 900;
      font-size: 12px;
      color: #64748b;
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
    }

    /* Footer / Buttons */
    .create-contract-section .modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      padding: 16px 24px 24px 24px;
      border-top: 1px solid #f1f5f9;
      background: #ffffff;
    }

    .create-contract-section .btn {
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.15s, border-color 0.15s, box-shadow 0.15s;
      font-family: inherit;
      border: 1px solid transparent;
      line-height: 1.4;
    }

    .create-contract-section .btn-secondary {
      background: #ffffff;
      border-color: #cbd5e1;
      color: #0f172a;
    }

    .create-contract-section .btn-secondary:hover {
      background: #f8fafc;
      border-color: #94a3b8;
    }

    /* Primary button - matching the green color from the image */
    .create-contract-section .btn-primary {
      background: #10b981; /* Emerald green */
      border-color: #10b981;
      color: #ffffff;
      box-shadow: 0 4px 10px -2px rgba(16, 185, 129, 0.3);
    }

    .create-contract-section .btn-primary:hover {
      background: #059669; /* Darker green */
      border-color: #059669;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .create-contract-section .date-row {
        flex-direction: column;
        gap: 18px;
      }
      .create-contract-section {
        padding: 10px;
      }
    }
  </style>

  <!-- Font Awesome for icons (if not already present on page) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <div class="modal-container">
    <div class="modal-header">
      <h2>Create Contract</h2>
      <button class="modal-close" aria-label="Close modal">&times;</button>
    </div>
    
    <div class="modal-body">
      <!-- Subject -->
      <div class="form-group">
        <label>Subject <span class="required-star">*</span></label>
        <div class="subject-wrapper">
          <input type="text" class="form-control" placeholder="Enter Subject">
          <div class="sparkle-btn"><i class="fas fa-magic"></i></div>
        </div>
      </div>

      <!-- Value -->
      <div class="form-group">
        <label>Value <span class="required-star">*</span></label>
        <div class="value-input-wrapper">
          <span class="dollar-sign">$</span>
          <input type="number" step="0.01" class="form-control" placeholder="0.00">
        </div>
      </div>

      <!-- Start / End Dates -->
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

      <!-- Status -->
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

      <!-- Contract Type (Dropdown) -->
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

      <!-- Users (Dropdown) -->
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

  <!-- Simple script to handle the close/cancel functionality and form submission -->
  <script>
    (function() {
      const section = document.currentScript.closest('.create-contract-section');
      if (!section) return;

      const closeBtn = section.querySelector('.modal-close');
      const cancelBtn = section.querySelector('.btn-secondary');
      const createBtn = section.querySelector('.btn-primary');
      const inputs = section.querySelectorAll('.form-control');

      // Simple close/cancel functionality (hides the container)
      const closeModal = () => {
        section.style.display = 'none';
      };

      closeBtn.addEventListener('click', closeModal);
      cancelBtn.addEventListener('click', closeModal);

      // Create button logic
      createBtn.addEventListener('click', () => {
        const subject = section.querySelector('input[type="text"]').value;
        const value = section.querySelector('input[type="number"]').value;
        const startDate = section.querySelectorAll('input[type="date"]')[0].value;
        const endDate = section.querySelectorAll('input[type="date"]')[1].value;
        const status = section.querySelectorAll('select')[0].value;
        const type = section.querySelectorAll('select')[1].value;
        const user = section.querySelectorAll('select')[2].value;

        if (!subject || !value || !startDate || !endDate || !status || !type || !user) {
          alert('Please fill out all required fields.');
          return;
        }

        alert(`Contract Created!\nSubject: ${subject}\nValue: $${value}\nStart: ${startDate}\nEnd: ${endDate}\nStatus: ${status}\nType: ${type}\nUser: ${user}`);
        
        // Reset form and close
        inputs.forEach(input => input.value = '');
        closeModal();
      });
    })();
  </script>
</section>