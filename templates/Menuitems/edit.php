<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menuitem $menuitem
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<h1 class="h3 mb-2 text-gray-800">Edit Menu Item</h1>
<?= $this->Form->create($menuitem, ['type' => 'file', 'class' => 'text-gray-800']) ?>
<?php
echo $this->Form->control('menuitem_name', ['label' => 'Name', 'class' => 'form-control']);
echo $this->Form->control('menuitem_desc', ['label' => 'Description', 'class' => 'form-control', 'type' => 'textarea']);
echo $this->Form->file('menuitem_image', ['label' => 'Image', 'type' => 'file', 'class' => 'form-control']);
echo $this->Form->control('menuitem_price', ['label' => 'Price', 'class' => 'form-control', 'min' => '0', 'style' => 'margin-bottom: 10px']);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
