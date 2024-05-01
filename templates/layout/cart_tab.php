<!-- src/Template/Layout/cart_tab.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->fetch('title'); ?></title> <!-- Tiêu đề trang -->
    <?= $this->Html->css('cart_tab'); ?> <!-- Bao gồm CSS -->
    <?= $this->fetch('css'); ?> <!-- Chèn CSS bổ sung -->
</head>
<body>
    <!-- Cart Tab -->
    <div class="cartTab" id="cart-tab">
        <h1>Your Cart</h1>
        <div class="listCart">
            <?= $this->fetch('content'); ?> <!-- Nội dung từ template giỏ hàng -->
        </div>
        <div class="btn">
            <button id="close-cart" class="btn btn-light">Close</button>
            <button class="btn btn-warning">Check Out</button>
        </div>
    </div>

    <!-- Script để điều khiển cart tab -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var closeButton = document.getElementById('close-cart');

        closeButton.addEventListener('click', function () {
            document.body.classList.remove('showCart'); // Đóng cart tab
        });

        var cartIcon = document.getElementById('cart-icon'); // Nếu có icon giỏ hàng
        if (cartIcon) {
            cartIcon.addEventListener('click', function () {
                document.body.classList.add('showCart'); // Mở cart tab
            });
        }
    });
    </script>
</body>
</html>
