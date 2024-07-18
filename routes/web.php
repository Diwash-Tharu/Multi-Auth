<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;	
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index'])->name('login.page');
Route::get('/register', [loginController::class, 'register'])->name('register.page');
Route ::post('/account/register', [loginController::class, 'processRegister'])->name('register');
Route ::get('/account/louut', [loginController::class, 'processRegister'])->name('account.logout');
Route::get('/account/logout', [loginController::class, 'logout'])->name('account.logout');



Route::post('/login/all', [loginController::class, 'authenticate'])->name('account.login');

Route::get('login/dashboard', [DashboardController::class, 'index'])->name('home');