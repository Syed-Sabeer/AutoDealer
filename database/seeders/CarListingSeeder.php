<?php

namespace Database\Seeders;

use App\Models\CarListing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'user_id' => 1,
                'car_brand_id' => 54, // Mercedes Benz
                'car_model_id' => 489, // A-Class
                'car_fuel_type_id' => 1, // Petrol
                'car_body_type_id' => 1, // Sedan

                'title' => 'Mercedes Benz Car',
                'car_id' => 'VEHICLE00001',
                'condition' => 'new',
                'year' => 2023,
                'price' => 95000.00,
                'drive_type' => 'RWD',
                'transmission' => 'automatic',
                'mileage' => '0',
                'horsepower' => '300',
                'fuel_efficiency' => 12.5,
                'engine_capacity' => '1991',
                'cylenders' => '4',
                'color' => 'White',
                'vin' => 'MBZ123456789',
                'seats' => 5,
                'doors' => 4,

                'main_image' => 'frontAssets/img/car/01.jpg',
                'address' => '123 Luxury Street',
                'city' => 'Berlin',
                'state' => 'Berlin',
                'zip_code' => '10115',

                'description' => 'Brand new Mercedes Benz with premium features.',
                'features' => json_encode(['Air Conditioning', 'Bluetooth', 'Cruise Control']),
                'contact_name' => 'John Doe',
                'contact_phone' => '+1234567890',
                'contact_email' => 'johndoe@example.com',
                'is_featured' => '1',
                'status' => 'published',
            ],
            [
                'user_id' => 1,
                'car_brand_id' => 23, // Ferrari
                'car_model_id' => 250, // SF90
                'car_fuel_type_id' => 4, // Hybrid
                'car_body_type_id' => 1, // Sports
            
                'title' => 'Yellow Ferrari 458',
                'car_id' => 'VEHICLE00002',
                'condition' => 'new',
                'year' => 2023,
                'price' => 250000.00,
                'drive_type' => 'RWD',
                'transmission' => 'automatic',
                'mileage' => '0',
                'horsepower' => '562',
                'fuel_efficiency' => 10.15,
                'engine_capacity' => '4497',
                'cylenders' => '8',
                'color' => 'Yellow',
                'vin' => 'FER458YELLOW123',
                'seats' => 2,
                'doors' => 2,
            
                'main_image' => 'frontAssets/img/car/02.jpg',
                'address' => '1 Exotic Lane',
                'city' => 'Rome',
                'state' => 'Lazio',
                'zip_code' => '00100',
            
                'description' => 'Brand new Ferrari 458 in stunning yellow with hybrid powertrain.',
                'features' => json_encode(['Air Conditioning', 'Bluetooth', 'Carbon Fiber Interior']),
                'contact_name' => 'Jane Smith',
                'contact_phone' => '+1987654321',
                'contact_email' => 'janesmith@example.com',
                'is_featured' => '1',
                'status' => 'published',
            ],            
            [
                'user_id' => 1,
                'car_brand_id' => 4, // Audi
                'car_model_id' => 42, // Q7
                'car_fuel_type_id' => 2, // Diesel
                'car_body_type_id' => 2, // SUV

                'title' => 'Black Audi Q7',
                'car_id' => 'VEHICLE00003',
                'condition' => 'used',
                'year' => 2021,
                'price' => 75000.00,
                'drive_type' => 'AWD',
                'transmission' => 'automatic',
                'mileage' => '20000',
                'horsepower' => '335',
                'fuel_efficiency' => 10.0,
                'engine_capacity' => '2995',
                'cylenders' => '6',
                'color' => 'Black',
                'vin' => 'AUDIQ7123456',
                'seats' => 7,
                'doors' => 5,

                'main_image' => 'frontAssets/img/car/03.jpg',
                'address' => '456 Elite Avenue',
                'city' => 'Munich',
                'state' => 'Bavaria',
                'zip_code' => '80331',

                'description' => 'Sleek black Audi Q7, gently used and well maintained.',
                'features' => json_encode(['Heated Seats', 'Leather Seats', 'Power Locks','Air Conditioning', 'Bluetooth', 'Cruise Control']),
                'contact_name' => 'Jane Smith',
                'contact_phone' => '+1987654321',
                'contact_email' => 'janesmith@example.com',
                'is_featured' => '0',
                'status' => 'published',
            ],
            [
                'user_id' => 1,
                'car_brand_id' => 6, // BMW
                'car_model_id' => 73, // 8 Series
                'car_fuel_type_id' => 2, // Diesel
                'car_body_type_id' => 1, // Sedan
            
                'title' => 'BMW Sports Car',
                'car_id' => 'VEHICLE00004',
                'condition' => 'new',
                'year' => 2023,
                'price' => 120000.00,
                'drive_type' => 'RWD',
                'transmission' => 'automatic',
                'mileage' => '0',
                'horsepower' => '350',
                'fuel_efficiency' => 10.15,
                'engine_capacity' => '2998',
                'cylenders' => '6',
                'color' => 'Blue',
                'vin' => 'BMW987654321',
                'seats' => 2,
                'doors' => 2,
            
                'main_image' => 'frontAssets/img/car/04.jpg',
                'address' => '99 Performance Blvd',
                'city' => 'Munich',
                'state' => 'Bavaria',
                'zip_code' => '80331',
            
                'description' => 'High-performance BMW sports car, hybrid model with top-tier features.',
                'features' => json_encode(['Leather Seats', 'Bluetooth', 'Navigation System', 'Cruise Control']),
                'contact_name' => 'Jane Smith',
                'contact_phone' => '+49891234567',
                'contact_email' => 'janesmith@example.com',
                'is_featured' => '1',
                'status' => 'published',
            ],
            
        ];

        foreach ($cars as $car) {
            CarListing::create($car);
        }
    }
}
