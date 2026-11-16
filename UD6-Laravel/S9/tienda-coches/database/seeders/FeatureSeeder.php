<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            'Aire acondicionado',
            'Bluetooth',
            'Cámara trasera',
            'Navegador GPS',
            'Techo solar',
            'Asientos calefactables',
            'Control de crucero',
            'Sensores de aparcamiento',
            'Llantas de aleación',
            'Faros LED',
        ];

        foreach ($features as $name) {
            Feature::firstOrCreate(['name' => $name]);
        }
    }
}