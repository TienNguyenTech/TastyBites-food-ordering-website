<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>
<?= $this->Form->create($customer) ?>
<?php
echo $this->Form->control('customer_fname');
echo $this->Form->control('customer_lname');
echo $this->Form->control('customer_phone');
echo $this->Form->control('customer_email');
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
