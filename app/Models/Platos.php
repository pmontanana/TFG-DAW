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
}
