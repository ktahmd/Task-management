<?php
session_start();
include __DIR__ . '/../../controllers/TaskController.php';
$title = 'Nom Project';
ob_start(); /*start buffering the output*/

?>

<div class="row">
    <h4 class="MERGE20"><a herf=" " >MY PROJECTS / </a><hr><br></h4>
    <!-- Alerts -->
    <?php include __DIR__ . '/../Alerts/Alerts.php'; ?>
    <!-- tab buttons -->
    <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'London')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>  List</button>
            <button class="tablinks" onclick="openTab(event, 'Paris')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                </svg>  Table</button>
            <button class="tablinks" onclick="openTab(event, 'Tokyo')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5"/>
                </svg> RoadMap</button>
    </div>
    <div class="card">
        <div class="row">
            <div class="column-50">
            <button class="btn default" onclick="openModa('addtask')" > New Task</button>
            <!-- The Modal Add -->
            <?php require_once __DIR__ . '/addTask.php'; ?>
            </div>
            <div class="column-50">
                <input type="text" id="myInput" onkeyup="Tabsearch()" placeholder="Search for names..">
            </div>
        </div>
            <!-- List -->
            <div id="London" class="tabcontent" style="display: block;">
            <h3>London</h3>
            <table id="myTable">
                <tr>
                    <th>Task</th>
                    <th width="30%" >Description</th>
                    <th>Periority</th>
                    <th>Assigne</th>
                    <th>Create at</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
                <?php $tasks=$_SESSION['tasks'];?>
                <?php foreach ($tasks as $task): ?>
                    <!-- The Modal edit -->
                    <?php require __DIR__ . '/editTask.php'; ?>
                    <!-- The Modal delet -->
                    <?php require __DIR__ . '/deleteTask.php'; ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td class="greyText"><?php echo htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td style="color: red;"><?php echo htmlspecialchars($task['priority'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td><?php echo htmlspecialchars($task['project_id'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td><?php echo htmlspecialchars($task['due_date'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td><?php echo htmlspecialchars($task['status'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td>
                        <button onclick="openModa('edittask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        </button><button onclick="openModa('deletetask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        </button>
                    </td>
                </tr>
                <?php endforeach; 
                    ?>
                </table>
            </div>

            <div id="Paris" class="tabcontent">
                <h3>Table Sucrum</h3>
                <div class="board">
                    <div class="column" id="todo">
                        <h2>To Do</h2>
                        <?php $tasks=$_SESSION['tasks'];?>
                        <?php foreach ($tasks as $task): ?>
                            <?php if($task['status']=='todo'):?>
                        <div class="task" draggable="true"><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endif; ?>
                        <?php endforeach; 
                        
                        ?>
                    </div>
                    <div class="column" id="inProcess">
                        <h2>In Process</h2>
                        <?php $tasks=$_SESSION['tasks'];?>
                        <?php foreach ($tasks as $task): ?>
                            <?php if($task['status']=='progress'):?>
                        <div class="task" draggable="true"><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endif; ?>
                        <?php endforeach; 
                        
                        ?>
                    </div>
                    <div class="column" id="done">
                        <h2>Done</h2>
                        <?php $tasks=$_SESSION['tasks'];?>
                        <?php foreach ($tasks as $task): ?>
                            <?php if($task['status']=='completed'):?>
                        <div class="task" draggable="true"><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endif; ?>
                        <?php endforeach; 
                        unset($_SESSION['tasks']);
                        ?>
                    </div>
                </div>
            </div>

            <div id="Tokyo" class="tabcontent">
            <h3>RoadMap</h3>
            <p>Soon...</p>
        </div>
    </div>
</div>




<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
require_once '../app/view/layouts/master.php';
?>