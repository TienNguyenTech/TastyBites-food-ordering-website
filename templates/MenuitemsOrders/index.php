<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MenuitemsOrder> $menuitemsOrders
 */
?>
<div class="menuitemsOrders index content">
    <?= $this->Html->link(__('New Menuitems Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Menuitems Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuitemsOrders as $menuitemsOrder): ?>
                <tr>
                    <td><?= $this->Number->format($menuitemsOrder->id) ?></td>
                    <td><?= $menuitemsOrder->hasValue('menuitem') ? $this->Html->link($menuitemsOrder->menuitem->menuitem_desc, ['controller' => 'Menuitems', 'action' => 'view', $menuitemsOrder->menuitem->menuitem_id]) : '' ?></td>
                    <td><?= $menuitemsOrder->hasValue('order') ? $this->Html->link($menuitemsOrder->order->order_id, ['controller' => 'Orders', 'action' => 'view', $menuitemsOrder->order->order_id]) : '' ?></td>
                    <td><?= $this->Number->format($menuitemsOrder->quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $menuitemsOrder->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuitemsOrder->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuitemsOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitemsOrder->id)]) ?>
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
