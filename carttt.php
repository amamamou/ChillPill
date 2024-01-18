<?php
session_start();
require 'connexion.php';

// Check if there's a cart alert message
$cart_alert = isset($_SESSION['cart_alert']) ? $_SESSION['cart_alert'] : '';
unset($_SESSION['cart_alert']); // Clear the cart alert after displaying it once

// Rest of your cart.php logic
?>
<!-- HTML content -->
<?php if ($cart_alert): ?>
    <script>
        alert('<?php echo $cart_alert; ?>');
    </script>
<?php endif; ?>
<!-- Rest of your HTML -->
