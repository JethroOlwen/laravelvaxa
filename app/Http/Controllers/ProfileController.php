<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('profile');
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
       return back();
    }
}
