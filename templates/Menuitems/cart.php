<!-- In the layout file, include a reference to your custom CSS -->
<link rel="stylesheet" href="<?= $this->Url->build('/css/cart.css') ?>" />

<!-- src/Template/Cart/view_cart.ctp -->
<div class="container mt-4">
    <h1>Your Cart</h1>

    <?php if (empty($cart)): ?>
        <div class="alert alert-info">Your cart is empty.</div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($cart as $menuitemId => $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img
                            src="/img/menu/<?= h($item['image']) ?>"
                            class="card-img-top"
                            alt="<?= h($item['name']) ?>"
                        />
                        <div class="card-body">
                            <h5 class="card-title"><?= h($item['name']) ?></h5>
                            <p class="card-text">Price: $<?= h($item['price']) ?></p>
                            <p class="card-text">Quantity: <?= h($item['quantity']) ?></p>
                            <p class="card-text">Subtotal: $<?= h($item['quantity'] * $item['price']) ?></p>
                            <a
                                href="<?= $this->Url->build(['action' => 'removeFromCart', $menuitemId]) ?>"
                                class="btn btn-danger"
                            >
                                Remove
                            </a>
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
