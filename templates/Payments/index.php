<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="payments index content text-gray-800">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Payments') ?></h1>
    </div>
        <div class="table-responsive">
        <div>
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('payment_datetime', 'Payment Time') ?></th>
                    <th><?= $this->Paginator->sort('payment_amount', 'Payment Amount') ?></th>
                    <th><?= $this->Paginator->sort('order_id', 'Order') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?= $payment->payment_datetime->addHours(10) ?></td>
                        <td><?= $this->Number->currency($payment->payment_amount) ?></td>
                        <td><?= $payment->hasValue('order') ? $this->Html->link('Order for ' . $payment->order->customer_name . ' made ' . $payment->order->order_datetime->addHours(10) , ['controller' => 'Orders', 'action' => 'view', $payment->order->order_id]) : '' ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>
