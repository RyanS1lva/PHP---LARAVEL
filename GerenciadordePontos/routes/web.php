<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/acessar', [HomeController::class, 'store'])->name('home.store');

// Somente os usuários que já acessaram com sua conta podem acessar as rotas com o middleware "auth".
Route::get('/registrar', [MarkController::class, 'index'])->middleware('auth')->name('mark.index');
Route::post('/registrar', [MarkController::class, 'store'])->middleware('auth')->name('mark.store');
Route::get('/logout', [MarkController::class, 'destroy'])->middleware('auth')->name('mark.destroy');

Route::get('/cadastrar', [RegisterController::class, 'index'])->name('register.index');
Route::post('/cadastrar', [RegisterController::class, 'store'])->name('register.store');

// Somente os usuários administradores conseguem acessar as rotas definidas com o middleware "AdminMiddleware".
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', AdminMiddleware::class])->name('admin.index');