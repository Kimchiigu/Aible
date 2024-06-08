<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function viewJobs(){
        return view('jobs', [
            'title' => "Jobs"
        ]);
    }
}
