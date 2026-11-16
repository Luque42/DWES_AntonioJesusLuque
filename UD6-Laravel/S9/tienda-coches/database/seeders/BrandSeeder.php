<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Seat'       => 'España',
            'Volkswagen' => 'Alemania',
            'Toyota'     => 'Japón',
            'Renault'    => 'Francia',
            'Ford'       => 'Estados Unidos',
            'Peugeot'    => 'Francia',
        ];

        foreach ($brands as $name => $country) {
            Brand::firstOrCreate(['name' => $name], ['country' => $country]);
        }
    }
}