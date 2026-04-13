<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    protected $model = Goal::class;

    public function definition(): array
    {
        $targetAmount = $this->faker->randomFloat(2, 1000, 50000);
        $collectedAmount = $this->faker->randomFloat(2, 0, $targetAmount);

        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'PLN', 'UAH']),
            'target_amount' => $targetAmount,
            'collected_amount' => $collectedAmount,
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['active', 'completed', 'cancelled']),
        ];
    }

    public function active(): static
    {
        return $this->state(fn() => ['status' => 'active']);
    }

    public function completed(): static
    {
        return $this->state(fn() => ['status' => 'completed']);
    }

    public function cancelled(): static
    {
        return $this->state(fn() => ['status' => 'cancelled']);
    }
}
