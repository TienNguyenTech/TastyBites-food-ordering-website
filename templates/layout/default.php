<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-2.min.css') ?>
    <?= $this->Html->css('styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav slidebar-background sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build('/') ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hamburger"></i>
            </div>
            <div class="sidebar-brand-text mx-3 bc-red">Tasty Bites Kitchen<sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Dashboard','action'=>'index']) ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Dashboard</span></a>
<!--            <a class="nav-link" href="--><?php //= $this->Url->build(['controller'=>'Pages','action'=>'display','home']) ?><!--">-->
<!--                <i class="fas fa-fw fa-home"></i>-->
<!--                <span>Homepage</span></a>-->
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Menuitems','action'=>'index']) ?>">
                <i class="fas fa-fw fa-birthday-cake"></i>
                <span>Menu</span></a>
            <a class="nav-link" href="<?= $this->Url->build(['controller'=>'Orders','action'=>'index']) ?>">
                <i class="fas fa-fw fa-pen"></i>
                <span>Orders</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
<!--        <div class="sidebar-heading bc-red">-->
<!--            Functions-->
<!--        </div>-->
<!--        <div class="top-nav-links">-->
<!--            <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Documentation</a>-->
<!--            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>-->
<!--            --><?php
//            if (!$this->Identity->isLoggedIn()) {
//                echo $this->Html->link(
//                    'Log in',
//                    ['controller' => 'Auth', 'action' => 'login'],
//                    ['class' => 'button button-outline']);
//            }
//            ?>
<!--            --><?php
//            if ($this->Identity->isLoggedIn()) {
//                echo $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout']);
//            }
//            ?>
<!--        </div>-->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column navbar-colour">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light navbar-colour topbar mb-4 static-top shadow">

<!--                <div class="header-left navbar-colour">-->
<!--                            <div class="dashboard_bar">-->
<!--                                Dashboard-->
<!--                            </div>-->
<!--                </div>-->
                <!-- Sidebar Toggle (Topbar) -->

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

<!--                back button And hidden when back to dashboard index-->
                <?php
                // Determine if the current page is the dashboard page
                $isDashboardPage = $this->getRequest()->getParam('controller') === 'Dashboard' && $this->getRequest()->getParam('action') === 'index';

                // Define the URL for the dashboard page
                $dashboardIndexUrl = $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']);

                // Render the back button if not on the dashboard page
                if (!$isDashboardPage) {
                    echo $this->Html->tag(
                        'button',
                        $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                        ['onclick' => 'goBack()', 'class' => 'btn btn-secondary']
                    );
                }
                ?>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>


                <!-- Topbar Navbar -->
<!--                <ul class="navbar-nav ml-auto">-->
<!---->
<!--                    <li class="nav-item dropdown no-arrow">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"-->
<!--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            --><?php //= $this->Html->image('undraw_profile.svg',['class'=>'img-profile rounded-circle'])?>
<!--                        </a>-->
                       <!-- Dropdown - User Information -->
<!--                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">-->
<!--                            --><?php //if ($this->Identity->isLoggedIn()): ?>
<!--                                --><?php //= $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'dropdown-item']) ?>
<!--                            --><?php //endif; ?>
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if ($this->Identity->isLoggedIn()): ?>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                        <?php endif; ?>
                    </li>
                </ul>

                <!-- Logout Confirmation Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black;">Are you sure you want to logout?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                                <?= $this->Html->link('Yes', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid con-colour">
                <!-- page content here -->
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer navbar-colour">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Tasty Bites Kitchen 2024</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

<!-- Core plugin JavaScript-->
<?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

<!-- Custom scripts for all pages-->
<?= $this->Html->script('sb-admin-2.min.js') ?>

<?= $this->fetch('script') ?>
</body>

</html>
