<?php
// Set the HTTP response status code to 404
header("HTTP/1.0 404 Not Found");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f2f2f2;
        }
        h1 {
            font-size: 72px;
            color: #333;
        }
        p {
            font-size: 24px;
            color: #666;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Sorry, the page you are looking for does not exist.</p>
    <p><a href="Home">Go back to the homepage</a></p>
</body>
</html>
