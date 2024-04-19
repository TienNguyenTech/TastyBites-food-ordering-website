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


    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-2.min.css') ?>
    <?php //= $this->Html->css('styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
</head>

<body>
    <!-- Responsive navbar-->
    <style>
        /* Override Bootstrap's primary color */
        .navbar-tea {
            background-color: #273d4f;
        }

        .fire-text {
            color: #fff5f1;
            /* Color of fire text */
        }

        .fire-text:hover {
            color: #cb4c46;
        }

        .Big-Stuff {
            color: #fff5f1;
            /* Color of active page */
            font-size: 25px;
        }

        .Big-Stuff:hover {
            color: #cb4c46;
        }

        .active-home {
            color: #6fb89c;
        }

        .active-home:hover {
            color: #cb4c46;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-tea" style="background-color: rgb(235, 23, 0);">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><b>Tasty Bites Kitchen</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> <!-- Changed 'ms-auto' to 'me-auto' -->
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('MENU', ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link text-white']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('ENQUIRY', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link text-white']) ?>
                    </li>
                    <?php if (!$this->Identity->isLoggedIn()): ?>
                        <li class="nav-item">
                            <?= $this->Html->link('LOG IN', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'nav-link text-white']) ?>
                        </li>
                    <?php endif; ?>
                    <!--<?php if ($this->Identity->isLoggedIn()): ?>
                    <li class="nav-item">
                        <?= $this->Html->link('DASHBOARD', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'nav-link text-white']) ?>
                    </li>
                -->
                    </ul> <!-- Close the 'ul' tag here -->
                    <?php
                    if (!$this->Identity->isLoggedIn()) {
                        echo $this->Html->link(
                            'LOG IN',
                            ['controller' => 'Auth', 'action' => 'login'],
                            ['class' => 'nav-link text-white']
                        );
                    }
                    ?>
                    <?php
                    if ($this->Identity->isLoggedIn()) {
                        echo $this->Html->link(
                            'DASHBOARD',
                            ['controller' => 'Dashboard', 'action' => 'index'],
                            ['class' => 'nav-link text-white']
                        );
                        echo $this->Html->link('LOG OUT', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'nav-link text-white']);
                    }
                    ?>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Site footer -->
    <footer class="bg-dark text-white py-4 fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros
                        elementum tristique.</p>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>123 Main Street, City, Country</p>
                    <p>Email: info@example.com</p>
                    <p>Phone: +123 456 7890</p>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p>&copy; <?= date('Y') ?> Tasty Bites Kitchen. All rights reserved.</p>
            </div>
        </div>
    </footer>



    <?= $this->fetch('content') ?>