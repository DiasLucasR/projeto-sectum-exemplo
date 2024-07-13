<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Route::view('/register', 'auth.register');
Route::post('/register', [AuthController::class, 'register']);

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::view('/forgot-password', 'auth.forgot-password');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);

Route::view('/home', 'home');

Route::get('/get-users', [HomeController::class, 'index'])->middleware('auth:sanctum');