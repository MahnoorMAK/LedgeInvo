document.addEventListener("DOMContentLoaded", function() {
    
    const returnBtn = document.getElementById('createReturnBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    // Create Return Button Click (3D effect & Action)
    returnBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Agar form submit nahi karna toh. Warna isko hata dein.
        
        // 3D Click push effect
        this.style.transform = "translateY(5px)";
        this.style.boxShadow = "0 0 0 var(--purple-dark)";
        
        setTimeout(() => {
            this.style.transform = "translateY(0)";
            alert("Purchase Return Created Successfully! (Yahan aap apna PHP DB logic lagayengi)");
        }, 150);
    });

    // Cancel Button Click (Go Back)
    cancelBtn.addEventListener('click', function() {
        window.history.back();
    });
});