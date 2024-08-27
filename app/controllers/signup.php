<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started
}
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize email input
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $user = new User($db);  

    try {
        if ($user->create($email, $hashed_password)) {
            $_SESSION['user_id'] = $db->insert_id;  
            $_SESSION['email'] = $email;
            header("Location: ../../Dashbord");
            exit();
        } else {
            echo "<p class='error'>Registration failed. Please try again.</p>";
        }
    } catch (Exception $e) {
        echo "<p class='error'>Erreur : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    }
    
    $db->close();
}
?>
