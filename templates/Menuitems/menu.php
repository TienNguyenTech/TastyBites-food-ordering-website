<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>

<div class="container my-4">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col">
            <h3 class="text-gray-800 mb-0"><b>Menu Items</b></h3>
        </div>
        <div class="col-auto">
            <?= $this->Html->link(__('Add New Item'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="col mb-4">
                <div class="card h-100 shadow">
                    <img src="../webroot/img/momo_background.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                        <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                        <p class="card-text"><?= $menuitem->menuitem_desc ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center">
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- JavaScript for DataTables -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
