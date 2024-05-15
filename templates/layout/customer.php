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
    <title>Menu | Tasty Bites Kitchen</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="webroot/assets/momo.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />


    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
            background-color: #22408c;
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
            background-color: #273d4f;
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
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-tea">
        <div class="container-fluid"> <!-- Using container-fluid for proper spacing -->
            <!-- Left-aligned navigation, including the restaurant's logo -->
            <div class="d-flex align-items-center">
                <?= $this->Html->link(
                    $this->ContentBlock->text('website-title'),
                    ['controller' => 'Pages', 'action' => 'display'],
                    ['class' => 'navbar-brand Big-Stuff']
                ) ?>

                <!-- Left-side navigation links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> <!-- 'me-auto' for left alignment -->
                    <li class="nav-item">
                        <?= $this->Html->link("Menu", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link("Place an Order", ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                    </li>

<!--                    <li class="nav-item">-->
<!--                        --><?php //= $this->Html->link('About', ['controller' => 'About', 'action' => 'display'], ['class' => 'nav-link fire-text']) ?>
<!--                    </li>-->
                </ul>
            </div>

            <!-- Right-aligned navigation -->
            <div class="d-flex align-items-center"> <!-- For vertical alignment -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- 'ms-auto' for right alignment -->
<!--                    <li class="nav-item">-->
<!--                        --><?php
//                        if ($this->Identity->isLoggedIn()) {
//                            $userType = $this->Identity->get('user_type');
//                            if ($userType === 'admin') {
//                                echo $this->Html->link(
//                                    'Modify Page',
//                                    ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index'],
//                                    ['class' => 'nav-link fire-text']
//                                );
//                            }
//                        }
//                        ?>
<!--                    </li>-->
                    <li class="nav-item">
                        <?php
                        $userType = $this->Identity->get('user_type');
                        if ($this->Identity->isLoggedIn() && $userType === 'admin') {
                            echo $this->Html->link(
                                'Dashboard',
                                ['controller' => 'Dashboard', 'action' => 'index'],
                                ['class' => 'nav-link fire-text']
                            );
                        }
                        ?>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        --><?php
//                        $userType = $this->Identity->get('user_type');
//                        if ($this->Identity->isLoggedIn() && $userType === 'admin') {
//                            echo $this->Html->link(
//                                'Dashboard 2',
//                                ['controller' => 'Dashboard2', 'action' => 'index'],
//                                ['class' => 'nav-link fire-text']
//                            );
//                        }
//                        ?>
<!--                    </li>-->
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
    </nav>


    <?= $this->fetch('content') ?>
</body>

</html>
