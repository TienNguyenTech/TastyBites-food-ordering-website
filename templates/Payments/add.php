<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Database\Type\FloatType $orderTotal
 */
?>
<div class="row">
    <div class="payments form container" style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
        <?= $this->Form->create($payment) ?>
        <fieldset>
            <legend><h1>Checkout</h1></legend>
            <?php
                echo h('Items');
                echo '<ul>';
                foreach ($order->menuitems as $menuitem) {

                    echo '<li>' . h($menuitem->menuitem_name . ': $' . $menuitem->menuitem_price) . '</li>';

                }

                echo '</ul>';

                echo h('Order Total: $' . $orderTotal);

                echo $this->Form->control('card_number', ['class' => 'form-control']);
                echo $this->Form->control('card_expiry', ['label' => 'Expiry Date (MMYY)', 'class' => 'form-control']);
                echo $this->Form->control('card_cvc', ['label' => 'Security Code', 'class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Pay Now'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
