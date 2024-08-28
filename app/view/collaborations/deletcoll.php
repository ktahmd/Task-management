<!-- The Modal -->
<div id="deletecollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close" onclick="closeModa('deletecollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
  <h1>Delete collaboration</h1>
            <form action="app/controllers/CollaborationController.php" method="post">
                <input type="hidden" name="collab_id" value="<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="action" value="delete">
                <h3>Are you sure you want to delete the (<?php echo htmlspecialchars($collaboration['email'], ENT_QUOTES, 'UTF-8'); ?>) collaboration? </h3>
                
                <br><br>
                <button type="submit" class="btn default" onclick="closeModa('deletecollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>')" >Cancel</button>
                <button type="submit" class="btn danger" >Delete</button>
            </form>
</div>
</div>