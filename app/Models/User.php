<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public static function getRoles(): array
    {
        return UserRole::labels();
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Peran::class, 'users_roles');
    }

    public function campaigns(): HasMany
    {
        return $this->hasMany(Kampanye::class, 'created_by');
    }

    public function prospects(): HasMany
    {
        return $this->hasMany(Prospek::class, 'assigned_to');
    }

    public function socialAccounts(): HasMany
    {
        return $this->hasMany(AkunMediaSosial::class, 'owner_id');
    }

    public function digitalAssets(): HasMany
    {
        return $this->hasMany(AsetDigital::class, 'owner_id');
    }

    public function contents(): HasMany
    {
        return $this->hasMany(Konten::class, 'created_by');
    }

    public function hasRole(string|array|UserRole $role): bool
    {
        $roles = is_array($role)
            ? $role
            : [$role];

        $roles = array_map(function (string|UserRole $item): string {
            return $item instanceof UserRole ? $item->value : $item;
        }, $roles);

        return in_array($this->role?->value ?? $this->role, $roles, true);
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === UserRole::SUPERADMIN || $this->role === UserRole::SUPERADMIN->value;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
}
