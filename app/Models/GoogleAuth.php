<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class GoogleAuth extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table='google_auth';
    protected $guard='google';
    protected $fillable = [
        'name', 'email', 'password', 'google_id',
    ];

}
