<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register/auth', [UserController::class, 'authRegister'])->name('authRegister');

Route::get('/login', function () {
    return view('login');
});
Route::post('/login/auth', [UserController::class, 'authLogin'])->name('authLogin');

Route::get('/training', [MaterialController::class, 'index']);
Route::get('/training/{material:slug}', [MaterialController::class, 'show']);
