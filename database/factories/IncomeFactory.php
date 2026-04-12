<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    protected $model = Income::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'user_id' => $faker->numberBetween(1, 10),
            'title' => $faker->word(),
            'amount' => $faker->randomFloat(2, 10),
            'currency' => $faker->randomElement(['USD', 'EUR', 'PLN', 'UAH']),
            'category' => $faker->word(),
            'entry_date' => $faker->date(),
            'description' => $faker->text(),
        ];
    }
}
