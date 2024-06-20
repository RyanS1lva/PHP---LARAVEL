<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/login/{user}', [LoginController::class, 'show'])->name('login.show');

Route::get('/login', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('/registrar', [RegisterController::class, 'index'])->name('register.index');

Route::post('/registrar', [RegisterController::class, 'store'])->name('register.store');
