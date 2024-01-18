<?php
session_start();

require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // del profile mel query
        $deleteQuery = "DELETE FROM users WHERE user_id = '$userId'";
        $result = mysqli_query($con, $deleteQuery);

        if ($result) {
            // si oui
            session_destroy();
            header('Location: signin.php');
            exit();
        } else {
            // si non
            echo "Failed to delete profile: " . mysqli_error($con);
        }
    } else {
    
        header('Location: login.php');
        exit();
    }
}
?>
