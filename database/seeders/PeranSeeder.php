<?php

namespace Database\Seeders;

use App\Models\Peran;
use Illuminate\Database\Seeder;

class PeranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Direksi', 'slug' => 'direksi'],
            ['name' => 'Marketing', 'slug' => 'marketing'],
            ['name' => 'Keuangan', 'slug' => 'keuangan'],
            ['name' => 'Administrasi', 'slug' => 'administrasi'],
            ['name' => 'Kurikulum', 'slug' => 'kurikulum'],
            ['name' => 'Staff', 'slug' => 'staff'],
            ['name' => 'Tamu (Guest)', 'slug' => 'guest'],
            ['name' => 'CSO', 'slug' => 'cso'],
            ['name' => 'Superadmin', 'slug' => 'superadmin'],
        ];

        foreach ($roles as $role) {
            Peran::firstOrCreate(
                ['slug' => $role['slug']],
                ['name' => $role['name']]
            );
        }
    }
}
