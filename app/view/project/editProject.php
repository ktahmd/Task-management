<!-- The Modal -->
<div id="editproject<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" onclick="closeModa('editproject<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
  <h1>Create New Project</h1>
            <form action="app/controllers/ProjectController.php" method="post">
                <input type="hidden" name="owner_id" value="<?php echo htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="update">
                <label for="project" >Project Name:</label>
                <input type="text" id="project" name="project" placeholder="Project name.." value="<?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8') ?>">
                <br><br>

                <label for="desc">Description:</label>
                <textarea id="desc" name="desc" placeholder="Description" ><?php echo htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
                <br><br>

                <button type="submit" class="btn default" >Create Project</button>
            </form>
</div>
</div>