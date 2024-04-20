<!-- src/Template/OrdersMenuitems/index.ctp -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Main content area -->
            <h2>Your Cart</h2>
            <div class="cart-items">
                <?php if (!empty($cartItems)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Menu Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?= $item['menuitem']['name'] ?></td>
                                    <td><?= $item['om_quantity'] ?></td>
                                    <td>$<?= $item['om_price'] ?></td>
                                    <td>$<?= $item['om_quantity'] * $item['om_price'] ?></td>
                                    <td><a href="/orders_menuitems/remove/<?= $item['id'] ?>"
                                            class="btn btn-danger btn-sm">Remove</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="cart-total">
                        <p>Total: $<?= $cartTotal ?></p>
                    </div>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Cart summary area -->
            <div class="cart-summary">
                <h4>Your Cart</h4>
                <!-- Display cart items here -->
                <ul class="list-group">
                    <?php foreach ($cartItems as $item): ?>
                        <li class="list-group-item"><?= $item['menuitem']['name'] ?> -
                            $<?= $item['om_quantity'] * $item['om_price'] ?></li>
                    <?php endforeach; ?>
                </ul>
                <!-- Cart total -->
                <div class="cart-total">
                    <p>Total: $<?= $cartTotal ?></p>
                </div>
            </div>
        </div>
    </div>
</div>