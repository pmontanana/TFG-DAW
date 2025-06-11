<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Platos;

class MenusSeeder extends Seeder
{
    public function run(): void
    {
        // Crear menús
        $menus = [
            [
                'nombre' => 'Menú del Día',
                'platos' => [
                    'Ensalada César',
                    'Pizza Margarita',
                    'Tiramisú'
                ]
            ],
            [
                'nombre' => 'Menú Italiano',
                'platos' => [
                    'Nachos con Queso',
                    'Spaghetti Carbonara',
                    'Tiramisú'
                ]
            ],
            [
                'nombre' => 'Menú Burger',
                'platos' => [
                    'Patatas Bravas',
                    'Hamburguesa BBQ Bacon',
                    'Brownie con Helado'
                ]
            ],
            [
                'nombre' => 'Menú Vegetariano',
                'platos' => [
                    'Ensalada César',
                    'Pizza Vegetariana',
                    'Tarta de Queso'
                ]
            ],
            [
                'nombre' => 'Menú Infantil',
                'platos' => [
                    'Nachos con Queso',
                    'Hamburguesa de Pollo',
                    'Brownie con Helado'
                ]
            ],
            [
                'nombre' => 'Menú Gourmet',
                'platos' => [
                    'Alitas de Pollo',
                    'Hamburguesa Gourmet',
                    'Tiramisú'
                ]
            ],
            [
                'nombre' => 'Menú Mariscos',
                'platos' => [
                    'Ensalada César',
                    'Linguine Frutti di Mare',
                    'Tarta de Queso'
                ]
            ],
            [
                'nombre' => 'Menú Ejecutivo',
                'platos' => [
                    'Patatas Bravas',
                    'Lasaña Bolognesa',
                    'Tiramisú'
                ]
            ]
        ];

        foreach ($menus as $menu_data) {
            $menu = Menu::create(['nombre' => $menu_data['nombre']]);

            // Asociar platos al menú
            foreach ($menu_data['platos'] as $nombre_plato) {
                $plato = Platos::where('nombre', $nombre_plato)->first();
                if ($plato) {
                    $menu->platos()->attach($plato->id);
                }
            }

            echo "✅ Menú '{$menu->nombre}' creado con " . count($menu_data['platos']) . " platos\n";
        }
    }
}
