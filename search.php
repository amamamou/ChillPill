<?php
// Include your database connection file
require 'connexion.php';

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    // Search for the product in the database based on the provided query
    $query = "SELECT * FROM products WHERE product_name ='$searchQuery'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productId = $row['product_id'];
        // Redirect to try.php with the product ID as a parameter
        header("Location: look.php?product_id=$productId");
        exit();
    } else {
        echo "Product not found!";
    }
}
?>
