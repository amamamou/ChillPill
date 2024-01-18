<?php
require 'connexion.php'; 
session_start(); 

if (!isset($_SESSION['admin_id'])) {
    header("Location: loginadmin.php"); // Redirect to login page
    exit();
} 

if (isset($_POST['supp'])) {
    if (isset($_POST['commande_id'])) {
        $comID = $_POST['commande_id'];
        $id_c = $_POST['client_id'];

        $sql = "DELETE FROM commandes WHERE id_com = '$comID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Your command has been deleted.";
            $sql1 = "INSERT INTO message (id_c, id_com, message) VALUES ('$id_c', '$comID', '$message')";
            $message = mysqli_query($con, $sql1);

            header("location: commandes.php");
            exit;
        } else {
            echo "Error deleting the command.";
        }
    }
}

if (isset($_POST['validate_order'])) {
    if (isset($_POST['order_id'])) {
        $orderId = $_POST['order_id'];

        // Update order status to 'Accepted' or 'Being Delivered' based on your status codes
        $sql = "UPDATE orders SET status = 'Accepted' WHERE order_id = '$orderId'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Success message or any additional actions after order validation
        } else {
            echo "Error validating the order.";
        }
    }
}

$ordersQuery = "SELECT * FROM orders";
$ordersResult = mysqli_query($con, $ordersQuery);

if ($ordersResult) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Orders</title>
    <!-- Add your CSS for table display here -->
    <style>
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
    <h2>Admin Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($ordersResult)) : ?>
            <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td>$<?php echo $row['total_price']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <input type="submit" name="validate_order" value="Validate">
                    </form>
                
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php
} else {
    echo "Error fetching orders: " . mysqli_error($con);
}
?>
