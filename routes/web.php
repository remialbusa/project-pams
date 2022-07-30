<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/student/auth/login', [MainController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/student/auth/register', [MainController::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('/student/auth/register-student', [MainController::class, 'save'])->name('auth.save');;
Route::post('/auth/verify', [MainController::class, 'verify'])->name('auth.verify');

Route::get('/student/profile', [MainController::class, 'profile'])->middleware('isLogged');
Route::get('/student/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::get('/student/enrollment-status', [MainController::class, 'enrollmentStatus'])->name('auth.enrollment-status');