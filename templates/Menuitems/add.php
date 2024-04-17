<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new Menuitem</h1>
<?= $this->Form->create($menuitem) ?>
<?php
echo $this->Form->control('menuitem_name');
echo $this->Form->control('menuitem_image');
echo $this->Form->control('menuitem_desc');
echo $this->Form->control('menuitem_price');
echo $this->Form->control('menuitem_rating');
echo $this->Form->control('orders._ids', ['options' => $orders]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('List Menuitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column column-80">-->
<!--        <div class="menuitems form content">-->
<!--            --><?php //= $this->Form->create($menuitem) ?>
<!--            <fieldset>-->
<!--                <legend>--><?php //= __('Add Menuitem') ?><!--</legend>-->
<!--                --><?php
//                    echo $this->Form->control('menuitem_name');
//                    echo $this->Form->control('menuitem_image');
//                    echo $this->Form->control('menuitem_desc');
//                    echo $this->Form->control('menuitem_price');
//                    echo $this->Form->control('menuitem_rating');
//                    echo $this->Form->control('orders._ids', ['options' => $orders]);
//                ?>
<!--            </fieldset>-->
<!--            --><?php //= $this->Form->button(__('Submit')) ?>
<!--            --><?php //= $this->Form->end() ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
