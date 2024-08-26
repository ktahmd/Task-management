<?php
require_once __DIR__ . '/../../config/config.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insert 
    public function create($email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de l'insertion : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Get
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
        
        $stmt->close();
    }

    // Get 
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
        
        $stmt->close();
    }
    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

}
?>
