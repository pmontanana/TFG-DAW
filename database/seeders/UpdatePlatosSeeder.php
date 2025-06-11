<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platos;
use App\Models\Categoria;
use App\Models\Alergeno;

class UpdatePlatosSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener IDs de categorías
        $entrantes = Categoria::where('nombre', 'Entrantes')->first()->id;
        $principales = Categoria::where('nombre', 'Principales')->first()->id;
        $especiales = Categoria::where('nombre', 'Especiales')->first()->id;

        // Obtener IDs de alérgenos
        $gluten = Alergeno::where('nombre', 'Gluten')->first()->id;
        $lactosa = Alergeno::where('nombre', 'Lactosa')->first()->id;
        $huevo = Alergeno::where('nombre', 'Huevo')->first()->id;

        // Actualizar platos existentes con categorías y forsale
        $platos = Platos::all();

        foreach ($platos as $plato) {
            // Asignar categoría según tipo
            if ($plato->tipo == 'pizza') {
                $plato->categoria_id = $principales;
                $plato->forsale = true;
                // Las pizzas tienen gluten y lactosa
                $plato->alergenos()->sync([$gluten, $lactosa]);
            } elseif ($plato->tipo == 'pasta') {
                $plato->categoria_id = $principales;
                $plato->forsale = false;
                // La pasta tiene gluten y huevo
                $plato->alergenos()->sync([$gluten, $huevo]);
            } elseif ($plato->tipo == 'hamburguesa') {
                $plato->categoria_id = $especiales;
                $plato->forsale = true;
                // Las hamburguesas tienen gluten
                $plato->alergenos()->sync([$gluten]);
            }

            $plato->save();
        }
    }
}
