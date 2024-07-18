<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;	
Route::get('/', function () {
    return view('welcome');
});


Route::get('/account/login', [loginController::class, 'index'])->name('login.page');
Route::get('/account/register', [loginController::class, 'register'])->name('register.page');
Route ::post('/account/register', [loginController::class, 'processRegister'])->name('register');
Route ::get('/account/louut', [loginController::class, 'processRegister'])->name('account.logout');
Route::get('/account/logout', [loginController::class, 'logout'])->name('account.logout');



Route::post('/login/all', [loginController::class, 'authenticate'])->name('account.login');


// for groupin the routes
Route::group(['prefix' => 'login'], function(){
    // Route::get('dashboard', [DashboardController::class, 'index'])->name('home');

    Route ::group (['middleware' => 'auth'], function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('home');
    }); 
});

// Route::get('login/dashboard', [DashboardController::class, 'index'])->name('home');