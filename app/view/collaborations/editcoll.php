<!-- The Modal -->
<div id="editcollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModa('editcollaboration<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
    <h1>Create New collaboration</h1>
    <form action="app/controllers/collaborationController.php" method="post">
      
      <input type="hidden" name="action" value="updatePermission">

      <label for="permission">Permission:</label>
      <select id="permission" name="permission" required>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
        <option value="view">View</option>
      </select>

      <input type="hidden" id="project_id" name="project_id" value="<?php echo $id;?>">
      <input type="hidden" id="collab_id" name="collab_id" value="<?php echo htmlspecialchars($collaboration['id'], ENT_QUOTES, 'UTF-8'); ?>">
      <br><br>

      <button type="submit" class="btn default">Create collaboration</button>
    </form>
  </div>
</div>