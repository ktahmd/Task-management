<!-- The Modal -->
<div id="addtask" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModa('addtask')">&times;</span>
    <h1>Create New Task</h1>
    <form action="app/controllers/TaskController.php" method="post">
      
      <input type="hidden" name="action" value="create">

      <label for="title">Task Name:</label>
      <input type="text" id="title" name="title" placeholder="Task name..." required>
      <br><br>

      <label for="desc">Description:</label>
      <textarea id="desc" name="desc" placeholder="Description"></textarea>
      <br><br>

      <label for="due_date">Due Date:</label>
      <input type="date" id="due_date" name="due_date">
      <br><br>

      <label>Priority:</label>
      <input type="radio" id="low" name="priority" value="low">
      <label for="low">Low</label>

      <input type="radio" id="medium" name="priority" value="medium" checked>
      <label for="medium">Medium</label>

      <input type="radio" id="high" name="priority" value="high">
      <label for="high">High</label>
      <br><br>

      <input id="status" name="status"  type="hidden" value="todo">
      <br><br>

      
      <input type="hidden" id="project_id" name="project_id" value="<?php echo $id;?>">
      <br><br>

      <button type="submit" class="btn default">Create Task</button>
    </form>
  </div>
</div>
