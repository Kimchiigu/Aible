<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\CalendarController;
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

Route::get('/training', [MaterialController::class, 'index']);
Route::get('/training/{material:slug}', [MaterialController::class, 'show']);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerUser'])->name('register');

    Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'loginUser'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/meet', [MeetController::class, 'startPython']);
Route::post('/cancel-python-execution', [MeetController::class, 'cancelExecution']);

Route::get('/jobs', [JobsController::class, 'viewJobs']);
Route::get('/tips', [TipsController::class, 'viewTips']);
Route::get('/cvmaker', [CvController::class, 'viewCv']);
Route::get('/calendar', [CalendarController::class, 'viewCalendar']);
Route::get('/taskmanager', [CalendarController::class, 'viewTaskManager']);
