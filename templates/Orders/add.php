<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new Order</h1>
<?= $this->Form->create($order) ?>
<?php
echo $this->Form->control('order_datetime');
echo $this->Form->control('order_total');
echo $this->Form->control('customer_id', ['options' => $customers]);
echo $this->Form->control('menuitems._ids', ['options' => $menuitems]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column column-80">-->
<!--        <div class="orders form content">-->
<!--            --><?php //= $this->Form->create($order) ?>
<!--            <fieldset>-->
<!--                <legend>--><?php //= __('Add Order') ?><!--</legend>-->
<!--                --><?php
//                    echo $this->Form->control('order_datetime');
//                    echo $this->Form->control('order_total');
//                    echo $this->Form->control('customer_id', ['options' => $customers]);
//                    echo $this->Form->control('menuitems._ids', ['options' => $menuitems]);
//                ?>
<!--            </fieldset>-->
<!--            --><?php //= $this->Form->button(__('Submit')) ?>
<!--            --><?php //= $this->Form->end() ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
