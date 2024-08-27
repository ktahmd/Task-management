<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started
}
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8') : '';

    $user = new User($db);  

    try {
        $user_data = $user->getByEmail($email);  

        if ($user_data) {
            $hashed_password = $user_data['password'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['email'] = $email;
                header("Location: ../../Dashbord");
                exit();
            } else {
                echo "<p class='error'>Mot de passe incorrect.</p>";
            }
        } else {
            echo "<p class='error'>Utilisateur non trouvé.</p>";
        }
    } catch (Exception $e) {
        echo "<p class='error'>Erreur : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    }

    $db->close();
}
?>
