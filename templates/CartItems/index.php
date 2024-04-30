<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>

<head>
</head>

<body>
    <div class="container">
        <h1>Cart</h1>
        <div class="row">
            <?php foreach ($menuitems as $menuitem): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $this->Url->image('menu/' . $menuitem->menuitem_image) ?>" class="card-img-top" alt="<?= h($menuitem->menuitem_name) ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?= h($menuitem->menuitem_name) ?></h5>
                            <p class="card-text"><?= h($menuitem->menuitem_desc) ?></p>
                            <span class="text-muted
                            "><?= $this->Number->currency($menuitem->menuitem_price) ?></span>
                        </div>
                        <div class="card-footer">
                            <?= $this->Html->link(__('Add to Cart'), ['controller' => 'CartItems', 'action' => 'add', $menuitem->id, 1], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
