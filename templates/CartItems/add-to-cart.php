<?php

session_start();

If (empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);



?>


<p> The product was successfully added to the cart. 
    <a herf="shopping-cart.php">View Shopping Cart</a>
    <a href="<?= $this->Url->build(['controller' => 'CartItems', 'action' => 'viewCart']) ?>">View Cart</a>
</p>

