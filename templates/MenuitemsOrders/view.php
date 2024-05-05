<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuitemsOrder $menuitemsOrder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Menuitems Order'), ['action' => 'edit', $menuitemsOrder->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Menuitems Order'), ['action' => 'delete', $menuitemsOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitemsOrder->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Menuitems Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Menuitems Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="menuitemsOrders view content">
            <h3><?= h($menuitemsOrder->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Menuitem') ?></th>
                    <td><?= $menuitemsOrder->hasValue('menuitem') ? $this->Html->link($menuitemsOrder->menuitem->menuitem_desc, ['controller' => 'Menuitems', 'action' => 'view', $menuitemsOrder->menuitem->menuitem_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $menuitemsOrder->hasValue('order') ? $this->Html->link($menuitemsOrder->order->order_id, ['controller' => 'Orders', 'action' => 'view', $menuitemsOrder->order->order_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($menuitemsOrder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($menuitemsOrder->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
