<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    public function selects()
        {
            return $this->belongsToMany('App\Select');           //selectsテーブルとの多対多の関係
        }
    public function ranks()
        {
            return $this->hasMany('App\Rank');        //1対多の関係
        }
    public function comments()
        {
            return $this->hasMany('App\Comment');        //1対多の関係
        }
    public function rank()
        {
            return $this->belongsToMany('App\Rank');           //ranksテーブルとの多対多の関係
        }
}
