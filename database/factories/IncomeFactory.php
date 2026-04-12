<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    protected $model = Income::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(2, 10),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'PLN', 'UAH']),
            'category' => $this->faker->word(),
            'entry_date' => $this->faker->date(),
            'description' => $this->faker->text(),
        ];
    }
}
