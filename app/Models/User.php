<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
        'address',
        'city',
        'country',
        'status',
        'settings',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
            'settings' => 'array',
        ];
    }


    

    /**
     * Relations pour les services
     */
    public function createdServices(): HasMany
    {
        return $this->hasMany(Service::class, 'created_by');
    }

    public function updatedServices(): HasMany
    {
        return $this->hasMany(Service::class, 'updated_by');
    }

    public function uploadedMedia(): HasMany
    {
        return $this->hasMany(ServiceMedia::class, 'uploaded_by');
    }

    public function serviceReviews(): HasMany
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function serviceOrders(): HasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function assignedOrders(): HasMany
    {
        return $this->hasMany(ServiceOrder::class, 'assigned_to');
    }

    /**
     * Accessors pour les rôles
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->role === 'admin';
    }

    public function getIsManagerAttribute(): bool
    {
        return $this->role === 'manager';
    }

    public function getIsEditorAttribute(): bool
    {
        return $this->role === 'editor';
    }

    public function getIsViewerAttribute(): bool
    {
        return $this->role === 'viewer';
    }

    /**
     * Méthodes pour les permissions
     */
    public function canManageServices(): bool
    {
        return in_array($this->role, ['admin', 'manager', 'editor']);
    }

    public function canManageCategories(): bool
    {
        return in_array($this->role, ['admin', 'manager']);
    }

    public function canManageOrders(): bool
    {
        return in_array($this->role, ['admin', 'manager']);
    }

    public function canManageReviews(): bool
    {
        return in_array($this->role, ['admin', 'manager']);
    }

    /**
     * Statistiques
     */
    public function getServicesCountAttribute(): int
    {
        return $this->createdServices()->count();
    }

    public function getCompletedOrdersCountAttribute(): int
    {
        return $this->assignedOrders()->where('status', 'completed')->count();
    }

    public function getPendingOrdersCountAttribute(): int
    {
        return $this->assignedOrders()->whereIn('status', ['pending', 'confirmed', 'in_progress'])->count();
    }
    


}