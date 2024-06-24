<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::post('/registrar', [MarkController::class, 'store'])->name('mark.store');

Route::get('/registrar', [MarkController::class, 'index'])->name('mark.index');