<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergeno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function platos()
    {
        return $this->belongsToMany(Platos::class, 'alergeno_plato', 'alergeno_id', 'plato_id');
    }
}
