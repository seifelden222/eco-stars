<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // الكلاس الصح
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParentUser extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'password', // مهم جدا يبقى password مش password_hash
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
