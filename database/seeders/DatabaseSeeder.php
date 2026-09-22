<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PeranSeeder::class);
        $this->call(DataBisnisSeeder::class);

        User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Superadmin',
                'password' => bcrypt('password'),
                'role' => UserRole::SUPERADMIN->value,
            ]
        );

        User::firstOrCreate(
            ['email' => 'marketing@example.com'],
            [
                'name' => 'Marketing',
                'password' => bcrypt('password'),
                'role' => UserRole::MARKETING->value,
            ]
        );
    }
}
