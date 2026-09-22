<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AkunMediaSosial extends Model
{
    protected $table = 'social_accounts';

    protected $fillable = ['name', 'platform', 'status', 'owner_id'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function contents(): HasMany
    {
        return $this->hasMany(Konten::class);
    }
}
