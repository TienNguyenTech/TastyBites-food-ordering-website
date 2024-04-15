<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */


?>
<h1 class="h3 mb-2 text-gray-800">Add new User</h1>
<?= $this->Form->create($user) ?>
<?php
echo $this->Form->control('username');
echo $this->Form->control('password');
echo $this->Form->control('user_type');
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
<!--<div class="row">-->
<!--    <div class="column column-80">-->
<!--        <div class="users form content">-->
<!--            --><?php //= $this->Form->create($user) ?>
<!--            <fieldset>-->
<!--                <legend>--><?php //= __('Add User') ?><!--</legend>-->
<!--                --><?php
//                    echo $this->Form->control('username');
//                    echo $this->Form->control('password');
//                    echo $this->Form->control('user_type');
//                ?>
<!--            </fieldset>-->
<!--            --><?php //= $this->Form->button(__('Submit')) ?>
<!--            --><?php //= $this->Form->end() ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
