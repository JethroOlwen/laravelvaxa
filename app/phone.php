<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    //get the user that owns this phone
    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
