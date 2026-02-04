<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::factory()
            ->create([
                'id' => fake()->uuid(),
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'role' => UserRoleEnum::ADMIN,
            ]);

        // Normal users
        User::factory()
            ->count(3)
            ->create();
    }
}
