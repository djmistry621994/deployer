<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('login', [\App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.store');
