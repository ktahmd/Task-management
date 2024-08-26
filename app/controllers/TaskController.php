<?php

require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../../config/config.php';

class TaskController {
    private $taskModel;

    public function __construct($db) {
        $this->taskModel = new Task($db);
    }

    // Handle creating a new task
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8') : null;
            $description = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : null;
            $dueDate = isset($_POST['due_date']) ? htmlspecialchars($_POST['due_date'], ENT_QUOTES, 'UTF-8') : null;
            $priority = isset($_POST['priority']) ? htmlspecialchars($_POST['priority'], ENT_QUOTES, 'UTF-8') : null;
            $status = isset($_POST['status']) ? htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8') : null;
            $projectId = isset($_POST['project_id']) ? (int)$_POST['project_id'] : null;

            if ($title && $priority && $status && $projectId) {
                try {
                    $this->taskModel->create($title, $description, $dueDate, $priority, $status, $projectId);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Task created successfully!";
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
        
        header("Location: ../view/task/task_list.php");
        exit();
    }

    // Handle fetching a task by ID
    public function getById() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id) {
            $task = $this->taskModel->getById($id);
            if ($task) {
                echo json_encode($task, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
            } else {
                echo "Task not found!";
            }
        } else {
            echo "ID is required!";
        }
    }

    // Handle fetching all tasks for a specific project
    public function getByProjectId($projectId) {
        if ($projectId) {
            $tasks = $this->taskModel->getByProject($projectId);
            $_SESSION['tasks'] = $tasks;
        } else {
            echo "Project ID is required!";
        }
    }

    // Handle updating a task
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8') : null;
            $description = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : null;
            $dueDate = isset($_POST['due_date']) ? htmlspecialchars($_POST['due_date'], ENT_QUOTES, 'UTF-8') : null;
            $priority = isset($_POST['priority']) ? htmlspecialchars($_POST['priority'], ENT_QUOTES, 'UTF-8') : null;
            $status = isset($_POST['status']) ? htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8') : null;

            if ($id && $title && $priority && $status) {
                try {
                    $this->taskModel->update($id, $title, $description, $dueDate, $priority, $status);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Task updated successfully!";
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

        header("Location: ../view/task/tasks.php");
        exit();
    }

    // Handle deleting a task
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

            if ($id) {
                try {
                    $this->taskModel->delete($id);
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['msg'] = "Task deleted successfully!";
                } catch (Exception $e) {
                    $_SESSION['msg_type'] = "danger";
                    $_SESSION['msg'] = "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
                }
            } else {
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "Task ID is required!";
            }
        } else {
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Invalid request method!";
        }

        header("Location: ../view/task/task_list.php");
        exit();
    }
}

// Initialize the controller and handle the request based on the action
$controller = new TaskController($db);

$action = isset($_POST['action']) ? htmlspecialchars($_POST['action'], ENT_QUOTES, 'UTF-8') : 'getByProjectId';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'getById':
        $controller->getById();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        echo 'what?';
        break;
}


?>
