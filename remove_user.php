<?php
require "connexion.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["user_id"];

    // Prepare and execute a query to delete the product by ID
    $deleteQuery = "DELETE FROM users WHERE user_id = ?";
    $deleteStmt = mysqli_prepare($con, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $productId);

    if (mysqli_stmt_execute($deleteStmt)) {
        // Product successfully deleted
        header("Location: users.php"); // Redirect to the products page after deletion
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }

    mysqli_stmt_close($deleteStmt);
}

mysqli_close($con);
?>
