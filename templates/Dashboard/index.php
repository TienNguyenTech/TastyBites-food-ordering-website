<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 * @var iterable<\App\Model\Entity\Order> $orders
 * @var $menuitemsAmount
 */
?>

<h1>Tasty Bites Kitchen</h1>
<h2>Admin Dashboard</h2>

<div class="index">
    <div class="content" style="margin-bottom: 20px">
        <h2><?= $this->Html->link('Menu Items Manager', ['controller' => 'menuitems', 'action' => 'index']) ?></h2>

        <h4>Current Menu: <?= $menuitemsAmount ?> <?= $menuitemsAmount == 1 ? "item" : "items" ?></h4>

        <?= $this->Html->link(__('View Menu'), ['controller' => 'menuitems', 'action' => 'index'], ['class' => 'button']) ?>
        <?= $this->Html->link(__('Add Menu Item'), ['controller' => 'menuitems', 'action' => 'add'], ['class' => 'button']) ?>

    </div>

    <div class="content">
        <h2>Account Manager</h2>

        <?= $this->Html->link(__('Create New Account'), ['controller' => 'users', 'action' => 'add'], ['class' => 'button']) ?>
    </div>



</div>

