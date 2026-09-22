<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kampanye extends Model
{
    protected $table = 'campaigns';

    protected $fillable = ['name', 'channel', 'budget', 'status', 'created_by'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function prospects(): HasMany
    {
        return $this->hasMany(Prospek::class);
    }

    public function contents(): HasMany
    {
        return $this->hasMany(Konten::class);
    }
}
