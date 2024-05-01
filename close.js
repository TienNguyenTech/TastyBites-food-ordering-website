document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.getElementById('close-cart');
    var cartTab = document.getElementById('cart-tab');
    var cartIcon = document.getElementById('cart-icon'); // Icon giỏ hàng

    // Nếu có nút "Close", thêm sự kiện để đóng cart tab
    if (closeButton) {
        closeButton.addEventListener('click', function () {
            cartTab.style.display = 'none'; // Ẩn cart tab
        });
    }

    // Nếu có icon giỏ hàng, thêm sự kiện để mở cart tab
    if (cartIcon) {
        cartIcon.addEventListener('click', function () {
            cartTab.style.display = 'block'; // Hiển thị cart tab
        });
    }

    // Event listener để mở cart view khi nhấn vào icon giỏ hàng
    if (cartIcon) {
        cartIcon.addEventListener('dblclick', function () { // Ví dụ: nhấp đúp để mở cart view
            window.location.href = '<?= $this->Url->build(['controller' => 'CartItems', 'action' => 'viewCart']); ?>';
        });
    }
});
