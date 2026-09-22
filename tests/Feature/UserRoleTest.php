<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    public function test_user_has_the_required_roles(): void
    {
        $roles = User::getRoles();

        $this->assertSame([
            'direksi',
            'marketing',
            'keuangan',
            'administrasi',
            'kurikulum',
            'staff',
            'guest',
            'cso',
            'superadmin',
        ], array_keys($roles));

        $this->assertSame('Tamu (Guest)', $roles['guest']);
        $this->assertSame('Superadmin', $roles['superadmin']);
    }
}
