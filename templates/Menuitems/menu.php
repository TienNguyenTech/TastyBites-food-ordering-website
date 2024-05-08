<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
?>

<div class="container my-4">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col">
            <h3 class="text-gray-800 mb-0"><b><?= $this->ContentBlock->text('website-title'); ?> Menu</b></h3>
        </div>
    </div>
</div>

<style>
    body {
        background-color: white;
        color: black;
    }

    .card {
        height: 400px;
        /* Fixed height for consistency */
        width: 250px;
        /* Consistent width */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 25px;
        /* Uniform spacing between cards */
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
</style>

<!--<div>--><?php //= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?><!--</div>-->

<div class="my-4" style="margin: 0 6rem;">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php foreach ($menuitems as $menuitem): ?>
                <div class="col">
                    <div class="card shadow">
                        <?= $this->Html->image('menu/' . $menuitem->menuitem_image, ['alt' => $menuitem->menuitem_name, 'class' => 'card-img-top']) ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $menuitem->menuitem_name ?></h5>
                            <p class="card-text"><?= $menuitem->menuitem_desc ?></p>
                            <span class="text-muted"><?= $this->Number->currency($menuitem->menuitem_price) ?></span>
                        </div>
                        <!-- Card footer still present, but without "Add to Cart" button -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
