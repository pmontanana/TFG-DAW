<?php

namespace App\Http\Controllers;

use App\Mail\PlatoPorCorreo;
use App\Models\Platos;
use Faker\Provider\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class PlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos = Platos::paginate(6);
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
            'precio' => 'required|numeric|min:1',
            'tipo' => 'required|string',
        ]);

        $data = $request->all();
        $data['tipo'] = $request->tipo;


        Platos::create($data);

        return redirect()->route('platos.index')
            ->with('success', 'Plato creado exitosamente.');
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

    public function showHamburguesas()
    {
        $platos = Platos::where('tipo', "hamburguesa")->get();
        return view('platosHamb', compact('platos'));
    }

    public function showPasta()
    {
        $platos = Platos::where('tipo', "pasta")->get();
        return view('platosPasta', compact('platos'));
    }

    public function showPizzas()
    {
        $platos = Platos::where('tipo', "pizza")->get();
        return view('platosPizzas', compact('platos'));
    }

    public function platosHome()
    {
        $tipos = ['hamburguesa', 'pizza', 'pasta'];
        $data = [];

        foreach ($tipos as $tipo) {
            $data[$tipo] = Platos::where('tipo', $tipo)->get();
        }

        return view('platosHome', $data);
    }

    public function generarPDF()
    {
        $platos = Platos::all();

        $pdf = Pdf::loadView('PDFPlatos', compact('platos'));
        return $pdf->download('platos.pdf');
    }

    public function platosPorCorreo(){
        $platos = Platos::all();
        Mail::to('jorgejuanlopeznavarro@gmail.com')->send(new PlatoPorCorreo($platos));
        return redirect('/');
    }
}
