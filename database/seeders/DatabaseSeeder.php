<?php

namespace Database\Seeders;

use App\Constants\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email_verified_at' => now(),
            'role' => Role::ADMIN,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
