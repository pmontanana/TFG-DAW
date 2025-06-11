<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platos;
use App\Models\Categoria;
use App\Models\Alergeno;

class UpdateExistingPlatosSeeder extends Seeder
{
    public function run(): void
    {
        // Este seeder actualiza los platos que ya existen en tu base de datos
        // con categorías, alérgenos e imágenes apropiadas

        // Obtener categorías
        $principales = Categoria::where('nombre', 'Principales')->first();
        $especiales = Categoria::where('nombre', 'Especiales')->first();

        // Obtener alérgenos
        $gluten = Alergeno::where('nombre', 'Gluten')->first();
        $lactosa = Alergeno::where('nombre', 'Lactosa')->first();
        $huevo = Alergeno::where('nombre', 'Huevo')->first();

        // Actualizar todos los platos existentes
        $platos = Platos::all();

        foreach ($platos as $plato) {
            // Asignar categoría según el tipo si no tiene
            if (!$plato->categoria_id) {
                if (in_array($plato->tipo, ['pizza', 'pasta', 'hamburguesa'])) {
                    // Asignar algunos como especiales aleatoriamente
                    $plato->categoria_id = rand(1, 4) == 1 ? $especiales->id : $principales->id;
                }
            }

            // Asignar forsale si no está definido
            if ($plato->forsale === null) {
                // Las pizzas y hamburguesas generalmente se pueden llevar
                // Las pastas generalmente no
                $plato->forsale = in_array($plato->tipo, ['pizza', 'hamburguesa']);
            }

            $plato->save();

            // Asignar alérgenos si no tiene
            if ($plato->alergenos->count() == 0) {
                $alergenos_ids = [];

                switch ($plato->tipo) {
                    case 'pizza':
                        $alergenos_ids = [$gluten->id, $lactosa->id];
                        break;
                    case 'pasta':
                        $alergenos_ids = [$gluten->id];
                        // Algunas pastas también tienen huevo
                        if (rand(1, 2) == 1) {
                            $alergenos_ids[] = $huevo->id;
                        }
                        // Algunas pastas tienen lactosa
                        if (rand(1, 3) == 1) {
                            $alergenos_ids[] = $lactosa->id;
                        }
                        break;
                    case 'hamburguesa':
                        $alergenos_ids = [$gluten->id];
                        // Algunas hamburguesas tienen queso
                        if (rand(1, 3) == 1) {
                            $alergenos_ids[] = $lactosa->id;
                        }
                        break;
                }

                if (!empty($alergenos_ids)) {
                    $plato->alergenos()->attach($alergenos_ids);
                }
            }

            // Actualizar imagen si tiene una ruta local
            if (strpos($plato->imagen, '/images/') === 0 || strpos($plato->imagen, 'images/') === 0) {
                $nueva_imagen = $this->getImagenPorTipo($plato->tipo, $plato->nombre);
                $plato->update(['imagen' => $nueva_imagen]);
            }

            echo "✅ Actualizado: {$plato->nombre}\n";
        }
    }

    private function getImagenPorTipo($tipo, $nombre)
    {
        // Mapeo de nombres específicos a imágenes
        $imagenes_especificas = [
            'margarita' => 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=400',
            'pepperoni' => 'https://images.unsplash.com/photo-1628840042765-356cda07504e?w=400',
            'carbonara' => 'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=400',
            'bolognesa' => 'https://images.unsplash.com/photo-1574894709920-11b28e7367e3?w=400',
            'clasica' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400',
            'bacon' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=400',
        ];

        // Buscar si el nombre contiene alguna palabra clave
        $nombre_lower = strtolower($nombre);
        foreach ($imagenes_especificas as $palabra => $imagen) {
            if (strpos($nombre_lower, $palabra) !== false) {
                return $imagen;
            }
        }

        // Si no hay coincidencia, usar imagen genérica por tipo
        return match($tipo) {
            'pizza' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400',
            'pasta' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400',
            'hamburguesa' => 'https://images.unsplash.com/photo-1551782450-a2132b4ba21d?w=400',
            default => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400'
        };
    }
}
