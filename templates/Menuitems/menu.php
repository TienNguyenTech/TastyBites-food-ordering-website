<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Bites Menu</title>
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->css('styles.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->css('style.css') ?>">
    <script src="close.js"></script>
    <style>
        body {
            background-color: white;
            /* Background color for the whole page */
            color: black;
            /* Default text color for the whole page */
        }

        .card {
            height: 400px;
            /* Set a fixed height for the cards */
            width: 250px;
            /* Set a consistent width for the cards */
            display: flex;
            /* Use flexbox for card layout */
            flex-direction: column;
            /* Align items vertically */
            justify-content: space-between;
            /* Space out content */
            margin-bottom: 25px;
            /* Space between rows of cards */
        }

        .card-body {
            padding: 20px;
            /* Padding around content */
            flex-grow: 1;
            /* Allow card body to grow with content */
            text-align: left;
            /* Center-align text in card body */
        }

        .card-text {
            color: black;
            /* Set text color for description */
            height: 100px;
            /* Fixed height for the description */
            overflow: hidden;
            /* Hide overflowing text if it exceeds set height */
        }

        .text-muted {
            text-align: left;
            /* Left-align the price */
            height: 20px;
            /* Set a fixed height for the price section */
            margin-bottom: 10px;
            /* Space between the price and "Add to Cart" button */
        }

        .card-footer {
            padding: 15 px;
            /* Padding to ensure consistent spacing around content */
            display: flex;
            justify-content: center;
            /* Center the button horizontally */
            align-items: center;
            /* Center the button vertically */
            background-color: white;
            border-top: none;
            /* No border between the body and footer */
            padding-bottom: 25px;
        }

        .btn-primary {
            background-color: #273d4f;
            /* Custom color for the button */
            width: 100%;
            /* Button takes full width of the footer */
            margin: 0;
            /* No extra margin on any side */
        }

        .container1 {
            width: 900px;
            max-width: 90%;
            margin: auto;
            text-align: center;
            padding-top: 10px;
        }

        svg {
            width: 30px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
        }

        header .icon-cart1 {
            position: relative;
        }

        header .icon-cart1 span {
            display: flex;
            width: 30px;
            height: 30px;
            background-color: red;
            justify-content: center;
            align-items: center;
            color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            right: -20px;
        }

        .cartTab {
            width: 400px;
            background-color: gray;
            color: white;
            position: fixed;
            inset: 0 0 0 auto;
            display: grid;
            grid-template-rows: 70px 1fr 70px;

        }

        .cartTab h1 {
            padding: 20px;
            margin: 0;
            font-weight: 300;

        }
    </style>
</head>

<body>
    <div class="my-4" style="margin: 0 6rem;">
        <div class="row justify-content-between align-items-center mb-3">


            <div class="container1">
                <header>
                    <div class="col">
                        <h4 class="text-gray-800 mb-0"><b>Tasty Bites Menu</b></h4>
                    </div>
                    <div class="col-auto">
                        <!-- Add New Item button -->
                        <?= $this->Html->link(__('Add New Item'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                    </div>
                    <div class="icon-cart1" id="cart-icon"> <!-- Assign ID to the cart icon -->
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                        <span>0</span>
                    </div>
                </header>
            </div>



            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php foreach ($menuitems as $menuitem): ?>
                    <div class="col">
                        <div class="card shadow">
                            <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                                <p class="card-text"><?= $menuitem->menuitem_desc ?></p> <!-- Description section -->
                                <span class="text-muted"><?= $this->Number->currency($menuitem->menuitem_price) ?></span>
                                <!-- Price aligned left, just below description -->
                            </div>
                            <div class="card-footer">
                                <!-- Add to Cart button, centered in the footer -->
                                <?= $this->Html->link(__('Add to Cart'), ['controller' => 'CartItems', 'action' => 'addToCart', $menuitem->id, 1], ['class' => 'btn btn-primary']) ?>
                            </div>
                            <div class="card-footer">
                                <!-- Add to Cart button, centered in the footer -->
                                <?= $this->Html->link(__('View Cart'), ['controller' => 'CartItems', 'action' => 'viewCart', $menuitem->id, 1], ['class' => 'btn btn-primary']) ?>
                            </div>
                            <!-- Nút để xem giỏ hàng -->
                            <div class="card-footer"><?= $this->Html->link(
                                __('View Cart No id'),
                                ['controller' => 'CartItems', 'action' => 'viewCart'], // Không cần ID của menuitem
                                ['class' => 'btn btn-primary']
                            ) ?> </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="cart-tab" class="cartTab">
                <h1>Your Cart</h1>
                <div class="listCart">
                    <!-- Cart items will be displayed here -->
                </div>
                <div class="btn">
                    <button id="close-cart" class="close">CLOSE</button>
                    <button class="checkOut">Check Out</button>
                </div>
            </div>


        </div>

    </div>
    <!-- Body content -->
    <?= $this->fetch('content'); ?> <!-- Your page content goes here -->

    <!-- Inline JavaScript code to handle the button click -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var closeButton = document.getElementById('close-cart');
            var cartTab = document.getElementById('cart-tab');
            var cartIcon = document.getElementById('cart-icon');

            closeButton.addEventListener('click', function () {
                cartTab.style.display = 'none';
            });

            cartIcon.addEventListener('click', function () {
                cartTab.style.display = 'block';
            });
        });
    </script>
    <script src="app.js"></script>
</body>

<!-- JavaScript for DataTables -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>