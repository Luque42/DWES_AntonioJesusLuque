<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::pluck('id', 'name');
        $featureIds = Feature::pluck('id');

        // 3 registros fijos y reconocibles
        $fixedCars = [
            [
                'brand'       => 'Seat',
                'model'       => 'León FR',
                'description' => 'Coche fijo de demostración 1: León FR en perfecto estado.',
                'price'       => 18900,
                'year'        => 2021,
                'mileage'     => 42000,
                'fuel'        => 'gasolina',
                'status'      => 'disponible',
                'features'    => ['Aire acondicionado', 'Bluetooth', 'Cámara trasera', 'Faros LED'],
            ],
            [
                'brand'       => 'Toyota',
                'model'       => 'Corolla Hybrid',
                'description' => 'Coche fijo de demostración 2: Corolla híbrido muy económico.',
                'price'       => 23500,
                'year'        => 2022,
                'mileage'     => 25000,
                'fuel'        => 'hibrido',
                'status'      => 'reservado',
                'features'    => ['Aire acondicionado', 'Navegador GPS', 'Control de crucero'],
            ],
            [
                'brand'       => 'Volkswagen',
                'model'       => 'Golf GTI',
                'description' => 'Coche fijo de demostración 3: Golf GTI deportivo.',
                'price'       => 31900,
                'year'        => 2020,
                'mileage'     => 58000,
                'fuel'        => 'gasolina',
                'status'      => 'disponible',
                'features'    => ['Techo solar', 'Asientos calefactables', 'Llantas de aleación', 'Bluetooth'],
            ],
        ];

        foreach ($fixedCars as $row) {
            $car = Car::updateOrCreate(
                ['brand_id' => $brands[$row['brand']], 'model' => $row['model']],
                [
                    'description' => $row['description'],
                    'price'       => $row['price'],
                    'year'        => $row['year'],
                    'mileage'     => $row['mileage'],
                    'fuel'        => $row['fuel'],
                    'status'      => $row['status'],
                ]
            );

            // sync no duplica combinaciones en la tabla pivote
            $car->features()->sync(
                Feature::whereIn('name', $row['features'])->pluck('id')->all()
            );
        }

        // 20 coches generados con la Factory + extras aleatorios
        Car::factory()->count(20)->create()->each(function (Car $car) use ($featureIds) {
            $car->features()->sync($featureIds->random(rand(2, 5))->all());
        });
    }
}