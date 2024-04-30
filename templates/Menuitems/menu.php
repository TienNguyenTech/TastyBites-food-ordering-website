<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>

<div class="container my-4">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col">
            <h3 class="text-gray-800 mb-0"><b>Tasty Bites Menu</b></h3>
        </div>
        <div class="col-auto">
<!--            --><?php //= $this->Html->link(__('Add New Item'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="col mb-4" onclick="window.location.href='<?= $this->Url->build(['controller' => 'MenuItems', 'action' => 'view', $menuitem->id]) ?>'">
                <div class="card h-100 shadow" style="cursor: pointer;">
                    <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                        <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                        <p class="card-text"><?= $menuitem->menuitem_desc ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center">
                        <!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container my-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="col mb-4">
                <div class="card h-100 shadow menuItemCard" data-menuitem="<?= $menuitem->menuitem_id ?>" style="cursor: pointer;">
                    <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                        <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                        <p class="card-text"><?= truncateDescription($menuitem->menuitem_desc, 20) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
function truncateDescription($description, $words) {
    $wordArray = explode(' ', $description);
    if (count($wordArray) > $words) {
        $wordArray = array_slice($wordArray, 0, $words);
        return implode(' ', $wordArray) . '...';
    }
    return $description;
}
?>

<!-- Bootstrap core JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript for DataTables -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
