<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $menuitems
 */
// ?>
<!--<h1 class="h3 mb-2 text-gray-800">Place an order</h1>-->
<?php ////= $this->Flash->render() ?>
<?php ////= $this->Form->create($order, ['class' => 'text-gray-800']) ?>
<?php
//echo $this->Form->control('customer_name', ['label' => 'Full Name', 'class' => 'form-control']);
////echo $this->Form->control('customer_email', ['label' => 'Contact Email', 'class' => 'form-control']);
////echo $this->Form->control('customer_phone', ['label' => 'Contact Phone', 'class' => 'form-control']);
////echo $this->Form->control('menuitems._ids', ['options' => $menuitems, 'class' => 'form-control', 'required']);
////
//// ?>
<?php ////= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?php ////= $this->Form->end() ?>
<html>

<head>
    <title>Place an Order | Tasty Bites Kitchen</title>
</head>

<body>
    <style>
        footer {
            margin-top: 50px;
        }
    </style>

    <script>
        function validateQuantities() {
            const quantities = document.getElementById('quantities').childElementCount;
            let atLeastOneFieldFilled = false;

            for (let i = 0; i < quantities; i++) {
                if (document.getElementById(`quantity-${i}`).value != false) {
                    atLeastOneFieldFilled = true;
                    break;
                }
            }

            if (!atLeastOneFieldFilled) {
                alert('At least one menu item must be selected');
                return false;
            }

            return true;
        }
    </script>
    <div class="row">
        <div class="enquirys form container"
            style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
            <?= $this->Form->create($order, ['onsubmit' => 'return validateQuantities()']) ?>
            <fieldset>
                <legend style="font-size: 32px; text-align: center; color: #22408c;"><?= __('Place an Order') ?>
                </legend>
                <?php
                echo $this->Form->control('customer_name', ['label' => 'Full Name', 'class' => 'form-control']);
                echo $this->Form->control('customer_email', ['label' => 'Contact Email', 'class' => 'form-control']);
                echo $this->Form->control('customer_phone', ['label' => 'Contact Phone', 'class' => 'form-control']);
                //echo $this->Form->control('menuitems._ids', ['label' => 'Select item(s) to order', 'options' => $menuitems, 'class' => 'form-control', 'required']);
                
                echo __('Select Items');
                echo '<div id="quantities">';
                $counter = 0;
                foreach ($menuitems as $menuitem_id => $menuitem_name) {
                    echo '<div class="input-group">';
                    echo "<span class='input-group-text col-2'>$menuitem_name</span>";
                    echo $this->Form->input("MenuitemsOrder.$menuitem_id.quantity", ['label' => $menuitem_name, 'class' => 'form-control col-1', 'type' => 'number', 'placeholder' => '0', 'min' => '0', 'id' => "quantity-$counter"]);
                    echo '</div>';
                    $counter++;
                }
                echo '</div>';

                ?>
            </fieldset>
            <?= $this->Form->button(__('Place Order'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
            <?= $this->Form->end() ?>

            <?= $this->Flash->render() ?>
        </div>
    </div>
</body>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-5">
        <p class="m-0 text-center text-white">Copyright &copy;
            <?= $this->ContentBlock->text('copyright-message'); ?>
        </p>
    </div>
</footer>

</html>