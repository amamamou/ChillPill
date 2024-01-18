<?php
include 'connexion.php';

$selectedCategory = $_GET['category'] ?? '';

if ($selectedCategory !== '') {
    $query = "SELECT * FROM products WHERE category_name = ?";
    $statement = $con->prepare($query);
    $statement->bind_param("s", $selectedCategory);
    $statement->execute();
    $result = $statement->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = [];
}
?>

 <!-- Your header or navigation bar -->

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
        h1{
            margin-top:80px;
            text-align:center;
        }
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
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
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

    </style>
</head>
<body>

    <!-- ChillPill navbar -->
   <nav class="navbar">
    <div class="logo">
        <a href="home.html" ><img src="nontor.png" alt="ChillPill Logo" width="100px" ></a>
    </div>

    <div class="nav-icons">
            <a href="dashboard.php"><i class="fas fa-user"></i></a>
            <a href="admin_products.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-cog"></i></a>
    </div>
    </nav>
  
    <h1>Products - <?php echo $selectedCategory ?? 'All'; ?> Category</h1>

<div class="products-container">

    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>" width="200">
            <h2><?php echo $product['product_name']; ?></h2>
            <p>Price: $<?php echo $product['price']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
