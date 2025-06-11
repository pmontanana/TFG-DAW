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
        'tipo',
        'categoria_id',
        'forsale'
    ];

    protected $casts = [
        'forsale' => 'boolean',
        'precio' => 'decimal:2'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_plato', 'platos_id', 'menu_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function alergenos()
    {
        return $this->belongsToMany(Alergeno::class, 'alergeno_plato', 'plato_id', 'alergeno_id');
    }
}
