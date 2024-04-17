<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 * @var iterable<\App\Model\Entity\Order> $orders
 * @var $menuitemsAmount
 */
?>

<h2 class="text-gray-800">Admin Dashboard</h2>

<div class="index">
    <div class="content" style="margin-bottom: 20px; padding: 10px">
        <h2><?= $this->Html->link('Menu Items Manager', ['controller' => 'menuitems', 'action' => 'index']) ?></h2>

        <h4 class="text-gray-800">Current Menu: <?= $menuitemsAmount ?> <?= $menuitemsAmount == 1 ? "item" : "items" ?></h4>

        <?= $this->Html->link(__('View Menu'), ['controller' => 'menuitems', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('Add Menu Item'), ['controller' => 'menuitems', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>

    </div>

    <div class="content" style="padding: 10px;">
        <h2 class="text-gray-800">Account Manager</h2>

        <?= $this->Html->link(__('Create New Account'), ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('View Admin Accounts'), ['controller' => 'users', 'action' => 'admin'], ['class' => 'btn btn-primary']) ?>
    </div>



</div>

