

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background: url(bg.png);
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <form action="loginauth.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
            <div class="Register"><p>Don't have an account?</p><a href="register.php" class="register-link">Register</a></div>
        </form>
        <?php
            // Display error message if it exists
            if (isset($error_message)) {
                echo "<p class='error'>$error_message</p>";
            }
        ?>
    </div>
</body>
</html>
