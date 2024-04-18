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
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#"><b>Tasty Bites Kitchen</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> <!-- Changed 'ms-auto' to 'me-auto' -->
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">About</a>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Menu', ['controller' => 'Menuitems', 'action' => 'menu'], ['class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Enquiry', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link text-white']) ?>
                </li>
                <?php if (!$this->Identity->isLoggedIn()): ?>
                <li class="nav-item">
                    <?= $this->Html->link('Log in', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'nav-link text-white']) ?>
                </li>
                <?php endif; ?>
                <?php if ($this->Identity->isLoggedIn()): ?>
                <li class="nav-item">
                    <?= $this->Html->link('Dashboard', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'nav-link text-white']) ?>
                </li>
                </ul> <!-- Close the 'ul' tag here -->
                <ul class="navbar-nav"> <!-- New 'ul' tag for the right-aligned items -->
                    <li class="nav-item">
                        <form action="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'logout']) ?>" method="post">
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    </li>
                </ul>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


<?= $this->fetch('content') ?>
