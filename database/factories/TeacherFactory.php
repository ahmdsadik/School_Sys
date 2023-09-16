<?php

namespace Database\Factories;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password()),
            'join_date' => Carbon::now()->format('Y-m-d'),
            'address' => $this->faker->address(),
            'specialization_id' => Specialization::all()->random()->id,
            'gender_id' => $this->faker->numberBetween(1, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
