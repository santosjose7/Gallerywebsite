<?php
echo "<style>
    .suggest {
        border-radius: 2px;
        width: 220px;
        background-color: #007bff;
        padding: 5px; 
        z-index: 9999;
        position: absolute;
        font-style: sans-serif;
    }
    .suggest li {
        list-style-type: none; 
    }
    .suggest li a:hover{
        background-color: #fff;
        color: black;
    }
</style>";

$servername = "localhost";
$username = "root";
$password = "";
$database = "artgl";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['query'])){
    $query = $_POST['query'];

    $stmt = $conn->prepare("SELECT * FROM artwork WHERE title LIKE ?");
    $searchQuery = "%$query%"; 
    $stmt->bind_param("s", $searchQuery);

    $stmt->execute();
    $result = $stmt->get_result();

    echo "<ul class='suggest'>";
    while($row = $result->fetch_assoc()) {
        // Make each item clickable and redirect to artwork.php with the specific artwork ID
        echo "<li><a href='artwork.php?artwork_id=" . $row['id'] . "'>" . $row['title'] . "</a></li><br>"; 
    }
    echo "</ul>"; 

    $stmt->close();
}

$conn->close();
?>
