<!-- File: src/Template/Element/navbar.ctp -->
<nav class="navbar navbar-expand-lg navbar-tea">
    <div class="container px-5">
        <a class="navbar-brand Big-Stuff" href="#!">Tasty Bites Kitchen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active-home fire-text" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link fire-text" href="#!">Menu</a></li>
                <li class="nav-item"><?= $this->Html->link('Enquiry', ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'nav-link fire-text']) ?></li>
                <?php if (!$this->Identity->isLoggedIn()): ?>
                    <li class="nav-item"><?= $this->Html->link('Log in', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'nav-link fire-text']) ?></li>
                <?php else: ?>
                    <li class="nav-item"><?= $this->Html->link('Dashboard', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'nav-link fire-text']) ?></li>
                    <li class="nav-item"><?= $this->Html->link('Logout', ['controller' => 'Auth', 'action' => 'logout'], ['class' => 'nav-link fire-text']) ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
