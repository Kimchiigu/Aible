<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function viewLogin(){
        return view('login', [
            'title' => "Login"
        ]);
    }
}
