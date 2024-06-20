<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "artgl";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $username = $_SESSION['username'];
    $sql_user = "SELECT id FROM users WHERE username = '$username'";
    $result_user = $conn->query($sql_user);

    if ($result_user->num_rows == 1) {
        $user_row = $result_user->fetch_assoc();
        $user_id = $user_row['id'];
    } else {
        echo "Error fetching user ID.";
        exit();
    }

    $comment = $_POST['comment'];
    $artwork_id = $_POST['artwork_id'];

    $sql = "INSERT INTO comments (artwork_id, comment, user_id, username) VALUES ('$artwork_id', '$comment', '$user_id', '$username')";
    if ($conn->query($sql) === TRUE) {
        header("Location: artwork.php?artwork_id=$artwork_id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: artwork.php");
    exit();
}
?>
