<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 * @var iterable<\App\Model\Entity\Order> $orders
 * @var $menuitemsAmount
 */
?>

<!--<h2 class="text-gray-800">Admin Dashboard</h2>-->
<!---->
<!--<div class="index">-->
<!--    <div class="content" style="margin-bottom: 20px; padding: 10px">-->
<!--        <h2>--><?php //= $this->Html->link('Menu Items Manager', ['controller' => 'menuitems', 'action' => 'index']) ?><!--</h2>-->
<!---->
<!--        <h4 class="text-gray-800">Current Menu: --><?php //= $menuitemsAmount ?><!-- --><?php //= $menuitemsAmount == 1 ? "item" : "items" ?><!--</h4>-->
<!---->
<!--        --><?php //= $this->Html->link(__('View Menu'), ['controller' => 'menuitems', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= $this->Html->link(__('Add Menu Item'), ['controller' => 'menuitems', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
<!---->
<!--    </div>-->
<!---->
<!--    <div class="content" style="padding: 10px;">-->
<!--        <h2 class="text-gray-800">Account Manager</h2>-->
<!---->
<!--        --><?php //= $this->Html->link(__('Create New Account'), ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= $this->Html->link(__('View Admin Accounts'), ['controller' => 'users', 'action' => 'admin'], ['class' => 'btn btn-primary']) ?>
<!--    </div>-->
<!---->
<!---->
<!---->
<!--</div>-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h2 class="text-primary">Admin Dashboard</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card border-primary shadow-lg rounded-lg d-flex flex-column h-100">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="font-weight-bold">Menu Items Manager</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="text-primary">Current Menu: <?= $menuitemsAmount ?> <?= $menuitemsAmount == 1 ? "item" : "items" ?></h5>
                    <div class="mt-auto text-center">
                        <?= $this->Html->link(__('View Menu'), ['controller' => 'menuitems', 'action' => 'index'], ['class' => 'btn btn-primary btn-block']) ?>
                        <?= $this->Html->link(__('Add Menu Item'), ['controller' => 'menuitems', 'action' => 'add'], ['class' => 'btn btn-primary btn-block mt-3']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-primary shadow-lg rounded-lg d-flex flex-column h-100">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="font-weight-bold">Account Manager</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="mt-auto text-center">
                        <?= $this->Html->link(__('Create New Account'), ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary btn-block']) ?>
                        <?= $this->Html->link(__('Manage Accounts'), ['controller' => 'users', 'action' => 'admin'], ['class' => 'btn btn-primary btn-block mt-3']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
