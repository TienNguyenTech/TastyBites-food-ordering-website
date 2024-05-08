<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Database\Type\FloatType $orderTotal
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="orders view content">
            <h3><?= h('Order for ' . $order->customer_name . ' made ' . $order->order_datetime) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order Status') ?></th>
                    <td><?= h($order->order_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Email') ?></th>
                    <td><?= $this->Html->link($order->customer_email, 'mailto:' . $order->customer_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Phone') ?></th>
                    <td><?= $this->Html->link($order->customer_phone, 'tel:' . $order->customer_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Total') ?></th>
                    <td><?= h($this->Number->currency($orderTotal)) ?></td>
                </tr>
                <tr>
            </table>
            <div class="related">
                <h4><?= __('Items') ?></h4>
                <?php if (!empty($order->menuitems)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Item') ?></th>
                            <th><?= __('Price') ?></th>
                        </tr>
                        <?php foreach ($order->menuitems as $menuitem) : ?>
                        <tr>
                            <td><?= h($menuitem->menuitem_name) ?></td>
                            <td><?= h($this->Number->currency($menuitem->menuitem_price)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
