<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name_len = rand(5, 30);
        return [
            'name' => $this->faker->text($name_len),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->address,
            'description' => $this->faker->text,
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
