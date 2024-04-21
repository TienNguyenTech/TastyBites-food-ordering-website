<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Bites Menu</title>
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->css('styles.css') ?>">
    <style>
        body {
            background-color: white;
            /* Background color for the whole page */
            color: black;
            /* Default text color for the whole page */
        }

        .card {
            height: 400px;
            /* Card height increased by approximately 30% */
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
</head>

<body>
    <div class="my-4" style="margin: 0 6rem;">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col">
                <h4 class="text-gray-800 mb-0"><b>Tasty Bites Menu</b></h4>
            </div>

            <div class="col-auto">
                <!-- Add New Item button -->
                <?= $this->Html->link(__('Add New Item'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
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
                            <?= $this->Html->link(__('Add to Cart'), ['controller' => 'OrdersMenuitems', 'action' => 'addToCart', $menuitem->id, 1], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>