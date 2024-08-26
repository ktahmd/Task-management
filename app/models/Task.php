<?php
require_once __DIR__ . '/../../config/config.php';

class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insert a new task
    public function create($title, $description, $dueDate, $priority, $status, $projectId) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, due_date, priority, status, project_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $title, $description, $dueDate, $priority, $status, $projectId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de l'insertion : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Get a task by ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
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

    // Get all tasks for a specific project
    public function getByProject($projectId) {
        $query = "SELECT * FROM tasks WHERE project_id = ?";
        if ($stmt = $this->db->prepare($query)) {
            $stmt->bind_param('i', $projectId);
            $stmt->execute();
            $result = $stmt->get_result();
            $tasks = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $tasks;
        } else {
            throw new Exception("Failed to prepare statement: " . $this->db->error);
        }
    }

    // Update a task
    public function update($id, $title, $description, $dueDate, $priority, $status) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, priority = ?, status = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $title, $description, $dueDate, $priority, $status, $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de la mise à jour : " . $stmt->error);
        }
        
        $stmt->close();
    }

    // Delete a task
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            throw new MySQLException("Erreur lors de la suppression : " . $stmt->error);
        }
        
        $stmt->close();
    }
}
?>
