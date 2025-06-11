<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategoriasSeeder::class,
            AlergenosSeeder::class,
            MesasSeeder::class,
            TurnosSeeder::class,
            PlatosSeeder::class,    // Nuevo
            MenusSeeder::class,      // Nuevo
        ]);
    }
}
