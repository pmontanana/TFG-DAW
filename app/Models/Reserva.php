<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mesa_id',
        'turno_id',
        'fecha',
        'comensales',
        'observaciones'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
