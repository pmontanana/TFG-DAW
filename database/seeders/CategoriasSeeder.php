<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Entrantes', 'descripcion' => 'Platos para comenzar la comida'],
            ['nombre' => 'Principales', 'descripcion' => 'Platos principales de la carta'],
            ['nombre' => 'Postres', 'descripcion' => 'Dulces y postres caseros'],
            ['nombre' => 'Bebidas', 'descripcion' => 'Refrescos, zumos y bebidas calientes'],
            ['nombre' => 'Especiales', 'descripcion' => 'Platos especiales del chef'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
