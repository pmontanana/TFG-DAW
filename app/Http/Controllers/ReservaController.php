<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Turno;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('reservas.index', compact('turnos'));
    }

    public function checkMesas(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'turno_id' => 'required|exists:turnos,id',
            'comensales' => 'required|integer|min:1|max:10'
        ]);

        $mesasOcupadas = Reserva::where('fecha', $request->fecha)
            ->where('turno_id', $request->turno_id)
            ->pluck('mesa_id');

        $mesasLibres = Mesa::whereNotIn('id', $mesasOcupadas)
            ->where('capacidad', '>=', $request->comensales)
            ->get();

        return view('reservas.mesas-disponibles', compact('mesasLibres', 'request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'turno_id' => 'required|exists:turnos,id',
            'fecha' => 'required|date|after_or_equal:today',
            'comensales' => 'required|integer|min:1|max:10',
            'observaciones' => 'nullable|string|max:500'
        ]);

        $existe = Reserva::where('mesa_id', $request->mesa_id)
            ->where('turno_id', $request->turno_id)
            ->where('fecha', $request->fecha)
            ->exists();

        if ($existe) {
            return back()->withErrors(['mesa' => 'Esta mesa ya está reservada para ese turno y fecha.']);
        }

        $reserva = Reserva::create([
            'user_id' => auth()->id(),
            'mesa_id' => $request->mesa_id,
            'turno_id' => $request->turno_id,
            'fecha' => $request->fecha,
            'comensales' => $request->comensales,
            'observaciones' => $request->observaciones
        ]);

        return redirect()->route('reservas.confirmacion', $reserva)
            ->with('mensaje', 'Reserva realizada con éxito');
    }

    public function confirmacion(Reserva $reserva)
    {
        return view('reservas.confirmacion', compact('reserva'));
    }

    public function misReservas()
    {
        $reservas = auth()->user()->reservas()
            ->with(['mesa', 'turno'])
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        return view('reservas.mis-reservas', compact('reservas'));
    }

    public function adminIndex()
    {
        $reservas = Reserva::with(['user', 'mesa', 'turno'])
            ->orderBy('fecha', 'desc')
            ->paginate(15);

        return view('admin.reservas.index', compact('reservas'));
    }
}
