<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->customer_id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->customer_id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
    <div class="column column-80">
        <div class="customers view content">
            <h3><?= h('Customer Information') ?></h3>
<!--            <h3>--><?php //= h($customer->customer_fname) ?><!--</h3>-->
            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Customer Fname') ?></th>
                    <td><?= h($customer->customer_fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Lname') ?></th>
                    <td><?= h($customer->customer_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Phone') ?></th>
                    <td><?= h($customer->customer_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Email') ?></th>
                    <td><?= h($customer->customer_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Id') ?></th>
                    <td><?= $this->Number->format($customer->customer_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
