<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

 
    protected $fillable = [
        'first_name','last_name','email','password','image'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'image_path'
    ];

    protected function getImagePathAttribute()
    {
        return asset('upload/user_images/' . $this->image);
    }   

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
