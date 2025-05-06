<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Non-Binary'],
            ['name' => 'Transgender Male'],
            ['name' => 'Transgender Female'],
            ['name' => 'Genderfluid'],
            ['name' => 'Agender'],
            ['name' => 'Bigender'],
            ['name' => 'Two-Spirit'],
            ['name' => 'Androgynous'],
            ['name' => 'Demiboy'],
            ['name' => 'Demigirl'],
            ['name' => 'Genderqueer'],
            ['name' => 'Intersex'],
            ['name' => 'Pangender'],
            ['name' => 'Neutrois'],
            ['name' => 'Questioning'],
            ['name' => 'Other'],
            ['name' => 'Prefer Not to Say']
        ];

        foreach ($genders as $gender) {
            Gender::create($gender);
        }
    }
}
