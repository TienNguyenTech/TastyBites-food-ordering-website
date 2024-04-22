<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersMenuitem $ordersMenuitem
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 * @var string[]|\Cake\Collection\CollectionInterface $menuitems
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordersMenuitem->menuitem_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordersMenuitem->menuitem_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orders Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ordersMenuitems form content">
            <?= $this->Form->create($ordersMenuitem) ?>
            <fieldset>
                <legend><?= __('Edit Orders Menuitem') ?></legend>
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
