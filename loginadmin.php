<?php
session_start();
require 'connexion.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $admin_password = "";

    // Sanitize and validate user inputs
    $admin_username = mysqli_real_escape_string($con, $_POST["admin_username"]);
    $admin_password = mysqli_real_escape_string($con, $_POST["admin_password"]);

    $sql = "SELECT * FROM admins WHERE username = '$admin_username' AND password = '$admin_password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $admin_row = mysqli_fetch_assoc($result);
            $_SESSION['admin_id'] = $admin_row['admin_id']; // Start admin session
            header("Location: dashboard.php"); // Redirect to admin products page
            exit();
        } else {
            echo "<script>alert('Error: Incorrect username or password'); window.location='loginadmin.php';</script>"; // Incorrect username or password alert
        }
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "'); window.location='loginadmin.php'; </script>"; // Database query error alert
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChillPill </title>
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
/* Admin Login Section Styling */
.login-section {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f7f0e8; /* Blanc cassé color */
    margin-top:-80px;

}
.login-section #souel {
    margin-left:300px;
}

.login-section .content {
    text-align: center;
}

.login-section h2 {
    font-size: 2.5em;
    /* Add more styles as needed */
}

.login-section form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    align-items: center;
    max-width: 400px; /* Adjust as needed */
    margin: 0 auto; /* Center horizontally */
}

.login-section input,
.login-section button {
    width: 100%;
    padding: 10px;
    /* Add more styles as needed */
}

.login-section button {
    background-color: #f4d6c5; /* Pastel color */
    color: #534b4f; /* Navy color */
    font-size: 1.2em;
    border: none;
    cursor: pointer;
    border-radius: 20px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease-in-out;
}

.login-section button:hover {
    transform: scale(1.1);
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
                <a href="users.php"><i class="fas fa-user"></i></a>
                <a href="products.php"><i class="fas fa-shopping-cart"></i></a>
                <a href="compte.php"><i class="fas fa-cog"></i></a>
        </div>
    </nav>
    <!-- Your header or navigation bar -->
 
    <!-- Admin Login Section -->
    <section class="login-section">
        <div class="content">
            <p id="souel"> Log in as <a href="login.php">User</a> </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="admin_username" placeholder="Admin Username" required>
                <input type="password" name="admin_password" placeholder="Admin Password" required>
                <button type="submit" class="fun-button">Log In as Admin</button>
                <p >Don't have an admin account? Contact the site administrator.</p>
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
</body>
</html>

