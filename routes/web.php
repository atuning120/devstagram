<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');

Route::post('/crear-cuenta', [RegisterController::class, 'store']);


Route::get('/muro', [PostController::class, 'index'])->name('posts.index');

