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

        .product-details-container {
            max-width: 800px; /* Adjust the max-width as needed */
            margin: 0 auto; /* Center the container */
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px;
        }

        .product-image-container img {
            width: 100%; /* Ensure the image fits within the container */
            height: auto;
            border-radius: 5px;
            margin : 14px;
        }

        .product-card {
            width: 100%; /* Take full width within the container */
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

        </style>
        </head>
<body class="try">
  
<nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>
    <form action="search.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search for product ..">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    <div class="nav-icons">
            <a href="home.html"><i class="fas fa-user"></i></a>
            <a href="products.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="compte.php"><i class="fas fa-cog"></i></a>
        </ul>
    </div>
    </nav>

    <?php
       
        require 'connexion.php';

        // nayatlou
        if (isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            // fetching
            $query = "SELECT * FROM products WHERE product_id = $productId";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                
                $productName = $row['product_name'];
                $productDescription = $row['description'];
                $productCategory = $row['category_name'];
                $productPrice = $row['price'];
                $productImage = $row['image_url'];

    ?>
    <div class="product-details-container">
        <!-- Product image container -->
        <div class="product-image-container">
            <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
        </div>
        <!-- Product details card container -->
        <div class="product-details-card">
            <div class="product-card">
                <h2><?php echo $productName; ?></h2>
                <p>Description: <?php echo $productDescription; ?></p>
                <p>Category: <?php echo $productCategory; ?></p>
                <p>Price: $<?php echo $productPrice; ?></p>
                <!-- Add other product details here -->
            
               <!-- Buttons container -->
        <div class="product-buttons">
            <!-- Remove button -->
            <form action="addcart.php" method="post">
            <input type="number" class="addcart" name="quantity" value="1" min="1" max="10"> <!-- Adjust min and max values if necessary -->
<input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                <button type="submit" class="addcart">Add to cart </button>
            </form>
            <!-- Edit button -->
           
        </div>
            </div>
        </div>
    </div>
    <?php 
        } else {
            echo "Product not found!";
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