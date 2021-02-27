<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //Get the client that owns this job
    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
