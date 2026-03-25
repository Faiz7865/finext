<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadRemark extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'remark',
        'status',
        'follow_up_time',
    ];

    protected $casts = [
        'follow_up_time' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // RELATIONSHIPS ✅

    /**
     * Get the lead this remark belongs to
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Get the user who made this remark
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}