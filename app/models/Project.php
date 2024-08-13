<?php
include(dirname(__DIR__, 2) . '/config/config.php');

class Project {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insert a new project
    public function create($name, $description, $ownerId) {
        $stmt = $this->db->prepare("INSERT INTO projects (name, description, owner_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $description, $ownerId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de l'insertion : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Get a project by ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
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

    // Get all projects
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM projects");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
        
        $stmt->close();
    }
}
?>
