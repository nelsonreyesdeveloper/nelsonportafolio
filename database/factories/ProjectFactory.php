<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Nivel;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/* *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->title(),
            'descripcion' => fake()->text(200),
            'imagen'=> 'Ew40a029RmARw2NVtL72qTeLABMWg8MGHlbL17JykFy5q1SjPb'."."."png",
            'user_id' => User::all()->random()->id,
            'nivel_id' => Nivel::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id
        ];
    }
}
