<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Database\Type\FloatType $orderTotal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Checkout') ?></legend>
                <?php
                    echo h('Items');
                    echo '<ul>';
                    foreach ($order->menuitems as $menuitem) {

                        echo '<li>' . h($menuitem->menuitem_name . ': $' . $menuitem->menuitem_price) . '</li>';

                    }

                    echo '</ul>';

                    echo h('Order Total: $' . $orderTotal);

                    echo $this->Form->control('card_number');
                    echo $this->Form->control('card_expiry');
                    echo $this->Form->control('card_cvc');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
