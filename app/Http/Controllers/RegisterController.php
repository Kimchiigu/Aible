<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function viewRegister(){
        return view('register', [
            'title' => "Register"
        ]);
    }

    public function registerUser(Request $request){
        $validated = $request->validate([
            'username' => 'required|min:6',
            'email' => 'required|unique:users|email',
            'password' => 'min:6|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return back()->with('success', 'Registration successful');
    }

}
