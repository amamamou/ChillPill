<?php
require 'connexion.php';


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $usernameQuery = "SELECT username FROM users WHERE user_id = $userId";
    $usernameResult = mysqli_query($con, $usernameQuery);

    if ($usernameResult) {
        $row = mysqli_fetch_assoc($usernameResult);
        $usernameFromDatabase = $row['username'];
        $_SESSION['username'] = $usernameFromDatabase; 

        $cartQuery = "SELECT products.product_id, products.product_name, products.price, cart.quantity 
                      FROM cart 
                      INNER JOIN products ON cart.product_id = products.product_id 
                      WHERE cart.user_id = $userId";

        $cartResult = mysqli_query($con, $cartQuery);

        if ($cartResult) {
            $totalPurchase = 0; // Variable to hold total purchase amount
            
            // Insert into orders table
            $orderInsertQuery = "INSERT INTO orders (user_id, total_price, order_date, status) VALUES ('$userId', '$totalPurchase', NOW(), ?)";
            mysqli_query($con, $orderInsertQuery);

            // Fetch order status from orders table for the current user
            $statusQuery = "SELECT status FROM orders WHERE user_id = $userId ORDER BY order_date DESC LIMIT 1";
            $statusResult = mysqli_query($con, $statusQuery);

            if ($statusResult && mysqli_num_rows($statusResult) > 0) {
                $row = mysqli_fetch_assoc($statusResult);
                $status = $row['status']; // Assign fetched status to $status variable
            } else {
                $status = 'Pending'; // Default status if no status is found
            }
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>User Cart</title>
                <style>
                    /* Add your CSS for the container here */
                    .container {
                        max-width: 800px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        background-color: #f9f9f9;
                    }
                    /* Add your table styling here */
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th, td {
                        border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h2>User Cart</h2>
                    <table>
                        <tr>
                            <th colspan='6'>Username: <?php echo $_SESSION['username']; ?></th>
                        </tr>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($cartResult)) : ?>
                            <tr>
                                <td><?php echo $row['product_id']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td>$<?php echo $row['price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <?php
                                // Calculate total price for each product
                                $totalPrice = $row['price'] * $row['quantity'];
                                ?>
                                <td>$<?php echo $totalPrice; ?></td>
                            </tr>
                            <?php
                            // Accumulate total purchase amount
                            $totalPurchase += $totalPrice;
                            ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan='5'>Total Purchase</td>
                            <td>$<?php echo $totalPurchase; ?></td>
                        </tr>
                    </table>
                    <p>Order Status: <?php echo $status; ?></p>
                </div>
            </body>
            </html>
<?php
        } else {
            echo "Error fetching cart items: " . mysqli_error($con);
        }
    } else {
        echo "Error fetching username: " . mysqli_error($con);
    }
} else {
    echo "User not logged in.";
}
?>
