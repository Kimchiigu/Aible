<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List with Days of the Week</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .task-container {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .task-input, .task-priority, .task-deadline, .task-workload {
            margin-right: 10px;
        }
        .days-checkboxes label {
            margin-right: 10px;
        }
        #tasks {
            margin-top: 20px;
        }
        .remove-task-button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Task List</h1>
    <div class="days-checkboxes">
        <label><input type="checkbox" name="day" value="Monday"> Monday</label>
        <label><input type="checkbox" name="day" value="Tuesday"> Tuesday</label>
        <label><input type="checkbox" name="day" value="Wednesday"> Wednesday</label>
        <label><input type="checkbox" name="day" value="Thursday"> Thursday</label>
        <label><input type="checkbox" name="day" value="Friday"> Friday</label>
        <label><input type="checkbox" name="day" value="Saturday"> Saturday</label>
        <label><input type="checkbox" name="day" value="Sunday"> Sunday</label>
    </div>
    <div id="tasks">
        <div class="task-container">
            <input type="text" class="task-input" placeholder="Enter task">
            <input type="text" class="task-priority" placeholder="Priority">
            <input type="date" class="task-deadline" placeholder="Deadline">
            <input type="number" class="task-workload" placeholder="Workload">
            <button class="remove-task-button">Remove Task</button>
        </div>
    </div>
    <button id="add-task-button">Add More Task</button>

    <script>
        document.getElementById('add-task-button').addEventListener('click', function() {
            var taskContainer = document.createElement('div');
            taskContainer.className = 'task-container';

            var taskInput = document.createElement('input');
            taskInput.type = 'text';
            taskInput.className = 'task-input';
            taskInput.placeholder = 'Enter task';

            var taskPriority = document.createElement('input');
            taskPriority.type = 'text';
            taskPriority.className = 'task-priority';
            taskPriority.placeholder = 'Priority';

            var taskDeadline = document.createElement('input');
            taskDeadline.type = 'date';
            taskDeadline.className = 'task-deadline';
            taskDeadline.placeholder = 'Deadline';

            var taskWorkload = document.createElement('input');
            taskWorkload.type = 'number';
            taskWorkload.className = 'task-workload';
            taskWorkload.placeholder = 'Workload';

            var removeTaskButton = document.createElement('button');
            removeTaskButton.className = 'remove-task-button';
            removeTaskButton.textContent = 'Remove Task';

            removeTaskButton.addEventListener('click', function() {
                taskContainer.remove();
            });

            taskContainer.appendChild(taskInput);
            taskContainer.appendChild(taskPriority);
            taskContainer.appendChild(taskDeadline);
            taskContainer.appendChild(taskWorkload);
            taskContainer.appendChild(removeTaskButton);

            document.getElementById('tasks').appendChild(taskContainer);
        });

        document.querySelectorAll('.remove-task-button').forEach(button => {
            button.addEventListener('click', function() {
                button.parentElement.remove();
            });
        });
    </script>
</body>
</html>
