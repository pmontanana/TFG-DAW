<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesasSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Mesa::create([
                'numero' => $i,
                'capacidad' => 2
            ]);
        }

        for ($i = 6; $i <= 10; $i++) {
            Mesa::create([
                'numero' => $i,
                'capacidad' => 4
            ]);
        }

        for ($i = 11; $i <= 13; $i++) {
            Mesa::create([
                'numero' => $i,
                'capacidad' => 6
            ]);
        }

        Mesa::create([
            'numero' => 14,
            'capacidad' => 10
        ]);
    }
}
