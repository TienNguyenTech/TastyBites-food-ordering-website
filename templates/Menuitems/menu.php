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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="col mb-4">
                <div class="card h-100 shadow">
                    <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                        <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                        <p class="card-text"><?= $menuitem->menuitem_desc ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-center">
<!--                        <a href="#" class="btn btn-primary">Add to Cart</a>-->
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- Body content -->
    <?= $this->fetch('content'); ?> <!-- Your page content goes here -->

    <!-- Inline JavaScript code to handle the button click -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var closeButton = document.getElementById('close-cart');
            var cartTab = document.getElementById('cart-tab');
            var cartIcon = document.getElementById('cart-icon');

            closeButton.addEventListener('click', function () {
                cartTab.style.display = 'none';
            });

            cartIcon.addEventListener('click', function () {
                cartTab.style.display = 'block';
            });
        });
    </script>
    <script src="app.js"></script>
</body>

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

<!-- Modal -->
<?php foreach ($menuitems as $menuitem): ?>
    <div class="modal fade" id="menuItemModal<?= $menuitem->menuitem_id ?>" tabindex="-1" aria-labelledby="menuItemModalLabel<?= $menuitem->menuitem_id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title fw-bold fs-3" id="menuItemModalLabel<?= $menuitem->menuitem_id ?>" style="font-size: 1.5rem;">
                        <?= $menuitem->menuitem_name ?>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 2rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rectangle-image-wrapper" style="width: 100%; padding-top: 75%; position: relative; overflow: hidden;">
                                <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'img-fluid rectangle-image', 'style' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;']) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--                            <h5 class="modal-title" id="menuItemModalLabel">--><?php //= $menuitem->menuitem_name ?><!--</h5>-->
                            <!--                            <p id="modalMenuItemPrice" style="font-size: 1.5rem;">--><?php //= $this->Number->currency($menuitem->menuitem_price) ?><!--</p>-->
                            <!--                            <p id="modalMenuItemDesc">--><?php //= $menuitem->menuitem_desc ?><!--</p>-->
                            <!--                            <button type="button" class="btn btn-primary mb-2">Choose Quantity</button>-->
                            <!--                            <button type="button" class="btn btn-success">Add to Cart</button>-->
                            <div class="mb-3">
                                <p id="modalMenuItemPrice" style="font-size: 1.5rem;"><?= $this->Number->currency($menuitem->menuitem_price) ?></p>
                            </div>
                            <div class="mb-3">
                                <p id="modalMenuItemDesc"><?= $menuitem->menuitem_desc ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="quantitySelect" class="form-label">Choose Quantity:</label>
                                <select class="form-select" id="quantitySelect">
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div>
                                <button type="button" class="btn btn-success">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuItemCards = document.querySelectorAll('.menuItemCard');
        menuItemCards.forEach(function (card) {
            card.addEventListener('click', function () {
                const menuItemId = card.getAttribute('data-menuitem');
                const modal = document.getElementById('menuItemModal' + menuItemId);
                const modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
            });
        });
    });
</script>

<!-- Bootstrap core JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript for DataTables -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
