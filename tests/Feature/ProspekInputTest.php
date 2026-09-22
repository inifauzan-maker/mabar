<?php

namespace Tests\Feature;

use App\Models\Prospek;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProspekInputTest extends TestCase
{
    use RefreshDatabase;

    public function test_marketing_user_can_view_and_submit_prospek_form(): void
    {
        $user = User::factory()->create([
            'email' => 'marketing@example.com',
            'role' => 'marketing',
        ]);

        $response = $this->actingAs($user)->get('/prospek');
        $response->assertOk();
        $response->assertSee('Input Lead / Prospek');

        $this->actingAs($user)
            ->post('/prospek', [
                'name' => 'Rizky Putra',
                'phone' => '081234567890',
                'city' => 'Bandung',
                'school_name' => 'SMAN 1 Bandung',
                'class_level' => 'XII',
                'source' => 'Instagram',
                'stage' => 'new',
                'assigned_to' => $user->id,
                'notes' => 'Minta follow-up hari ini',
            ])
            ->assertRedirect('/prospek');

        $this->assertDatabaseHas('prospects', [
            'name' => 'Rizky Putra',
            'phone' => '081234567890',
        ]);
    }

    public function test_marketing_user_can_open_detail_and_update_prospect_stage(): void
    {
        $user = User::factory()->create([
            'email' => 'marketing2@example.com',
            'role' => 'marketing',
        ]);

        $prospect = Prospek::create([
            'name' => 'Nanda Wijaya',
            'phone' => '081122334455',
            'city' => 'Jakarta',
            'source' => 'Instagram',
            'stage' => 'new',
            'assigned_to' => $user->id,
            'notes' => 'Butuh follow-up cepat',
        ]);

        $this->actingAs($user)
            ->get('/prospek/'.$prospect->id)
            ->assertOk()
            ->assertSee('Detail Prospek')
            ->assertSee('Nanda Wijaya');

        $this->actingAs($user)
            ->post('/prospek/'.$prospect->id.'/status', [
                'stage' => 'qualified',
            ])
            ->assertRedirect('/prospek/'.$prospect->id);

        $this->assertDatabaseHas('prospects', [
            'id' => $prospect->id,
            'stage' => 'qualified',
        ]);
    }
}
