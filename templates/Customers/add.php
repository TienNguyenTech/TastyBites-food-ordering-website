<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new Customer</h1>
<?= $this->Form->create($customer) ?>
<?php
echo $this->Form->control('customer_fname');
echo $this->Form->control('customer_lname');
echo $this->Form->control('customer_phone');
echo $this->Form->control('customer_email');
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column column-80">-->
<!--        <div class="customers form content">-->
<!--            --><?php //= $this->Form->create($customer) ?>
<!--            <fieldset>-->
<!--                <legend>--><?php //= __('Add Customer') ?><!--</legend>-->
<!--                --><?php
//                    echo $this->Form->control('customer_fname');
//                    echo $this->Form->control('customer_lname');
//                    echo $this->Form->control('customer_phone');
//                    echo $this->Form->control('customer_email');
//                ?>
<!--            </fieldset>-->
<!--            --><?php //= $this->Form->button(__('Submit')) ?>
<!--            --><?php //= $this->Form->end() ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
