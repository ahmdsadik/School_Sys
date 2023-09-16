<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    public function run(): void
    {
//        Religion::truncate();

        $religions = [
            [
                'ar' => 'مسلم',
                'en' => 'Muslim'
            ],
            [
                'ar' => 'مسيحي',
                'en' => 'Christian'
            ],
            [
                'ar' => 'يهودي',
                'en' => 'Jewish'
            ]
        ];

        foreach ($religions as $religion) {
            Religion::create([
                'name' => $religion
            ]);
        }
    }
}
