
document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.getElementById('close-cart');
    var cartTab = document.getElementById('cart-tab');

    closeButton.addEventListener('click', function () {
        // Hide the cart tab
        cartTab.style.display = 'none';
    });
});
