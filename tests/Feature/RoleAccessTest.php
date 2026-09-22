<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_accessing_protected_route(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_marketing_user_can_access_marketing_route(): void
    {
        $user = User::factory()->create([
            'email' => 'marketing@example.com',
            'role' => UserRole::MARKETING->value,
        ]);

        $this->actingAs($user)
            ->get('/marketing')
            ->assertOk();
    }
}
