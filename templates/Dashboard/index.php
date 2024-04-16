<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>

<h1>Tasty Bites Kitchen</h1>
<h2>Admin Dashboard</h2>

<div class="index content">
    <div class="table-responsive" style="margin-bottom: 10px">
        <h2><?= $this->Html->link('Menu Items Overview', ['controller' => 'menuitems', 'action' => 'index']) ?></h2>
        <table>
            <thead>
                <tr>
                    <td><?= $this->Paginator->sort('menuitem_name', 'Name') ?></td>
                    <td><?= $this->Paginator->sort('menuitem_price', 'Price') ?></td>
                    <td><?= $this->Paginator->sort('menuitem_desc', 'Description') ?></td>
                    <td><?= $this->Paginator->sort('menuitem_rating', 'Rating') ?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuitems as $menuItem): ?>
                    <tr>
                        <td><?= h($menuItem->menuitem_name) ?></td>
                        <td><?= $this->Number->format($menuItem->menuitem_price) ?></td>
                        <td><?= h($menuItem->menuitem_desc) ?></td>
                        <td><?= $this->Number->format($menuItem->menuitem_rating) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <button>Add Menu Item</button>

</div>

