<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Hash;
use Image;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
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

    public function changeuserpassword(){
        return view('changeUserPassword');
    }

    public function changePassword(Request $request){
        if (!Hash::check($request->input('currentPassword'), Auth::user()->password)){
            return back()->with('error','Your current password does not match with what you provided.');
        } 
        if (strcmp($request->input('password'),$request->input('currentPassword')) === 0) {
            return back()->with('error','Your current password cannot be same as your new password.');
        }
        if (strcmp($request->input('confirmpassword'),$request->input('confirmpassword')) < 0) {
            return back()->with('error','Your confirmation password does not match your new password.');
        }

        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:6|max:16',
            'confirmpassword' => 'required|min:6|max:16'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return back()->with('success','Password changed succesfully');


    }

    public function showProfilePicture(){
        return view('editProfile');
    }

    public function changeProfilePicture(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time()."_".auth::user()->name.".".$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250,250)->save(public_path("/img/avatar/".$filename));

            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png'
            ]);

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            
        }
        
        return back()->with('Message','Profile Picture uploaded succesfully');
    }

}
