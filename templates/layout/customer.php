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

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />


    <?= $this->Html->image('true_favi2.jpg', ['alt' => 'Favicon']) ?>

    
    <!--<link rel="icon" type="image/x-icon" href="webroot/img/true_favi.ico" />-->

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-2.min.css') ?>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles2.css" rel="stylesheet" />

   



</head>

<body>
    <!-- Responsive navbar-->
    <style>
        /* Override Bootstrap's primary color */
        .navbar-tea {
            background-color: #ecf1ff;
        }

        .fire-text {
            color: #26367b;
            /* Color of fire text */
        }

        .fire-text:hover {
            color: #dd1d3c;
        }

        .Big-Stuff {
            color: #26367b;
            /* Color of active page */
            font-size: 25px;
        }

        .Big-Stuff:hover {
            color: #dd1d3c;
        }

        .active-home {
            color: #7287bb;
        }

        .active-home:hover {
            color: #7287bb;
        }

        /*Nav-bar cool button style */

        .navbar-nav {
            text-align: center;
            /* Center the text */

        }

        .navbar-nav .nav-item {
            text-decoration: none;
            /* No underline */
            transition: background-color 0.3s;
            /* Smooth hover transition */
        }

        .navbar-nav .nav-item {
            display: flex;
            /* Flex layout for menu items */
            gap: 20px;
            /* Space between menu items */
        }

        .navbar-nav .nav-item:hover {
            border-color: white;
            /* Show border on hover */
        }

        .container {
            margin: auto;
            /* Center container */
            font-size: 1.5em;
            /* Larger font size for logo */
            font-weight: bold;
            /* Bold text */
        }

        /* Dropdown Style */
        .dropbtn {
            background-color: #ecf1ff;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: #2f3e85;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ebf3fb;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        a.nav-link.dropdown-toggle {
            color: #2f3e85;
            /* Sets the text color to white */
        }
    </style>

    <style>
        /* Pop-up container positioned at the top-right corner under the navbar */
        .popup {
            display: none;
            /* Hidden by default */
            position: absolute;
            top: 70px;
            /* Just below the navbar */
            right: 20px;
            /* Positioned near the right edge */
            width: 300px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1000;
            /* Ensure it's on top */
            animation: slideDown 0.5s ease;
            /* Animation for smooth entry */
        }

        /* Animation to slide the pop-up down */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Style for the arrow pointing to the target button */
        .arrow {
            position: absolute;
            top: -10px;
            right: 120px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #f9f9f9;
        }
    </style>


    <nav class="navbar navbar-expand-lg navbar-tea">
        <div class="container-fluid"> <!-- Using container-fluid for proper spacing -->
            <!-- Left-aligned navigation, including the restaurant's logo -->
            <div clCass="d-flex align-items-center">
                <?= $this->Html->link(
                    $this->ContentBlock->text('website-title'),
                    ['controller' => 'Pages', 'action' => 'display'],
                    ['class' => 'navbar-brand Big-Stuff',]
                ) ?>

            </div>

            <!-- Right-aligned navigation -->
            <div class="d-flex align-items-center"> <!-- For vertical alignment -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    Menu
                </button>


                <!-- HAMBURGER -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Tasty Bites Kitchen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <?= $this->Html->link("Menu", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link("Place an Order", ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                $userType = $this->Identity->get('user_type');
                                if ($this->Identity->isLoggedIn()) {
                                    if ($userType === 'admin') {
                                        echo $this->Html->link(
                                            'Dashboard',
                                            ['controller' => 'Dashboard', 'action' => 'index'],
                                            ['class' => 'nav-link fire-text']
                                        );
                                    } elseif ($userType === 'staff') {
                                        echo $this->Html->link(
                                            'Dashboard',
                                            ['controller' => 'Orders', 'action' => 'index'],
                                            ['class' => 'nav-link fire-text']
                                        );
                                    }
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                if (!$this->Identity->isLoggedIn()) {
                                    echo $this->Html->link(
                                        'Log in',
                                        ['controller' => 'Auth', 'action' => 'login'],
                                        ['class' => 'nav-link fire-text']
                                    );
                                } else {
                                    echo $this->Html->link(
                                        'Logout',
                                        ['controller' => 'Auth', 'action' => 'logout'],
                                        ['class' => 'nav-link fire-text']
                                    );
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </nav>


    <?= $this->fetch('content') ?>
</body>

</html>