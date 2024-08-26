const tasks = document.querySelectorAll('.task');
    const columns = document.querySelectorAll('.column');

    tasks.forEach(task => {
        task.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text', e.target.id);
            setTimeout(() => {
                task.style.display = 'none';
            }, 0);
        });

        task.addEventListener('dragend', (e) => {
            setTimeout(() => {
                task.style.display = 'block';
            }, 0);
        });
    });

    columns.forEach(column => {
        column.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        column.addEventListener('drop', (e) => {
            const id = e.dataTransfer.getData('text');
            const task = document.getElementById(id);
            column.appendChild(task);
        });
    });

    // Optional: Assign unique IDs to tasks dynamically
    tasks.forEach((task, index) => {
        task.id = `task-${index + 1}`;
    });