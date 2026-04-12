<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
/*         User::factory(10)->create();
        Income::factory(10)->create();*/

        $user = \App\Models\User::factory()->create([
            'name' => 'Oleksandr',
            'email' => 'sashik0mmm@gmail.com',
            'password' => Hash::make('11111111'),
        ]);

        \App\Models\Income::factory(50)->create([
            'user_id' => $user->id,
        ]);

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
