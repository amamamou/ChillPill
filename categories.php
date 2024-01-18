
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


        .card:hover {
            transform: scale(1.05);
        }
        
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top:100px;
        }
        h3{
            margin-top:320px;
        }
    </style>
</head>
<body>
 <!-- ChillPill navbar -->
 <nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>
    <form action="searchcatg.php" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search for category ..">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    <div class="nav-icons">
            <a href="dashboard.php"><i class="fas fa-user"></i></a>
            <a href="adlin_products.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-cog"></i></a>
        </ul>
    </div>
    </nav>
<?php
include 'connexion.php';

$categories = [
    "Pure Honey Delights" => "url('honey.jpg')",
    "Yoga & Fitness Essentials" => "url('yoga.jpg')",
    "Aromatherapy Bottles" => "url('aro.jpg')",
    "Mental Wellness & Self-Care Books" => "url('ktob.jpg')",
    "Herbal supplements" => "url('h.jpg')"
];
?>
<div class="products-container">
    <?php
foreach ($categories as $category => $background) {
    echo '<a href="pro.php?category=' . urlencode($category) . '" class="card" style="background-image: ' . $background . ';">';
    echo '<h3>' . $category . '</h3>';
    echo '</a>';
}?>
</div>

</body>
</html>
