<!-- The Modal -->
<div id="edittask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModa('edittask<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?>')">&times;</span>
    <h1>Create New Task</h1>
    <form action="app/controllers/TaskController.php" method="post">
      
      <input type="text" name="action" value="update">

      <label for="title">Task Name:</label>
      <input type="text" id="title" name="title" placeholder="Task name..." required  value="<?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?>">
      <br><br>

      <label for="desc">Description:</label>
      <textarea id="desc" name="desc" placeholder="Description" ><?php echo htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
      <br><br>

      <label for="due_date">Due Date:</label>
      <input type="date" id="due_date" name="due_date" value="<?php echo htmlspecialchars($task['due_date'], ENT_QUOTES, 'UTF-8'); ?>">
      <br><br>

      <label>Priority:</label>
      <input type="radio" id="low" name="priority" value="low">
      <label for="low">Low</label>

      <input type="radio" id="medium" name="priority" value="medium" checked>
      <label for="medium">Medium</label>

      <input type="radio" id="high" name="priority" value="high">
      <label for="high">High</label>
      <br><br>

      <label for="status">Status:</label>
      <select id="status" name="status" required value="<?php echo htmlspecialchars($task['status'], ENT_QUOTES, 'UTF-8'); ?>">
        <option value="todo">To Do</option>
        <option value="progress">In Progress</option>
        <option value="completed">Completed</option>
      </select>
      <br><br>

      
      <input type="hidden" id="project_id" name="project_id" value="<?php echo $id;?>">
      <input type="hidden" id="task_id" name="task_id" value="<?php echo htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8'); ?>">
      <br><br>

      <button type="submit" class="btn default">Create Task</button>
    </form>
  </div>
</div>