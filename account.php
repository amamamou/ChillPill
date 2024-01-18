<?php require 'connexion.php'; 
    session_start(); 
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page
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
    top: -200px; /* Initial position above the viewport */
    width: 100%;
    background-color: #f7f0e8; /* Blanc cassé color */
    padding: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
    transition: top 0.3s; /* Add a smooth transition */
}

.navbar.show {
    top: 0; /* Show the navbar when scrolled down */
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
.user-details-container {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    align-items: flex-start; /* Align items at the start of the flex container */
    gap: 20px;
    padding: 20px;
}

.user-image-container {
    width: 30%; /* Adjust width as needed */
}

.user-image-container img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin: 14px;
}

.user-details-card {
    width: 70%; /* Adjust width as needed */
}

.user-card {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.product-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.remove-button {
    width: auto; /* Adjust button width */
}


.user-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

        .user-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .addcart{
            width: 100%;
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

        .addcart:hover {
            transform: scale(1.1);
        }
        .try{
            padding-top: 120px;
        }
        .remove-button,
        .edit-button {
            width: 100%;
            padding: 10px;
            background-color: #f4d6c5;
            color: #534b4f;
            font-size: 1.2em;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            display: block;
        }

        .remove-button:hover,
        .edit-button:hover {
            transform: scale(1.1);
        }

        </style>
        </head>
<body class="try">
  
<nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>
    <form action="searchuser.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search for user ..">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    <div class="nav-icons">
            <a href="dashboard.php"><i class="fas fa-user"></i></a>
            <a href="admin_products.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-cog"></i></a>
        </ul>
    </div>
    </nav>

    <?php
       
        // Include your database connection file

        // Retrieve the product ID from the URL
        if (isset($_GET['user_id'])) {
            $userID = $_GET['user_id'];
            // Fetch user details based on the ID from the database
            $query = "SELECT * FROM users WHERE user_id = $userID";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // Extract user details
                $userID = $row['user_id'];
                $username = $row['username'];
                $userPass=$row['password'];
                $userFullName=$row['full_name'];
                $userEmail = $row['email'];
                $userAddress = $row['address'];
                $userTel = $row['phone_number'];
                $userImage = $row['image_url'];
                $created=$row['created_at'];

    ?>
    <div class="user-details-container">
    <div class="user-details-container">
        <!-- Product image container -->
        <div class="user-image-container">
            <img src="<?php echo $userImage; ?>" alt="<?php echo $username; ?>">
        </div>
        <!-- Product details card container -->
        <div class="user-details-card">
            <div class="user-card">
                <h2><?php echo $userFullName; ?></h2>
                <p>Username: <?php echo $username; ?></p>
                <p>Email: <?php echo $userEmail; ?></p>
                <p>Address: <?php echo $userAddress; ?></p>
                <p>Tel: <?php echo $userTel;?></p>
                <p>Created at: <?php echo $created;?></p> 
                <!-- Add other user details here -->
            
               <!-- Buttons container -->
               <div class="product-buttons">
            <!-- Remove button -->
            <form id="removeForm" action="remove.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <button type="button" onclick="confirmRemove()" class="remove-button">Remove</button>
            </form>
           
        </div>
        
            </div>
        </div>
    </div>
            </div>
    <?php 
        } else {
            echo "User not found!";
        }}
    ?>
     <!-- Contact Section -->
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

   <script>
        // Variables to track scroll position
let lastScrollTop = 0;
const navbar = document.querySelector('.navbar');

// Function to handle scrolling behavior
window.addEventListener('scroll', function () {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    // Determine scroll direction
    if (currentScroll > lastScrollTop) {
        // Scrolling down
        navbar.classList.remove('show');
    } else {
        // Scrolling up
        navbar.classList.add('show');
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
}, false);

    </script>
    <!-- Your footer or other content -->
</body>
</html>