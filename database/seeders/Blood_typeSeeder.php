<?php

namespace Database\Seeders;

use App\Models\Blood_type;
use Illuminate\Database\Seeder;

class Blood_typeSeeder extends Seeder
{
    public function run(): void
    {
        // Delete all Blood types
//        Blood_type::truncate();

        // Array of Blood types
        $blood_types = [
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
        ];

        // Loop through the array of Blood types
        foreach ($blood_types as $blood_type) {
            // Create a new Blood type
            Blood_type::create([
                'type' => $blood_type,
            ]);
        }
    }
}
