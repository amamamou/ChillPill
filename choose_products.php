<?php require 'connexion.php'; 
    session_start(); 
    if (!isset($_SESSION['admin_id'])) {
        header("Location: loginadmin.php"); // Redirect to login page
        exit();
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChillPill</title>
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include FontAwesome -->
    <link rel="stylesheet" href="styles.css">

    <!-- Your CSS for product cards and buttons -->
    <style>
        /* Navigation Bar Styling */
  .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #f7f0e8;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }





.navbar .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    /* Add more styles as needed */
}

.navbar .nav-links li a {
    color: #534b4f; /* Navy color */
    text-decoration: none;
    /* Add more styles as needed */
}
.navbar .logo img {
    height: 70px;
    /* Other styles for the logo */
}

.nav-icons {
    list-style: none;
    display: flex;
    gap: 20px;
    margin-right: 20px; /* Adjust spacing */
}

.nav-icons li {
    font-size: 16px; /* Adjust the icon size */
}

.nav-icons a {
    color: #000; /* Black color */
    text-decoration: none;
}
        .card {
            width: 300px;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
        .card-container {
            display: flex;
            /*justify-content: space-between;*/
            max-width: 1200px; /* Adjust as needed */
            margin: 0 auto;
            margin-left: 350px; /* Compensate for the negative margin */
        }

        .card {
            flex: 0 0 calc(33.33% - 10px); /* Adjust card width and spacing */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            color: rgb(24, 4, 4);
            text-decoration: none;
        }

        .card h3 {
            margin-top:300px;
            font-size: 24px;
        }

        .card:hover {
            transform: scale(1.05);
        }
        .try{
            background-color: #f7f0e8; /* Blanc cassé color */

        }
    </style>
</head>
<body class="try">

    <!-- ChillPill navbar -->
   <nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>
        
    <div class="nav-icons">
            <a href="users.php"><i class="fas fa-user"></i></a>
            <a href="admin_products.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-cog"></i></a>
        </ul>
    </div>

    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!-- Cards section -->
<!-- Manage Users Card -->
<div class="card-container">
    <div>
    <!-- Add Card -->
    <a href="addproduct.php" class="card" style="background-image: url('products.png');">
        <h3>Add Product</h3>
    </a>
    </div>
    <div>
    <a href="admin_products.php" class="card" style="background-image: url('tombaed.jpg');">
        <h3>Display Products</h3>
    </a>
  
    </div>
    <div>
    </body>
    </html>
