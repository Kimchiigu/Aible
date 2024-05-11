<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewHome(){
        return view('home', [
            'title' => "Home"
        ]);
    }

    public function viewRegister(){
        return view('register', [
            'title' => "Register"
        ]);
    }

    public function viewLogin(){
        return view('login', [
            'title' => "Login"
        ]);
    }

    public function viewMeet(){
        return view('meet', [
            'title' => "Meeting"
        ]);
    }
}
