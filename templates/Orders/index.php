<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<div class="orders index content">
    <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('order_datetime') ?></th>
                    <th><?= $this->Paginator->sort('order_status') ?></th>
                    <th><?= $this->Paginator->sort('customer_name') ?></th>
                    <th><?= $this->Paginator->sort('customer_email') ?></th>
                    <th><?= $this->Paginator->sort('customer_phone') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $this->Number->format($order->order_id) ?></td>
                    <td><?= h($order->order_datetime) ?></td>
                    <td><?= h($order->order_status) ?></td>
                    <td><?= h($order->customer_name) ?></td>
                    <td><?= h($order->customer_email) ?></td>
                    <td><?= h($order->customer_phone) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $order->order_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->order_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?>
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
