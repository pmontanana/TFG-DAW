<?php
namespace App\Http\Controllers;

use App\Models\Platos;
use App\Models\Categoria;
use App\Models\Alergeno;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $alergenos = Alergeno::all();
        return view('buscador.index', compact('categorias', 'alergenos'));
    }

    public function buscar(Request $request)
    {
        $query = Platos::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->filled('alergenos')) {
            $query->whereHas('alergenos', function($q) use ($request) {
                $q->whereIn('alergeno_id', $request->alergenos);
            });
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $platos = $query->paginate(9);
        $categorias = Categoria::all();
        $alergenos = Alergeno::all();

        return view('buscador.resultados', compact('platos', 'categorias', 'alergenos', 'request'));
    }
}
