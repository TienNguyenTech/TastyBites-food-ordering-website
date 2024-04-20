<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>


<div class="my-4" style="margin: 0 6rem;">
    <div class="row justify-content-between align-items-center mb-3 beautiful-align">
        <div class="col">
            <h4 class="text-gray-800 mb-0"><b>Tasty Bites Menu</b></h4>
        </div>

        <div class="col-auto">
            <!-- Add New Item button -->
            <?= $this->Html->link(__('Add New Item'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-5 g-4 ">
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="col mb-4">
                <div class="card shadow" style="height: 99%;">
                    <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top img-fluid']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                        <p class="card-text"><?= $menuitem->menuitem_desc ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center">
                        <span class="text-muted"><?= $this->Number->currency($menuitem->menuitem_price) ?></span>
                        <!-- Add to Cart button -->
                        <?= $this->Html->link(__('Add to Cart'), ['controller' => 'OrdersMenuitems', 'action' => 'addToCart', $menuitem->id, 1], ['class' => 'btn btn-primary mt-3']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
