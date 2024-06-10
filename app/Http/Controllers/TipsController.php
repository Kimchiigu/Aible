<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function viewTips(){
        return view('tips', [
            'title' => "Tips & Trick"
        ]);
    }
}
