<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/crear-cuenta', [RegisterController::class, 'index']);

Route::post('/crear-cuenta', [RegisterController::class, 'store']);
