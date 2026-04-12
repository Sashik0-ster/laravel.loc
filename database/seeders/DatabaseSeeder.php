<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Oleksandr',
            'email' => 'sashik0mmm@gmail.com',
            'password' => Hash::make('11111111'),
        ]);

        Income::factory(50)->create([
            'user_id' => $user->id,
        ]);

        Goal::factory(3)->active()->create([
            'user_id' => $user->id,
        ]);

        Goal::factory(2)->completed()->create([
            'user_id' => $user->id,
        ]);

        Goal::factory(1)->cancelled()->create([
            'user_id' => $user->id,
        ]);
    }
}
