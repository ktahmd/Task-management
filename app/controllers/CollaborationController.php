<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../models/Collaboration.php';
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

class CollaborationController {
    private $collabModel;

    public function __construct($db) {
        $this->collabModel = new Collaboration($db);
    }

    // Handle creating a new collaboration
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;
            $userId = isset($_POST['selectedUser']) ? (int)$_POST['selectedUser'] : null;
            $permission = isset($_POST['permission']) ? htmlspecialchars($_POST['permission'], ENT_QUOTES, 'UTF-8') : null;
    
            if ($projectId && $userId && $permission) {
                try {
                    $this->collabModel->create($projectId, $userId, $permission);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Collaboration created successfully!";
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
        
        header("Location: ../../Project-$projectId");
        exit();
    }
    

    // Handle fetching all collaborations for a specific project
    public function getByProject($id) {
        if ($id) {
            
            // Get collaborations based on project ID
            $collaborations = $this->collabModel->getByProject($id);
            
            // If there are collaborations, get user emails
            if ($collaborations) {
                global $db;
                $U = new User($db);
                
                foreach ($collaborations as &$collab) { // Use reference (&) to modify the original array
                    $userEmail = $U->getEmailById($collab['user_id']);
                    $collab['email'] = $userEmail;
                }
                unset($collab); // Break the reference with the last element
                
                // Store the updated collaborations with emails in the session
                $_SESSION['collaboration'] = $collaborations;
                
            } 
        } 
    }
    

    // Handle updating a collaboration's permission
    public function updatePermission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $collabId = isset($_POST['collab_id']) ? (int)$_POST['collab_id'] : null;
            $permission = isset($_POST['permission']) ? htmlspecialchars($_POST['permission'], ENT_QUOTES, 'UTF-8') : null;
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;

            if ($collabId && $permission) {
                try {
                    $this->collabModel->updatePermission($collabId, $permission);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Collaboration permission updated successfully!";
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
        
        header("Location: ../../ProjectSetting-$projectId");
        exit();
    }

    // Handle deleting a collaboration
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $collabId = isset($_POST['collab_id']) ? (int)$_POST['collab_id'] : null;
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;

            if ($collabId) {
                try {
                    $this->collabModel->delete($collabId);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Collaboration deleted successfully!";
                } catch (Exception $e) {
                    $_SESSION['msg_type'] = "danger";
                    $_SESSION['msg'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
                }
            } else {
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "Collaboration ID is required!";
            }
        } else {
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Invalid request method!";
        }
        
        header("Location: ../../ProjectSetting-$projectId");
        exit();
    }
}

// Initialize the controller and handle the request based on the action
$controller = new CollaborationController($db);

$action = isset($_POST['action']) ? htmlspecialchars($_POST['action'], ENT_QUOTES, 'UTF-8') : null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'updatePermission':
        $controller->updatePermission();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->getByProject($id);
        break;
}
?>
