<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    /**
     * Get the Jobs index view
     * 
     */

     Public function index(){
         //to display all jobs
         $jobs = Job::all();
         //pass the $jobs value to the parameter jobs using compact 
         return view('jobs.index',compact('jobs'));
     }

     Public function show(){
         return view('jobs.show');
     }
}
