<?php

namespace Database\Factories;

use App\Models\Desarrolladora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Desarrolladora>
 */
class DesarrolladoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->company(),
            'pais' => fake()->country(),
            'fundacion' => fake()->numberBetween(1970, 2020),
        ];
    }
}
