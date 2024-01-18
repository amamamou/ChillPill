<?php
require 'connexion.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: loginadmin.php"); // Redirect to login page for admins
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate_order'])) {
    $orderId = $_POST['order_id'];
    
    // Update order status to "being delivered"
    $updateQuery = "UPDATE orders SET status = 'being delivered' WHERE order_id = $orderId";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        header("Location: display_orders.php"); // Redirect to the order display page
        exit();
    } else {
        echo "Failed to update order status: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
