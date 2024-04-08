<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrdersMenuitem> $ordersMenuitems
 */
?>
<div class="ordersMenuitems index content">
    <?= $this->Html->link(__('New Orders Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orders Menuitems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_id') ?></th>
                    <th><?= $this->Paginator->sort('om_quantity') ?></th>
                    <th><?= $this->Paginator->sort('om_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordersMenuitems as $ordersMenuitem): ?>
                <tr>
                    <td><?= $ordersMenuitem->hasValue('order') ? $this->Html->link($ordersMenuitem->order->order_id, ['controller' => 'Orders', 'action' => 'view', $ordersMenuitem->order->order_id]) : '' ?></td>
                    <td><?= $ordersMenuitem->hasValue('menuitem') ? $this->Html->link($ordersMenuitem->menuitem->menuitem_desc, ['controller' => 'Menuitems', 'action' => 'view', $ordersMenuitem->menuitem->menuitem_id]) : '' ?></td>
                    <td><?= $this->Number->format($ordersMenuitem->om_quantity) ?></td>
                    <td><?= $this->Number->format($ordersMenuitem->om_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ordersMenuitem->menuitem_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordersMenuitem->menuitem_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordersMenuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersMenuitem->menuitem_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
