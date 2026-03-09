<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'points_required',
        'is_active',
    ];

    /**
     * Children who claimed or own this reward
     */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'child_reward', 'reward_id', 'child_id')
            ->withPivot('points_spent')
            ->withTimestamps();
    }
}
