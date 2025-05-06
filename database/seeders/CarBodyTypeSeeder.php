<?php

namespace Database\Seeders;

use App\Models\CarBodyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarBodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodyTypes = [
            'Sedan',
            'SUV',
            'Coupe',
            'Hatchback',
            'Convertible',
            'Wagon',
            'Minivan',
            'Truck',
            'Crossover',
            'Roadster',
            'Sports Car',
            'Luxury',
            'Supercar',
            'Electric Vehicle',
            'Hybrid',
            'Van',
            'Pickup',
            'Off-road',
        ];

        foreach ($bodyTypes as $type) {
            CarBodyType::create([
                'name' => $type,
                'slug' => Str::slug($type),
                'is_active' => 'active',
            ]);
        }
    }
}
