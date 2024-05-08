<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 */
?>
<h1 class="h3 mb-2 text-gray-800">Place an order</h1>
<?= $this->Flash->render() ?>
<?= $this->Form->create($order, ['class' => 'text-gray-800']) ?>
<?php
echo $this->Form->control('customer_name', ['label' => 'Full Name', 'class' => 'form-control']);
echo $this->Form->control('customer_email', ['label' => 'Contact Email', 'class' => 'form-control']);
echo $this->Form->control('customer_phone', ['label' => 'Contact Phone', 'class' => 'form-control']);
echo $this->Form->control('menuitems._ids', ['options' => $menuitems, 'class' => 'form-control', 'required']);

?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
