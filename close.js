document.addEventListener('DOMContentLoaded', function() {
    var closeButton = document.getElementById('close-cart');
    var cartTab = document.getElementById('cart-tab');
    var cartIcon = document.getElementById('cart-icon'); // Get the cart icon by ID

    // Event listener to close the cart tab
    closeButton.addEventListener('click', function() {
        cartTab.style.display = 'none'; // Hide the cart tab
    });

    // Event listener to open the cart tab
    cartIcon.addEventListener('click', function() {
        cartTab.style.display = 'block'; // Show the cart tab
    });
});

