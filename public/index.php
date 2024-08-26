<?php
// index.php

// Get the URL from the query parameter
$url = isset($_GET['url']) ? $_GET['url'] : '/';

// Define routes
$routes = [
    'Home' => '../app/view/Home',
    '/' => '../app/view/Home',
    'MyProject' => '../app/view/project/project_list',
    'Dashbord' => '../app/view/dashbord/Bord'
];

// Route handling
if (array_key_exists($url, $routes)) {
    $page = $routes[$url];
} else {
    $page = '404'; // Default to a 404 page
}

// Include the corresponding page
require_once "$page.php";