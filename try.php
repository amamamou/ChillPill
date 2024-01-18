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
        .user-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .user-card {
            width: 300px;
            height: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .product-details-container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px;
        }

        .product-image-container img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin : 14px;
        }

        .product-card {
            width: 100%;
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

        .save-button,.remove-button,
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

        .save-button:hover,remove-button:hover,
        .edit-button:hover {
            transform: scale(1.1);
        }
        .try{
            padding-top: 120px;
        }
        .editable {
            border: 1px solid transparent;
            padding: 5px;
            border-radius: 3px;
        }
        .save-button {
    width: 100px;
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
        </style>
        </head>
<body class="try">
   <!-- Navigation Bar -->
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
    <!-- Your header or navigation bar -->
 
   <!-- Rest of your HTML code -->
    <!-- Inside your PHP section -->
    <?php
        // Include your database connection file
        require 'connexion.php';

        // Retrieve the product ID from the URL
        if (isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            // Fetch product details based on the ID from the database
            $query = "SELECT * FROM products WHERE product_id = $productId";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                // Extract product details
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
                <!-- Product details displayed as editable -->
                <h2 class="editable" id="productName"><?php echo $productName; ?></h2>
                <p class="editable" id="productDescription">Description: <?php echo $productDescription; ?></p>
                <p class="editable" id="productCategory">Category: <?php echo $productCategory; ?></p>
                <p class="editable" id="productPrice">Price: $<?php echo $productPrice; ?></p>
                <!-- Add other product details here -->
            </div>
            <!-- ... -->
<div class="product-buttons">
    <!-- Remove button -->
    <form id="removeForm" action="remove.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <button type="button" onclick="confirmRemove()" class="remove-button">Remove</button>
    </form>
    <!-- Inside your HTML form -->
        <!-- Edit button -->
    <form id="editForm" onsubmit="saveProduct(event)" method="post">
    <!-- Edit button -->
    <button type="button" onclick="editProduct()" class="edit-button">Edit</button>
    <button type="submit" class="save-button" id="saveButton" style="display: none;">Save</button>
    <!-- Add hidden inputs to hold the data -->
    <input type="hidden" id="productId" name="productId" value="<?php echo $productId; ?>">
    <input type="text" id="newProductName" name="newProductName" style="display: none;">
    <input type="text" id="newProductDescription" name="newProductDescription" style="display: none;">
    <!-- Add other fields to edit -->
</form>

</div>
<!-- ... -->
<script>
    // JavaScript functions here
</script>

        </div>
    </div>
    <?php 
        } else {
            echo "Product not found!";
        }}
    ?>

    <!-- Your script section -->
    <script>
         function confirmRemove() {
        if (confirm('Are you sure you want to remove this product?')) {
            // If confirmed, submit the form
            document.getElementById('removeForm').submit();
        } else {
            // If not confirmed, do nothing
            return false;
        }
    }
        function editProduct() {
            const productNameElement = document.getElementById('productName');
            const productDescriptionElement = document.getElementById('productDescription');

            // Set contenteditable attribute to true for direct editing
            productNameElement.contentEditable = true;
            productDescriptionElement.contentEditable = true;

            // Focus on the element to start editing immediately
            productNameElement.focus();

            // Display the Save button
            document.getElementById('saveButton').style.display = 'block';
        }
        function saveProduct(event) {
    event.preventDefault(); // Prevent form submission
    const productId = document.getElementById('productId').value;
    const newProductName = document.getElementById('productName').textContent.trim(); // Get edited product name
    const newProductDescription = document.getElementById('productDescription').textContent.trim(); // Get edited product description

    // Send a POST request to a PHP file for updating the product
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert('Product updated successfully!');
                hideSaveButton(); // Call function to hide the Save button

            } else {
                alert('Failed to update product.');
            }
        }
    };

    xhr.open('POST', 'update_product.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`productId=${productId}&newProductName=${newProductName}&newProductDescription=${newProductDescription}`);
}
function hideSaveButton() {
    document.getElementById('saveButton').style.display = 'none';
}

        
    </script>
</body>
</html>