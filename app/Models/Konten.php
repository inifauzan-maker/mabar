<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konten extends Model
{
    protected $table = 'contents';

    protected $fillable = ['title', 'channel', 'schedule', 'status', 'created_by', 'campaign_id', 'social_account_id'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Kampanye::class);
    }

    public function socialAccount(): BelongsTo
    {
        return $this->belongsTo(AkunMediaSosial::class);
    }
}
