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
        width: 100px;
    }

    /* Aligh Left */
    .float-left {
        float: left;
    }

    /* Align right */
    .float-right {
        float: right;
    }
</style>

<!-- src/Template/Cart/view_cart.ctp -->
<!-- src/Template/Carts/view.php -->
<div class="cartTab" style="display: block;">
    <h1>Your Cart</h1>
    <div class="listCart">
        <?php if (empty($cart)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($cart as $itemId => $item): ?>
                    <li>
                        <img src="<?= $this->Url->image('menu/' . $item['image']) ?>" alt="<?= h($item['name']) ?>" />
                        <?= h($item['name']) ?>
                        <?= $this->Number->currency($item['price']) ?>
                        Quantity:
                        <?= $this->Form->control("quantity", [
                            'type' => 'number',
                            'value' => $item['quantity'],
                            'label' => false,
                            'onchange' => "updateQuantity($itemId, this.value)"
                        ]) ?>
                        <?= $this->Html->link(__('Remove'), ['action' => 'remove', $itemId], ['class' => 'btn btn-danger']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="btn">
        <button id="close-cart" class="close">CLOSE</button>
        <button class="checkOut">Check Out</button>
    </div>
</div>

<script>
    function updateQuantity(itemId, quantity) {
        window.location.href = `<?= $this->Url->build(['action' => 'update', '_EXTEND', '']) ?>${itemId}/${quantity}`;
    }
</script>