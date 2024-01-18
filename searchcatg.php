<?php
// Include your database connection file
require 'connexion.php';

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    // Search for the category in the database based on the provided query
    $query = "SELECT * FROM products WHERE category_name ='$searchQuery'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productId = $row['category_name'];
        // Redirect to product.php with the category name as a parameter
        header("Location:pro.php?category=$productId");
        exit();
    } else {
        echo "Category not found!";
    }
}
?>
