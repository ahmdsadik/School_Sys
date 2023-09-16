<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition(): array
    {
        return [
            'student_id' => $this->faker->randomNumber(),
            'from_grade_id' => $this->faker->randomNumber(),
            'from_classroom_id' => $this->faker->randomNumber(),
            'from_section_id' => $this->faker->randomNumber(),
            'to_grade_id' => $this->faker->randomNumber(),
            'to_classroom_id' => $this->faker->randomNumber(),
            'to_section_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
