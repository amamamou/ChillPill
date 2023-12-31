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
    <!-- Your header or navigation bar -->
 
  
    <!-- Your header or navigation bar -->
    <?php require 'connexion.php'; 

$categories = [
    "Pure Honey Delights" => "url('honey.jpg')",
    "Yoga & Fitness Essentials" => "url('yoga.jpg')",
    "Aromatherapy Bottles" => "url('aro.jpg')",
    "Mental Wellness & Self-Care Books" => "url('ktob.jpg')",
    "Herbal supplements" => "url('h.jpg')"
];
?>
<div class="cat-container">
    <?php
foreach ($categories as $category => $background) {
    echo '<a href="pro.php?category=' . urlencode($category) . '" class="card" style="background-image: ' . $background . ';">';
    echo '<h3>' . $category . '</h3>';
    echo '</a>';
}?>
</div>
    <div class="product-container">
        <?php
            // Fetch all products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($con, $query);

            // Loop through each product and create a card with buttons for remove and edit
            while ($row = mysqli_fetch_assoc($result)) {
                // Retrieve product information
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $productDescription = $row['description'];
                $productPrice = $row['price'];
                $productImage = $row['image_url'];
        ?>
            
                <!-- Link only on the product image -->
                <div class="product-card">
                <a href="look.php?product_id=<?php echo $productId; ?>">
                <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                 </a>
                <!-- Product details -->
                <h2><?php echo $productName; ?></h2>
                <p>Price: $<?php echo $productPrice; ?></p>
                <!--button      <button onclick="redirectToTryPage()" class="details"> More Details </button>
            -->
                <!-- Remove and Edit buttons 
                <div class="button-container">
                    <form action="remove.php" method="post">
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" class="edit-button">Edit</button>
                    </form>
                </div>
            -->
            </div>
        <?php } ?>
    </div>
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
            function redirectToTryPage() {
            // Redirect to try.php
            window.location.href = 'look.php?product_id=<?php echo $productId; ?>';
        }
   
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

    function confirmLogout() {
        if (confirm('Are you sure you want to log out?')) {
            // If confirmed, submit the form
            document.getElementById('loginForm').submit();
        } else {
            // If not confirmed, do nothing
            return false;
        }
    }

    
            </script>


    <!-- Your footer -->
</body>
</html>

