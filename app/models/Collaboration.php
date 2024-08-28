<?php
require_once __DIR__ . '/../../config/config.php';


class Collaboration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insert a new collaboration
    public function create($projectId, $userId, $permission) {
        // Check if the collaboration already exists
        $stmt = $this->db->prepare("SELECT * FROM collaborations WHERE project_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $projectId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Collaboration already exists
            throw new Exception("Collaboration already exists for this project.");
        }
        
        // Insert new collaboration if it does not exist
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
    public function getByUser($id) {
        $stmt = $this->db->prepare("SELECT project_id FROM collaborations WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
        
        $stmt->close();
    }
    public function getPermissionByUserProject($user_id, $project_id) {
        $stmt = $this->db->prepare("SELECT permission FROM collaborations WHERE user_id = ? AND project_id = ? LIMIT 1");
        
        // Liez les paramètres avec les valeurs appropriées
        $stmt->bind_param("ii", $user_id, $project_id);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        // Vérifiez si un résultat est trouvé
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $permission = $row['permission'];
        } else {
            $permission = null; // Ou toute autre valeur que vous souhaitez retourner si aucun résultat n'est trouvé
        }
        
        $stmt->close();
        
        return $permission;
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


?>

