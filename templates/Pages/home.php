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

    <nav class="navbar navbar-expand-lg navbar-tea">
        <div class="container px-5">
            <a class="navbar-brand Big-Stuff" href="#!">Tasty Bites Kitchen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?= $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'display'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Contact Us', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link("Menu", ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>
                    </li>
                    <li class="nav-item"><?php
                    if (!$this->Identity->isLoggedIn()) {
                        echo $this->Html->link(
                            'Log in',
                            ['controller' => 'Auth', 'action' => 'login'],
                            ['class' => 'nav-link fire-text']
                        );
                    }
                    ?> </li>
                    <li class="nav-item">
                        <?php
                        if ($this->Identity->isLoggedIn()) {
                            echo $this->Html->link(
                                'Dashboard',
                                ['controller' => 'Dashboard', 'action' => 'index'],
                                ['class' => 'nav-link fire-text']
                            );
                            echo $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'nav-link fire-text']);
                        }
                        ?>
                    </li>

                </ul>
            </div>
        </div>
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
            background-color: #6fb89c;
            /* Default button color */
            border-color: #6fb89c;
            color: #273d4f;
        }

        .button-primary:hover {
            background-color: #cb4c46;
            /* Button color on hover */
            border-color: #cb4c46;
        }
    </style>

    <header class="bg-dark py-5 header-bg">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2 header-title">Welcome to Tasty Bites Kitchen</h1>
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
            background-color: #273d4f;
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
            color: #273d4f;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #273d4f;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #fff;
        }
    </style>

    <style>
        .about-us-bg-color {
            background-color: #273d4f;
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
            background-color: #273d4f;
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
                                <img src="webroot/img/LMAO1.jpg" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="webroot/img/LMAO3.jpg" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="webroot/img/LMAO4.jpg" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="webroot/img/LMAO5.jpg" class="d-block w-100" alt="Image 5">
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
                </div>
            </div>
        </div>
    </section>

    <!-- Features section-->
    <style>
        /* Override Bootstrap's primary color and gradient */
        .custom-bg {
            background-color: #273d4f;
            /* Your desired background color */
        }

        .feature-text {
            color: #fff5f1;
        }

        .custom-icon-bg {
            background-color: #6fb89c;
            /* Your desired background color */
        }

        .menu-link {
            color: #6fb89c;
            /* Base color */
            text-decoration: none;
        }

        .menu-link:hover {
            color: #cb4c46;
            /* Color on hover */
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
            background-color: #273d4f;
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
            <p class="m-0 text-center text-white">Copyright &copy; Tasty Bites Kitchen</p>
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