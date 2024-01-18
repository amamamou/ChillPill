<?php
// remove_from_cart.php

// Start or resume the session
session_start();

// Include your database connection file
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_from_cart'])) {
        $cartId = $_POST['cart_id'];

        // Delete the item from the cart
        $deleteQuery = "DELETE FROM cart WHERE cart_id = $cartId";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {
            header("Location: cart.php");
            exit;
        } else {
            echo "Failed to remove item from cart: " . mysqli_error($con);
        }
    }
}
?>
