<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prospek extends Model
{
    protected $table = 'prospects';

    protected $fillable = [
        'name',
        'phone',
        'city',
        'school_name',
        'class_level',
        'source',
        'stage',
        'assigned_to',
        'campaign_id',
        'notes',
    ];

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Kampanye::class);
    }
}
