<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersMenuitem $ordersMenuitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orders Menuitem'), ['action' => 'edit', $ordersMenuitem->menuitem_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orders Menuitem'), ['action' => 'delete', $ordersMenuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersMenuitem->menuitem_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orders Menuitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersMenuitems view content">
            <h3><?= h($ordersMenuitem->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $ordersMenuitem->hasValue('order') ? $this->Html->link($ordersMenuitem->order->order_id, ['controller' => 'Orders', 'action' => 'view', $ordersMenuitem->order->order_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Menuitem') ?></th>
                    <td><?= $ordersMenuitem->hasValue('menuitem') ? $this->Html->link($ordersMenuitem->menuitem->menuitem_desc, ['controller' => 'Menuitems', 'action' => 'view', $ordersMenuitem->menuitem->menuitem_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Om Quantity') ?></th>
                    <td><?= $this->Number->format($ordersMenuitem->om_quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Om Price') ?></th>
                    <td><?= $this->Number->format($ordersMenuitem->om_price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
