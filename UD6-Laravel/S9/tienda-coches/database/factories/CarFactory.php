<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    public function definition(): array
    {
        // Modelos plausibles por marca
        $catalog = [
            'Seat'       => ['Ibiza', 'León', 'Arona', 'Ateca'],
            'Volkswagen' => ['Golf', 'Polo', 'Tiguan', 'Passat'],
            'Toyota'     => ['Corolla', 'Yaris', 'C-HR', 'RAV4'],
            'Renault'    => ['Clio', 'Mégane', 'Captur'],
            'Ford'       => ['Fiesta', 'Focus', 'Kuga'],
            'Peugeot'    => ['208', '308', '2008'],
        ];

        // Requiere que las marcas ya existan (BrandSeeder se ejecuta antes)
        $brand = Brand::inRandomOrder()->first();
        $model = fake()->randomElement($catalog[$brand->name] ?? ['Modelo base']);

        return [
            'brand_id'    => $brand->id,
            'model'       => $model,
            'description' => fake()->sentence(12),
            'price'       => fake()->randomFloat(2, 4500, 38000),
            'year'        => fake()->numberBetween(2010, 2026),
            'mileage'     => fake()->numberBetween(0, 220000),
            'fuel'        => fake()->randomElement(Car::FUELS),
            'status'      => fake()->randomElement([
                'disponible', 'disponible', 'disponible', 'reservado', 'vendido',
            ]),
        ];
    }
}