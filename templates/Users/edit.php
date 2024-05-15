<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __("Change password for $user->first_name $user->last_name") ?></legend>
                <?php
                    echo $this->Form->control('password', ['label' => 'New Password', 'class' => 'form-control', 'value' => '']);
                    echo $this->Form->control('password-confirm', ['label' => 'Confirm New Password', 'class' => 'form-control', 'type' => 'password']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
