<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Desarrollador Front-End'
            ],
            [
                'nombre' => 'Desarrollador Back-End'
            ],
            [
                'nombre' => 'Desarrollador Full-Stack'
            ],
            [
                'nombre' => 'Desarrollador de E-Commerce'
            ],
            [
                'nombre' => 'Desarrollador WordPress'
            ],
            [
                'nombre' => 'Desarrollador de Seo'
            ],
            [
                'nombre' => 'Comentarios finales'
            ]


        ]);
    }
}
