<!-- In the layout file, include a reference to your custom CSS -->
<link rel="stylesheet" href="<?= $this->Url->build('/css/cart.css') ?>" />
<style>
    /*too lazy. I will create a CSS file later*/
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
</style>

<!-- src/Template/Cart/view_cart.ctp -->
<div class="container mt-4">
    <h1>Your Cart</h1>

    <?php if (empty($cart)): ?>
        <div class="alert alert-info">Your cart is empty.</div>
        <div class="card-footer">
            <!-- Add to Cart button, centered in the footer -->
            <?= $this->Html->link(__('Go Back'), ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-footer">
            <!-- Add to Cart button, centered in the footer -->
            <?= $this->Html->link(__('Checkout'), ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'btn btn-primary']) ?>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($cart as $menuitemId => $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/img/menu/<?= h($item['image']) ?>" class="card-img-top" alt="<?= h($item['name']) ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?= h($item['name']) ?></h5>
                            <p class="card-text">Price: $<?= h($item['price']) ?></p>
                            <p class="card-text">Quantity: <?= h($item['quantity']) ?></p>
                            <p class="card-text">Subtotal: $<?= h($item['quantity'] * $item['price']) ?></p>
                            <a href="<?= $this->Url->build(['action' => 'removeFromCart', $menuitemId]) ?>"
                                class="btn btn-danger">
                                Remove
                            </a>
                        </div>
                        <div class="card-footer">
                            <!-- Add to Cart button, centered in the footer -->
                            <?= $this->Html->link(__('Go Back'), ['controller' => 'Menuitems', 'action' => 'menu',], ['class' => 'btn btn-primary']) ?>
                        </div>
                        <div class="card-footer">
                            <!-- Add to Cart button, centered in the footer -->
                            <?= $this->Html->link(__('Checkout'), ['controller' => 'Menuitems', 'action' => 'menu',], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-right mt-3">
            <h3>Total: $<?= $cartTotal ?></h3>
            <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>