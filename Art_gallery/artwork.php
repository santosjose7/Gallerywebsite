<?php

include 'db_connection.php';

if (isset($_GET['artwork_id'])) {
    $artwork_id = $_GET['artwork_id'];
    
    $sql = "SELECT * FROM artwork WHERE id = $artwork_id";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error fetching artwork: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Artwork not found.");
    }
} else {
    die("Artwork ID not provided.");
}


$sql_comments = "SELECT c.comment, c.timestamp, u.username FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.artwork_id = $artwork_id";
$result_comments = $conn->query($sql_comments);


$sql_interviews = "SELECT * FROM interviews WHERE artwork_id = $artwork_id";
$result_interviews = $conn->query($sql_interviews);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
    <link rel="stylesheet" href="artwork.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9998;
            top: 20%;
            left: 20%;
            width: 80%;
            height: 80%;
    
        }
        .modal-content {
            position: absolute;
            top: 40%;
            left: 40%;
            transform: translate(-50%, -50%);
            background-color: #fff; 
            border-radius: 5px;
            width:100%;
            height: 100%;
            overflow: 0;
        }
        .close {
            position: absolute;
            top: 5px;
            right: 5px;
            width:30px;
            height: 30px;
            font-size: 30px;
            cursor: pointer;
            color: white;
            background-color: red;
            border-radius: 2px;
            z-index: 9999;
        }

        .modal-content video{
            margin-top: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <div class="artwork-container">
            <div class="artwork-details">
                <h2><?php echo $row['title']; ?></h2>
                <p>Artist: <?php echo $row['artist']; ?></p>
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>">
                <p><?php echo $row['description']; ?></p>
                <a href="<?php echo $row['image_url']; ?>" download><button>Download Artwork</button></a>
            </div>

            <div class="interviews-section">
                <h3>Interviews</h3>
                <hr>
                <!-- Display interviews here -->
                <?php
                if ($result_interviews->num_rows > 0) {
                    while ($interview = $result_interviews->fetch_assoc()) {
                        echo "<div class='interview'>";
                        echo "<img src='" . $interview['thumbnail_url'] . "' alt='Interview'>";
                        echo "<button class='watch-interview-btn' data-video-url='" . $interview['video_url'] . "'>Watch Interview</button>";
                        echo "</div>";
                    }
                } else {
                    echo "No interviews available.";
                }
                ?>
            </div>
        </div>

        <div class="comments-section">
            <h3>Comments</h3>
            <!-- Display comments here -->
            <?php
            if ($result_comments->num_rows > 0) {
                while ($comment = $result_comments->fetch_assoc()) {
                    // Format timestamp
                    $formatted_timestamp = date('Y-m-d H:i', strtotime($comment['timestamp']));

                    // Display comment in the specified format
                    echo "<p><strong>{$comment['username']}:</strong> {$comment['comment']} <i>$formatted_timestamp</i></p>";
                }
            } else {
                echo "No comments yet.";
            }
            ?>
            <!-- Form to submit new comment -->
            <form action="submit_comment.php" method="POST">
                <textarea name="comment" placeholder="Write a comment"></textarea>
                <input type="hidden" name="artwork_id" value="<?php echo $artwork_id; ?>">
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <div id="videoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <video controls autoplay id="videoPlayer">
                <source src="" type="video/mp4">
                
            </video>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const watchButtons = document.querySelectorAll('.watch-interview-btn');
            const modal = document.getElementById('videoModal');
            const videoPlayer = document.getElementById('videoPlayer');

            watchButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const videoUrl = this.getAttribute('data-video-url');
                    videoPlayer.src = videoUrl;
                    modal.style.display = 'block';
                });
            });

            const closeBtn = document.querySelector('.close');
            modal.addEventListener('click', function (event) {
                if (event.target === modal || event.target === closeBtn) {
                    modal.style.display = 'none';
                    videoPlayer.pause();
                    videoPlayer.currentTime = 0; 
                }
            });
        });
    </script>
</body>
</html>
