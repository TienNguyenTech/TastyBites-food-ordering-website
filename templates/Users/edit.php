<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
<?= $this->Form->create($user) ?>
<?php
echo $this->Form->control('username');
echo $this->Form->control('password');
echo $this->Form->control('user_type');
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
