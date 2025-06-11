<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\AdminController;
use App\Models\Platos;

Route::get('/', function () {
    $platos = Platos::with(['categoria', 'alergenos'])->paginate(6);
    return view('home', compact('platos'));
})->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/hamburguesas', [PlatosController::class, 'showHamburguesas'])->name('platos.hamburguesas');
Route::get('/pasta', [PlatosController::class, 'showPasta'])->name('platos.pasta');
Route::get('/pizzas', [PlatosController::class, 'showPizzas'])->name('platos.pizzas');
Route::get('/platos', [PlatosController::class, 'platosHome'])->name('platos.home');

Route::get('/buscar', [BuscadorController::class, 'index'])->name('buscador.index');
Route::get('/buscar/resultados', [BuscadorController::class, 'buscar'])->name('buscador.buscar');

Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

Route::resource('/contacto', ContactoController::class)->only(['index', 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservas/check', [ReservaController::class, 'checkMesas'])->name('reservas.checkMesas');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/confirmacion/{reserva}', [ReservaController::class, 'confirmacion'])->name('reservas.confirmacion');
    Route::get('/mis-reservas', [ReservaController::class, 'misReservas'])->name('reservas.misReservas');

    Route::resource('menus', MenuController::class)->only(['create', 'store']);

    Route::get('/platos/correo', [PlatosController::class, 'platosPorCorreo'])->name('platos.correo');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('platos', PlatosController::class)->except(['show', 'index']);

    Route::get('/admin/reservas', [ReservaController::class, 'adminIndex'])->name('admin.reservas');
});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'admin']);
