<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersMenuitem $ordersMenuitem
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Orders Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersMenuitems form content">
            <?= $this->Form->create($ordersMenuitem) ?>
            <fieldset>
                <legend><?= __('Add Orders Menuitem') ?></legend>
                <?php
                    echo $this->Form->control('om_quantity');
                    echo $this->Form->control('om_price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
