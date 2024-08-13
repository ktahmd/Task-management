<?php
include(dirname(__DIR__, 2) . '\config\config.php');


class Collaboration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insert a new collaboration
    public function create($projectId, $userId, $permission) {
        $stmt = $this->db->prepare("INSERT INTO collaborations (project_id, user_id, permission) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $projectId, $userId, $permission);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de l'insertion : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Get all collaborations for a specific project
    public function getByProject($projectId) {
        $stmt = $this->db->prepare("SELECT * FROM collaborations WHERE project_id = ?");
        $stmt->bind_param("i", $projectId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
        
        $stmt->close();
    }

    // Update the permission of a collaboration
    public function updatePermission($collabId, $permission) {
        $stmt = $this->db->prepare("UPDATE collaborations SET permission = ? WHERE id = ?");
        $stmt->bind_param("si", $permission, $collabId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de la mise à jour : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Delete a collaboration
    public function delete($collabId) {
        $stmt = $this->db->prepare("DELETE FROM collaborations WHERE id = ?");
        $stmt->bind_param("i", $collabId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de la suppression : " . $stmt->error);
        }
        
        $stmt->close();
    }
}

// Example usage:
// $collab = new Collaboration($db);
// $collab->create(1, 2, 'write');
// $collabs = $collab->getByProject(1);
// var_dump($collabs);
?>

