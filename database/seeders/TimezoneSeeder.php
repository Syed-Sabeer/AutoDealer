<?php

namespace Database\Seeders;

use DateTimeZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = [];
        $now = now(); // Get the current timestamp once to use for all entries

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $dateTime = new \DateTime('now', new DateTimeZone($timezone));
            $offset = $dateTime->format('P');

            $timezones[] = [
                'name' => $timezone,
                'offset' => $offset,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('timezones')->insert($timezones);
    }
}
