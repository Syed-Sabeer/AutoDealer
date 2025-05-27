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
                'image_url' => 'frontAssets/images/section/listing-detai-1.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/images/section/listing-detai-2.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/images/section/listing-detai-3.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/images/section/listing-detai-1.jpg',
            ],
            [
                'car_listing_id' => 1,
                'image_url' => 'frontAssets/images/section/listing-detai-2.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/images/section/listing-detai-1.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/images/section/listing-detai-2.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/images/section/listing-detai-3.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/images/section/listing-detai-1.jpg',
            ],
            [
                'car_listing_id' => 2,
                'image_url' => 'frontAssets/images/section/listing-detai-2.jpg',
            ],
        ];

        foreach ($images as $image) {
            CarListingImage::create($image);
        }
    }
}
