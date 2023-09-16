<?php

namespace Database\Factories;

use App\Models\Fee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FeeFactory extends Factory
{
    protected $model = Fee::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(),
            'grade_id' => $this->faker->randomNumber(),
            'classroom_id' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'year' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
