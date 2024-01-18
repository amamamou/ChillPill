<?php
// adjust_quantity.php

session_start();

// Include your database connection file
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_quantity']) || isset($_POST['remove_quantity'])) {
        $cartId = $_POST['cart_id'];

        $action = isset($_POST['add_quantity']) ? "add" : "remove";

        $getQuantityQuery = "SELECT quantity FROM cart WHERE cart_id = $cartId";
        $quantityResult = mysqli_query($con, $getQuantityQuery);

        if ($quantityResult) {
            $row = mysqli_fetch_assoc($quantityResult);
            $currentQuantity = $row['quantity'];

            $newQuantity = $action == "add" ? $currentQuantity + 1 : max($currentQuantity - 1, 1);

            $updateQuantityQuery = "UPDATE cart SET quantity = $newQuantity WHERE cart_id = $cartId";
            $updateResult = mysqli_query($con, $updateQuantityQuery);

            if ($updateResult) {
                header("Location: cart.php");
                exit;
            } else {
                echo "Failed to update quantity: " . mysqli_error($con);
            }
        } else {
            echo "Error fetching current quantity: " . mysqli_error($con);
        }
    }
}
?>
