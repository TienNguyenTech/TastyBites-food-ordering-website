<!DOCTYPE html>
<html>

<head>
    <title>Stripe Subscription Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
<script type="text/javascript">
    var stripe = Stripe('pk_test_51PGCIxP0JLdKd5JZb2cFYYwNpALcYBABBzAUiDW3EiA8lVF8GfLlhAky2do0sXpM0z91B2c2GIi44O5kJZiP6AcU00JISGElGK');
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
