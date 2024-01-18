<?php
// Start or resume the session
session_start();

// Include your database connection file
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $userImage = $_POST['image_url'];

    // Set creation and update timestamps
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Set is_admin to false for regular user registrations
    $connected = false;

    // Check if username already exists in the Users table
    $check_username = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $check_username);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        // Username doesn't exist, proceed with registration
        $sql = "INSERT INTO users (username, email, password, full_name, address, phone_number, created_at, updated_at, confirmed, image_url) 
                VALUES ('$username', '$email', '$hashed_password', '$full_name', '$address', '$phone_number', '$created_at', '$updated_at', '$connected', '$userImage')";

        if (mysqli_query($con, $sql)) {
            header('Location: login.php');
            exit();
        } else {
            echo "<script>alert('Error: There was a problem with registration.'); window.location='signin.php';</script>"; // Display an alert for registration error
        }
    } else {
        echo "<script>alert('Error: Username already exists. Please choose a different username.');window.location='signin.php'</script>"; // Alert for existing username
    }
}
?>
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
        /* Sign Up Section Styling */
        .signup-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7f0e8; /* Blanc cassé color */
            margin-top:20px;
        }

        .signup-section .content {
            text-align: center;
        }

        .signup-section h2 {
            font-size: 2.5em;
            /* Add more styles as needed */
        }

        .signup-section .zaamaadmin {
            /* Add more styles as needed */
        }

        .signup-section form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            align-items: center;
            max-width: 400px; /* Adjust as needed */
            margin: 0 auto; /* Center horizontally */
            margin-top:-160px;

        }

        .signup-section input,
        .signup-section button {
            width: 100%;
            padding: 10px;
            /* Add more styles as needed */
        }

        .signup-section button {
            background-color: #f4d6c5; /* Pastel color */
            color: #534b4f; /* Navy color */
            font-size: 1.2em;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .signup-section button:hover {
            transform: scale(1.1);
        }

        .signup-section p {
            font-size: 0.9em;
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
                <a href="home.html"><i class="fas fa-user"></i></a>
                <a href="products.php"><i class="fas fa-shopping-cart"></i></a>
                <a href="logout.php"><i class="fas fa-cog"></i></a>
        </div>
    </nav>
    <!-- Your header or navigation bar -->
 
    <!-- Sign Up Section -->
    <section class="signup-section">
        <div class="content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="UserName" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="phone_number" placeholder="Phone Number" required>
                <input type="text" name="image_url" placeholder="Profile Picture" required>

                <button type="submit" class="fun-button">Sign Up</button>
                <p>Already have an account? <a href="login.php">Log In here</a></p>
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