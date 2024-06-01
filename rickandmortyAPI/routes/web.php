<?php

use App\Http\Controllers\RickAndMortyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personagem/{id?}', [RickAndMortyController::class, 'getCharactersById']);