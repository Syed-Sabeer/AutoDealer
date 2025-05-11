<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counters = [
            [
                'total_cars' => '500',
                'total_clients' => '900',
                'team_workers' => '1500',
                'years_of_experience' => '30',
            ],
        ];

        foreach ($counters as $counter) {
            Counter::create($counter);
        }
    }
}
