<?php
session_start();

// Check if user is already logged in, redirect to index.php if logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
include 'db_connection.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username and password
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = "Please enter both username and password.";
        include 'login.php'; // Include login.php again to display the error message
        exit();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '".md5($password)."'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // If user exists, set session variables
        $_SESSION['username'] = $username;

        // Redirect to index.php after successful login
        header("Location: index.php");
        exit();
    } else {
        // Display an error message if login fails
        $error_message = "Invalid username or password. Please try again.";
        include 'login.php'; // Include login.php again to display the error message
        exit();
    }
}
?>
