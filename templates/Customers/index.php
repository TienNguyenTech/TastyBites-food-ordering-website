<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Customer> $customers
 */
    echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
    echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
    echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
    
?>
<div class="customers index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Customers') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Customer</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('customer_id') ?></th>
                    <th><?= h('customer_fname') ?></th>
                    <th><?= h('customer_lname') ?></th>
                    <th><?= h('customer_phone') ?></th>
                    <th><?= h('customer_email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $this->Number->format($customer->customer_id) ?></td>
                    <td><?= h($customer->customer_fname) ?></td>
                    <td><?= h($customer->customer_lname) ?></td>
                    <td><?= h($customer->customer_phone) ?></td>
                    <td><?= h($customer->customer_email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $customer->customer_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->customer_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->customer_id)]) ?>
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
