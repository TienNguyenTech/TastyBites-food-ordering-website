<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>

<div class="index content">

    <div class="table-responsive" style="margin-bottom: 10px">
        <h2>Menu Items</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Rating</th>
            </tr>
            <?php foreach ($menuitems as $menuItem): ?>
                <tr>
                    <td><?= $menuItem->menuitem_name ?></td>
                    <td><?= $menuItem->menuitem_price ?></td>
                    <td><?= $menuItem->menuitem_desc ?></td>
                    <td><?= $menuItem->menuitem_rating ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="table-responsive">
        <h2>Orders</h2>
        <table>
            <tr>
                <th>Customer</th>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->customer ?></td>
                    <td><?= $order->item ?></td>
                    <td><?= $order->quantity ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>

