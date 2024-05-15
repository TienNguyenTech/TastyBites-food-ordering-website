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
    <link rel="icon" type="image/x-icon" href="webroot/assets/true_favi.ico" />
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
    <a id="top"></a>

    <nav class="navbar navbar-expand-lg navbar-tea">
        <div class="container-fluid"> <!-- Using container-fluid for proper spacing -->
            <!-- Left-aligned navigation, including the restaurant's logo -->
            <div class="d-flex align-items-center">
                <?= $this->Html->link(
                    $this->ContentBlock->text('website-title'),
                    ['controller' => 'Pages', 'action' => 'display'],
                    ['class' => 'navbar-brand Big-Stuff']
                ) ?>

            </div>

            <!-- Right-aligned navigation -->
            <div class="d-flex align-items-center"> <!-- For vertical alignment -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                    </button>


                <!-- HAMBURGER -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
            color: #26367b;
            font-size: 36px;
            margin-bottom: 20px;
            /* Add text shadow */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Add text stroke */
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: black
        }

        .header-text {
            color: #26367b;
            font-size: 18px;
            margin-bottom: 20px;
            /* Add text shadow */
            text-shadow: 4px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .button-primary {
            background-color: #bcccf3;
            /* Default button color */
            border-color: #7287bb;
            color:#ecf1ff;
        }

        .button-primary:hover {
            background-color: #f4b4bc;
            /* Button color on hover */
            border-color:#f4b4bc;
        }
    </style>

    <style>
        /* Custom button text color */
        .custom-btn {
            color: #2f3e85; /* Text color */
        }
    </style>


    <header class="bg-dark py-5 header-bg">
        <!--    sale text edit by admin-->
        <div class="container text-center mt-3" style="background-color: #bcccf3; border-radius: 5px">
            <p style="color: #294890;" ><?= $this->ContentBlock->text('banner'); ?></p>
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
                            <?= $this->Html->link("Browse Dishes", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'btn button-primary btn-lg px-4 custom-btn']) ?>
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
            background-color: #ecf1ff;
        }

        .about-us-text-color {
            color: #26367b;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 3rem;
            height: 3rem;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            color: #ecf1ff;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #ecf1ff;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #fff;
        }
    </style>

    <style>
        .about-us-bg-color {
            background-color: #ecf1ff;
        }

        .about-us-text-color {
            color: #26367b;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>

    <style>
        .about-us-bg-color {
            background-color: #ecf1ff;
        }

        .about-us-text-color {
            color: #26367b;
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





    <!-- GMAP section-->
    <style>
        .google-maps-section {
            background-color: #ebf3fb; /* Example background color */
            padding: 20px; /* Example padding */
        }
        .google-maps-title {
            text-align: center; /* Center the title */
            margin-bottom: 20px; /* Example margin */
            margin-top: 20px;
        }
        .google-maps-image {
            float: right; /* Align the image to the right */
            margin-left: 20px; /* Example margin */
        }
        .google-maps-image img {
            width: 500px; /* Adjust to your desired width */
            height: auto; /* Maintain aspect ratio */
    </style>

        <div class="container">
            <h2 class="google-maps-title"><a href="https://maps.app.goo.gl/FLPCFajV7bpmx9kM6"  target="_blank" >Where to Find Us!</a></h2>
            <div class="google-maps-iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d974.1693785493786!2d145.13548986707153!3d-37.909728420394025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad66b7b5148f6f3%3A0x389a5526496c59a0!2sWoodside%20Building%20for%20Technology%20and%20Design!5e0!3m2!1sen!2sau!4v1715766998412!5m2!1sen!2sau" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

    </section>

    <!-- Features section-->
    <style>
        /* Override Bootstrap's primary color and gradient */
        .custom-bg {
            background-color:#ecf1ff;
            /* Your desired background color */
        }

        .feature-text {
            color: #26367b;
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
                    <a class="text-decoration-none menu-link" href="<?= $this->Url->build(['controller' => 'Menuitems', 'action' => 'menu']) ?>">
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
            background-color:#ecf1ff;
        }

        .testimonial-text {
            color: #26367b;

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


    <style>
        /* Scroll to top container */
        .scroll-to-top-container {
            display: flex;
            justify-content: flex-start; /* Align button to the left */
            background-color: #ecf1ff; /* Background color */
            padding-left: 20px; /* Add padding to adjust button position */
        }

        /* Scroll to top button */
        .scroll-to-top-btn {
            display: flex;
            align-items: center;
            height: 40px; /* Button height */
            background-color: #2f3e85; /* Button background color */
            color: #ebf3fb; /* Button text color */
            font-size: 16px; /* Button text size */
            text-decoration: none; /* Remove default link styling */
            padding: 0 15px; /* Add padding to adjust button size */
            border-radius: 5px; /* Add border radius for rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }

        /* Hover effect */
        .scroll-to-top-btn:hover {


            background-color: #5d99df; /* Darker shade of the button color on hover */
            color: #ebf3fb;
        }
    </style>

    <!--Scroll back to top button-->
    <div class="scroll-to-top-container">
        <?= $this->Html->link('Return to top', '#top', ['class' => 'scroll-to-top-btn']) ?>
    </div>


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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
