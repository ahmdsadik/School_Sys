<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'student_id' => $this->faker->word(),
            'grade_id' => $this->faker->word(),
            'classroom_id' => $this->faker->word(),
            'section_id' => $this->faker->word(),
            'teacher_id' => $this->faker->word(),
            'date' => Carbon::now(),
            'status' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
