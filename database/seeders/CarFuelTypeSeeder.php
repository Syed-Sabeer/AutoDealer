<?php

namespace Database\Seeders;

use App\Models\CarFuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarFuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuelTypes = [
            'Petrol',
            'Diesel',
            'Electric',
            'Hybrid',
            'CNG',
            'LPG',
            'Ethanol',
            'Hydrogen',
        ];

        $featuredFuels = ['Petrol', 'Diesel', 'Electric', 'Hybrid'];
        foreach ($fuelTypes as $type) {
            CarFuelType::create([
                'name' => $type,
                'slug' => Str::slug($type),
                'is_active' => 'active',
                'is_featured' => in_array($type, $featuredFuels) ? '1' : '0',
            ]);
        }
    }
}
