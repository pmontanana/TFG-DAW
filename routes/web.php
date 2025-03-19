<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatosController;

Route::resource('platos', PlatosController::class);


Route::get('/', function () {
    return view('home');
});
Route::get('/', [PlatosController::class, 'index']);
Route::get('/platos/create', [PlatosController::class, 'create'])->name('platos.create');
Route::get('/hamburguesas', [PlatosController::class, 'showHamburguesas'])->name('platos.hamburguesas');
Route::get('/pasta', [PlatosController::class, 'showPasta'])->name('platos.pasta');
Route::get('/pizzas', [PlatosController::class, 'showPizzas'])->name('platos.pizzas');

Route::get('/platos', function () {
    return view('platosHome');
});
Route::get('/platos', [PlatosController::class, 'platosHome'])->name('platos.index');;


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

