<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

<!--    --><?php //= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center;">Tasty Bites Kitchen</h1>


    <div class="container" style="text-align: center; background-color: #E8E8E8; border-radius: 10px; padding: 10px">
<!--        --><?php //= $this->fetch('content') ?>
        <h2>Error 404: Page not found</h2>
        <p>The page you were trying to access could not be found or does not exist.</p>
        <?= $this->Html->link(__('Return to home'), '/', ["class" => "btn btn-primary"]) ?>
    </div>

    <footer class="py-5 bg-dark" style="position: absolute; bottom: 0; width: 100%;">
            <div class="container px-5">
                <p class="m-0 text-center text-white">Copyright &copy;
                    <?= $this->ContentBlock->text('copyright-message'); ?>
                </p>
            </div>
    </footer>

</body>
</html>
