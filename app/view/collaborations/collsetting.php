<?php
session_start();
include_once __DIR__ . '/../../controllers/TaskController.php';
include_once __DIR__ . '/../../controllers/CollaborationController.php';
$title = 'Settings';
ob_start(); /*start buffering the output*/

    if(isset( $_SESSION['project'])){
        $project= $_SESSION['project']; 
        if($_SESSION['user_id']!=$project['owner_id'] ){
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
        
</div>
        <!-- Alerts -->
        <?php include __DIR__ . '/../Alerts/Alerts.php'; ?>
    <div class="card">
    <table id="myTable">
                <tr>
                    <th >Collaboration</th>
                    <th  width="60%" >Email <button onclick="sortTable(1)" class="btn noni"  ><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z"/>
                    <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z"/>
                    </svg></button></th>
                    <th>Permission 

                        <div class="dropdown">
                        <button onclick="toggleDropdown('permissionDropdown')" class="dropbtn" style="color: black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16" style="pointer-events: none;"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/></svg></button>
                        <div id="permissionDropdown" class="dropdown-content" style="width: 100px; background-color: #5ecac9;box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.11);color:aliceblue;">
                            <label><input type="radio" name="permission" class="permission-filter" value="none" onclick="filterTable();" checked> None</label><BR>
                            <label><input type="radio" name="permission" class="permission-filter" value="admin " onclick="filterTable();"> Admin</label><BR>
                            <label><input type="radio" name="permission" class="permission-filter" value="editor " onclick="filterTable();"> Editor</label><BR>
                            <label><input type="radio" name="permission" class="permission-filter" value="view " onclick="filterTable();"> View</label><BR>
                        </div>
                    </div>
                    </th>
                    <th>Actions</th>
                </tr>
                <?php $collaborations=$_SESSION['collaboration'];?>
                <?php foreach ($collaborations as $collaboration): ?>
                    <!-- The Modal edit -->
                    <?php require __DIR__ . '/editcoll.php'; ?>
                    <!-- The Modal delet -->
                    <?php require __DIR__ . '/deletcoll.php'; ?>
                <tr>
                    <td><button  class="dropbtn" ><div class="avatar" ><?php echo substr($collaboration['email'], 0, 2);?></div></button> </td>
                    <td ><?php echo htmlspecialchars($collaboration['email'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td ><?php echo htmlspecialchars($collaboration['permission'], ENT_QUOTES, 'UTF-8'); ?> </td>
                    <td>
                        
                        <button onclick="openModa('editcollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        </button>
                        
                        <button onclick="openModa('deletecollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        </button>
                    </td>

                </tr>
                <?php endforeach;
                unset($_SESSION['collaboration']);
                unset($_SESSION['permission'])?>
                </table>
            </div>
    </div>
<?php
$content = ob_get_clean();
require_once '../app/view/layouts/master.php';
?>
