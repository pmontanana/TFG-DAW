<?php

namespace App\Http\Controllers;

use App\Models\platos;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos = platos::all();
        return view('home', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearPlatos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        Platos::create($request->all());

        return redirect()->route('platos.index')
            ->with('success', 'Plato creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Platos $platos)
    {
        return view('platos.show', compact('platos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platos $platos)
    {
        return view('platos.edit', compact('platos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platos $platos)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        $platos->update($request->all());

        return redirect()->route('platos.index')
            ->with('success', 'Plato actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platos $platos)
    {
        $platos->delete();

        return redirect()->route('platos.index')
            ->with('success', 'Plato eliminado exitosamente.');
    }
}
