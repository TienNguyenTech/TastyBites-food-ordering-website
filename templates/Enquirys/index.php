<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="orders index content text-gray-800">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Enquiries') ?></h1>
        <!--        <a href="--><?php //= $this->Url->build(['action' => 'add'])?><!--" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i-->
        <!--                class="fas fa-plus fa-sm text-white-50"></i> New Order</a>-->
    </div>
    <div class="table-responsive">
        <div>
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('enquiry_name', 'Name') ?></th>
                        <th><?= $this->Paginator->sort('enquiry_email', 'Email') ?></th>
                        <th><?= $this->Paginator->sort('enquiry_message', 'Message') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enquirys as $enquiry): ?>
                    <tr>
                        <td><?= h($enquiry->enquiry_name) ?></td>
                        <td><?= h($enquiry->enquiry_email) ?></td>
                        <td><?= h($enquiry->enquiry_message) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $enquiry->enquiry_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id)]) ?>
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
</div>
