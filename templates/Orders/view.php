<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
<!--    <aside class="column" >-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->order_id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
    <div class="column column-80">
        <div class="orders view content" >
            <h3><?= h( 'Order Information') ?></h3>
<!--            <h3>--><?php //= h( $order->order_id) ?><!--</h3>-->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $order->hasValue('customer') ? $this->Html->link($order->customer->customer_fname, ['controller' => 'Customers', 'action' => 'view', $order->customer->customer_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Id') ?></th>
                    <td><?= $this->Number->format($order->order_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Total') ?></th>
                    <td><?= $this->Number->format($order->order_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Datetime') ?></th>
                    <td><?= h($order->order_datetime) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Menuitems') ?></h4>
                <?php if (!empty($order->menuitems)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th><?= __('Menuitem Id') ?></th>
                            <th><?= __('Menuitem Desc') ?></th>
                            <th><?= __('Menuitem Price') ?></th>
                            <th><?= __('Menuitem Rating') ?></th>
                            <th><?= __('Menuitem Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->menuitems as $menuitem) : ?>
                        <tr>
                            <td><?= h($menuitem->menuitem_id) ?></td>
                            <td><?= h($menuitem->menuitem_desc) ?></td>
                            <td><?= h($menuitem->menuitem_price) ?></td>
                            <td><?= h($menuitem->menuitem_rating) ?></td>
                            <td><?= h($menuitem->menuitem_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Menuitems', 'action' => 'view', $menuitem->menuitem_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Menuitems', 'action' => 'edit', $menuitem->menuitem_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Menuitems', 'action' => 'delete', $menuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitem->menuitem_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
