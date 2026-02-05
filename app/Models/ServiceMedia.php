<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceMedia extends Model
{
    protected $table = 'service_media';

    protected $fillable = [
        'service_id',
        'type',
        'path',
        'original_name',
        'mime_type',
        'size',
        'width',
        'height',
        'order',
        'is_featured',
        'alt_text',
        'caption',
        'metadata',
        'uploaded_by',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'order' => 'integer',
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

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Scopes
     */
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at');
    }

    /**
     * Accessors
     */
    public function getIsImageAttribute(): bool
    {
        return $this->type === 'image';
    }

    public function getIsVideoAttribute(): bool
    {
        return $this->type === 'video';
    }

    public function getFileSizeAttribute(): string
    {
        if ($this->size < 1024) {
            return $this->size . ' B';
        } elseif ($this->size < 1048576) {
            return round($this->size / 1024, 2) . ' KB';
        } else {
            return round($this->size / 1048576, 2) . ' MB';
        }
    }

    public function getDimensionsAttribute(): ?string
    {
        if ($this->width && $this->height) {
            return $this->width . '×' . $this->height;
        }
        return null;
    }

    /**
     * Mutators
     */
    public function setPathAttribute($value)
    {
        // Supprimer le slash initial s'il existe
        $this->attributes['path'] = ltrim($value, '/');
    }

    /**
     * Méthodes personnalisées
     */
    public function markAsFeatured(): void
    {
        // D'abord, désactiver toutes les images featured pour ce service
        $this->service->media()->where('is_featured', true)->update(['is_featured' => false]);
        
        // Puis marquer cette image comme featured
        $this->is_featured = true;
        $this->save();
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}