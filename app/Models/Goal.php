<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    use HasFactory; // ← добавили

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'currency',
        'target_amount',
        'collected_amount',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'target_amount' => 'decimal:2',
        'collected_amount' => 'decimal:2',
    ];

    // ← удалили пустой метод factory()

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function progressPercent(): int
    {
        if ($this->target_amount == 0) return 0;
        return min(100, (int)(($this->collected_amount / $this->target_amount) * 100));
    }

    public function remaining(): float
    {
        return max(0, $this->target_amount - $this->collected_amount);
    }
}
