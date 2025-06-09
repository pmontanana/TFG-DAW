<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nombre'];

    public function platos()
    {
        return $this->belongsToMany(Platos::class, 'menu_plato', 'menu_id', 'platos_id');
    }
}
