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
            color: #dd1d3c;
        }

        .Big-Stuff {
            color: #fff5f1;
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
            color:#7287bb;
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
            background-color: #294890;
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

        a.nav-link.dropdown-toggle {
            color: white;
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
            <div class="d-flex align-items-center">
                <?= $this->Html->link(
                    $this->ContentBlock->text('website-title'),
                    ['controller' => 'Pages', 'action' => 'display'],
                    ['class' => 'navbar-brand Big-Stuff']
                ) ?>

                <!-- Left-side navigation links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> <!-- 'me-auto' for left alignment -->
                    <li class="nav-item">
                        <?= $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'display'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link("Menu", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Contact Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link("Order Now", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'dropdown-item']) ?>
                            </li>
                            <li><?= $this->Html->link('Give Feedback', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'dropdown-item']) ?>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Events', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                </ul>
            </div>

            <!-- Right-aligned navigation -->
            <div class="d-flex align-items-center"> <!-- For vertical alignment -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- 'ms-auto' for right alignment -->
                    <li class="nav-item">
                        <?php
                        if ($this->Identity->isLoggedIn()) {
                            $userType = $this->Identity->get('user_type');
                            if ($userType === 'admin') {
                                echo $this->Html->link(
                                    'Modify Page',
                                    ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index'],
                                    ['class' => 'nav-link fire-text']
                                );
                            }
                        }
                        ?>
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
<!--                    <li class="nav-item">-->
<!--                        --><?php
//                        $userType = $this->Identity->get('user_type');
//                        if ($this->Identity->isLoggedIn() && $userType === 'admin') {
//                            echo $this->Html->link(
//                                'Dashboard',
//                                ['controller' => 'Dashboard', 'action' => 'index'],
//                                ['class' => 'nav-link fire-text']
//                            );
//                        }
//                        ?>
<!--                    </li>-->
                    <li class="nav-item">
                        <?php
                        $userType = $this->Identity->get('user_type');
                        if ($this->Identity->isLoggedIn() && $userType === 'admin') {
                            echo $this->Html->link(
                                'Dashboard 2',
                                ['controller' => 'Dashboard2', 'action' => 'index'],
                                ['class' => 'nav-link fire-text']
                            );
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


        <!-- The pop-up message with an arrow pointing to the target button -->
        <?php
        if ($this->Identity->isLoggedIn()) {
            $userType = $this->Identity->get('user_type');
            if ($userType === 'admin') {
                // Display the popup for admin users
                ?>
                <div class="popup" id="popup">
                    <div class="arrow"></div> <!-- The arrow pointing to the button -->
                    <p>You have been logged in as an admin. Use the Dashboard to manage your business.</p>
                </div>
                <?php
            }
        } ?>

        <script>
            // Function to show the pop-up and hide it after 5 seconds
            function showPopup() {
                var popup = document.getElementById("popup");
                popup.style.display = "block"; // Show the pop-up

                // Hide the pop-up after 5 seconds
                setTimeout(function () {
                    popup.style.display = "none";
                }, 12000);
            }

            // Trigger the pop-up to show when the page loads
            window.onload = showPopup; // You can change the trigger condition as needed
        </script>

    </nav>


    <!-- Header-->
    <style>
        .header-bg {
            background-image: url("webroot/img/momo_background.jpg");
            /* Add the file extension ".jpg" */
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
            background-color: #bcccf3;
            /* Default button color */
            border-color: #7287bb;
            color:#294890;
        }

        .button-primary:hover {
            background-color: #f4b4bc;
            /* Button color on hover */
            border-color:#f4b4bc;
        }
    </style>

    <header class="bg-dark py-5 header-bg">
        <!--    sale text edit by admin-->
        <div class="container text-center mt-3" >
            <p style="color: red;" ><?= $this->ContentBlock->text('banner'); ?></p>
        </div>
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2 header-title">Welcome to
                            <?= $this->ContentBlock->text('website-title'); ?>
                        </h1>
                        <p class="lead text-white mb-4 header-text">Experience the most authentic Nepalese cuisine in
                            Melbourne</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-center">

                            <?= $this->Html->link("Browse Dishes", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'btn button-primary btn-lg px-4']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--<a class="btn button-primary btn-lg px-4 me-sm-3" href="#features">How it works</a>-->

    <!-- About Us section-->

    <style>
        .about-us-bg-color {
            background-color: #294890;
        }

        .about-us-text-color {
            color: #fff5f1;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 3rem;
            height: 3rem;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            color: #294890;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #294890;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #fff;
        }
    </style>

    <style>
        .about-us-bg-color {
            background-color: #294890;
        }

        .about-us-text-color {
            color: #fff5f1;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>

    <style>
        .about-us-bg-color {
            background-color:#294890;
        }

        .about-us-text-color {
            color: #fff5f1;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>

    <section class="py-5 about-us-bg-color">
        <div class="container px-5 my-5 px-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-us-text-color">
                        <div class="text-center mb-5">
                            <h2 class="fw-bolder">About Us</h2>
                            <p class="lead mb-0">Discover the story behind our Nepalese take-and-make food service</p>
                        </div>
                        <div>
                            <p>We are passionate about bringing the authentic flavors of Nepal to your home with our
                                take-and-make food service. Our journey began with a love for Nepalese cuisine and a
                                desire to share it with others.</p>
                            <p>At our core, we believe in using fresh, high-quality ingredients to create mouthwatering
                                dishes that capture the essence of Nepalese cooking. Each meal is carefully crafted to
                                deliver an unforgettable culinary experience.</p>
                            <p>Whether you're craving momo dumplings, flavorful curries, or aromatic rice dishes, we
                                have something for everyone. Our easy-to-prepare meals allow you to enjoy
                                restaurant-quality food in the comfort of your own kitchen.</p>
                            <p>Join us on a culinary adventure as we celebrate the rich heritage and diverse flavors of
                                Nepal. With our take-and-make food service, you can savor the taste of Nepal without
                                leaving home.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!--                                <img src="--><?php //= $this->ContentBlock->image('shown-image-1'); ?><!--" class="d-block w-100" alt="Image 1">-->
                                <?= $this->ContentBlock->image('shown-image-1'); ?>
                            </div>
                            <div class="carousel-item">
                                <!--                                <img src="webroot/img/LMAO3.jpg" class="d-block w-100" alt="Image 3">-->
                                <?= $this->ContentBlock->image('shown-image-2'); ?>
                            </div>
                            <div class="carousel-item">
                                <!--                                <img src="webroot/img/LMAO4.jpg" class="d-block w-100" alt="Image 4">-->
                                <?= $this->ContentBlock->image('shown-image-3'); ?>
                            </div>
                            <div class="carousel-item">
                                <!--                                <img src="webroot/img/LMAO5.jpg" class="d-block w-100" alt="Image 5">-->
                                <?= $this->ContentBlock->image('shown-image-4'); ?>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="google-maps-widget mt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.756198102105!2d145.133957!3d-37.907803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad63c9c1eb47c7b%3A0x8485d30e3ce706b7!2sMonash%20University%20-%20Clayton%20Campus!5e0!3m2!1sen!2sau!4v1634177430748!5m2!1sen!2sau&markers=-37.907803,145.133957" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                    </div>
        </div>


    </section>

    <!-- Features section-->
    <style>
        /* Override Bootstrap's primary color and gradient */
        .custom-bg {
            background-color: #294890;
            /* Your desired background color */
        }

        .feature-text {
            color: #fff5f1;
        }

        .custom-icon-bg {
            background-color: #7287bb;
            /* Your desired background color */
        }

        .menu-link {
            color: #f4b4bc; /* Base color */
            text-decoration: underline;
            text-decoration-color: #7287bb;
        }

        .menu-link:hover {
            color: #dd1d3c; /* Color on hover */
            text-decoration: underline;
            text-decoration-color: #7287bb;
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
                    <p class="feature-text">Head to our kitchen, and pick up your order along with the cooking
                        instructions.</p>
                </div>
                <div class="col-lg-4">
                    <div class="feature custom-icon-bg text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                    <h2 class="h4 fw-bolder feature-text">Step 3: Enjoy!</h2>
                    <p class="feature-text">Prepare the meal according to our recipe, or add your own flair! </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section-->


    <style>
        .testimonial_color {
            background-color: #294890;
        }

        .testimonial-text {
            color: #fff5f1;

        }
    </style>
    <section class="py-5 border-bottom testimonial_color" id="testimonials">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder testimonial-text">Customer testimonials</h2>
                <p class="lead mb- testimonial-text">Hear from our delighted Customers!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- Testimonial 1-->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">Wow, what an amazing experience! This team brought the authentic
                                        flavors of Nepal right into my kitchen. Highly recommend to all nepalese food
                                        enthusiasts!</p>
                                    <div class="small text-muted">- Priya Sharma, Richmond</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2-->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">As someone with a busy schedule, I'm always on the lookout for
                                        convenient meal options that don't compromise on taste. The flavors transported
                                        me back to the streets of Kathmandu. Thank you for making dinner time a delight
                                    </p>
                                    <div class="small text-muted">- Rajesh Patel, Clayton</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy;
                <?= $this->ContentBlock->text('copyright-message'); ?>
            </p>
        </div>
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
