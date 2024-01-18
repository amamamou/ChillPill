<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_order'])) {
    if (isset($_SESSION['user_id'])) {
        // Retrieve necessary data
        $userId = $_SESSION['user_id'];
        $totalPrice = $_POST['total_price']; // Assuming total price is passed via POST
        $orderDate = date("Y-m-d H:i:s"); // Get the current date and time
        $status = "pending"; // Set the initial status for the order

        // Include the database connection
        require 'connexion.php';

        // Insert order into 'orders' table
        $insertOrderQuery = "INSERT INTO orders (user_id, order_date, total_price, status) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($insertOrderQuery);
        $stmt->bind_param("isds", $userId, $orderDate, $totalPrice, $status);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Order placed successfully!'); window.location='products.php';</script>";
        } else {
            echo "Failed to place order.";
            // Handle failure accordingly
        }

        // Close statement
        $stmt->close();
    } else {
        echo "User not logged in.";
        // Handle user not logged in
    }

    // Close connection
    $con->close();
} else {
    echo "Invalid request.";
    // Handle invalid request
}
?>
