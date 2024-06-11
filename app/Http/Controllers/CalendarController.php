<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function viewCalendar(){
        return view('calendar', [
            'title' => "Calendar"
        ]);
    }

    public function viewTaskManager(){
        return view('taskmanager', [
            'title' => "Task Manager"
        ]);
    }
}
