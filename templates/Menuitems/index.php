<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="menuitems index content text-gray-800">
    <?= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="text-gray-800">Menu Items</h3>

    <?= $this->Form->create(null, [
        'url' => [
            'action' => 'search'
        ]
    ]) ?>

    <?= $this->Form->control('search', ['class' => 'form-control', 'style' => 'margin-bottom: 10px']) ?>
    <?= $this->Form->submit('Search', ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px']) ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link('Clear', ['action' => 'index'], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px']) ?>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <!--                    <th>--><?php //= h('menuitem_image') ?><!--</th>-->
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <!--                    <th>--><?php //= h('menuitem_rating') ?><!--</th>-->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuitems as $menuitem): ?>
                    <tr>
                        <td><?= $this->Number->format($menuitem->menuitem_id) ?></td>
                        <td><?= h($menuitem->menuitem_name) ?></td>
                        <td><?= $this->Html->image($menuitem->menuitem_image, ['alt' => 'Menu Item Image', 'style' => 'max-width: 100px;']) ?>
                        </td>
                        <td><?= h($menuitem->menuitem_desc) ?></td>
                        <td><?= $this->Number->currency($menuitem->menuitem_price) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $menuitem->menuitem_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuitem->menuitem_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuitem->menuitem_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuitem->menuitem_id)]) ?>
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