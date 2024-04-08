<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>
<div class="menuitems index content">
    <?= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Menuitems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('menuitem_id') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_desc') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_price') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_rating') ?></th>
                    <th><?= $this->Paginator->sort('menuitem_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuitems as $menuitem): ?>
                <tr>
                    <td><?= $this->Number->format($menuitem->menuitem_id) ?></td>
                    <td><?= h($menuitem->menuitem_desc) ?></td>
                    <td><?= $this->Number->format($menuitem->menuitem_price) ?></td>
                    <td><?= $this->Number->format($menuitem->menuitem_rating) ?></td>
                    <td><?= h($menuitem->menuitem_name) ?></td>
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
