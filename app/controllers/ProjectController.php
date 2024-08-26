<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started
}
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../../config/config.php';

class ProjectController {
    private $projectModel;

    public function __construct($db) {
        $this->projectModel = new Project($db);
    }

    // Handle creating a new project
    public function create() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['project']) ? htmlspecialchars($_POST['project'], ENT_QUOTES, 'UTF-8') : null;
            $description = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : null;
            $ownerId = isset($_POST['owner_id']) ? (int)$_POST['owner_id'] : null;

            if ($name && $ownerId) {
                try {
                    $this->projectModel->create($name, $description, $ownerId);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Project created successfully!";
                } catch (Exception $e) {
                    $_SESSION['msg_type'] = "danger";
                    $_SESSION['msg'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
                }
            } else {
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "All fields are required!";
            }
        } else {
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Invalid request method!";
        }
        
        header("Location: ../../MyProject");
        exit();
    }
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;
            $name = isset($_POST['project']) ? htmlspecialchars($_POST['project'], ENT_QUOTES, 'UTF-8') : null;
            $description = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : null;
            $ownerId = isset($_POST['owner_id']) ? (int)$_POST['owner_id'] : null;
    
            if ($projectId && $name && $ownerId) {
                try {
                    $this->projectModel->update($projectId, $name, $description, $ownerId);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Project updated successfully!";
                } catch (Exception $e) {
                    $_SESSION['msg_type'] = "danger";
                    $_SESSION['msg'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
                }
            } else {
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "All fields are required!";
            }
        } else {
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Invalid request method!";
        }
    
        header("Location: ../../MyProject");
        exit();
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;
            $ownerId = isset($_POST['owner_id']) ? (int)$_POST['owner_id'] : null;
            if ($_SESSION['user_id']==$ownerId) {
                if ($projectId) {
                    try {
                        $this->projectModel->delete($projectId);
                        $_SESSION['msg_type'] = "success";
                        $_SESSION['msg'] = "Project deleted successfully!";
                    } catch (Exception $e) {
                        $_SESSION['msg_type'] = "danger";
                        $_SESSION['msg'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
                    }
                } else {
                    $_SESSION['msg_type'] = "danger";
                    $_SESSION['msg'] = "Project ID is required!";
                }
            }
            else{
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "You dont have the promision to delete the project! ";
            }
            
        } else {
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Invalid request method!";
        }
    
        header("Location: ../../MyProject");
        exit();
    }
    
    


    // Handle fetching all projects
    public function getAll() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $myprojects = $this->projectModel->getByUserId($userId);
            $_SESSION['projects'] = $myprojects;
        } else {
            header("Location: Home");
            exit();
        }
    }
}

// Initialize the controller and handle the request based on the action
$controller = new ProjectController($db);

$action = isset($_POST['action']) ? htmlspecialchars($_POST['action'], ENT_QUOTES, 'UTF-8') : 'getAll';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->getAll();
        break;
}

$db->close();
?>
