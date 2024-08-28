<!-- The Modal -->
<div id="addcollaboration" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModa('addcollaboration')">&times;</span>
    <h1>Create New Collaboration</h1>
    <form action="app/controllers/collaborationController.php" method="post">
      <input type="hidden" name="action" value="create">
      <input type="hidden" id="project_id" name="project_id" value="<?php echo $project['id'];?>">
        
      <label for="permission">Select User:</label>
      <input type="hidden" id="selectedUser" name="selectedUser"> 
      <input type="text" id="searchInput" onkeyup="searchUsers()" placeholder="Search users..." autocomplete="off">
        <div id="results"></div>

      <label for="permission">Permission:</label>
      <select id="permission" name="permission" required>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
        <option value="view">View</option>
      </select>
      
      <button type="submit" class="btn default">Create Collaboration</button>
    </form>
  </div>
</div>
