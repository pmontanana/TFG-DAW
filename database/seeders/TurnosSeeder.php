<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;

class TurnosSeeder extends Seeder
{
    public function run(): void
    {
        $turnos = [
            ['nombre' => 'Comida 1', 'hora_inicio' => '13:00:00', 'hora_fin' => '14:30:00'],
            ['nombre' => 'Comida 2', 'hora_inicio' => '14:30:00', 'hora_fin' => '16:00:00'],
            ['nombre' => 'Cena 1', 'hora_inicio' => '20:00:00', 'hora_fin' => '21:30:00'],
            ['nombre' => 'Cena 2', 'hora_inicio' => '21:30:00', 'hora_fin' => '23:00:00'],
        ];

        foreach ($turnos as $turno) {
            Turno::create($turno);
        }
    }
}
