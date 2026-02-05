<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'meta_title',
        'meta_description',
        'order',
        'status',
        'parent_id',
        'service_count',
        'features',
    ];

    protected $casts = [
        'order' => 'integer',
        'service_count' => 'integer',
        'features' => 'array',
        'status' => 'string',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relations
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    } 

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }

    /**
     * Accessors
     */
    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active';
    }

    public function getHasServicesAttribute(): bool
    {
        return $this->service_count > 0;
    }

    /**
     * Mutators
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value);
    }

    /**
     * Méthodes personnalisées
     */
    public function incrementServiceCount(): void
    {
        $this->increment('service_count');
    }

    public function decrementServiceCount(): void
    {
        $this->decrement('service_count');
    }

    public function updateServiceCount(): void
    {
        $this->service_count = $this->services()->count();
        $this->save();
    }

    // Ajouter dans la classe Category
public function servicesPivot(): BelongsToMany
{
    return $this->belongsToMany(Service::class, 'category_service')
                ->using(CategoryService::class)
                ->withPivot('order', 'is_primary')
                ->withTimestamps();
}
}