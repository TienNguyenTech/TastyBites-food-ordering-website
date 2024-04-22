<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 * @var string[]|\Cake\Collection\CollectionInterface $menuitems
 */
?>
<h1 class="h3 mb-2 text-gray-800">Edit Order</h1>
<?= $this->Form->create($order) ?>
<?php
echo $this->Form->control('order_datetime');
echo $this->Form->control('order_total');
echo $this->Form->control('customer_id', ['options' => $customers]);
echo $this->Form->control('menuitems._ids', ['options' => $menuitems]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
