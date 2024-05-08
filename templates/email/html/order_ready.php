<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\Type\StringType $order_status
 * @var \Cake\Database\Type\StringType $customer_name
 * @var \Cake\Database\Type\DateTimeType $order_datetime
 * @var \Cake\Database\Type\IntegerType $order_id
 */
?>

<div>
    <h1>Tasty Bites Order Pickup: <?= $order_datetime->addHours(10) ?></h1>
    <p>Hi <?= $customer_name ?>,</p>
    <p>Your order is now ready for pickup from our kitchen!</p>
</div>

<?= $this->Html->link('View order', ['controller' => 'Orders', 'action' => 'view', $order_id], ['fullBase' => true]) ?>
