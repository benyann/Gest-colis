<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Champs autorisés à être remplis
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Champs cachés lors des retours JSON (ex: auth()->user())
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversion des types de données
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
