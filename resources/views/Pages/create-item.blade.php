@extends('layout.dashboard')

@section('title', 'Create Item - LedgeInvo')

@section('content')
<section class="ci-section">
  <style>
    /* Scoped CSS */
    .ci-section { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background: transparent; padding: 32px 0; max-width: 800px; margin: 0 auto; color: #0f172a; }
    .ci-section * { box-sizing: border-box; margin: 0; padding: 0; }
    
    /* Header */
    .ci-header { margin-bottom: 24px; }
    .ci-header h1 { font-size: 24px; font-weight: 600; color: #111827; margin-bottom: 8px; }
    .ci-header p { font-size: 14px; color: #6b7280; }

    /* Form Box */
    .ci-box { border: 1px solid #e2e8f0; border-radius: 12px; padding: 32px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
    
    /* Grid Layout */
    .ci-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px; }
    .ci-full { grid-column: 1 / -1; }

    /* Form Group */
    .ci-group { display: flex; flex-direction: column; gap: 8px; }
    .ci-label { font-size: 14px; font-weight: 600; color: #374151; }
    .ci-label span { color: #ef4444; }
    
    /* Inputs */
    .ci-input, .ci-select, .ci-textarea { width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; color: #111827; outline: none; transition: border 0.2s; background: #fff; }
    .ci-input:focus, .ci-select:focus, .ci-textarea:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
    .ci-textarea { resize: vertical; min-height: 100px; }
    
    /* Select Styling */
    .ci-select { appearance: none; background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239ca3af%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E"); background-repeat: no-repeat; background-position: right 16px top 50%; background-size: 12px auto; cursor: pointer; }

    /* Short Description with AI Sparkle */
    .ci-desc-wrapper { position: relative; display: flex; align-items: flex-start; gap: 12px; }
    .ci-ai-btn { width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: #fff; border: 1px solid #d1d5db; border-radius: 8px; cursor: pointer; flex-shrink: 0; transition: background 0.2s; }
    .ci-ai-btn:hover { background: #f3f4f6; }
    .ci-ai-btn svg { width: 20px; height: 20px; stroke: #4b5563; fill: none; stroke-width: 2; }

    /* Image Upload Section */
    .ci-image-upload { border: 2px dashed #d1d5db; border-radius: 8px; padding: 32px; text-align: center; cursor: pointer; transition: all 0.2s; background: #f9fafb; position: relative; }
    .ci-image-upload:hover { border-color: #3b82f6; background: #eff6ff; }
    .ci-image-upload svg { width: 40px; height: 40px; stroke: #9ca3af; fill: none; stroke-width: 2; margin-bottom: 12px; }
    .ci-image-upload p { font-size: 14px; color: #6b7280; }
    .ci-image-upload input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
    .ci-image-preview { width: 80px; height: 80px; object-fit: contain; border-radius: 8px; border: 1px solid #e5e7eb; padding: 4px; background: #fff; margin: 0 auto 12px auto; display: none; }

    /* Footer Button */
    .ci-footer { display: flex; justify-content: flex-end; gap: 12px; margin-top: 32px; padding-top: 24px; border-top: 1px solid #e2e8f0; }
    .ci-btn-cancel { padding: 10px 24px; background: #fff; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; font-weight: 500; color: #374151; cursor: pointer; text-decoration: none; display: inline-block; }
    .ci-btn-submit { padding: 10px 24px; background: #3b82f6; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; color: #fff; cursor: pointer; transition: background 0.2s; }
    .ci-btn-submit:hover { background: #2563eb; }

    @media (max-width: 600px) {
      .ci-grid { grid-template-columns: 1fr; }
      .ci-desc-wrapper { flex-direction: column; }
      .ci-ai-btn { width: 100%; }
    }
  </style>

  <!-- Header -->
  <div class="ci-header">
    <h1>Create Item</h1>
    <p>Create a new product or service item to manage stock levels, pricing, taxes, and inventory categories.</p>
  </div>

  <!-- Form Box -->
  <div class="ci-box">
    <div class="ci-grid">
      
      <!-- Name -->
      <div class="ci-group ci-full">
        <label class="ci-label">Name <span>*</span></label>
        <input type="text" class="ci-input" placeholder="Enter Name">
      </div>

      <!-- Category -->
      <div class="ci-group">
        <label class="ci-label">Category <span>*</span></label>
        <select class="ci-select">
          <option value="">Select Category</option>
          <option value="electronics">Electronics</option>
          <option value="furniture">Furniture</option>
          <option value="clothing">Clothing</option>
          <option value="food">Food & Beverage</option>
        </select>
      </div>

      <!-- Quantity -->
      <div class="ci-group">
        <label class="ci-label">Quantity</label>
        <input type="number" class="ci-input" placeholder="Enter Quantity" min="0">
      </div>

      <!-- Unit -->
      <div class="ci-group">
        <label class="ci-label">Unit</label>
        <select class="ci-select">
          <option value="">Select Unit</option>
          <option value="pcs">Pieces (pcs)</option>
          <option value="kg">Kilograms (kg)</option>
          <option value="box">Box</option>
          <option value="litre">Litre</option>
        </select>
      </div>

      <!-- Image Upload -->
      <div class="ci-group ci-full">
        <label class="ci-label">Item Image</label>
        <div class="ci-image-upload">
          <img id="previewImg" class="ci-image-preview" src="" alt="Preview">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          <p>Click to upload or drag and drop an image</p>
          <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)">
        </div>
      </div>

      <!-- Short Description -->
      <div class="ci-group ci-full">
        <label class="ci-label">Short Description</label>
        <div class="ci-desc-wrapper">
          <textarea class="ci-textarea" placeholder="Enter Short Description"></textarea>
          <button type="button" class="ci-ai-btn" title="Generate with AI">
            <svg viewBox="0 0 24 24"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
          </button>
        </div>
      </div>

    </div>

    <!-- Footer Buttons -->
    <div class="ci-footer">
      <a href="{{ url()->previous() }}" class="ci-btn-cancel">Cancel</a>
      <button class="ci-btn-submit">Save Item</button>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const input = event.target;
      const preview = document.getElementById('previewImg');
      
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</section>
@endsection