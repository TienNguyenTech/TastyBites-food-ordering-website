<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<h1 class="h3 mb-2 text-gray-800">Edit Menuitem</h1>
<?= $this->Form->create($menuitem) ?>
<?php
echo $this->Form->control('menuitem_name');
echo $this->Form->control('menuitem_image');
echo $this->Form->control('menuitem_desc');
echo $this->Form->control('menuitem_price');
echo $this->Form->control('menuitem_rating');
echo $this->Form->control('orders._ids', ['options' => $orders]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
