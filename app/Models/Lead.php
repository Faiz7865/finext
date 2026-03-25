<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lead extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'service_type',
        'budget',
        'project_description',
        'status',
        'assigned_to',
        'terms_accepted',
        'consent_communications',
        'verified_at',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'terms_accepted' => 'boolean',
        'consent_communications' => 'boolean',
    ];

    // ===== RELATIONSHIPS =====

    /**
     * Get the user this lead is assigned to
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get all remarks for this lead
     */
    public function remarks(): HasMany
    {
        return $this->hasMany(LeadRemark::class);
    }

    /**
     * Get the latest remark for this lead
     * CORRECT: Returns a single model, not a collection
     */
    public function latestRemark(): HasOne
    {
        return $this->hasOne(LeadRemark::class)
                    ->latest('created_at');
    }

    // ===== ACCESSORS =====

    /**
     * Get the full name of the lead
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // ===== SCOPES =====

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    public function scopeConverted($query)
    {
        return $query->where('status', 'converted');
    }

    public function scopeLost($query)
    {
        return $query->where('status', 'lost');
    }

    public function scopeAssigned($query)
    {
        return $query->whereNotNull('assigned_to');
    }

    public function scopeUnassigned($query)
    {
        return $query->whereNull('assigned_to');
    }
}