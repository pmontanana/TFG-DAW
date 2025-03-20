<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\platos;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::resource('platos', PlatosController::class);

Route::get('/', function () {
    $platos = Platos::all();
    return view('home', compact('platos'));
})->name('home');

Route::get('/platos/create', [PlatosController::class, 'create'])->name('platos.create');
Route::get('/hamburguesas', [PlatosController::class, 'showHamburguesas'])->name('platos.hamburguesas');
Route::get('/pasta', [PlatosController::class, 'showPasta'])->name('platos.pasta');
Route::get('/pizzas', [PlatosController::class, 'showPizzas'])->name('platos.pizzas');

Route::get('/platos', [PlatosController::class, 'platosHome'])->name('platos.index');
