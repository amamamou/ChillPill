<?php
// Start or resume the session
session_start();

// Include your database connection file
require 'connexion.php';

// Assuming user_id and total_price are available
$userId = $_SESSION['user_id']; // User's ID from session
// Function to calculate total price
function calculateTotalPrice($con) {
    // Your logic to calculate the total price from the cart or wherever it's derived
    // For instance, querying the cart table to sum up the prices
    $userId = $_SESSION['user_id'];
    $cartQuery = "SELECT SUM(products.price * cart.quantity) AS total_price
                  FROM cart 
                  INNER JOIN products ON cart.product_id = products.product_id 
                  WHERE cart.user_id = '$userId'";
    $result = mysqli_query($con, $cartQuery);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_price'];
    } else {
        return 0; // Or handle the error accordingly
    }
}

// Usage
$totalPrice = calculateTotalPrice($con);

// Insert into orders table
$orderInsertQuery = "INSERT INTO orders (user_id, total_price, order_date) VALUES ('$userId', '$totalPrice', NOW())";
mysqli_query($con, $orderInsertQuery);
?>