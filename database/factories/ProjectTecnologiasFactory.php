<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Tecnologia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectTecnologias>
 */
class ProjectTecnologiasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::all()->random()->id,
            'tecnologia_id' => Tecnologia::all()->random()->id
        ];
    }
}
