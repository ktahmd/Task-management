<?php
if (!class_exists('MySQLException')) {
    class MySQLException extends Exception {}
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TASKY";

try {
    $db = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($db->connect_error) {
        throw new MySQLException("Échec de la connexion : " . $db->connect_error);
    }
    
    // Set the charset to utf8
    $db->set_charset("utf8");

} catch (MySQLException $e) {
    die($e->getMessage());
}
?>