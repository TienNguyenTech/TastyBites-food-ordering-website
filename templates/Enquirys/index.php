<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 *
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="enquirys index content text-gray-800">
    <h3 class="h3 mb-0 text-gray-800"><?= __('Enquiries') ?></h3>
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
                        <td><?= $this->Html->link($enquiry->enquiry_email, "mailto:" . $enquiry->enquiry_email) ?></td>
                        <td style="word-break : break-all;"><?= h($enquiry->enquiry_message) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['class' => 'btn btn-danger','confirm' => __('Are you sure you want to delete this enquiry from# {0}?', $enquiry->enquiry_email)]) ?>
                        </td>
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
