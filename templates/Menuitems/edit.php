<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuitem->menuitem_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuitem->menuitem_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="menuitems form content">
            <?= $this->Form->create($menuitem) ?>
            <fieldset>
                <legend><?= __('Edit Menuitem') ?></legend>
                <?php
                    echo $this->Form->control('menuitem_desc');
                    echo $this->Form->control('menuitem_price');
                    echo $this->Form->control('menuitem_rating');
                    echo $this->Form->control('menuitem_name');
                    echo $this->Form->control('orders._ids', ['options' => $orders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
