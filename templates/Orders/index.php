<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="orders index content text-gray-800">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Orders') ?></h1>
<!--        <a href="--><?php //= $this->Url->build(['action' => 'add'])?><!--" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i-->
<!--                class="fas fa-plus fa-sm text-white-50"></i> New Order</a>-->
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('Order ID') ?></th>
                    <th><?= h('Customer') ?></th>
                    <th><?= h('Order Time') ?></th>
                    <th><?= h('Total Price') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $this->Number->format($order->order_id) ?></td>
                    <td><?= $order->hasValue('customer') ? $this->Html->link($order->customer->customer_fname . ' ' . $order->customer->customer_lname, ['controller' => 'Customers', 'action' => 'view', $order->customer->customer_id]) : '' ?></td>
                    <td><?= h($order->order_datetime) ?></td>
                    <td><?= $this->Number->currency($order->order_total) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $order->order_id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $order->order_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete this order?')]) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
