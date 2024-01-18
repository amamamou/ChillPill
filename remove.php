<?php
require "connexion.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];

    // Prepare and execute a query to delete the product by ID
    $deleteQuery = "DELETE FROM products WHERE product_id = ?";
    $deleteStmt = mysqli_prepare($con, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $productId);

    if (mysqli_stmt_execute($deleteStmt)) {
        // Product successfully deleted
        header("Location: admin_products.php"); // Redirect to the products page after deletion
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }

    mysqli_stmt_close($deleteStmt);
}

mysqli_close($con);
?>
