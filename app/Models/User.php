<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',          // اسم الطفل أو الأب
        'email',         // مطلوب في جدول users (بنحطه parent_phone@child.com للأطفال)
        'password',      // كلمة المرور
        'role',          // child أو parent
        'birth_date',    // تاريخ ميلاد الطفل
        'grade',         // الصف الدراسي
        'parent_name',   // اسم الأب
        'parent_phone',  // رقم الأب
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
