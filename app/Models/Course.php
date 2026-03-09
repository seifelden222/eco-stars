<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'admin_id',
    ];

    /**
     * The teacher who owns the course
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     * Children enrolled in the course
     */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'child_course', 'course_id', 'child_id')
            ->withTimestamps();
    }
}
