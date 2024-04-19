<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="enquirys form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('Add Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('enquiry_name', ['label' => 'Name', 'class' => 'form-control']);
                    echo $this->Form->control('enquiry_email', ['label' => 'Email', 'class' => 'form-control', 'type' => 'email']);
                    echo $this->Form->control('enquiry_message', ['label' => 'Message', 'class' => 'form-control', 'type' => 'textarea']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
