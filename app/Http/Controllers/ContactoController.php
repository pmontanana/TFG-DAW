<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //Muestra el formulario de contacto
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $datos = request()->all();
        Contacto::create($datos);
        return redirect('contacto')->with("mensaje", "Formulario enviado con éxito.");
    }
}
