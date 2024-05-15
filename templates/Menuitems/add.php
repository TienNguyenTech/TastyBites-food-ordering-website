<?= $this->Form->create($menuitem, ['type' => 'file', 'class' => 'text-gray-800']) ?>
<h1 class="h3 mb-2 text-gray-800">Add new Menu Item</h1>
<?php
echo $this->Form->control('menuitem_name', ['label' => 'Name', 'class' => 'form-control']);
echo $this->Form->control('menuitem_desc', ['label' => 'Description', 'type' => 'textarea', 'class' => 'form-control', 'maxlength' => '255']);
echo $this->Form->file('menuitem_image', ['label' => 'Image', 'type' => 'file', 'class' => 'form-control']);
echo $this->Form->control('menuitem_price', ['label' => 'Price', 'class' => 'form-control', 'type' => 'number', 'min' => '2', 'max' => '50', 'maxlength' => '2', 'style' => 'margin-bottom: 10px']);
//echo $this->Form->control('menuitem_on_sale', ['label' => 'Is this item on sale?', 'type' => 'checkbox', 'class' => 'form-control', 'id' => 'on_sale_checkbox']);
?>
<!--<div id="sale_price_container" style="display: none;">-->
<!--    --><?php //= $this->Form->control('menuitem_saleprice', ['label' => 'Sale Price', 'class' => 'form-control', 'type' => 'number', 'min' => '0', 'style' => 'margin-bottom: 10px']); ?>
<!--</div>-->
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

<!--<script>-->
<!--    document.getElementById('on_sale_checkbox').addEventListener('change', function () {-->
<!--        const salePriceContainer = document.getElementById('sale_price_container');-->
<!--        if (this.checked) {-->
<!--            salePriceContainer.style.display = 'block';-->
<!--        } else {-->
<!--            salePriceContainer.style.display = 'none';-->
<!--        }-->
<!--    });-->
<!---->
<!--    // Khởi tạo hiển thị dựa trên giá trị checkbox (trong trường hợp form được tải lại với dữ liệu cũ)-->
<!--    if (document.getElementById('on_sale_checkbox').checked) {-->
<!--        document.getElementById('sale_price_container').style.display = 'block';-->
<!--    }-->
<!--</script>-->
