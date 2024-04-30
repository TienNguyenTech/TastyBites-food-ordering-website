<!-- src/Template/CartItems/view.php -->
<style>
.cart-items-list {
    list-style-type: none; /* No bullet points */
}

.cart-item {
    display: flex;
    align-items: center; /* Aligns items horizontally */
    padding: 10px; /* Adds padding between items */
}

.cart-item-image {
    width: 50px; /* Adjust as needed */
    height: 50px; /* Consistent size */
    margin-right: 10px; /* Adds spacing between image and details */
}

.cart-item-details {
    flex: 1; /* Allow details to take full space */
}

.quantity-control {
    width: 60px; /* Adjust based on design */
}

.cart-item-remove {
    margin-left: 10px; /* Space between quantity control and remove button */
}

.cart-controls {
    margin-top: 20px; /* Adds spacing between cart contents and controls */
    text-align: right; /* Aligns buttons to the right */
}
</style>

<h1>Your Cart</h1>

<div class="cart-contents">
    <?php if (empty($cart)): ?>
        <p>Your cart is empty. Start shopping to add items!</p>
    <?php else: ?>
        <ul class="cart-items-list">
            <?php foreach ($cart as $itemId => $item): ?>
                <li class="cart-item">
                    <img src="<?= $this->Url->image('menu/' . $item['image']) ?>" alt="<?= h($item['name']) ?>"
                        class="cart-item-image" />
                    <div class="cart-item-details">
                        <strong><?= h($item['name']) ?></strong> -
                        <?= $this->Number->currency($item['price']) ?> each
                        <br />
                        <span>Quantity:</span>
                        <?= $this->Form->control("quantity_{$itemId}", [
                            'type' => 'number',
                            'value' => $item['quantity'],
                            'label' => false,
                            'min' => 1,
                            'onchange' => "updateQuantity($itemId, this.value)",
                            'class' => 'quantity-control', // Optional class for styling
                        ]) ?>
                    </div>
                    <?= $this->Html->link(
                        'Remove',
                        ['action' => 'remove', $itemId],
                        ['class' => 'btn btn-danger cart-item-remove']
                    ) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<div class="cart-controls">
    <?= $this->Html->link('Continue Shopping', ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'btn btn-secondary']) ?>
    <?= $this->Html->link('Checkout', ['controller' => 'Checkout', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
</div>

<script>
    function updateQuantity(itemId, quantity) {
        // Call the update action to change the item quantity
        window.location.href = `<?= $this->Url->build(['action' => 'update', '_EXTEND', '']) ?>${itemId}/${quantity}`;
    }
</script>