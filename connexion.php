<?php
$hostname = "127.0.0.1"; 
$username = "root"; 
$password = "";
$basename = "chillpill"; 
$con = mysqli_connect($hostname, $username, $password, $basename); 

// Check connection
if (mysqli_connect_errno()) { 
    echo "Impossible de se connecter à MYSQL" . mysqli_connect_error(); 
} 
?>
