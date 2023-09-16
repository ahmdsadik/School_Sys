<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sps = [
            ['en' => 'Science', 'ar' => 'علوم'],
            ['en' => 'Math', 'ar' => 'رياضيات'],
            ['en' => 'English', 'ar' => 'انجليزي']
        ];

        foreach ($sps as $sp) {
            Specialization::create([
                'name' => $sp
            ]);
        }
    }
}
