<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = Status::all()->pluck('id')->toArray();

        return [
            'title' => 'Título: ' . $this->faker->sentence(),
            'description' => 'Descripción: ' . $this->faker->sentence(),
            'status_id' => $this->faker->randomElement($status),
        ];
    }
}
