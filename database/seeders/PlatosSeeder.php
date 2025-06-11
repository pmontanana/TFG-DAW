<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platos;
use App\Models\Categoria;
use App\Models\Alergeno;

class PlatosSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener categorías
        $entrantes = Categoria::where('nombre', 'Entrantes')->first();
        $principales = Categoria::where('nombre', 'Principales')->first();
        $postres = Categoria::where('nombre', 'Postres')->first();
        $bebidas = Categoria::where('nombre', 'Bebidas')->first();
        $especiales = Categoria::where('nombre', 'Especiales')->first();

        // Obtener alérgenos
        $gluten = Alergeno::where('nombre', 'Gluten')->first();
        $lactosa = Alergeno::where('nombre', 'Lactosa')->first();
        $huevo = Alergeno::where('nombre', 'Huevo')->first();
        $frutos_secos = Alergeno::where('nombre', 'Frutos secos')->first();
        $pescado = Alergeno::where('nombre', 'Pescado')->first();
        $marisco = Alergeno::where('nombre', 'Marisco')->first();

        // Platos de Pizza
        $pizzas = [
            [
                'nombre' => 'Pizza Margarita',
                'descripcion' => 'Pizza clásica con tomate, mozzarella y albahaca fresca',
                'imagen' => '/images/pizza-margarita.jpg',
                'precio' => 8.50,
                'tipo' => 'pizza',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Pizza Pepperoni',
                'descripcion' => 'Pizza con pepperoni, mozzarella y salsa de tomate especial',
                'imagen' => '/images/pizza-pepperoni.jpg',
                'precio' => 10.50,
                'tipo' => 'pizza',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Pizza Cuatro Quesos',
                'descripcion' => 'Deliciosa combinación de mozzarella, gorgonzola, parmesano y queso de cabra',
                'imagen' => '/images/pizza-cuatro-quesos.jpg',
                'precio' => 12.00,
                'tipo' => 'pizza',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Pizza Vegetariana',
                'descripcion' => 'Pizza con verduras frescas de temporada, tomate y mozzarella',
                'imagen' => '/images/pizza-vegetariana.jpg',
                'precio' => 9.50,
                'tipo' => 'pizza',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Pizza BBQ',
                'descripcion' => 'Pizza con pollo, bacon, cebolla y salsa barbacoa',
                'imagen' => '/images/pizza-bbq.jpg',
                'precio' => 11.50,
                'tipo' => 'pizza',
                'categoria_id' => $especiales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Pizza Marinera',
                'descripcion' => 'Pizza con frutos del mar, ajo y perejil',
                'imagen' => '/images/pizza-marinera.jpg',
                'precio' => 13.50,
                'tipo' => 'pizza',
                'categoria_id' => $especiales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $pescado->id, $marisco->id]
            ]
        ];

        // Platos de Pasta
        $pastas = [
            [
                'nombre' => 'Spaghetti Carbonara',
                'descripcion' => 'Pasta tradicional con huevo, bacon y queso parmesano',
                'imagen' => '/images/pasta-carbonara.jpg',
                'precio' => 9.00,
                'tipo' => 'pasta',
                'categoria_id' => $principales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $huevo->id, $lactosa->id]
            ],
            [
                'nombre' => 'Penne Arrabbiata',
                'descripcion' => 'Pasta con salsa de tomate picante y ajo',
                'imagen' => '/images/pasta-arrabbiata.jpg',
                'precio' => 8.00,
                'tipo' => 'pasta',
                'categoria_id' => $principales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id]
            ],
            [
                'nombre' => 'Fettuccine Alfredo',
                'descripcion' => 'Pasta con cremosa salsa de mantequilla y parmesano',
                'imagen' => '/images/pasta-alfredo.jpg',
                'precio' => 10.00,
                'tipo' => 'pasta',
                'categoria_id' => $principales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Lasaña Bolognesa',
                'descripcion' => 'Lasaña casera con carne, bechamel y queso gratinado',
                'imagen' => '/images/lasana-bolognesa.jpg',
                'precio' => 11.50,
                'tipo' => 'pasta',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id]
            ],
            [
                'nombre' => 'Ravioli de Espinacas',
                'descripcion' => 'Ravioli rellenos de espinacas y ricotta con salsa de tomate',
                'imagen' => '/images/ravioli-espinacas.jpg',
                'precio' => 10.50,
                'tipo' => 'pasta',
                'categoria_id' => $principales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id]
            ],
            [
                'nombre' => 'Linguine Frutti di Mare',
                'descripcion' => 'Pasta con mariscos frescos en salsa de vino blanco',
                'imagen' => '/images/linguine-frutti.jpg',
                'precio' => 14.00,
                'tipo' => 'pasta',
                'categoria_id' => $especiales->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $pescado->id, $marisco->id]
            ]
        ];

        // Platos de Hamburguesa
        $hamburguesas = [
            [
                'nombre' => 'Hamburguesa Clásica',
                'descripcion' => 'Carne de res, lechuga, tomate, cebolla y salsa especial',
                'imagen' => '/images/hamburguesa-clasica.jpg',
                'precio' => 8.50,
                'tipo' => 'hamburguesa',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id]
            ],
            [
                'nombre' => 'Hamburguesa BBQ Bacon',
                'descripcion' => 'Doble carne, bacon crujiente, cebolla caramelizada y salsa BBQ',
                'imagen' => '/images/hamburguesa-bbq.jpg',
                'precio' => 11.00,
                'tipo' => 'hamburguesa',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id]
            ],
            [
                'nombre' => 'Hamburguesa Vegetariana',
                'descripcion' => 'Hamburguesa de lentejas y verduras con aguacate',
                'imagen' => '/images/hamburguesa-vegetariana.jpg',
                'precio' => 9.00,
                'tipo' => 'hamburguesa',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id]
            ],
            [
                'nombre' => 'Hamburguesa de Pollo',
                'descripcion' => 'Pechuga de pollo empanada, lechuga y mayonesa',
                'imagen' => '/images/hamburguesa-pollo.jpg',
                'precio' => 8.00,
                'tipo' => 'hamburguesa',
                'categoria_id' => $principales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $huevo->id]
            ],
            [
                'nombre' => 'Hamburguesa Gourmet',
                'descripcion' => 'Carne de Angus, queso azul, rúcula y cebolla confitada',
                'imagen' => '/images/hamburguesa-gourmet.jpg',
                'precio' => 13.50,
                'tipo' => 'hamburguesa',
                'categoria_id' => $especiales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ],
            [
                'nombre' => 'Hamburguesa Mexicana',
                'descripcion' => 'Carne especiada, jalapeños, guacamole y nachos',
                'imagen' => '/images/hamburguesa-mexicana.jpg',
                'precio' => 10.50,
                'tipo' => 'hamburguesa',
                'categoria_id' => $especiales->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id]
            ]
        ];

        // Entrantes
        $entrantes_platos = [
            [
                'nombre' => 'Patatas Bravas',
                'descripcion' => 'Patatas fritas con salsa brava casera y alioli',
                'imagen' => '/images/patatas-bravas.jpg',
                'precio' => 4.50,
                'tipo' => 'entrante',
                'categoria_id' => $entrantes->id,
                'forsale' => true,
                'alergenos' => [$huevo->id]
            ],
            [
                'nombre' => 'Nachos con Queso',
                'descripcion' => 'Nachos crujientes con queso fundido y jalapeños',
                'imagen' => '/images/nachos-queso.jpg',
                'precio' => 6.50,
                'tipo' => 'entrante',
                'categoria_id' => $entrantes->id,
                'forsale' => true,
                'alergenos' => [$lactosa->id]
            ],
            [
                'nombre' => 'Alitas de Pollo',
                'descripcion' => 'Alitas marinadas con salsa BBQ o picante',
                'imagen' => '/images/alitas-pollo.jpg',
                'precio' => 7.50,
                'tipo' => 'entrante',
                'categoria_id' => $entrantes->id,
                'forsale' => true,
                'alergenos' => []
            ],
            [
                'nombre' => 'Ensalada César',
                'descripcion' => 'Lechuga romana, pollo, crutones, parmesano y salsa césar',
                'imagen' => '/images/ensalada-cesar.jpg',
                'precio' => 8.00,
                'tipo' => 'entrante',
                'categoria_id' => $entrantes->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id, $pescado->id]
            ]
        ];

        // Postres
        $postres_platos = [
            [
                'nombre' => 'Tiramisú',
                'descripcion' => 'Postre italiano con café, mascarpone y cacao',
                'imagen' => '/images/tiramisu.jpg',
                'precio' => 5.50,
                'tipo' => 'postre',
                'categoria_id' => $postres->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id]
            ],
            [
                'nombre' => 'Brownie con Helado',
                'descripcion' => 'Brownie de chocolate caliente con helado de vainilla',
                'imagen' => '/images/brownie-helado.jpg',
                'precio' => 6.00,
                'tipo' => 'postre',
                'categoria_id' => $postres->id,
                'forsale' => false,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id, $frutos_secos->id]
            ],
            [
                'nombre' => 'Tarta de Queso',
                'descripcion' => 'Tarta de queso cremosa con base de galleta',
                'imagen' => '/images/tarta-queso.jpg',
                'precio' => 5.00,
                'tipo' => 'postre',
                'categoria_id' => $postres->id,
                'forsale' => true,
                'alergenos' => [$gluten->id, $lactosa->id, $huevo->id]
            ]
        ];

        // Crear todos los platos
        $todos_platos = array_merge($pizzas, $pastas, $hamburguesas, $entrantes_platos, $postres_platos);

        foreach ($todos_platos as $plato_data) {
            $alergenos = $plato_data['alergenos'];
            unset($plato_data['alergenos']);

            $plato = Platos::create($plato_data);

            if (!empty($alergenos)) {
                $plato->alergenos()->attach($alergenos);
            }
        }

        echo "✅ " . count($todos_platos) . " platos creados exitosamente\n";
    }
}
