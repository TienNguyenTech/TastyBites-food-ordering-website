<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<h1 class="h3 mb-2 text-gray-800">Add new User</h1>
<?= $this->Form->create($user, ['type' => 'file', 'class' => 'text-gray-800']) ?>
<?php
echo $this->Form->control('email', [
    'label' => [
        'text' => 'Email <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

echo $this->Form->control('password', [
    'label' => [
        'text' => 'Password <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

echo $this->Form->control('user_type', [
    'label' => [
        'text' => 'User Type <span style="color: red;">*</span>',
        'escape' => false
    ],
    'options' => ['admin' => 'Admin', 'staff' => 'Staff'],
    'class' => 'form-control'
]);

echo $this->Form->control('first_name', [
    'label' => [
        'text' => 'First Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

echo $this->Form->control('last_name', [
    'label' => [
        'text' => 'Last Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

<!--<div class="row">-->
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
<!--    <div class="column column-80">-->
<!--        <div class="users form content">-->
<!--            --><?php //= $this->Form->create($user) ?>
<!--            <fieldset>-->
<!--                <legend>--><?php //= __('Add User') ?><!--</legend>-->
<!--                --><?php
//                    echo $this->Form->control('email');
//                    echo $this->Form->control('password');
//                    echo $this->Form->control('nonce');
//                    echo $this->Form->control('nonce_expiry', ['empty' => true]);
//                    echo $this->Form->control('user_type');
//                    echo $this->Form->control('first_name');
//                    echo $this->Form->control('last_name');
//                ?>
<!--            </fieldset>-->
<!--            --><?php //= $this->Form->button(__('Submit')) ?>
<!--            --><?php //= $this->Form->end() ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
