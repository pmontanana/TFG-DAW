<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatosController;

Route::resource('platos', PlatosController::class);

Route::get('/', function () {
    return view('home');
});
Route::get('/', [PlatosController::class, 'index']);
Route::get('/platos/create', [PlatosController::class, 'create'])->name('platos.create');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
