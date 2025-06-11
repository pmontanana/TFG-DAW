<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platos;

class UpdatePlatosImagenesSeeder extends Seeder
{
    public function run(): void
    {
        // Actualizar imágenes con URLs de Unsplash que funcionan
        $imagenes = [
            // Pizzas
            'Pizza Margarita' => 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=400',
            'Pizza Pepperoni' => 'https://images.unsplash.com/photo-1628840042765-356cda07504e?w=400',
            'Pizza Cuatro Quesos' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400',
            'Pizza Vegetariana' => 'https://images.unsplash.com/photo-1572552635104-daf938e0aa1f?w=400',
            'Pizza BBQ' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400',
            'Pizza Marinera' => 'https://images.unsplash.com/photo-1594007654729-407eedc4be65?w=400',

            // Pastas
            'Spaghetti Carbonara' => 'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=400',
            'Penne Arrabbiata' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400',
            'Fettuccine Alfredo' => 'https://images.unsplash.com/photo-1645112411341-6c4fd023714a?w=400',
            'Lasaña Bolognesa' => 'https://images.unsplash.com/photo-1574894709920-11b28e7367e3?w=400',
            'Ravioli de Espinacas' => 'https://images.unsplash.com/photo-1587740908075-9e245070dfaa?w=400',
            'Linguine Frutti di Mare' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=400',

            // Hamburguesas
            'Hamburguesa Clásica' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400',
            'Hamburguesa BBQ Bacon' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=400',
            'Hamburguesa Vegetariana' => 'https://images.unsplash.com/photo-1520072959219-c595dc870360?w=400',
            'Hamburguesa de Pollo' => 'https://images.unsplash.com/photo-1606755962773-d324e0a13086?w=400',
            'Hamburguesa Gourmet' => 'https://images.unsplash.com/photo-1608767221051-2b9d18f35a2f?w=400',
            'Hamburguesa Mexicana' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=400',

            // Entrantes
            'Patatas Bravas' => 'https://images.unsplash.com/photo-1630431341973-02e1b662ec35?w=400',
            'Nachos con Queso' => 'https://images.unsplash.com/photo-1582169296194-e4d644c48063?w=400',
            'Alitas de Pollo' => 'https://images.unsplash.com/photo-1569691899455-88464f6d3ab1?w=400',
            'Ensalada César' => 'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=400',

            // Postres
            'Tiramisú' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400',
            'Brownie con Helado' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=400',
            'Tarta de Queso' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=400',
        ];

        foreach ($imagenes as $nombre => $url) {
            $plato = Platos::where('nombre', $nombre)->first();
            if ($plato) {
                $plato->update(['imagen' => $url]);
                echo "✅ Imagen actualizada para: {$nombre}\n";
            } else {
                echo "❌ No se encontró el plato: {$nombre}\n";
            }
        }

        // Para los platos que no tienen imagen específica, usar imágenes genéricas
        $platos_sin_imagen = Platos::whereNotIn('nombre', array_keys($imagenes))->get();

        foreach ($platos_sin_imagen as $plato) {
            $imagen_generica = match($plato->tipo) {
                'pizza' => 'https://images.unsplash.com/photo-1571407970349-bc81e7e96d47?w=400',
                'pasta' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400',
                'hamburguesa' => 'https://images.unsplash.com/photo-1551782450-a2132b4ba21d?w=400',
                'entrante' => 'https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?w=400',
                'postre' => 'https://images.unsplash.com/photo-1551024506-0bccd828d307?w=400',
                default => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400'
            };

            $plato->update(['imagen' => $imagen_generica]);
            echo "✅ Imagen genérica asignada a: {$plato->nombre}\n";
        }
    }
}
