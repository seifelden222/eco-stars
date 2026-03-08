<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // الكلاس الصح
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ParentUser extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
