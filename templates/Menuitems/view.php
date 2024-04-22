<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 */
?>
<div class="row">
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Menuitem'), ['action' => 'edit', $menuitem->menuitem_id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Menuitem'), ['action' => 'delete', $menuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitem->menuitem_id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
    <div class="column column-80 text-gray-800">
        <div class="menuitems view content">
            <h3><?= h('Menu Item Information') ?></h3>
<!--            <h3>--><?php //= h($menuitem->menuitem_desc) ?><!--</h3>-->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($menuitem->menuitem_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($menuitem->menuitem_name) ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th>--><?php //= __('Menuitem Image') ?><!--</th>-->
<!--                    <td>--><?php //= h($menuitem->menuitem_image) ?><!--</td>-->
<!--                </tr>-->
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->currency($menuitem->menuitem_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($menuitem->menuitem_desc) ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th>--><?php //= __('Menuitem Rating') ?><!--</th>-->
<!--                    <td>--><?php //= $this->Number->format($menuitem->menuitem_rating) ?><!--</td>-->
<!--                </tr>-->
            </table>
<!--            <div class="related">-->
<!--                <h4>--><?php //= __('Related Orders') ?><!--</h4>-->
<!--                --><?php //if (!empty($menuitem->orders)) : ?>
<!--                <div class="table-responsive">-->
<!--                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
<!--                        <tr>-->
<!--                            <th>--><?php //= __('Order Id') ?><!--</th>-->
<!--                            <th>--><?php //= __('Order Datetime') ?><!--</th>-->
<!--                            <th>--><?php //= __('Order Total') ?><!--</th>-->
<!--                            <th>--><?php //= __('Customer Id') ?><!--</th>-->
<!--                            <th class="actions">--><?php //= __('Actions') ?><!--</th>-->
<!--                        </tr>-->
<!--                        --><?php //foreach ($menuitem->orders as $order) : ?>
<!--                        <tr>-->
<!--                            <td>--><?php //= h($order->order_id) ?><!--</td>-->
<!--                            <td>--><?php //= h($order->order_datetime) ?><!--</td>-->
<!--                            <td>--><?php //= h($order->order_total) ?><!--</td>-->
<!--                            <td>--><?php //= h($order->customer_id) ?><!--</td>-->
<!--                            <td class="actions">-->
<!--                                --><?php //= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $order->order_id]) ?>
<!--                                --><?php //= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $order->order_id]) ?>
<!--                                --><?php //= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?>
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php //endforeach; ?>
<!--                    </table>-->
<!--                </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
        </div>
    </div>
</div>
