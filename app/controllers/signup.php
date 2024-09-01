<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    // Ensure password contains at least one number, one uppercase, one lowercase letter, and is at least 8 characters long
    $pattern = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
    return preg_match($pattern, $password);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate email and password
    if (!validateEmail($email)) {
        $_SESSION['emailmsg'] = "Invalid email format.";
        header("Location: ../../Home");
        exit();
    }

    if (!validatePassword($password)) {
        $_SESSION['passmsg'] = "Password must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 characters long.";
        header("Location: ../../Home");
        exit();
    }

    $user = new User($db);

    // Check if email is already in use
    if ($user->getByEmail($email)) {  // Assuming the `getByEmail` function returns the user if found
        $_SESSION['emailmsg'] = "This email is already in use. Please try another one.";
        header("Location: ../../Home");
        exit();
    }

    // Proceed with user registration if email is unique
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        if ($user->create($email, $hashed_password)) {
            $_SESSION['user_id'] = $db->insert_id;
            $_SESSION['email'] = $email;
            header("Location: ../../Dashbord");
            exit();
        } else {
            $_SESSION['general_error'] = "Registration failed. Please try again.";
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
