<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'nav.php'; ?>
    
    <main>
        <section id="gallery" class="gallery">
            <?php
            include 'db_connection.php';

            // Fetch artwork from the database
            $sql = "SELECT * FROM artwork";
            $result = $conn->query($sql);

            if (!$result) {
                die("Error fetching artwork: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='artwork'>";
                    
                    echo "<a href='artwork.php?artwork_id=" . $row['id'] . "'>";
                    echo "<h2 class='artwork-title'>" . $row['title'] . "</h2>";
                    echo "<p class='artwork-artist'>Artist: " . $row['artist'] . "</p>";
                    echo "<img src='" . $row['image_url'] . "' alt='" . $row['title'] . "'>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No artwork available.";
            }
            ?>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
