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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        ConnectionManager::get($name)->getDriver()->connect();
        // No exception means success
        $connected = true;
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/5/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

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
    .Big-Stuff {
        color: #cb4c46; /* Color of active page */
        font-size: 25px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-tea">
    <div class="container px-5">
        <a class="navbar-brand Big-Stuff" href="#!">Tasty Bites Kitchen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active fire-text" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">Menu</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">Cart</a></li>
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
                        <a class="btn button-primary btn-lg px-4" href="#!">Learn More</a>
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
    }
</style>

<section class="py-5 border-bottom custom-bg" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature custom-icon-bg text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                <h2 class="h4 fw-bolder feature-text">Step 1: Place an Order </h2>
                <p class="feature-text">Choose from our wide selection of Nepalese momo and soup dishes.</p>
                <a class="text-decoration-none" href="#!">
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

<section class="py-5 border-bottom">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Customer testimonials</h2>
            <p class="lead mb-0">Our customers love working with us</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- Testimonial 1-->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">Thank you for putting together such a great product. We loved working with you and the whole team, and we will be recommending you to others!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2-->
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">The whole team was a huge help with putting things together for our company and brand. We will be hiring them again in the near future for additional work!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact section-->
<section class="bg-light py-5">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
            <h2 class="fw-bolder">Get in touch</h2>
            <p class="lead mb-0">We'd love to hear from you</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Full name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Phone number</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
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
