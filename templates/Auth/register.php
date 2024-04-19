<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'login';
$this->assign('title', 'Register new user');
?>
<div class="container login">
    <div class="column column-50 column-offset-25">
        <h1 class="page-title">Tasty Bites Kitchen</h1>
        <div class="users form content">

        <?= $this->Form->create($user) ?>

        <fieldset>
            <legend style="font-size: 24px;">Sign Up</legend>

            <?= $this->Flash->render() ?>

            <?= $this->Form->control('email'); ?>

            <div class="row">
                <?= $this->Form->control('first_name', ['templateVars' => ['container_class' => 'column'], 'required' => true]); ?>
                <?= $this->Form->control('last_name', ['templateVars' => ['container_class' => 'column'], 'required' => true]); ?>
            </div>

            <div class="row">
                <?php
                echo $this->Form->control('password', [
                    'value' => '',  // Ensure password is not sending back to the client side
                    'pattern' => '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$', // Minimum 8 characters and at least one number
                    'title' => 'Password must be at least 8 characters long and contain at least one number',
                    'templateVars' => ['container_class' => 'column']
                ]);
                // Validate password by repeating it
                echo $this->Form->control('password_confirm', [
                    'type' => 'password',
                    'value' => '',  // Ensure password is not sending back to the client side
                    'label' => 'Retype Password',
                    'templateVars' => ['container_class' => 'column']
                ]);
                ?>
            </div>

<!--            --><?php //= $this->Form->control('avatar', ['type' => 'file']); ?>

        </fieldset>

        <?= $this->Form->button('Register') ?>
        <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'button button-outline float-right']) ?>
        <?= $this->Form->end() ?>

    </div>
</div>

