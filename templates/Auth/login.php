<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->layout = 'login';
$this->assign('title', 'Login');
?>

<!-- Include the reCAPTCHA script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <h1 class="page-title">Tasty Bites Kitchen</h1>
            <div class="users form content">

                <?= $this->Form->create() ?>

                <fieldset>

                    <legend style="font-size: 24px;">Login</legend>

                    <?= $this->Flash->render() ?>

                    <?php
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                    ]);
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                    ]);

                    // Add the reCAPTCHA widget
                    echo '<div class="g-recaptcha" data-sitekey="6LcjQ90pAAAAAJ39FVLi6JVnSf_5pXB8T03oZHF0" data-callback="enableSubmit"></div>';
                    ?>
                </fieldset>

                <!-- Add the submit button -->
                <div class="input-wrapper">
                    <?= $this->Form->button('Login', ['class' => 'centered-button', 'id' => 'submitButton', 'disabled' => 'disabled']) ?>
                </div>

                <?= $this->Form->end() ?>

                <hr class="hr-between-buttons">

                <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button button-clear']) ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to enable submit button when captcha is completed
    function enableSubmit() {
        document.getElementById("submitButton").removeAttribute("disabled");
    }
</script>
