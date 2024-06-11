let tasks = [];
let tasksData = {};
let currentDate = new Date();

document.getElementById('task-maker').addEventListener('click', function() {
    tasks = [];
    const taskContainers = document.querySelectorAll('.task-container');

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
    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1; // Months are zero indexed, so January is 0
    let day = today.getDate();

    let formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
console.log(formattedDate);
    let result = tasks.map(item => `[Task: ${item.task},Priority: ${item.priority},Deadline: ${item.deadline},Workload: ${item.workload}], `).join(',');
     console.log(result)
    const content = [
        { role: "system", content: "You will get list of task from one person that struggling to organize their schedule. I want you to help him to organize thier schedule. Each task will consist 4 data : Task Name, Priority(Higher priority means need to be done first), Deadline, Workload. A task need to be done in one day. I want you to set their schedule each day and make sure their dont miss their deadline, and make sure the higher priority means it's need to be done first. And also make sure the workload for every day is less than 10 if possible. Last, please make sure that the tasks can be done as soon as possible" },
        { role: "user", content: "I want you to always output the result in format of 'date:[list of task]', today date is "+formattedDate},
        { role: "user", content: "For example, the output should be like this : 2024-06-11: [Task C] \n 2024-06-12: [Task A] \n 2024-06-13: [Task B] \n 2024-06-14: [ ] \n 2024-06-15: [ ] \n 2024-06-16: [ ] \n 2024-06-17: [ ] \n 2024-06-18: [ ] \n 2024-06-19: [ ]"},
        { role: "user", content: result},
        ]

      fetch("http://localhost:3001/chat-bot", {
          method: "POST",
          headers: {
              "Content-Type": "application/json"
          },
          body: JSON.stringify({ content })
      })
      .then(response => response.json())
      .then(data => {
          console.log(data);
          const scheduleRegex = /(\d{4}-\d{2}-\d{2}: \[[^\]]*\])/g;
            const scheduleMatches = data.match(scheduleRegex);

            const result = {};

            if (scheduleMatches) {
                scheduleMatches.forEach(line => {
                    const [date, tasksString] = line.split(': ');
                    const tasks = tasksString.replace(/[\[\]]/g, '').split(', ').filter(task => task !== '');
                    result[date] = tasks;
                });
            }

            tasksData = result;
            renderCalendar(currentDate);
      })
      .catch(error => console.error("Error:", error));
});

const calendarGrid = document.getElementById('calendar-grid');
const calendarMonthYear = document.getElementById('calendar-month-year');
const prevMonthButton = document.getElementById('prev-month');
const nextMonthButton = document.getElementById('next-month');

function renderCalendar(date) {
    console.log("Render success");
    const year = date.getFullYear();
    const month = date.getMonth();
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    calendarMonthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;
    calendarMonthYear.style.fontSize = '30px'
    calendarMonthYear.style.fontWeight = '300'
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
        const currentDateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
        dateElement.textContent = date;
        if (tasksData[currentDateString] && /\S/.test(tasksData[currentDateString])) {
            const tooltip = document.createElement('div');
            tooltip.className = 'task-tooltip';
            tooltip.textContent = tasksData[currentDateString].join(', ');
            // dateElement.style.backgroundColor = '#4299E1'
            dateElement.style.color = '#1D4ED8'
            dateElement.appendChild(tooltip);
        }

        calendarGrid.appendChild(dateElement);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    let currentDate = new Date();
    renderCalendar(currentDate);
});

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

document.querySelectorAll('.remove-task-button').forEach(button => {
    button.addEventListener('click', function() {
        button.parentElement.remove();
    });
});
