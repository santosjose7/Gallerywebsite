<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jwwf/dist/css/jwwf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jwwf/dist/js/jwwf.min.js"></script>
    <style>
        /* Reset default margin and padding */
body, html {
    margin: 0;
    padding: 0;
}

.acc{
    margin-left: 50px;
    margin-top: -10px;
    display: none;
}
.search{
    display: none;
}

/* Style the form container */
.container {
    max-width: 600px;
    margin: 0 auto;
}

/* Style form inputs and textarea */
.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

/* Style submit button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<?php include 'nav.php'; ?>

<!-- Contact form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Contact Us</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
