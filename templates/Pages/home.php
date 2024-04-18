<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$this->disableAutoLayout();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tasty Bites Kitchen</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="webroot/assets/momo.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles2.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<style>
    /* Override Bootstrap's primary color */
    .navbar-tea {
        background-color: #273d4f;
    }

    .fire-text {
        color: #fff5f1; /* Color of fire text */
    }
    .fire-text:hover{
        color: #cb4c46;
    }
    .Big-Stuff {
        color: #fff5f1; /* Color of active page */
        font-size: 25px;
    }
    .Big-Stuff:hover{
        color: #cb4c46;
    }
    .active-home {
        color:#6fb89c ;
    }
    .active-home:hover {
        color: #cb4c46;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-tea">
    <div class="container px-5">
        <a class="navbar-brand Big-Stuff" href="#!">Tasty Bites Kitchen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active-home fire-text" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">About</a></li>
                <?= $this->Html->link("Menu", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>                
                <li class="nav-item"><a class="nav-link fire-text" href="#!">Cart</a></li>
                <?php
                if (!$this->Identity->isLoggedIn()) {
                    echo $this->Html->link(
                        'Log in',
                        ['controller' => 'Auth', 'action' => 'login'],
                        ['class' => 'nav-link fire-text']);
                }
                ?>
                <?php
                if ($this->Identity->isLoggedIn()) {
                    echo $this->Html->link(
                        'Dashboard',
                        ['controller' => 'Dashboard', 'action' => 'index'],
                        ['class' => 'nav-link fire-text']);
                    echo $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'nav-link fire-text']);
                }
                ?>


            </ul>
        </div>
    </div>
</nav>


<!-- Header-->
<style>
    .header-bg {
        background-image: url("webroot/img/momo_background.jpg"); /* Add the file extension ".jpg" */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .header-title {
        color: #fff5f1;
        font-size: 36px;
        margin-bottom: 20px;
        /* Add text shadow */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Add text stroke */
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black
    }
    .header-text {
        color: #fff5f1;
        font-size: 18px;
        margin-bottom: 20px;
        /* Add text shadow */
        text-shadow: 4px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .button-primary {
        background-color:#6fb89c; /* Default button color */
        border-color: #6fb89c;
        color: #273d4f;
    }

    .button-primary:hover {
        background-color: #cb4c46; /* Button color on hover */
        border-color: #cb4c46;

</style>

<header class="bg-dark py-5 header-bg">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2 header-title">Welcome to Tasty Bites Kitchen</h1>
                    <h2 class=" header-text">The most authentic nepalese cuisine experience in melbourne</h2>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn button-primary btn-lg px-4 me-sm-3" href="#features">How it works</a>
                        <a class="btn button-primary btn-lg px-4" href="#!">Browse dishes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Features section-->
<style>
    /* Override Bootstrap's primary color and gradient */
    .custom-bg {
        background-color: #273d4f; /* Your desired background color */
    }
    .feature-text{
        color: #fff5f1;
    }
    .custom-icon-bg {
        background-color: #6fb89c; /* Your desired background color */
    }
    .menu-link {
        color: #6fb89c; /* Base color */
        text-decoration: none;
    }

    .menu-link:hover {
        color: #cb4c46; /* Color on hover */
    }
    
</style>

<section class="py-5 border-bottom custom-bg" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature custom-icon-bg text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                <h2 class="h4 fw-bolder feature-text">Step 1: Place an Order </h2>
                <p class="feature-text">Choose from our wide selection of Nepalese momo and soup dishes.</p>
                <a class="text-decoration-none menu-link" href="#!">
                    Check out our Menu!
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature custom-icon-bg text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                <h2 class="h4 fw-bolder feature-text ">Step 2: Pickup your order</h2>
                <p class="feature-text">Head to our kitchen, and pick up your order along with the cooking instructions.</p>
            </div>
            <div class="col-lg-4">
                <div class="feature custom-icon-bg text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                <h2 class="h4 fw-bolder feature-text">Step 3: Enjoy!</h2>
                <p class="feature-text">Prepare the meal according to our recipe, or add your own flair! </p>
            </div>
        </div>
    </div>
</section>

</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Tasty Bites Kitchen</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
