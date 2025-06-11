<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'hora_inicio',
        'hora_fin'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
