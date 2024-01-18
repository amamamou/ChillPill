<?php
// addcart.php

session_start();

require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the product ID and quantity are set
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // quantite
        if ($quantity > 0 && $quantity <= 10) {

            // check ken l user connected
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];

                // check ken lproduit fel cart
                $checkCartQuery = "SELECT * FROM cart WHERE user_id = $userId AND product_id = $productId";
                $checkCartResult = mysqli_query($con, $checkCartQuery);

                if ($checkCartResult) {
                    if (mysqli_num_rows($checkCartResult) > 0) {
                        // nzid quantity kenou fil cart deja
                        $updateCartQuery = "UPDATE cart SET quantity = quantity + $quantity WHERE user_id = $userId AND product_id = $productId";
                        mysqli_query($con, $updateCartQuery);
                        echo "<script>alert('Product quantity updated in the cart!');window.location='cart.php';</script>";
                    } else {
                        // kenou moch fel cart
                        $insertCartQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($userId, $productId, $quantity)";
                        mysqli_query($con, $insertCartQuery);
                        echo "<script>alert('Product added to the cart!');window.location='cart.php';</script>";
                    }
                } else {
                    echo "Error executing the query: " . mysqli_error($con);
                }
            } else {
                echo "<script>alert('You are not logged in!');window.location='login.php';</script>";

            }
        } else {
            echo "Invalid quantity. Please select a quantity between 1 and 10."; 
        }
    } else {
        echo "Product ID or quantity not provided.";
    }
}
?>
