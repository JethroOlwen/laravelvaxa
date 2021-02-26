<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
     * Get the Phone records associated with the user
     */
    public function phone() {
        return $this->hasOne('App\phone');
    }

    /**
     * Get the user's jobs
     */
    public function jobs(){
        return $this->hasMany('App\Job','client_id');
    } // by sppecifying client_id in the second arguments, this overrides the default user_id as reference


    /**
     * Get the user's roles
     */
    public function roles(){
        return $this->belongsToMany(Role::class,'role_user');
    }

    


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
