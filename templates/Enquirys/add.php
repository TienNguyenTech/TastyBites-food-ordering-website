<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<html>

<head>
    <title>Contact Us | Tasty Bites Kitchen</title>
</head>

<body>
   
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="row">
        <div class="enquirys form container"
            style="padding: 20px; background-color: #e8e8e8; margin-top: 20px; border-radius: 10px">
            <?= $this->Form->create($enquiry, ['id' => 'enquiryForm']) ?>
            <fieldset>
                <legend style="font-size: 32px; text-align: center; color: #22408c;"><?= __('Contact Us') ?></legend>
                <?php
                echo $this->Form->control('enquiry_name', ['label' => 'Name', 'class' => 'form-control']);
                echo $this->Form->control('enquiry_email', ['label' => 'Email', 'class' => 'form-control', 'type' => 'email']);
                echo $this->Form->control('enquiry_message', ['label' => 'Message', 'class' => 'form-control', 'type' => 'textarea']);
                echo '<div id="captchaContainer" class="g-recaptcha" data-sitekey="6LcjQ90pAAAAAJ39FVLi6JVnSf_5pXB8T03oZHF0" data-callback="enableSubmit"></div>';
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px', 'id' => 'submitButton', 'disabled' => 'disabled']) ?>
            <?= $this->Form->end() ?>

            <?= $this->Flash->render() ?>
        </div>
    </div>

    <script>
        // Function to enable submit button when captcha is completed
        function enableSubmit() {
            document.getElementById("submitButton").removeAttribute("disabled");
        }
    </script>
</body>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-5">
        <p class="m-0 text-center text-white">Copyright &copy;
            <?= $this->ContentBlock->text('copyright-message'); ?>
        </p>
    </div>
</footer>

</html>
