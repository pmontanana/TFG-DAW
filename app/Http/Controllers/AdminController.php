<?php

namespace App\Http\Controllers;

use App\Models\Platos;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Contacto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPlatos = Platos::count();
        $totalReservas = Reserva::count();
        $totalUsuarios = User::where('role', 'user')->count();
        $totalContactos = Contacto::count();

        $reservasHoy = Reserva::whereDate('fecha', today())->count();
        $platosRecientes = Platos::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPlatos',
            'totalReservas',
            'totalUsuarios',
            'totalContactos',
            'reservasHoy',
            'platosRecientes'
        ));
    }
}
