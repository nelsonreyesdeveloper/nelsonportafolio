<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TecnologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tecnologias')->insert([
            [
                'nombre' => 'HTML'
            ],
            [
                'nombre' => 'CSS'
            ],
            [
                'nombre' => 'PHP'
            ],
            [
                'nombre' => 'Python'
            ],
            [
                'nombre' => 'Angular'
            ],
            [
                'nombre' => 'React'
            ],
            [
                'nombre' => 'JavaScript'
            ],
            [
                'nombre' => 'Laravel'
            ],
            [
                'nombre' => 'Bootstrap'
            ],
            [
                'nombre' => 'Tailwind'
            ],
            [
                'nombre' => 'Node Js'
            ],
        ]);

    }
}
