<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points',
        'type',
        'reason',
    ];

    /**
     * The child that owns the points record
     */
    public function child(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
