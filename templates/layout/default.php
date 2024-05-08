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
        <ul class="navbar-nav navbar-colour sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= $this->Url->build('/') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-hamburger"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $this->ContentBlock->text('website-title'); ?><sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link"
                    href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Pages', 'action' => 'display', 'home']) ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Customer Homepage</span></a>
                <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller' => 'Dashboard', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin Dashboard</span></a>
                <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller' => 'Menuitems', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-birthday-cake"></i>
                    <span>Menu</span></a>
                <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller' => 'Enquirys', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Enquiries</span></a>
                <a class="nav-link" href="<?= $this->Url->build (
                    ['plugin' => null,'plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Modify Page</span></a>
                <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller' => 'Orders', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Orders</span></a>
                <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller' => 'Payments', 'action' => 'index']) ?>">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Payments</span></a>



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
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php
                    // Determine if the current page is the menuitem add, edit, or index page
                    $isMenuItemEditPage = $this->getRequest()->getParam('controller') === 'Menuitems' && in_array($this->getRequest()->getParam('action'), ['edit', 'add']);
                    $isMenuItemIndexPage = $this->getRequest()->getParam('controller') === 'Menuitems' && $this->getRequest()->getParam('action') === 'index';
                    $isDashboardPage = $this->getRequest()->getParam('controller') === 'Dashboard' && $this->getRequest()->getParam('action') === 'index';

                    // Determine if the current page is the user add, edit, or index page
                    $isUserEditPage = $this->getRequest()->getParam('controller') === 'Users' && in_array($this->getRequest()->getParam('action'), ['edit', 'add']);
                    $isUserIndexPage = $this->getRequest()->getParam('controller') === 'Users' && $this->getRequest()->getParam('action') === 'index';

                    // Define the URL for the menu item index page
                    $menuIndexUrl = $this->Url->build(['controller' => 'Menuitems', 'action' => 'index']);

                    // Define the URL for the dashboard index page
                    $dashboardIndexUrl = $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']);

                    // Render the back button based on the page type
                    if(!$isDashboardPage) {
                        if ($isMenuItemEditPage) {
                            // If it's the edit or index page for menu items, return to the menu item index
                            echo $this->Html->tag(
                                'button',
                                $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                                ['onclick' => 'returnToMenu()', 'class' => 'btn btn-secondary']
                            );
                        } elseif ($isUserEditPage || $isUserIndexPage || $isMenuItemIndexPage) {
                            // If it's the edit or index page for users, return to the dashboard index
                            echo $this->Html->tag(
                                'button',
                                $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                                ['onclick' => 'returnToDashboard()', 'class' => 'btn btn-secondary']
                            );
                        } else {
                            // Otherwise, use the default back functionality
                            echo $this->Html->tag(
                                'button',
                                $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                                ['onclick' => 'goBack()', 'class' => 'btn btn-secondary']
                            );
                        }
                    }
                    ?>
                    <script>
                        // Function to navigate back to the menu item index and clear history
                        function returnToMenu() {
                            window.location.href = '<?php echo $menuIndexUrl; ?>';
                            window.history.replaceState(null, null, '<?php echo $menuIndexUrl; ?>');
                        }

                        // Function to navigate back to the dashboard index and clear history
                        function returnToDashboard() {
                            window.location.href = '<?php echo $dashboardIndexUrl; ?>';
                            window.history.replaceState(null, null, '<?php echo $dashboardIndexUrl; ?>');
                        }

                        // Function to navigate back
                        function goBack() {
                            window.history.back();
                        }
                    </script>

                    <!-- Topbar Navbar -->

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
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= $this->ContentBlock->text('copyright-message'); ?></span>
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
