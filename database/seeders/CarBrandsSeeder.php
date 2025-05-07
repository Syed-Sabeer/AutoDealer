<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'Bentley', 'BMW',
            'Bugatti', 'Buick', 'BYD', 'Cadillac', 'Changan', 'Chery', 'Chevrolet',
            'Chrysler', 'Citroën', 'Dacia', 'Daewoo', 'Daihatsu', 'Dodge', 'Dongfeng',
            'DS Automobiles', 'FAW', 'Ferrari', 'Fiat', 'Fisker', 'Ford', 'Geely',
            'Genesis', 'GMC', 'Great Wall', 'Haval', 'Hino', 'Honda', 'Hyundai',
            'Infiniti', 'Isuzu', 'Jaguar', 'Jeep', 'Kia', 'Koenigsegg', 'Lada',
            'Lamborghini', 'Lancia', 'Land Rover', 'Lexus', 'Lincoln', 'Lotus',
            'Lucid', 'Mahindra', 'Maserati', 'Maybach', 'Mazda', 'McLaren', 'Mercedes-Benz',
            'MG', 'Mini', 'Mitsubishi', 'Nissan', 'Opel', 'Pagani', 'Peugeot',
            'Polestar', 'Pontiac', 'Porsche', 'Proton', 'RAM', 'Renault', 'Rivian',
            'Rolls-Royce', 'Rover', 'Saab', 'Scion', 'SEAT', 'Škoda', 'Smart',
            'SsangYong', 'Subaru', 'Suzuki', 'Tata', 'Tesla', 'Toyota', 'Vauxhall',
            'VinFast', 'Volkswagen', 'Volvo', 'Wuling', 'Zotye'
        ];

        $featuredBrands = ['Audi', 'BMW', 'Toyota', 'Ferrari', 'Tesla', 'Mercedes-Benz', 'Hyundai'];

        foreach ($brands as $brand) {
            CarBrand::create([
                'name' => $brand,
                'slug' => Str::slug($brand),
                'is_active' => 'active',
                'is_featured' => in_array($brand, $featuredBrands) ? '1' : '0',
            ]);
        }
    }
}
