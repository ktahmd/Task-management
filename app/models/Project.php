<?php
require_once __DIR__ . '/../../config/config.php';
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
            $stmt->close(); 
            return true;
        } else {
            throw new Exception("Erreur lors de l'insertion : " . $stmt->error);
        }  
    }
    public function delete($projectId) {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->bind_param("i", $projectId);
    
        if ($stmt->execute()) {
            $stmt->close(); 
            return true;
        } else {
            throw new Exception("Erreur lors de la suppression : " . $stmt->error);
        }  
    }

    public function update($projectId, $name, $description, $ownerId) {
        $stmt = $this->db->prepare("UPDATE projects SET name = ?, description = ?, owner_id = ? WHERE id = ?");
        $stmt->bind_param("ssii", $name, $description, $ownerId, $projectId);
    
        if ($stmt->execute()) {
            $stmt->close(); 
            return true;
        } else {
            throw new Exception("Erreur lors de la mise à jour : " . $stmt->error);
        }  
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
        
        $projects = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $projects;  
    }

    // Get projects by User ID
    public function getByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE owner_id = ?");
        $stmt->bind_param("i", $userId); 
        $stmt->execute();
        $result = $stmt->get_result();
        
        $myprojects = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $myprojects;
    }
}
