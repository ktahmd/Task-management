
<?php
// index.php

// Get the URL from the query parameter or default to 'Home'
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : 'Home';

// Break the URL into parts
$urlParts = explode('-', $url);
$path = $urlParts[0];
$id = isset($urlParts[1]) ? $urlParts[1] : null;


// echo "path: $path<br>";
// echo "URL: $url<br>";
// echo "id: $id<br>";

// Define routes
$routes = [
    'Home' => '../app/view/Home',
    '/' => '../app/view/Home',
    'MyProject' => '../app/view/project/project_list',
    'Dashbord' => '../app/view/dashbord/Bord',
    'Project' => '../app/view/task/tasks',
    "Project-$id" => '../app/view/task/tasks',
    '404' => '../app/view/error/404',
    '403' => '../app/view/error/403',
];

// Route handling
$page = isset($routes[$path]) ? $routes[$path] : '404';


// echo "Page: $page<br>";

// Include the corresponding page
require_once "$page.php";
?>
