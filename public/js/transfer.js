document.addEventListener("DOMContentLoaded", function() {
    
    window.openTransferModal = function() {
        document.getElementById('transferModal').classList.add('active');
    };

    window.closeTransferModal = function() {
        document.getElementById('transferModal').classList.remove('active');
    };

    document.getElementById('transferModal').addEventListener('click', function(e) {
        if (e.target === this) closeTransferModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeTransferModal();
    });

    function initDropdown(dropdownId, callback) {
        const dropdown = document.getElementById(dropdownId);
        const selectBox = dropdown.querySelector('.custom-dropdown-select');
        const items = dropdown.querySelectorAll('.custom-dropdown-item');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');
        const selectedText = dropdown.querySelector('.selected-text');

        selectBox.addEventListener('click', function(e) {
            e.stopPropagation();
            if (dropdown.classList.contains('disabled')) return; 
            
            document.querySelectorAll('.custom-dropdown').forEach(d => {
                if (d !== dropdown) d.classList.remove('active');
            });
            dropdown.classList.toggle('active');
        });

        items.forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
                items.forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
                
                selectedText.textContent = this.textContent;
                hiddenInput.value = this.getAttribute('data-value');
                dropdown.classList.remove('active');
                
                if(callback) callback(hiddenInput.value);
            });
        });
    }

    initDropdown('fromWarehouseDropdown', function(selectedValue) {
        const toWhDropdown = document.getElementById('toWarehouseDropdown');
        const productDropdown = document.getElementById('productDropdown');
        
        // Enable Dropdowns
        toWhDropdown.classList.remove('disabled');
        productDropdown.classList.remove('disabled');
        toWhDropdown.querySelector('.selected-text').textContent = "Select warehouse";
        
        checkProductSelection();
    });

    initDropdown('toWarehouseDropdown', function() {});
    initDropdown('productDropdown', function(selectedValue) {
        checkProductSelection();
    });

    function checkProductSelection() {
        const productInput = document.getElementById('productInput');
        const qtyInput = document.getElementById('quantityInput');
        
        if(productInput.value !== "") {
            qtyInput.disabled = false;
            qtyInput.placeholder = "Enter quantity";
            qtyInput.focus();
        } else {
            qtyInput.disabled = true;
            qtyInput.placeholder = "Select product first";
        }
    }

    document.addEventListener('click', function() {
        document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('active'));
    });
});