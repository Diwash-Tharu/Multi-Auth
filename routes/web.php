<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index'])->name('login.page');