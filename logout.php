<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // For users
    unset($_SESSION['user_id']); // Unset user session variable(s)
    session_destroy(); // Destroy the user session

    // Redirect to user login page after logout
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION['admin_id'])) {
    // For admins
    unset($_SESSION['admin_id']); // Unset admin session variable(s)
    session_destroy(); // Destroy the admin session

    // Redirect to admin login page after logout
    header("Location: loginadmin.php");
    exit();
} else {
    // If no session is found, redirect to an error page or a default login page
    header("Location: error.php");
    exit();
}
?>
