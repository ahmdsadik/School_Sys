<?php

namespace Database\Factories;

use App\Models\StudentParent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentParentFactory extends Factory
{
    protected $model = StudentParent::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password()),
            'father_name' => $this->faker->name(),
            'father_national_id_number' => $this->faker->word(),
            'father_passport_number' => $this->faker->word(),
            'father_phone' => $this->faker->phoneNumber(),
            'father_job' => $this->faker->word(),
            'father_nationality_id' => $this->faker->randomNumber(),
            'father_blood_type_id' => $this->faker->randomNumber(),
            'father_religion_id' => $this->faker->randomNumber(),
            'father_address' => $this->faker->address(),
            'mother_name' => $this->faker->name(),
            'mother_national_id_number' => $this->faker->word(),
            'mother_passport_number' => $this->faker->word(),
            'mother_phone' => $this->faker->phoneNumber(),
            'mother_job' => $this->faker->word(),
            'mother_nationality_id' => $this->faker->randomNumber(),
            'mother_blood_type_id' => $this->faker->randomNumber(),
            'mother_religion_id' => $this->faker->randomNumber(),
            'mother_address' => $this->faker->address(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
