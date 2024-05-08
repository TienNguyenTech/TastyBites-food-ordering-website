<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Menuitem'), ['action' => 'edit', $menuitem->menuitem_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Menuitem'), ['action' => 'delete', $menuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitem->menuitem_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="menuitems view content">
            <h3><?= h($menuitem->menuitem_desc) ?></h3>
            <table>
                <tr>
                    <th><?= __('Menuitem Name') ?></th>
                    <td><?= h($menuitem->menuitem_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Menuitem Image') ?></th>
                    <td><?= h($menuitem->menuitem_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Menuitem Desc') ?></th>
                    <td><?= h($menuitem->menuitem_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Menuitem Id') ?></th>
                    <td><?= $this->Number->format($menuitem->menuitem_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Menuitem Price') ?></th>
                    <td><?= $this->Number->format($menuitem->menuitem_price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Orders') ?></h4>
                <?php if (!empty($menuitem->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Order Datetime') ?></th>
                            <th><?= __('Order Status') ?></th>
                            <th><?= __('Customer Name') ?></th>
                            <th><?= __('Customer Email') ?></th>
                            <th><?= __('Customer Phone') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($menuitem->orders as $order) : ?>
                        <tr>
                            <td><?= h($order->order_id) ?></td>
                            <td><?= h($order->order_datetime) ?></td>
                            <td><?= h($order->order_status) ?></td>
                            <td><?= h($order->customer_name) ?></td>
                            <td><?= h($order->customer_email) ?></td>
                            <td><?= h($order->customer_phone) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $order->order_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $order->order_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
