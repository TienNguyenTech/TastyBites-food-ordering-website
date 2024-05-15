<!DOCTYPE html>
<html>

<head>
    <title>Stripe Subscription Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
<script type="text/javascript">
    var stripe = Stripe('pk_test_51PGCIxP0JLdKd5JZoxjvwrptCVUxRez3HRm0sWx2l0nuoOv9x3Uk4T5x7QKrK6HqO0ePBRyMVOp6OvkJ2zeMnEEq004OtORBay');
    var session = "<?php echo h($sessionId); ?>";
    stripe.redirectToCheckout({ sessionId: session })
        .then(function (result) {
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
</script>
</body>

</html>
