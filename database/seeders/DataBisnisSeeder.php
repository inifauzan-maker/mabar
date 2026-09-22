<?php

namespace Database\Seeders;

use App\Models\AkunMediaSosial;
use App\Models\AsetDigital;
use App\Models\Kampanye;
use App\Models\Konten;
use App\Models\Prospek;
use App\Models\User;
use Illuminate\Database\Seeder;

class DataBisnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marketing = User::firstOrCreate(
            ['email' => 'marketing@example.com'],
            ['name' => 'Marketing', 'password' => bcrypt('password'), 'role' => 'marketing']
        );

        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Superadmin', 'password' => bcrypt('password'), 'role' => 'superadmin']
        );

        // Ensure both seeded users keep a valid role assignment even if database is reseeded.
        $marketing->update(['role' => 'marketing']);
        $superadmin->update(['role' => 'superadmin']);

        $campaign = Kampanye::firstOrCreate(
            ['name' => 'Launch Program Mabar'],
            ['channel' => 'Digital', 'budget' => 15000000, 'status' => 'active', 'created_by' => $marketing->id]
        );

        Prospek::firstOrCreate(
            ['name' => 'PT Nusantara Jaya'],
            ['source' => 'Instagram', 'stage' => 'qualified', 'assigned_to' => $marketing->id, 'campaign_id' => $campaign->id]
        );

        $social = AkunMediaSosial::firstOrCreate(
            ['name' => 'Mabar Official'],
            ['platform' => 'Instagram', 'status' => 'active', 'owner_id' => $marketing->id]
        );

        AsetDigital::firstOrCreate(
            ['name' => 'Brand Kit Mabar'],
            ['file_type' => 'zip', 'category' => 'brand', 'owner_id' => $marketing->id]
        );

        Konten::firstOrCreate(
            ['title' => 'Promo Awal Bulan'],
            ['channel' => 'Instagram', 'schedule' => now()->addDays(2), 'status' => 'scheduled', 'created_by' => $marketing->id, 'campaign_id' => $campaign->id, 'social_account_id' => $social->id]
        );
    }
}
