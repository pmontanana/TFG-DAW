<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\MenuController;
use App\Models\Platos;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::resource('platos', PlatosController::class)->except(['show']);

Route::get('/', function () {
    $platos = Platos::paginate(6);
    return view('home', compact('platos'));
})->name('home');

Route::get('/platos/create', [PlatosController::class, 'create'])->name('platos.create');
Route::get('/platos/correo', [PlatosController::class, 'platosPorCorreo'])->name('platos.correo');
Route::get('/hamburguesas', [PlatosController::class, 'showHamburguesas'])->name('platos.hamburguesas');
Route::get('/pasta', [PlatosController::class, 'showPasta'])->name('platos.pasta');
Route::get('/pizzas', [PlatosController::class, 'showPizzas'])->name('platos.pizzas');

Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::resource('menus', MenuController::class)
    ->only(['create', 'store'])
    ->middleware('auth');
Route::resource('/contacto', ContactoController::class);
