<?php
require 'connexion.php';

// mel JavaScript
$productId = $_POST['productId'];
$newProductName = $_POST['newProductName'];
$newProductDescription = $_POST['newProductDescription'];


$query = "UPDATE products SET product_name = '$newProductName', description = '$newProductDescription' WHERE product_id = $productId";

if (mysqli_query($con, $query)) {
    echo "Product updated successfully!";
} else {
    echo "Failed to update product.";
}
?>
