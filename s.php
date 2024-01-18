
<?php
// display_my_products_of_my_cart.php


session_start();

require 'connexion.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
//fetching
    $cartQuery = "SELECT cart.cart_id, products.product_id, products.product_name, products.price, products.image_url, cart.quantity 
                  FROM cart 
                  INNER JOIN products ON cart.product_id = products.product_id 
                  WHERE cart.user_id = $userId";

    $cartResult = mysqli_query($con, $cartQuery);

    if ($cartResult) {
        if (mysqli_num_rows($cartResult) > 0) {
            
            $totalPurchasePrice = 0;

            // son calcul
            while ($row = mysqli_fetch_assoc($cartResult)) {
                $totalPrice = $row['price'] * $row['quantity'];
                $totalPurchasePrice += $totalPrice;
            }
            //displaying
            echo "<p class='total-price'>Total Purchase Price: $" . $totalPurchasePrice . "</p>";
            echo "<form method='POST' action='commande.php'>";
            echo "<input type='hidden' name='total_price' value='" . $totalPurchasePrice . "'>"; // Assuming $totalPurchasePrice exists
        
            // Add Confirm button
            echo "<button type='submit' class='confirm-btn' name='confirm_order'>Confirm</button>";
            
            echo "</form>";
         

            // Reset the pointer to fetch cart items again
            mysqli_data_seek($cartResult, 0);

            //displaying
            echo "<div class='cart-container'>";

            while ($row = mysqli_fetch_assoc($cartResult)) {
                echo "<div class='cart-item' style='border: 1px solid #000; padding: 10px; margin-bottom: 10px;'>";
//image etc
echo "<a href='look.php?product_id=" . $row['product_id'] . "'><img src='" . $row['image_url'] . "' alt='" . $row['product_name'] . "' style='width: 100px; height: auto;'></a>";

echo "<div class='cart-details'>";
echo "<h3>" . $row['product_name'] . "</h3>";
echo "<p>Price: $" . $row['price'] . "</p>";
echo "<p>Quantity: " . $row['quantity'] . "</p>";

// nehseb total price
$totalPrice = $row['price'] * $row['quantity'];
echo "<p>Total Price: $" . $totalPrice . "</p>";

// buttons
echo "<form action='adjust_quantity.php' method='post'>";
echo "<input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>";
echo "<button type='submit' name='add_quantity'>Add 1</button>";
echo "<button type='submit' id='removeForm' name='remove_quantity'>Remove 1</button>";
echo "</form>";

// nahiiiii
echo "<form action='remove_from_cart.php' method='post'>";
echo "<input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>";
echo "<button type='submit' name='delete_from_cart'>Delete</button>";

echo "</form>";

echo "</div>"; // cart-details

echo "</div>"; //  cart-item 
}

echo "</div>"; // cart-container 
} else {
echo "Your cart is empty.";
}
} else {
echo "Error fetching cart items: " . mysqli_error($con);
}
} else {
echo "User not logged in.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .total-price {
            text-align: center;
            font-size: 1.2em;
            margin-top:60px;
        }
        /* Style for the form container */
        form {
            display: flex;
            justify-content: space-between;
            width: 500px; /* Adjust the width if needed */
            margin-top: 10px;
        }

        /* Style for each button */
        form button[name='add_quantity'],
        form button[name='remove_quantity'],
        form button[name='delete_from_cart'], .confirm-btn{
            flex: 1;
            
            margin-right: 10px;
            padding: 10px;
            background-color: #f4d6c5; /* Pastel color */
            color: #534b4f; /* Navy color */
            font-size: 1.2em;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            display: block;
        }

        /* Style for the delete button */
        form button[name='delete_from_cart'] {
            background-color: red; /* Red color */
            color: white; /* White text color */
        }

        /* Hover effect for buttons */
        form button[name='add_quantity']:hover,
        form button[name='remove_quantity']:hover,
        form button[name='delete_from_cart']:hover .confirm-btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
</html>
