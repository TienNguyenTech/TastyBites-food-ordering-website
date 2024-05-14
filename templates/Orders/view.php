<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Database\Type\FloatType $orderTotal
 * @var $quantities
 */
?>
<div class="row">
    <div class="orders view container" style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
        <?php
        if ($this->Identity->isLoggedIn()) {
            echo $this->Html->link(
                'Back',
                ['action' => 'index'],
                ['class' => 'btn btn-primary']
            );
        } else {
            echo $this->Html->link(
                'Back',
                '/',
                ['class' => 'btn btn-primary']
            );
        }
        ?>
        <h1><?= h('Order for ' . $order->customer_name . ' made ' . $order->order_datetime->addHours(10)) ?></h1>
        <table>
            <tr>
                <th><?= __('Order Status: ') ?></th>
                <td><?= h($order->order_status) ?></td>
            </tr>
            <tr>
                <th><?= __('Order Total: ') ?></th>
                <td><?= h($this->Number->currency($orderTotal)) ?></td>
            </tr>
            <tr>
        </table>
        <div class="related" style="margin-top: 20px">
            <h3><?= __('Order Items') ?></h3>
            <?php if (!empty($order->menuitems)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th><?= __('Item') ?></th>
                        <th><?= __('Quantity')?></th>
                        <th><?= __('Unit Price') ?></th>
                        <th><?= __('Total Price') ?></th>
                    </tr>
                    <?php foreach ($order->menuitems as $index => $menuitem) : ?>
                    <tr>
                        <td><?= h($menuitem->menuitem_name) ?></td>
                        <td><?= h($quantities[$index]['quantity']) ?></td>
                        <td><?= h($this->Number->currency($menuitem->menuitem_price)) ?></td>
                        <td><?= h($this->Number->currency($menuitem->menuitem_price * $quantities[$index]['quantity'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
