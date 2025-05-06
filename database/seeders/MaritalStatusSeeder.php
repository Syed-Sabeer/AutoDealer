<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Divorced'],
            ['name' => 'Widowed'],
            ['name' => 'Separated'],
            ['name' => 'Engaged'],
            ['name' => 'In a Relationship'],
            ['name' => 'It\'s Complicated'],
            ['name' => 'Domestic Partnership'],
            ['name' => 'Civil Union'],
            ['name' => 'Prefer Not to Say']
        ];

        foreach ($statuses as $status) {
            MaritalStatus::create($status);
        }
    }
}
