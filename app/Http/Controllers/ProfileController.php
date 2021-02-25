<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('profile');
    }

    public function profileUpdate(Request $request){
        //validation
        $request->validate([
            'name' => 'required|min:2|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        // Session::flash('flashMessage','profile updated');
       return back()->with('flashMessage','profile updated');
    }
}
