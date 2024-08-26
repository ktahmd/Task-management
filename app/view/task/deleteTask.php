<!-- The Modal -->
<div id="deletetask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" onclick="closeModa('deletetask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
  <h1>Delete task</h1>
            <form action="app/controllers/taskController.php" method="post">
                <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <h3>Are you sure you want to delete the (<?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?>) task? </h3>
                
                <br><br>
                <button type="submit" class="btn default" onclick="closeModa('deletetask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')" >Cancel</button>
                <button type="submit" class="btn danger" >Delete</button>
            </form>
</div>
</div>