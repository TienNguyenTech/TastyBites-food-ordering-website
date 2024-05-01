<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>

<div class="row">
    <div class="enquirys form container" style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
        <?= $this->Form->create($enquiry) ?>
        <fieldset>
            <legend><?= __('Contact Us') ?></legend>
            <?php
                echo $this->Form->control('enquiry_name', ['label' => 'Name', 'class' => 'form-control']);
                echo $this->Form->control('enquiry_email', ['label' => 'Email', 'class' => 'form-control', 'type' => 'email']);
                echo $this->Form->control('enquiry_message', ['label' => 'Message', 'class' => 'form-control', 'type' => 'textarea']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
        <?= $this->Form->end() ?>

        <?= $this->Flash->render() ?>
    </div>
</div>
