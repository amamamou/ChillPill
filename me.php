<?php 
 session_start();

 require 'connexion.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChillPill</title>
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Include FontAwesome -->
    <link rel="stylesheet" href="styles.css">

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
  
}

.navbar .nav-links li a {
    color: #534b4f; /* Navy color */
    text-decoration: none;
 
}
.navbar .logo img {
    height: 70px;
 
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
/* Search form styling */
.search-form {
    display: flex;
    align-items: center;
    background-color: #fff; /* White background */
    border-radius: 20px; /* Rounded corners */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a shadow */
    padding: 5px;
    flex: 1; /* Fill remaining space */
    max-width: 300px; /* Limit width */
}

.search-form input {
    border: none;
    outline: none;
    padding: 8px;
    width: 100%;
    margin-right: 5px;
    border-radius: 20px; /* Rounded corners */
}

.search-form button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
}

.search-form button i {
    color: #534b4f; /* Navy color */
    font-size: 16px;
}
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top:60px;
        }

        .product-card {
            width: 300px;
            height: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 14px;
            color: #666;
        }


        /* Your CSS styles for buttons */
        .remove-button,
        .edit-button {
            width: 40%;
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
            margin-top: 10px;
        }
       .details{
            width:100px;
            padding: 10px;
            background-color: #f4d6c5; /* Pastel color */
            color: #534b4f; /* Navy color */
            font-size: 0.8em;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            display: block;
            margin-top: 10px;
      }
        .details:hover {
        transform: scale(1.1);

      }
        .remove-button:hover,
        .edit-button:hover {
            transform: scale(1.1);
        }
        .try{
            padding-top: 120px;
        }
        
/* Contact Section Styling */
.contact-section {
    background-image: url('p3.jpg'); /* Restored background */
    /* Add more styles as needed */
}

.contact-section .content {
    text-align: center;
}

.contact-section h2 {
    font-size: 2.5em;
    /* Add more styles as needed */
}

.contact-section form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    align-items: center;
    max-width: 500px; /* Adjust as needed */
    margin: 0 auto; /* Center horizontally */
}

.contact-section input,
.contact-section textarea {
    width: 100%;
    padding: 10px;
    /* Add more styles as needed */
}

.contact-section button {
    background-color: #f4d6c5; /* Pastel color */
    color: #a17189; /* Navy color */
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    cursor: pointer;
    /* Fun detail */
    border-radius: 20px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease-in-out;
}

.contact-section button:hover {
    transform: scale(1.1);
}
.cat-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top:-20px;
        }
        h3{
            margin-top:320px;
        }
        .card {
            width: 150px;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            color: #333;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
.loginForm{
    width: 800px;
    margin-right:-600px;
    
}
/* Style the container */
.user-info-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top:-30px;
        }

        /* Style user details */
        .user-detail {
            margin-bottom: 10px;
        }

        /* Style the profile picture */
        .profile-pic {
            width: 15%;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
            margin-left:60px;
        }
        .eni h1{
            margin-top:-20px;
        }
        </style>
        </head>
<body class="try">
    <!-- ChillPill navbar -->
   <!-- Navigation Bar -->
<nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>
    <form action="search.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search for product ..">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>

    <div class="nav-icons">
            <a href="me.php"><i class="fas fa-user"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-cog"></i></a>
        </ul>
    </div>

</nav>

    <?php

   

    // check ken connected
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // njib ml db
        $query = "SELECT * FROM users WHERE user_id = $userId";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $username = $user['username'];
            $email = $user['email'];
            $fullName = $user['full_name'];
            $address = $user['address'];
            $phoneNumber = $user['phone_number'];
            $imageUrl = $user['image_url'];
    ?>
            <!-- pdp -->
            <div class="eni">
            <img src="<?php echo $imageUrl; ?>" alt="Profile Picture" class="profile-pic">
            <h1>@<?php echo $username; ?></h1>
        </div>
        <form id="deleteForm" class="loginForm" action="del.php" method="post">
    <button type="button" onclick="confirmLogout()" class="remove-button">Delete my profile </button>
</form>
            <div class="user-info-container">

                <div>
                    <p class="user-detail"><strong>Email:</strong> <?php echo $email; ?></p>
                    <p class="user-detail"><strong>Full Name:</strong> <?php echo $fullName; ?></p>
                    <p class="user-detail"><strong>Address:</strong> <?php echo $address; ?></p>
                    <p class="user-detail"><strong>Phone Number:</strong> <?php echo $phoneNumber; ?></p>
              
                </div>
                <!-- Add links/buttons for editing profile, changing password, etc. -->
            </div>
            <H3> My orders </h3
    <?php require "orders.php";?>
    <?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "<script>alert('Please log in to view your account'); window.location='login.php';</script>";
    }

    ?>
    
     <!-- Contact Section -->
     <br>
     <br>
     <section id="contact" class="parallax-section contact-section">
        <div class="content">
            <h2>Contact Us</h2>
            <form>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <textarea placeholder="Message"></textarea>
                <button type="submit" class="fun-button">Send</button>
            </form>
        </div>
    </section>
</body>
<script>
  function confirmLogout() {
        if (confirm('Are you sure you want to delete your account?')) {
    
            document.getElementById('deleteForm').submit();
        } else {
         
            return false;
        }
    }
</script>
</html>
