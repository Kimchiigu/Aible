<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'viewHome']);
Route::get('/home', [HomeController::class, 'viewHome']);

Route::get('/register', [RegisterController::class, 'viewRegister']);
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register');

Route::get('/login', [LoginController::class, 'viewLogin']);
Route::post('/login/auth', [UserController::class, 'authLogin'])->name('authLogin');

Route::get('/training', [MaterialController::class, 'index']);
Route::get('/training/{material:slug}', [MaterialController::class, 'show']);

Route::get('/meet', [MeetController::class, 'startPython']);
Route::post('/cancel-python-execution', [MeetController::class, 'cancelExecution']);
