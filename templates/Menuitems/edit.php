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
echo $this->Form->control('menuitem_name', [
    'label' => [
        'text' => 'Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

echo $this->Form->control('menuitem_desc', [
    'label' => [
        'text' => 'Description <span style="color: red;">*</span>',
        'escape' => false
    ],
    'type' => 'textarea',
    'class' => 'form-control',
    'maxlength' => '255'
]);

echo $this->Form->control('menuitem_price', [
    'label' => [
        'text' => 'Price <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control',
    'type' => 'number',
    'min' => '2',
    'max' => '50',
    'maxlength' => '2',
    'style' => 'margin-bottom: 10px'
]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
