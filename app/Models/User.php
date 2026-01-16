<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use tizis\laraComments\Traits\Commenter;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getPictureAttribute(): string
    {
        $num = in_array($this->id, [1, 2, 3, 4, 5]) ? $this->id : ($this->id % 5) + 1;
        return asset("assets/images/oval-$num.png");
    }
}
