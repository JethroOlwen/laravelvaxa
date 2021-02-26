<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //get the users that own this role
    public function users(){
        return $this->belongsToMany(User::class,'role_user');
    }
}
