<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');

Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/muro',[PostController::class, 'index'])->name('posts.index');

