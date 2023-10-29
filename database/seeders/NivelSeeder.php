<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nivels')->insert([
            [
                'nombre' => 'Avanzado'
            ],
            [
                'nombre' => 'Medio'
            ],
            [
                'nombre' => 'Aprendiz'
            ],

        ]);
    }
}
