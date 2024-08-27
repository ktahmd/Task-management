<?php
session_start();
include_once __DIR__ . '/../../controllers/ProjectController.php';
$title = 'Dashbord';
ob_start(); /*start buffering the output*/

?>

<div class="row">
  <div class="leftcolumn75">
    <h4>DASHBORD<hr><br></h4>
    <!-- Bord -->
    <div class="card">
    <div class="row">
      <div class="column-66">
        <h3>Your Project</h3>
        <p class="greyText">Add new project with tasky <br>
        the best task menegment apps and tools</p>
        
        <button class="btn default" onclick="openModa('addproject')">New Project</button>

        <!-- The overlay Modal -->
        <?php require_once __DIR__ . '/../project/addProject.php'; ?>

      </div>
      <div class="column-33">
      <img src="public/assets/img/projectimg.png" width="100%" align="center" >
      </div>
    </div>
      
    </div>
  </div>
  <!-- MY projects -->
  <div class="rightcolumn25">
    <div class="rightside">
        <h3 class="Bayon">MY PROJECTS:</h3>
        <br>
        <!-- FOUND -->
        <?php if (!empty($_SESSION['projects'])): ?>
            <ul>
                <?php $myprojects=$_SESSION['projects'];?>
                <?php foreach ($myprojects as $project): ?>
                    <li><?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; 
                unset($_SESSION['projects']);
                ?>
            </ul>
        <!-- NO FOUND -->
        <?php else: ?>
            <p class="greyText">No Project Found ....<br></p>
            <div class="ForceCenter">
                <img src="public/assets/img/file.png" width="60%" align="center">
                <button class="btn default" type="submit" align="center">New Project</button>
            </div>
        <?php endif; ?>
    </div>


  </div>
</div>



<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../app/view/layouts/master.php';
?>