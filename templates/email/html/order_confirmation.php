<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\Type\StringType $order_status
 * @var \Cake\Database\Type\StringType $customer_name
 * @var \Cake\Database\Type\StringType $customer_email
 * @var \Cake\Database\Type\StringType $customer_phone
 * @var \Cake\Database\Type\IntegerType $order_id
 */
?>

<h1>Tasty Bites Order Confirmation</h1>
<h3>Order Status: <?= h($order_status) ?></h3>
<p>Customer Name: <?= h($customer_name) ?></p>
<p>Contact Email: <?= h($customer_email) ?></p>
<p>Contact Phone Number: <?= h($customer_phone) ?></p>

<?= $this->Html->link('View order', ['controller' => 'Orders', 'action' => 'view', $order_id], ['fullBase' => true]) ?>
