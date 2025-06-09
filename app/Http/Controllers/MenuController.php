<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Platos;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('platos')->paginate(6);
        return view('menus.home', compact('menus'));
    }

    public function create()
    {
        $platos = Platos::all();
        return view('menus.crear', compact('platos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'platos' => 'required|array|min:1'
        ]);

        $menu = Menu::create(['nombre' => $request->nombre]);
        $menu->platos()->attach($request->platos);

        return redirect()->route('menus.index')->with('success', 'Menú creado correctamente');
    }
}
