<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menuitem> $menuitems
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
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




<div class="menuitems index content text-gray-800">
    <?= $this->Html->link(__('New Menuitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="text-gray-800">Menu Items</h3>

    <?= $this->Form->create(null, [
        'url' => [
            'action' => 'search'
        ]
    ]) ?>



    <div>
        <?php foreach ($menuitems as $menuitem): ?>
            <div class="card" style="width: 18rem;">
                <img src="../webroot/img/momo_background.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $menuitem->menuitem_name?></h5>
                    <h5><?= $this->Number->currency($menuitem->menuitem_price) ?></h5>
                    <p class="card-text text-gray-800"><?= $menuitem->menuitem_desc ?></p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link"><button>Add to cart</button></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</div>