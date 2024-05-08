<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 */
//?>
<!--<h1 class="h3 mb-2 text-gray-800">Place an order</h1>-->
<?php ////= $this->Flash->render() ?>
<?php ////= $this->Form->create($order, ['class' => 'text-gray-800']) ?>
<?php
//echo $this->Form->control('customer_name', ['label' => 'Full Name', 'class' => 'form-control']);
////echo $this->Form->control('customer_email', ['label' => 'Contact Email', 'class' => 'form-control']);
////echo $this->Form->control('customer_phone', ['label' => 'Contact Phone', 'class' => 'form-control']);
////echo $this->Form->control('menuitems._ids', ['options' => $menuitems, 'class' => 'form-control', 'required']);
////
////?>
<?php ////= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?php ////= $this->Form->end() ?>

<script>
    function isNumeric(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode >= 48 && charCode <= 57) {
            return true;
        }
        return false;
    }
</script>
<div class="row">
    <div class="enquirys form container" style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
        <?= $this->Form->create($order) ?>
        <fieldset>
            <legend><?= __('Place an Order') ?></legend>
            <?php
            echo $this->Form->control('customer_name', ['label' => 'Full Name', 'class' => 'form-control']);
            echo $this->Form->control('customer_email', ['label' => 'Contact Email', 'class' => 'form-control']);
            echo $this->Form->control('customer_phone', ['label' => 'Contact Phone', 'class' => 'form-control']);
            echo $this->Form->control('menuitems._ids', ['label' => 'Select item(s) to order', 'options' => $menuitems, 'class' => 'form-control', 'required']);

            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
        <?= $this->Form->end() ?>

        <?= $this->Flash->render() ?>
    </div>
</div>

