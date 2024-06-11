@extends('layouts/main_layout')

@section('container')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>

    <h1 class="text-2xl font-bold mb-4">Task List</h1>
    
    <div class="calendar mb-4">
        <div class="calendar-header flex justify-between items-center mb-2">
            <button id="prev-month" class="bg-blue-500 text-white py-1 px-3 rounded">Prev</button>
            <h2 id="calendar-month-year" class="text-xl font-semibold"></h2>
            <button id="next-month" class="bg-blue-500 text-white py-1 px-3 rounded">Next</button>
        </div>
        <div class="calendar-grid grid grid-cols-7 gap-1" id="calendar-grid"></div>
    </div>

    <div class="days-checkboxes mb-4">
        <label class="mr-2"><input type="checkbox" name="day" value="Monday" class="mr-1"> Monday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Tuesday" class="mr-1"> Tuesday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Wednesday" class="mr-1"> Wednesday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Thursday" class="mr-1"> Thursday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Friday" class="mr-1"> Friday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Saturday" class="mr-1"> Saturday</label>
        <label class="mr-2"><input type="checkbox" name="day" value="Sunday" class="mr-1"> Sunday</label>
    </div>

    <div id="tasks" class="space-y-2">
        <div class="task-container flex items-center space-x-2">
            <input type="text" class="task-input border border-gray-300 p-2 rounded" placeholder="Enter task">
            <input type="text" class="task-priority border border-gray-300 p-2 rounded" placeholder="Priority">
            <input type="date" class="task-deadline border border-gray-300 p-2 rounded" placeholder="Deadline">
            <input type="number" class="task-workload border border-gray-300 p-2 rounded" placeholder="Workload">
            <button class="remove-task-button bg-red-500 text-white py-1 px-3 rounded">Remove Task</button>
        </div>
    </div>

    <button id="add-task-button" class="bg-green-500 text-white py-2 px-4 rounded mt-4">Add More Task</button>
    <button id="print-tasks-button" class="bg-blue-500 text-white py-2 px-4 rounded mt-4 ml-2">Print All Tasks</button>

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
                dayElement.classList.add('font-bold');
                calendarGrid.appendChild(dayElement);
            });

            for (let i = 0; i < firstDay; i++) {
                const emptyElement = document.createElement('div');
                calendarGrid.appendChild(emptyElement);
            }

            for (let date = 1; date <= lastDate; date++) {
                const dateElement = document.createElement('div');
                dateElement.textContent = date;
                dateElement.classList.add('text-center', 'p-2', 'border', 'border-gray-300');
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
            taskContainer.className = 'task-container flex items-center space-x-2 mb-2';

            var taskInput = document.createElement('input');
            taskInput.type = 'text';
            taskInput.className = 'task-input border border-gray-300 p-2 rounded';
            taskInput.placeholder = 'Enter task';

            var taskPriority = document.createElement('input');
            taskPriority.type = 'text';
            taskPriority.className = 'task-priority border border-gray-300 p-2 rounded';
            taskPriority.placeholder = 'Priority';

            var taskDeadline = document.createElement('input');
            taskDeadline.type = 'date';
            taskDeadline.className = 'task-deadline border border-gray-300 p-2 rounded';
            taskDeadline.placeholder = 'Deadline';

            var taskWorkload = document.createElement('input');
            taskWorkload.type = 'number';
            taskWorkload.className = 'task-workload border border-gray-300 p-2 rounded';
            taskWorkload.placeholder = 'Workload';

            var removeTaskButton = document.createElement('button');
            removeTaskButton.className = 'remove-task-button bg-red-500 text-white py-1 px-3 rounded';
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
