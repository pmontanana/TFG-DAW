<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'tipo'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_plato', 'platos_id', 'menu_id');
    }
}
