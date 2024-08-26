<!-- The Modal -->
<div id="deleteproject<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" onclick="closeModa('deleteproject<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
  <h1>Delete Project</h1>
            <form action="app/controllers/ProjectController.php" method="post">
                <input type="hidden" name="owner_id" value="<?php echo htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <h3>Are you sure you want to delete the (<?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?>) project? </h3>
                <p style="color:brown">This will delete all tasks you have created in it!</p>
                <br><br>
                <button type="submit" class="btn default" onclick="closeModa('deleteproject<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>')" >Cancel</button>
                <button type="submit" class="btn danger" >Delete</button>
            </form>
</div>
</div>