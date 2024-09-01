<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';


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
                $_SESSION['passusermsg'] = "Incorrect password.";
                header("Location: ../../Home");
                exit();
            }
        } else {
            $_SESSION['usermsg'] = "User not found.";
            header("Location: ../../Home");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['general_error'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        header("Location: ../../Home");
        exit();
    }

    $db->close();
}

?>
