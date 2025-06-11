<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alergeno;

class AlergenosSeeder extends Seeder
{
    public function run(): void
    {
        $alergenos = [
            ['nombre' => 'Gluten', 'descripcion' => 'Contiene gluten'],
            ['nombre' => 'Lactosa', 'descripcion' => 'Contiene productos lácteos'],
            ['nombre' => 'Huevo', 'descripcion' => 'Contiene huevo o trazas'],
            ['nombre' => 'Frutos secos', 'descripcion' => 'Contiene frutos secos'],
            ['nombre' => 'Pescado', 'descripcion' => 'Contiene pescado'],
            ['nombre' => 'Marisco', 'descripcion' => 'Contiene marisco o crustáceos'],
            ['nombre' => 'Soja', 'descripcion' => 'Contiene soja'],
            ['nombre' => 'Apio', 'descripcion' => 'Contiene apio'],
        ];

        foreach ($alergenos as $alergeno) {
            Alergeno::create($alergeno);
        }
    }
}
