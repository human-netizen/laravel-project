<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_read' => false,
            'problem_name' => $this->faker->sentence(6),
            'contest_id' => $this->faker->word,
            'index' => $this->faker->word,
            'battle_id' => $this->faker->randomNumber(),
            
        ];
    }
}
