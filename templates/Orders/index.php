<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="orders index content text-gray-800">
    <h3 class="text-gray-800">Orders</h3>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Items</th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->order_datetime->addHours(10) ?></td>
                    <td><?= h($order->order_status) ?></td>
                    <td><?= h($order->customer_name) ?></td>
                    <td><?= h($order->customer_email) ?></td>
                    <td><?= h($order->customer_phone) ?></td>
                    <td>
                        <ul>
                        <?php
                            $counter = 0;
                            foreach ($order->menuitems as $menuitem) {
                                echo '<li>' . $menuitem->menuitem_name . '</li>';
                                $counter++;

                                if($counter == 2) {
                                    echo '<li>' . $this->Html->link('View more', ['action' => 'view', $order->order_id]) . '</li>';
                                    break;
                                };
                            }
                        ?>
                        </ul>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link('Order Ready', ['action' => 'ready', $order->order_id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link('Order Picked Up', ['action' => 'complete', $order->order_id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->menuitem_name), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>
