<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="text-gray-800">
    <h1 class="h3 mb-2 text-gray-800">Add new User</h1>
    <?= $this->Form->create($user) ?>
    <?php
    echo $this->Form->control('email', ['class' => 'form-control']);
    echo $this->Form->control('password', ['class' => 'form-control']);
    echo '<label for="user_type">User Type</label>';
    echo $this->Form->select('user_type', [
        'admin' => 'Admin',
        'customer' => 'Customer'
    ], ['class' => 'form-control', 'style' => 'margin-bottom: 10px']);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>



