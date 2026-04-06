<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route to registration form
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
//Post method
Route::post('/register', [AuthController::class, 'register'])->name('register');

//Route to login form
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
//Post method
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

