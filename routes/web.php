<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaxRecordController;
use App\Http\Controllers\VaxScheduleController;
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

//Automatically handles the following:
//patients.index, patients.create, patients.store, patients.show, patients.edit, patients.update, patients.destroy
Route::resource('patients', PatientController::class);

//Utilizes shallow nesting
//patients.vaxRecords.index, patients.vaxRecords.create, patients.vaxRecords.store
//vaxRecords.show, vaxRecords.edit, vaxRecords.update, vaxRecords.destroy 
Route::resource('patients.vaxRecords', VaxRecordController::class)->shallow();

//vaxRecords.vaxSchedules.index, vaxRecords.vaxSchedules.create, vaxRecords.vaxSchedules.store
//vaxSchedules.show, vaxSchedules.edit, vaxSchedules.update, vaxSchedules.destroy 
Route::resource('vaxRecords.vaxSchedules', VaxScheduleController::class)->shallow();