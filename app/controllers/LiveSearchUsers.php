<?php
session_start();

$servername = "localhost";
$email = "root";  // your database email
$password = "";      // your database password
$dbname = "tasky";

$conn = new mysqli($servername, $email, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'] . '%';
    $user_id=$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT email,id FROM users WHERE email LIKE ? AND id <> ? LIMIT 5");
    $stmt->bind_param("si", $searchTerm,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = htmlspecialchars($row['email']);
            $user_id = htmlspecialchars($row['id']);
            echo "<div onclick=\"selectUser('$email','$user_id')\">" . $email . "</div>";
        }
    } else {
        echo "<div>No users found</div>";
    }

    $stmt->free_result();
    $stmt->close();
}

$conn->close();
?>
