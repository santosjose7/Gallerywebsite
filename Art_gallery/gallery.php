<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    
    <style>

body {
    font-family: Arial;
    background-color: rgba(74, 74, 238, 0.452);
    margin: 0;
    padding: 0;
    
}
a {
    text-decoration: none;
    color: black;
}


nav img{
    width: 100px;
    height: auto;
    margin-top: 10px;
    position: absolute;
    margin-left: 20px;
}

ul {
    list-style-type: none;
}

.navs{
    margin-left: 22%;
    padding-top: 20px;
    display: flex;
    
    
    
}


.navs li a{
    color: white;
}

.navs li a:hover{
    transition: all .5s;
    transform: scale(1.2);
    
}
.acc{
    margin-left: 50px;
    margin-top: -10px;
}

.acc1{
    display: flex;
    
}

.acc1 p{
    margin-left: 60px;
}

.acc1 img{
    height: 25px;
    width: 25px;
    margin-top: 5px;

}


header {
    background-color: #007bff;
    color: #fff;
    padding-top: 10px;

    height: 80px;
}

header h1 {
    margin: 0;
}

header p {
    margin: 10px 0;
}

header a {
    color: #fff;
    text-decoration: none;
    margin-left: 10px;
}

/* Navigation styles */
nav ul {
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    
    text-decoration: none;
}
.search{
    height: 40px;
    margin-top: -30px;
    margin-left: 100px;
}

.search input{
    border-radius: 10px;
    border: solid 1px rgb(74, 74, 238);
    height: 30px;
    width: 280px;
    margin-top: 20px;
    background-color: #ffffffd8;
    
}

.search img{
    height: 30px;
    width: 30px;
    cursor: pointer;
    margin-left: 255px;
    border-radius: 8px;
    border: solid 1px rgb(74, 74, 238);
    margin-top: 21px;
    background-color: rgb(74, 74, 238);

}
        
.image_gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-gap: 10px;
    grid-template-rows: auto;
    align-items: center;
    justify-content: center;
    height: calc(100% - 100px);
    width: calc(100% - 20px); /* Subtract 20px from the total width */
    padding-left: 10px; /* Add 20px padding to the left */
    padding-top: 20px;
    padding-right: 10px;
    padding-bottom: 90px;
}
.image_gallery img{
    width: 200px;
    height: 200px;
    border-radius: 5px;
    border: 2px solid #ddd;
}
  

.image-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: rgba(0, 0, 0, 0.7);
}
.image-overlay img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 90%;
  max-height: 90%;
}

footer {
    background-color: #007bff;
    position: fixed;
    text-align: center;
    width: 100%;
    height: 80px;
    bottom: 0;
}

footer p{
    margin-top: 30px;
}
    </style>
</head>
<body>

<header>  
        <nav>
            <img src="logo.png" alt="">
            <ul class="navs">
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                
                <?php
                session_start();
                // Check if user is logged in
                if(isset($_SESSION['username'])) {
                    // Fetch account information from the database
                    // Replace this line with code to fetch account information
                    $account_info = $_SESSION['username'];
                    echo "<li><a href='logout.php'>Logout</a></li>"; // Logout link
                } else {
                    echo "<li><a href='login.php'>Login</a></li>"; // Login link
                }
                ?>
                
                <div class="search">
                    <span><a><img src="search.png" alt=""></a></span>
                    <input type="text" id="searchInput" placeholder="Search artwork">
                    <ul id="searchResults"></ul> <!-- Suggestions will be displayed here -->
                </div>
                
                <?php
                // Display account information if user is logged in
                if(isset($_SESSION['username'])) {
                    echo "<li>";
                    echo "<ul class='acc'>";
                    echo "<li class='acc1'><img src='account.png' alt=''><p>$account_info</p></li>";
                    echo "</ul>";
                    echo "</li>";
                }
                ?>
                
            </ul>
        </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#searchInput').on('input', function(){
                var query = $(this).val();
                if(query !== ''){
                    $.ajax({
                        url: 'search.php', // Path to your PHP script handling search
                        method: 'POST',
                        data: {query: query},
                        success: function(data){
                            $('#searchResults').html(data);
                        }
                    });
                } else {
                    $('#searchResults').html('');
                }
            });
        });
    </script>


    <div class="image_gallery">
        <?php
        include 'db_connection.php';

    
        $sql = "SELECT * FROM images";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo "<img src='" . $row['image'] . "'>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
    <div class="image-overlay">
       <img id="large-image" src="" alt="">
    </div>
    <script>
        const thumbnails = document.querySelectorAll('.image_gallery img');
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', event => {
                const largeImage = document.getElementById('large-image');
                largeImage.src = event.target.src;
                const overlay = document.querySelector('.image-overlay');
                overlay.style.display = 'block';
            });
        });

        const overlay = document.querySelector('.image-overlay');
        overlay.addEventListener('click', event => {
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    </script>
    <footer>
        <p>&copy; 2024 JWF art Gallery, all rights reserved</p>
    </footer>
    
</body>
</html>
