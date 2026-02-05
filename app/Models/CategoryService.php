<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryService extends Pivot
{
    protected $table = 'category_service';

    protected $fillable = [
        'category_id',
        'service_id',
        'order',
        'is_primary',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_primary' => 'boolean',
    ];

    /**
     * Relations
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Scopes
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Accessors
     */
    public function getIsPrimaryAttribute(): bool
    {
        return (bool) $this->is_primary;
    }

    /**
     * Méthodes personnalisées
     */
    public function markAsPrimary(): void
    {
        // D'abord, désactiver toutes les catégories primaires pour ce service
        self::where('service_id', $this->service_id)
            ->where('is_primary', true)
            ->update(['is_primary' => false]);
        
        // Puis marquer cette catégorie comme primaire
        $this->is_primary = true;
        $this->save();
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->category->name ?? 'Catégorie inconnue';
    }

    public function getServiceTitleAttribute(): string
    {
        return $this->service->title ?? 'Service inconnu';
    }
}