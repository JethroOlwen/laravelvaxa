<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * Attributes that are mass assignable
     * 
     */
    //protected $fillable=['job_title','job_type','job_description','salary','slug'];
    protected $guarded=[];
    //Get the client that owns this job
    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
