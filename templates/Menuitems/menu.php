<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>



<div class="menuitems index content text-gray-800">
    <?= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="text-gray-800">Menu Items</h3>

    <?= $this->Form->create(null, [
        'url' => [
            'action' => 'search'
        ]
    ]) ?>



    <div>
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="card" style="width: 18rem;">
                <img src="../webroot/img/momo_background.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $menuitem->menuitem_name?></h5>
                    <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                    <p class="card-text text-gray-800"><?= $menuitem->menuitem_desc ?></p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link"><button>Add to cart</button></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</div>
