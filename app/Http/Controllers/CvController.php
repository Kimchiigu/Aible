<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function viewCv(){
        return view('cvmaker', [
            'title' => "CV Maker"
        ]);
    }
}
