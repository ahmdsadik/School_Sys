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
//        Gender::truncate();

        $genders = [
            ['ar' => 'ذكر', 'en' => 'male'],
            ['ar' => 'انثي', 'en' => 'Female'],
        ];

        foreach ($genders as $gender) {
            Gender::create([
                'name' => $gender,
            ]);
        }

    }
}
