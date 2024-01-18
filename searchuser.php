<?php
// Include your database connection file
require 'connexion.php';

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    
    // Search for the exact username in the database based on the provided query
    $query = "SELECT * FROM users WHERE username = '$searchQuery'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['user_id'];
        // Redirect to compte.php with the user ID as a parameter
        header("Location: compte.php?user_id=$userID");
        exit();
    } else {
        echo "<script> alert('User not found!');window.location='users.php';</script>";
    }
}
?>
