<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reporter extends Authenticatable {
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'role',
        'status',
    ];
}
