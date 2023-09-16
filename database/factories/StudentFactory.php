<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender_id' => $this->faker->randomNumber(),
            'blood_type_id' => $this->faker->randomNumber(),
            'nationality_id' => $this->faker->randomNumber(),
            'date_birth' => Carbon::now(),
            'grade_id' => $this->faker->randomNumber(),
            'classroom_id' => $this->faker->randomNumber(),
            'section_id' => $this->faker->randomNumber(),
            'student_parent_id' => $this->faker->randomNumber(),
            'academic_year' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
