<?php
session_start();
include_once __DIR__ . '/../../controllers/ProjectController.php';
$title = 'My Projects';
ob_start(); /*start buffering the output*/
?>
<div class="row">
    <h4 class="MERGE20">MY PROJECTS<hr><br></h4>
    <!-- Alerts -->
    <?php include __DIR__ . '/../Alerts/Alerts.php'; ?>
    <div class="card">
        <div class="row">
            <div class="column-50">
            <button class="btn default" onclick="openModa('addproject')"> New Project</button>
            <!-- The Modal Add -->
            <?php require_once __DIR__ . '/addProject.php'; ?>
            </div>
            <div class="column-50">
                <input type="text" id="myInput" onkeyup="List()" placeholder="Search for names..">
            </div>
        </div>
        <!-- FOUND -->
            <?php if (!empty($_SESSION['projects'])): ?>
                <ul id="myUL">
                <?php $myprojects=$_SESSION['projects'];?>
                    <?php foreach ($myprojects as $project): ?>
                        <!-- The Modal edit -->
                        <?php require __DIR__ . '/editProject.php'; ?>
                        <!-- The Modal delet -->
                        <?php require __DIR__ . '/deleteProject.php'; ?>
                        <li>
                        <div id="box">
                        
                        <div class="row">
                            <div class="column-25">
                            <form  action="Project-<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post">
                            <input type="hidden" name="owner_id" value="<?php echo htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <button type="submit" class="btn noni">
                                <?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?> 
                            </button>
                            </form>
                            </div>
                            <div class="column-50">
                            <div class="container"> <div class="skills html" style="width: 0%;">0%</div></div>
                            </div>
                            <div class="column-25 ">
                                <div class="row">
                                    <div class="column-50" align="right" >
                                        <button onclick="openModa('editproject<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                        </button>
                                    </div>
                                    <div class="column-50" align="center">
                                        <button onclick="openModa('deleteproject<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" class="btn noni" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                    <?php endforeach; 
                    unset($_SESSION['projects']);
                    ?>
                </ul>
            <!-- NO FOUND -->
            <?php else: ?>
                <p class="greyText">No Project Found ....<br></p>
                
            <?php endif; ?>
            

    </div>
</div>



<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../app/view/layouts/master.php';
?>