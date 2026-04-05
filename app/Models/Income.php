<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Income extends Model
{

    use HasFactory;

    /**
     *
     * @returns  array<int, string>
     *
     */

    protected $fillable = [
        'title',
        'amount',
        'entry_date',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'amount' => 'decimal:2',
        'entry_date' => 'datetime',
        'created_at' => 'datetime',
    ];

}

