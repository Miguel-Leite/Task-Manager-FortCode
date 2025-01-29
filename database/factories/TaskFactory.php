<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(),
      'description' => $this->faker->paragraph(),
      'status' => $this->faker->randomElement(['PENDING', 'IN_PROGRESS', 'COMPLETED']),
      'deadline' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
      'user_id' => User::factory(),
    ];
  }
}
