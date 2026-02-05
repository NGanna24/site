<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFeature extends Model
{
    protected $table = 'service_features';

    protected $fillable = [
        'service_id',
        'title',
        'description',
        'icon',
        'order',
        'is_included',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_included' => 'boolean',
    ];

    /**
     * Relations
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Scopes
     */
    public function scopeIncluded($query)
    {
        return $query->where('is_included', true);
    }

    public function scopeExcluded($query)
    {
        return $query->where('is_included', false);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('title');
    }

    /**
     * Accessors
     */
    public function getIsExcludedAttribute(): bool
    {
        return !$this->is_included;
    }
}