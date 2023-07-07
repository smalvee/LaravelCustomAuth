<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class CustomAuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function create_user(){
        return view('Admin.create_user');
    }

    public function reg(){
        return view('Auth.registration');
    }

    public function reg_user(Request $request){
       $request->validate([
        'user_id'=>'unique:users',
        'password'=>'required|min:5|max:12',
        'user_role'=>'required'
       ]);
       $user = new User();
       $user ->user_id = $request->user_id;
       $user ->password = Hash::make($request->password);
       $user ->user_role = $request->user_role;
       $res = $user->save();
       if($res)
       {
        return back()->with('success', 'You have registered successfully');
       } else
       {
        return back()->with('fail', 'Something went wrong');
       }
 
    }

    public function login_user(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'password'=>'required'
        ]);
        $user = User::where('user_id', '=', $request->user_id)->first();
        if($user){
            if (Hash::check($request->password, $user->password)){
                $request->session()->put('loginid', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else {
            return back()->with('fail', 'User Id does not registered');
        }

    }

    public function dashboard(){
        $data = array();
        if (Session::has('loginid')){
            $data = User::where('id', '=', Session::get('loginid'))->first();
        }
        return view('dashboard', compact('data'));

    }

    public function logout()
    {
        if (Session::has('loginid'))
        {
            Session::pull('loginid');
            return redirect('login');
        }
    }

}
 