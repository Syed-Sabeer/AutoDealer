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
            'Compact',
            'Convertible',
            'SUV',
            'Crossover',
            'Wagon',
            'Sports',
            'Pickup',
            'Family MPV',
            'Coupe',
            'Electric',
            'Luxury',
        ];

        $bodyTypes = [
            [
                'name' => 'Sedan',
                'slug' => Str::slug('Sedan'),
                'image' => 'frontAssets/img/category/01.png',
                'is_featured' => '1',
            ],
            [
                'name' => 'Compact',
                'slug' => Str::slug('Compact'),
                'image' => 'frontAssets/img/category/02.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Convertible',
                'slug' => Str::slug('Convertible'),
                'image' => 'frontAssets/img/category/03.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'SUV',
                'slug' => Str::slug('SUV'),
                'image' => 'frontAssets/img/category/04.png',
                'is_featured' => '1',
            ],
            [
                'name' => 'Crossover',
                'slug' => Str::slug('Crossover'),
                'image' => 'frontAssets/img/category/05.png',
                'is_featured' => '1',
            ],
            [
                'name' => 'Wagon',
                'slug' => Str::slug('Wagon'),
                'image' => 'frontAssets/img/category/06.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Sports',
                'slug' => Str::slug('Sports'),
                'image' => 'frontAssets/img/category/07.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Pickup',
                'slug' => Str::slug('Pickup'),
                'image' => 'frontAssets/img/category/08.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Family MPV',
                'slug' => Str::slug('Family MPV'),
                'image' => 'frontAssets/img/category/09.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Coupe',
                'slug' => Str::slug('Coupe'),
                'image' => 'frontAssets/img/category/10.png',
                'is_featured' => '1',
            ],
            [
                'name' => 'Electric',
                'slug' => Str::slug('Electric'),
                'image' => 'frontAssets/img/category/11.png',
                'is_featured' => '0',
            ],
            [
                'name' => 'Luxury',
                'slug' => Str::slug('Luxury'),
                'image' => 'frontAssets/img/category/12.png',
                'is_featured' => '0',
            ],
        ];

        foreach ($bodyTypes as $type) {
            CarBodyType::create($type);
        }
    }
}
