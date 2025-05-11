<?php

namespace Database\Seeders;

use App\Models\CarListingImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarListingImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/img/car/single-1.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/img/car/single-2.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/img/car/single-3.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/img/car/single-4.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/img/car/single-1.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/img/car/single-2.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/img/car/single-3.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/img/car/single-4.jpg',
            ],
        ];
        
        foreach ($images as $image) {
            CarListingImage::create($image);
        }
    }
}
