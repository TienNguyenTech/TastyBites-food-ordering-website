<!-- src/Template/Layout/view_cart.php -->

<head>
    <?= $this->Html->css('view_cart'); ?> 
</head>

<h1>Your Cart</h1>

<?php if (empty($cart)): ?>
    <p>Your cart is empty. Add some items to start shopping.</p>
<?php else: ?>
    <ul class="cart-items-list">
        <?php foreach ($cart as $menuitem_id => $item): ?>
            <li class="cart-item">
                <img class="cart-item-image" src="<?= $this->Url->image('menu/' . $item['image']) ?>"
                    alt="<?= h($item['name']) ?>" />
                <div class="cart-item-details">
                    <strong><?= h($item['name']) ?></strong> -
                    <?= $this->Number->currency($item['price']) ?> each
                    (x<?= h($item['quantity']) ?>)
                </div>
                <div class="quantity-control">
                    <?= $this->Form->control(
                        'quantity',
                        [
                            'type' => 'number',
                            'min' => 1,
                            'value' => $item['quantity'],
                            'onchange' => "updateQuantity($menuitem_id, this.value)",
                            'label' => false,
                        ]
                    ); ?>
                </div>
                <div class="cart-item-remove">
                    <?= $this->Html->link(
                        'Remove',
                        ['controller' => 'CartItems', 'action' => 'remove', $menuitem_id],
                        ['class' => 'btn btn-danger']
                    ) ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="cart-controls">
    <?= $this->Html->link(
        'Continue Shopping',
        ['controller' => 'Menuitems', 'action' => 'menu'],
        ['class' => 'btn btn-secondary']
    ) ?>
    <?= $this->Html->link(
        'Checkout',
        ['controller' => 'Checkout', 'action' => 'index'],
        ['class' => 'btn btn-primary']
    ) ?>
</div>

<script>
    function updateQuantity(menuitem_id, quantity) {
        if (quantity > 0) {
            window.location.href = '<?= $this->Url->build(['action' => 'update', menuitem_id, quantity]); ?>';
        }
    }
</script>