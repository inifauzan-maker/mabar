<?php

namespace Tests\Feature;

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
}
