<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceReview extends Model
{
    protected $table = 'service_reviews';

    protected $fillable = [
        'service_id',
        'user_id',
        'client_name',
        'client_email',
        'rating',
        'comment',
        'response',
        'status',
        'is_featured',
        'metadata',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'metadata' => 'array',
    ];

    /**
     * Relations
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scopes
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByRating($query, $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    /**
     * Accessors
     */
    public function getIsApprovedAttribute(): bool
    {
        return $this->status === 'approved';
    }

    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    public function getHasResponseAttribute(): bool
    {
        return !empty($this->response);
    }

    public function getStarsAttribute(): array
    {
        $stars = [];
        for ($i = 1; $i <= 5; $i++) {
            $stars[] = $i <= $this->rating;
        }
        return $stars;
    }

    /**
     * Mutators
     */
    public function setRatingAttribute($value)
    {
        $this->attributes['rating'] = min(5, max(1, $value));
    }

    /**
     * Méthodes personnalisées
     */
    public function approve(): void
    {
        $this->status = 'approved';
        $this->save();
        $this->service->updateRating();
    }

    public function reject(): void
    {
        $this->status = 'rejected';
        $this->save();
    }

    public function markAsFeatured(): void
    {
        $this->is_featured = true;
        $this->save();
    }

    public function removeFeatured(): void
    {
        $this->is_featured = false;
        $this->save();
    }

    public function addResponse(string $response): void
    {
        $this->response = $response;
        $this->save();
    }
}