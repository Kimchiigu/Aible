@extends('layouts/main_layout')

@section('container')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .calendar {
            margin-bottom: 20px;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .calendar-header button {
            cursor: pointer;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        .calendar-grid div {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
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


    <h1>Task List</h1>
    <div class="calendar">
        <div class="calendar-header">
            <button id="prev-month">Prev</button>
            <h2 id="calendar-month-year"></h2>
            <button id="next-month">Next</button>
        </div>
        <div class="calendar-grid" id="calendar-grid"></div>
    </div>
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
    <button id="print-tasks-button">Print All Tasks</button>

    <script>
        const calendarGrid = document.getElementById('calendar-grid');
        const calendarMonthYear = document.getElementById('calendar-month-year');
        const prevMonthButton = document.getElementById('prev-month');
        const nextMonthButton = document.getElementById('next-month');

        let currentDate = new Date();

        function renderCalendar(date) {
            const year = date.getFullYear();
            const month = date.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            calendarMonthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;
            calendarGrid.innerHTML = '';

            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            daysOfWeek.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                dayElement.style.fontWeight = 'bold';
                calendarGrid.appendChild(dayElement);
            });

            for (let i = 0; i < firstDay; i++) {
                const emptyElement = document.createElement('div');
                calendarGrid.appendChild(emptyElement);
            }

            for (let date = 1; date <= lastDate; date++) {
                const dateElement = document.createElement('div');
                dateElement.textContent = date;
                calendarGrid.appendChild(dateElement);
            }
        }

        prevMonthButton.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        nextMonthButton.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });

        renderCalendar(currentDate);

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

        document.getElementById('print-tasks-button').addEventListener('click', function() {
            const taskContainers = document.querySelectorAll('.task-container');
            const tasks = [];

            taskContainers.forEach(container => {
                const taskInput = container.querySelector('.task-input').value;
                const taskPriority = container.querySelector('.task-priority').value;
                const taskDeadline = container.querySelector('.task-deadline').value;
                const taskWorkload = container.querySelector('.task-workload').value;

                tasks.push({
                    task: taskInput,
                    priority: taskPriority,
                    deadline: taskDeadline,
                    workload: taskWorkload
                });
            });

            console.log(tasks);
        });

        document.querySelectorAll('.remove-task-button').forEach(button => {
            button.addEventListener('click', function() {
                button.parentElement.remove();
            });
        });
    </script>
@endsection
