<?php

namespace Database\Seeders;

use App\Models\CarFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carFeatures = [
            'Air Conditioning',
            'Bluetooth',
            'Cruise Control',
            'Heated Seats',
            'Leather Seats',
            'Sunroof',
            'Backup Camera',
            'Navigation System',
            'Power Windows',
            'Power Locks',
            'Push-Button Start',
            'Keyless Entry',
            'Apple CarPlay',
            'Android Auto',
            'USB Ports',
            'LED Headlights',
            'Parking Sensors',
            'All-Wheel Drive',
            'Blind Spot Monitoring',
            'Lane Departure Warning',
            'Adaptive Cruise Control',
            'Automatic Emergency Braking',
            'Remote Start',
            'Towing Package',
            'Roof Rails',
            'Sport Suspension',
            'Remote Trunk Release',
            'Fog Lights',
            'Wireless Charging',
            'Heads-Up Display',
            'Voice Control',
            'Premium Audio System',
            'Surround Sound System',
            'Rear Cross Traffic Alert',
            'Dual Zone Climate Control',
            'Keyless Ignition',
            'Rain-Sensing Wipers',
            'Alloy Wheels',
            'Tow Hooks',
            'Rear Seat Entertainment',
            'Parking Assist',
            'Auto-Dimming Mirrors',
            'Power Seats',
            'Memory Seats',
            'Front Collision Warning',
            'Forward Collision Mitigation',
            'Hill Start Assist',
            'Traction Control',
            'Stability Control',
            'Front and Rear Airbags',
            'Side-Impact Airbags',
            'Pedestrian Detection',
            'Adaptive Headlights',
            'Electric Seats',
            'Trailer Sway Control',
            'Power Liftgate',
            'Leather-Wrapped Steering Wheel',
            'Heated Steering Wheel',
            'Heated Mirrors',
            'Automatic Climate Control',
            'Satellite Radio',
            'Ambient Lighting',
            'Electric Parking Brake',
            'Electronic Stability Program',
            'Wi-Fi Hotspot',
            '360-Degree Camera',
            'Traffic Sign Recognition',
            'Night Vision System',
            'Air Suspension',
            'Voice-Activated Navigation',
            'Collision Avoidance System',
        ];

        $featuredFeatures = ['Alloy Wheels', 'Air Suspension', 'Parking Sensors', 'Backup Camera'];

        foreach ($carFeatures as $feature) {
            CarFeature::create([
                'name' => $feature,
                'slug' => Str::slug($feature),
                'is_active' => 'active',
                'is_featured' => in_array($feature, $featuredFeatures) ? '1' : '0',
            ]);
        }
    }
}
