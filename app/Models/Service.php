<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description', 
        'media_type',
        'video_url',
        'features',
        'requirements',
        'deliverables',
        'status',
        'views',
        'orders_count',
        'rating',
        'reviews_count',
        'category_id',
        'created_by',
        'updated_by',
        'seo_data',
        'published_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'duration_days' => 'integer',
        'duration_hours' => 'integer',
        'views' => 'integer',
        'orders_count' => 'integer',
        'rating' => 'decimal:2',
        'reviews_count' => 'integer',
        'features' => 'array',
        'seo_data' => 'array',
        'published_at' => 'datetime',
    ];

    protected $dates = ['deleted_at', 'published_at'];

    /**
     * Relations
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function media(): HasMany
    {
        return $this->hasMany(ServiceMedia::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_service')
                    ->withPivot('order', 'is_primary')
                    ->withTimestamps();
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'active')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->whereHas('media', function ($q) {
            $q->where('is_featured', true);
        });
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc')
                     ->orderBy('orders_count', 'desc');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeWithDiscount($query)
    {
        return $query->whereNotNull('discount_price');
    }

    /**
     * Accessors
     */
    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    public function getHasDiscountAttribute(): bool
    {
        return !is_null($this->discount_price) && $this->discount_price < $this->price;
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if (!$this->has_discount || $this->price <= 0) {
            return null;
        }
        return round((($this->price - $this->discount_price) / $this->price) * 100);
    }

    public function getFeaturedImageAttribute(): ?ServiceMedia
    {
        return $this->media()->where('is_featured', true)->first();
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->status === 'active' 
            && $this->published_at 
            && $this->published_at <= now();
    }

    public function getDurationAttribute(): string
    {
        if ($this->duration_days && $this->duration_hours) {
            return $this->duration_days . ' jours, ' . $this->duration_hours . ' heures';
        } elseif ($this->duration_days) {
            return $this->duration_days . ' jours';
        } elseif ($this->duration_hours) {
            return $this->duration_hours . ' heures';
        }
        return 'Non spécifié';
    }

    /**
     * Mutators
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value ? round($value, 2) : null;
    }

    public function setDiscountPriceAttribute($value)
    {
        $this->attributes['discount_price'] = $value ? round($value, 2) : null;
    }

    /**
     * Méthodes personnalisées
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function incrementOrdersCount(): void
    {
        $this->increment('orders_count');
    }

    public function updateRating(): void
    {
        $approvedReviews = $this->reviews()->where('status', 'approved')->get();
        
        if ($approvedReviews->count() > 0) {
            $this->rating = $approvedReviews->avg('rating');
            $this->reviews_count = $approvedReviews->count();
        } else {
            $this->rating = 0;
            $this->reviews_count = 0;
        }
        
        $this->save();
    }

    public function publish(): void
    {
        $this->status = 'active';
        $this->published_at = now();
        $this->save();
    }

    public function unpublish(): void
    {
        $this->status = 'inactive';
        $this->save();
    }
}