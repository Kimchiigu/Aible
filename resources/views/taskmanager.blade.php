@extends('layouts.main_layout')

@section('container')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .calendar {
            margin-bottom: 20px;
            width: 75%;
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
            position: relative;
        }
        .task-tooltip {
            display: none;
            position: absolute;
            top: 0%;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border: 1px solid #ccc;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
            white-space: nowrap;
        }
        .calendar-grid div:hover .task-tooltip {
            cursor: pointer;
            display: block;
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
    <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">Task List</h1>
    <div class="calendar">
        <div class="calendar-header">
            <button id="prev-month" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mb 2">Prev</button>
            <h2 id="calendar-month-year"></h2>
            <button id="next-month" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mb-2">Next</button>
        </div>
        <div class="calendar-grid" id="calendar-grid"></div>
    </div>
    {{-- <div class="days-checkboxes">
        <label><input type="checkbox" name="day" value="Monday"> Monday</label>
        <label><input type="checkbox" name="day" value="Tuesday"> Tuesday</label>
        <label><input type="checkbox" name="day" value="Wednesday"> Wednesday</label>
        <label><input type="checkbox" name="day" value="Thursday"> Thursday</label>
        <label><input type="checkbox" name="day" value="Friday"> Friday</label>
        <label><input type="checkbox" name="day" value="Saturday"> Saturday</label>
        <label><input type="checkbox" name="day" value="Sunday"> Sunday</label>
    </div> --}}
    <div id="tasks">
        <div class="task-container flex flex-row gap-3">
            <input type="text" class="task-input" style="border:1px solid black; padding:3px; border-radius:3px; width: 200px" placeholder="Enter task">
            <input type="text" class="task-priority" style="border:1px solid black; padding:3px; border-radius:3px; width: 200px"placeholder="Priority">
            <input type="date" class="task-deadline" style="border:1px solid black; padding:3px; border-radius:3px; width: 200px" placeholder="Deadline">
            <input type="number" class="task-workload" style="border:1px solid black; padding:3px; border-radius:3px; width: 200px" placeholder="Workload">
            <button class="remove-task-button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove Task</button>
        </div>
    </div>
    <div class="flex flex-row gap-3">
        <button id="add-task-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add More Task</button>
        <button id="task-maker" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-0 dark:focus:ring-yellow-900">Help Me</button>
    </div>
    <script src="{{ asset('javascript/taskmanager.js') }}"></script>
@endsection
