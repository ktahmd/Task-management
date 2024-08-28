<?php
session_start();
include_once __DIR__ . '/../../controllers/TaskController.php';
include_once __DIR__ . '/../../controllers/CollaborationController.php';
$title = 'Project';
ob_start(); /*start buffering the output*/

    if(isset( $_SESSION['project'])){
        $project= $_SESSION['project'];
        if(isset($_SESSION['collaboration'])){
            $collaborations = $_SESSION['collaboration'];
            $userIds = array_column($collaborations, 'user_id');
         }  
        if($_SESSION['user_id']!=$project['owner_id'] && !in_array($_SESSION['user_id'], $userIds )){
            header("Location: 403");
            exit();
        } 
    }       
    else{
        header("Location: 404");
        exit();
    }
    
    

?>

<div class="row">
    
    <h4 class="MERGE20"><a href="MyProject" class="Links" >MY PROJECTS</a> / <?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?> <hr></h4>
    <p style="margin-left: 40px; ">Add Collaboration:</p>
    <div style="display:flex;margin-left: 40px; ">
    <!-- The Modal Add -->
    <?php require_once __DIR__ . '/addCollaboration.php'; ?>
    <?php if($_SESSION['user_id']==$project['owner_id']):?>
    <button  class="dropbtn" onclick="openModa('addcollaboration')" ><img src="public/assets/img/avatar.png" alt="Avatar" class="avatar" ></button>
    <?php endif;?>
    <div style="width: 2px; height: 40px; background-color: gray;"></div>
    <?php 
    if(isset($_SESSION['collaboration'])):
    $collaborations=$_SESSION['collaboration'];
    foreach( $collaborations as $collaboration):?>
    <button  class="dropbtn" ><div class="avatar" ><?php echo substr($collaboration['email'], 0, 2);?></div></button>
    <?php 
    endforeach;
    else:?>
    <p class="greyText" style="margin-left: 20px;"> No Collaboration Found...</p>
    <?php
    endif;
    ?>
    
    <?php
    if(isset($_SESSION['collaboration'])):
     if($_SESSION['user_id']===$project['owner_id']):?>
            <button class="btn noni" onclick="window.location.href='ProjectSetting-<?php echo $project['id']?>'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16" style="pointer-events: none;"><path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/><path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/></svg></button>
    <?php endif;endif;?>
    </div>
    <br>
    <!-- Alerts -->
    <?php include __DIR__ . '/../Alerts/Alerts.php'; ?>
    
    <!-- tab buttons -->
    <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'List')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>  List</button>
            <button class="tablinks" onclick="openTab(event, 'Table')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                </svg>  Table</button>
            <button class="tablinks" onclick="openTab(event, 'Map')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5"/>
                </svg> RoadMap</button>
    </div>
    <div class="card">
        <div class="row">
            <div class="column-50">
            <?php if($_SESSION['permission']!='view'):?>
            <button class="btn default" onclick="openModa('addtask')" > New Task</button>
            <?php endif;?>
            <!-- The Modal Add -->
            <?php require_once __DIR__ . '/addTask.php'; ?>
            </div>
            <div class="column-50">
                <input type="text" id="myInput" onkeyup="Tabsearch()" placeholder="Search for names..">
            </div>
        </div>
            <!-- List -->
            <div id="List" class="tabcontent" style="display: block;">
            <h3>List</h3>
            <table id="myTable">
                <tr>
                    <th >Task <button onclick="sortTable(0)" class="btn noni"  ><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z"/>
                    <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z"/>
                    </svg></button></th>
                    <th  width="30%" >Description <button onclick="sortTable(1)" class="btn noni"  ><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z"/>
                    <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z"/>
                    </svg></button></th>
                    <th>Periority 

                        <div class="dropdown">
                        <button onclick="toggleDropdown('priorityDropdown')" class="dropbtn" style="color: black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="pointer-events: none;"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/></svg></button>
                        <div id="priorityDropdown" class="dropdown-content" style="width: 100px; background-color: #5ecac9;box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.11);color:aliceblue;">
                        <label><input type="radio" name="priority" class="priority-filter" value="none" onclick="filterTable();" checked> None</label><BR>
                            <label><input type="radio" name="priority" class="priority-filter" value="low " onclick="filterTable();"> Low</label><BR>
                            <label><input type="radio" name="priority" class="priority-filter" value="medium " onclick="filterTable();"> Medium</label><BR>
                            <label><input type="radio" name="priority" class="priority-filter" value="high " onclick="filterTable();"> High</label><BR>
                        </div>
                    </div>
                    </th>
                    <th>Create at <button onclick="sortTable(3)" class="btn noni"  ><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z"/>
                    <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z"/>
                    </svg></button></th>
                    <th>Finsh at <button onclick="sortTable(4)" class="btn noni"  ><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z"/>
                    <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z"/>
                    </svg></button></th>
                    <th>State
                    <div class="dropdown">
                        <button onclick="toggleDropdown('stateDropdown')" class="dropbtn" style="color: black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="pointer-events: none;"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/></svg></button>
                        <div id="stateDropdown" class="dropdown-content" style="width: 150px; background-color: #5ecac9;box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.11);color:aliceblue;">
                        <label><input type="radio" name="state" class="state-filter" value="none" onclick="filterTable();" checked> None</label><BR>
                            <label><input type="radio" name="state" class="state-filter" value="todo " onclick="filterTable();"> Todo</label><BR>
                            <label><input type="radio" name="state" class="state-filter" value="progress " onclick="filterTable();"> In Progress</label><BR>
                            <label><input type="radio" name="state" class="state-filter" value="completed " onclick="filterTable();"> Completed</label><BR>
                        </div>
                    </th>
                    <?php if($_SESSION['permission']!='view'):?>
                    <th>Actions</th>
                    <?php endif;?>
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
                    <td><?php echo explode(' ', htmlspecialchars($task['created_at'], ENT_QUOTES, 'UTF-8'))[0]; ?> </td>
                    <td><?php echo htmlspecialchars($task['due_date'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td><?php echo htmlspecialchars($task['status'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <?php if($_SESSION['permission']!='view'):?>
                    <td>
                        
                        <button onclick="openModa('edittask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        </button>
                        
                        <?php if($_SESSION['permission']!='editor'):?>
                        <button onclick="openModa('deletetask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        </button>
                        <?php endif;?>
                    </td>
                    <?php endif;?>
                </tr>
                <?php endforeach;
                unset($_SESSION['permission'])?>
                </table>
            </div>

            <div id="Table" class="tabcontent">
                <h3>Table Sucrum</h3>
                <div class="board">
                    <div class="column" id="todo">
                        <h2>To Do</h2>
                        <?php $tasks=$_SESSION['tasks'];?>
                        <?php foreach ($tasks as $task): ?>
                            <?php if($task['status']=='todo'):?>
                        <div class="task" ><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endif; ?>
                        <?php endforeach; 
                        
                        ?>
                    </div>
                    <div class="column" id="inProcess">
                        <h2>In Process</h2>
                        <?php $tasks=$_SESSION['tasks'];?>
                        <?php foreach ($tasks as $task): ?>
                            <?php if($task['status']=='progress'):?>
                        <div class="task" ><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></div>
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
                        unset($_SESSION['collaboration']);
                        ?>
                    </div>
                </div>
            </div>

            <div id="Map" class="tabcontent">
            <h3>RoadMap</h3>
            <p>Soon...</p>
        </div>
    </div>
</div>




<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
require_once '../app/view/layouts/master.php';
?>