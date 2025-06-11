<?php

namespace App\Http\Controllers;

use App\Mail\PlatoPorCorreo;
use App\Models\Platos;
use App\Models\Categoria;
use App\Models\Alergeno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PlatosController extends Controller
{
    public function index()
    {
        $platos = Platos::with(['categoria', 'alergenos'])->paginate(6);
        return view('home', compact('platos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $alergenos = Alergeno::all();
        return view('crearPlatos', compact('categorias', 'alergenos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|max:255',
            'precio' => 'required|numeric|min:0.01',
            'tipo' => 'required|string|in:pizza,pasta,hamburguesa',
            'categoria_id' => 'required|exists:categorias,id',
            'forsale' => 'boolean',
            'alergenos' => 'array'
        ]);

        $data = $request->except('alergenos');
        $data['forsale'] = $request->has('forsale');

        $plato = Platos::create($data);

        if ($request->has('alergenos')) {
            $plato->alergenos()->attach($request->alergenos);
        }

        return redirect()->route('platos.index')
            ->with('success', 'Plato creado exitosamente.');
    }

    public function edit(Platos $plato)
    {
        $categorias = Categoria::all();
        $alergenos = Alergeno::all();
        return view('editarPlato', compact('plato', 'categorias', 'alergenos'));
    }

    public function update(Request $request, Platos $plato)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0.01',
            'tipo' => 'required|string|in:pizza,pasta,hamburguesa',
            'categoria_id' => 'required|exists:categorias,id',
            'forsale' => 'boolean',
            'alergenos' => 'array'
        ]);

        $data = $request->except('alergenos');
        $data['forsale'] = $request->has('forsale');

        $plato->update($data);

        if ($request->has('alergenos')) {
            $plato->alergenos()->sync($request->alergenos);
        } else {
            $plato->alergenos()->detach();
        }

        return redirect()->route('platos.index')
            ->with('success', 'Plato actualizado exitosamente.');
    }

    public function destroy(Platos $plato)
    {
        $plato->delete();
        return redirect()->route('platos.index')
            ->with('success', 'Plato eliminado exitosamente.');
    }

    public function showHamburguesas()
    {
        $platos = Platos::with(['categoria', 'alergenos'])
            ->where('tipo', 'hamburguesa')
            ->get();
        return view('platosHamb', compact('platos'));
    }

    public function showPasta()
    {
        $platos = Platos::with(['categoria', 'alergenos'])
            ->where('tipo', 'pasta')
            ->get();
        return view('platosPasta', compact('platos'));
    }

    public function showPizzas()
    {
        $platos = Platos::with(['categoria', 'alergenos'])
            ->where('tipo', 'pizza')
            ->get();
        return view('platosPizzas', compact('platos'));
    }

    public function platosHome()
    {
        $tipos = ['hamburguesa', 'pizza', 'pasta'];
        $data = [];

        foreach ($tipos as $tipo) {
            $data[$tipo] = Platos::with(['categoria', 'alergenos'])
                ->where('tipo', $tipo)
                ->get();
        }

        return view('platosHome', $data);
    }

    public function platosPorCorreo()
    {
        $platos = Platos::all();
        Mail::to(auth()->user()->email)->send(new PlatoPorCorreo($platos));
        return redirect('/')->with('mensaje', 'Email enviado correctamente');
    }
}
