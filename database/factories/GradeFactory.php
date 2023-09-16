<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): array
    {
        // Make Fake name in arabic and english with faker for grade name



        return [
            'name' => [
                'ar' => $this->faker->unique()->name(),
                'en' => $this->faker->unique()->name(),
            ],
            'notes' => $this->faker->realText(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
