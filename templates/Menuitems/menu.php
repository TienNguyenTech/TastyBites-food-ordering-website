<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>
<html>

<head>
    <title>Menu | <?= $this->ContentBlock->text('website-title'); ?></title>
</head>

<body>
<!--<div class="container my-4">-->
<!--    <div class="row justify-content-between align-items-center mb-3">-->
<!--        <div class="d-flex align-items-center">-->
<!--            <h3 class="text-gray-800 mb-0 mr-3"><b>--><?php //= $this->ContentBlock->text('website-title'); ?><!-- Menu</b></h3>-->
<!--            --><?php //= $this->Html->link("Order now", ['controller' => 'Orders', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container my-4" style="text-align: center">
    <h3 class="text-gray-800 mb-3"><b><?= $this->ContentBlock->text('website-title'); ?> Menu</b></h3>
    <?= $this->Html->link("Order now", ['controller' => 'Orders', 'action' => 'add'], ['class' => 'btn btn-primary btn-lg']) ?>
</div>

    <style>
        body {
            background-color: white;
            color: black;
        }

        .card {
            height: 455px;
            /* Fixed height for consistency */
            width: 250px;
            /* Consistent width */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 25px;
            /* Uniform spacing between cards */
            position: relative;
        }

        .card-img-top {
            height: 200px;
            /* Consistent height for image frame */
            object-fit: cover;
            /* Ensure image fits within set height */
        }

        .card-body {
            padding: 20px;
            flex-grow: 1;
            /* Allows flexibility for content */
        }

        .card-title {
            font-size: 1.2rem;
            /* Consistent font size for titles */
        }

        .card-text {
            height: 100px;
            /* Fixed height for description */
            overflow: hidden;
            /* Prevents content overflow */
            display: -webkit-box;
            /* Enables multi-line truncation */
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            /* Limit to 5 lines */
            text-overflow: ellipsis;
            /* Shows ellipsis for truncated content */
        }

        .text-muted {
            height: 20px;
            /* Consistent height for the price section */
        }

        .card-footer {
            padding: 10px;
            /* Consistent padding */
            display: flex;
            justify-content: center;
        }

        .rectangle-image-wrapper {
            width: 100%;
            padding-top: 75%;
            /* Maintains aspect ratio for images */
            position: relative;
        }

        .rectangle-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .modalMenuItemPrice {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 1.5rem;

        }
    </style>

    <!--<div>--><?php //= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?><!--</div>-->

    <div class="my-4" style="margin: 0 6rem;">
        <div class="row justify-content-between align-items-center mb-3">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php foreach ($menuitems as $menuitem): ?>
                    <div class="col">
                        <div class="card shadow menuItemCard" style="margin: auto" data-menuitem="<?= $menuitem->menuitem_id ?>"
                            style="cursor: pointer;">
                            <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                                <p class="card-text"><?= truncateDescription($menuitem->menuitem_desc, 20) ?></p>
                                <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                            </div>
                            <!-- Card footer still present, but without "Add to Cart" button -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
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
<?php
function truncateDescription($description, $words)
{
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
    <div class="modal fade" id="menuItemModal<?= $menuitem->menuitem_id ?>" tabindex="-1"
        aria-labelledby="menuItemModalLabel<?= $menuitem->menuitem_id ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title fw-bold fs-3" id="menuItemModalLabel<?= $menuitem->menuitem_id ?>"
                        style="font-size: 1.5rem;">
                        <?= $menuitem->menuitem_name ?>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="font-size: 2rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rectangle-image-wrapper"
                                style="width: 100%; padding-top: 75%; position: relative; overflow: hidden;">
                                <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'img-fluid rectangle-image', 'style' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;']) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <p id="modalMenuItemPrice" style="font-size: 1.5rem;">
                                    <?= $this->Number->currency($menuitem->menuitem_price) ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p id="modalMenuItemDesc"><?= $menuitem->menuitem_desc ?></p>
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
