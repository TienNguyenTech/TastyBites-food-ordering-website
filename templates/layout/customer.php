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
    <!--    --><?php //= $this->Html->css('styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
</head>

<body>
    <!-- Responsive navbar-->
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            /* Aligns left and right */
            padding: 20px;
        }

        .align-left {
            justify-content: flex-start;
        }

        .align-right {
            justify-content: flex-end;
        }

        /* Override Bootstrap's primary color */
        .navbar-tea {
            background-color: #273d4f;
            display: flex;
            justify-content: space-between;
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

        .btn-primary {
            background-color: #273d4f;
            /* Custom color for the button */
            width: 100%;
            /* Button takes full width of the footer */
            margin: 0;
            /* No extra margin on any side */
            width: 100px;


        }
    

        .navbar-links {
            display: flex;
            /* This makes the child elements align horizontally */
            justify-content: flex-start;
            /* Default alignment */
            align-items: center;
            /* Align items vertically in the center */
        }

        .nav-item {
            margin-right: 15px;
            /* Spacing between items */
        }
    </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-tea">
            <div class="container">
                <a class="navbar-brand Big-Stuff" href="/">Tasty Bites Kitchen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-links ms-auto">
                        <div class="nav-item">
                            <a class="nav-link fire-text" aria-current="page" href="/">Home</a>
                        </div>
                        <div class="nav-item">
                            <?= $this->Html->link('Menu', ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link fire-text']) ?>
                        </div>
                        <div class="nav-item">
                            <?= $this->Html->link('Contact Us', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?>
                        </div>
                        <div class="nav-item">
                            <?php if (!$this->Identity->isLoggedIn()): ?>
                                <?= $this->Html->link('Log in', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'btn btn-primary']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="nav-item">
                            <?php if ($this->Identity->isLoggedIn()): ?>
                                <?= $this->Html->link('Dashboard', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
                                <?= $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-primary']) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </body>


    <?= $this->fetch('content') ?>