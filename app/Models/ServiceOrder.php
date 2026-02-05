<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceOrder extends Model
{
    use SoftDeletes;

    protected $table = 'service_orders';

    protected $fillable = [
        'order_number',
        'service_id',
        'user_id',
        'client_name',
        'client_email',
        'client_phone',
        'client_message',
        'amount',
        'status',
        'admin_notes',
        'requirements',
        'deadline',
        'delivered_at',
        'metadata',
        'assigned_to',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'deadline' => 'date',
        'delivered_at' => 'date',
        'metadata' => 'array',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Boot method
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = static::generateOrderNumber();
            }
        });
    }

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

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Scopes
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', '!=', 'completed')
                     ->where('status', '!=', 'cancelled')
                     ->whereNotNull('deadline')
                     ->where('deadline', '<', now());
    }

    public function scopeAssignedTo($query, $userId)
    {
        return $query->where('assigned_to', $userId);
    }

    /**
     * Accessors
     */
    public function getIsPendingAttribute(): bool
    {
        return $this->status === 'pending';
    }

    public function getIsConfirmedAttribute(): bool
    {
        return $this->status === 'confirmed';
    }

    public function getIsInProgressAttribute(): bool
    {
        return $this->status === 'in_progress';
    }

    public function getIsCompletedAttribute(): bool
    {
        return $this->status === 'completed';
    }

    public function getIsCancelledAttribute(): bool
    {
        return $this->status === 'cancelled';
    }

    public function getIsOverdueAttribute(): bool
    {
        return !in_array($this->status, ['completed', 'cancelled']) 
            && $this->deadline 
            && $this->deadline < now();
    }

    public function getDaysUntilDeadlineAttribute(): ?int
    {
        if (!$this->deadline) {
            return null;
        }
        return now()->diffInDays($this->deadline, false);
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'confirmed' => 'info',
            'in_progress' => 'primary',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'En attente',
            'confirmed' => 'Confirmée',
            'in_progress' => 'En cours',
            'completed' => 'Terminée',
            'cancelled' => 'Annulée',
            default => 'Inconnu',
        };
    }

    /**
     * Mutators
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = round($value, 2);
    }

    /**
     * Méthodes personnalisées
     */
    public static function generateOrderNumber(): string
    {
        $prefix = 'CMD-' . date('Ymd') . '-';
        $lastOrder = static::where('order_number', 'like', $prefix . '%')
            ->orderBy('order_number', 'desc')
            ->first();

        if ($lastOrder) {
            $lastNumber = (int) str_replace($prefix, '', $lastOrder->order_number);
            $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '001';
        }

        return $prefix . $nextNumber;
    }

    public function confirm(): void
    {
        $this->status = 'confirmed';
        $this->save();
    }

    public function start(): void
    {
        $this->status = 'in_progress';
        $this->save();
    }

    public function complete(): void
    {
        $this->status = 'completed';
        $this->delivered_at = now();
        $this->save();
        $this->service->incrementOrdersCount();
    }

    public function cancel(string $reason = null): void
    {
        $this->status = 'cancelled';
        if ($reason) {
            $this->admin_notes = ($this->admin_notes ? $this->admin_notes . "\n" : '') . 
                                 'Annulation: ' . $reason;
        }
        $this->save();
    }

    public function assignTo(User $user): void
    {
        $this->assigned_to = $user->id;
        $this->save();
    }

    public function addNote(string $note): void
    {
        $this->admin_notes = ($this->admin_notes ? $this->admin_notes . "\n" : '') . 
                             date('Y-m-d H:i') . ': ' . $note;
        $this->save();
    }

    public function getTimeline(): array
    {
        $timeline = [
            ['date' => $this->created_at, 'event' => 'Commande créée', 'status' => 'created'],
        ];

        if ($this->confirmed_at) {
            $timeline[] = ['date' => $this->confirmed_at, 'event' => 'Commande confirmée', 'status' => 'confirmed'];
        }

        if ($this->started_at) {
            $timeline[] = ['date' => $this->started_at, 'event' => 'Travail commencé', 'status' => 'in_progress'];
        }

        if ($this->delivered_at) {
            $timeline[] = ['date' => $this->delivered_at, 'event' => 'Livrée', 'status' => 'completed'];
        }

        if ($this->cancelled_at) {
            $timeline[] = ['date' => $this->cancelled_at, 'event' => 'Annulée', 'status' => 'cancelled'];
        }

        return $timeline;
    }
}