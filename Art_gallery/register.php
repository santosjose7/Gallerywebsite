<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize user inputs
    $username = htmlspecialchars($username);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    // Validate user inputs (you can add more validation)
    if(empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Connect to database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "artgl";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username or email already exists
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "Username or email already exists.";
        } else {
            // Insert new user into database
            $password = md5($password); // Hash the password before storing
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                // Registration successful, redirect to login page
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{
            background: url(bg.png);
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if(isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
