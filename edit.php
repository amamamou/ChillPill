<?php
require "connexion.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_product"])) {
    $productId = $_POST["product_id"];

    // Retrieve the product details using the $productId
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    // Redirect to an edit form page with the product details for editing
    // You might use these details to prefill an edit form for the user
    /*if ($product) {
        // You can redirect and pass product details via URL parameters or sessions
        // For example:
        header("Location: edit_form.php?product_id=" . $product['product_id']);
        exit();
    } else {
        echo "Product not found!";
    }*/

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>
