<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
</body>
</html>
