<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuitemsOrder $menuitemsOrder
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Menuitems Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="menuitemsOrders form content">
            <?= $this->Form->create($menuitemsOrder) ?>
            <fieldset>
                <legend><?= __('Add Menuitems Order') ?></legend>
                <?php
                    echo $this->Form->control('menuitem_id', ['options' => $menuitems]);
                    echo $this->Form->control('order_id', ['options' => $orders]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
