<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;
use App\Models\Point;
use App\Models\Reward;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'avatar_path',
        'phone',
        'password',
        'birth_date',
        'grade',
        'parent_name',
        'parent_phone',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    

    /**
     * Courses the child is enrolled in
     */
    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'child_course', 'user_id', 'course_id')->withTimestamps();
    }

    /**
     * Points records for the child
     */
    public function points(): HasMany
    {
        return $this->hasMany(Point::class, 'user_id');
    }

    /**
     * Rewards the child has claimed
     */
    public function rewards(): BelongsToMany
    {
        return $this->belongsToMany(Reward::class, 'child_reward', 'user_id', 'reward_id')
            ->withPivot('points_spent')
            ->withTimestamps();
    }
}
