<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'otp',
        'lead_data',
        'expires_at',
        'verified',
    ];

    protected $casts = [
        'lead_data' => 'array',
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isValid(): bool
    {
        return !$this->verified && !$this->isExpired();
    }
}