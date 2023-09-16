<?php

namespace Database\Factories;

use App\Models\ParentAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ParentAttachmentFactory extends Factory
{
    protected $model = ParentAttachment::class;

    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->randomNumber(),
            'file_name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
