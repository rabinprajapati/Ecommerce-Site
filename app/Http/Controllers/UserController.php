<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $user=new User();
        $user->userName=$req->userName;
        $user->userEmail=$req->userEmail;
        $user->userPassword=Hash::make($req->userPassword);
        $user->save();
        return view('login');
    }
    public function login(Request $req)
    {
        $user=User::where(['userName'=>$req->userName])->first();
        if(!$user || !Hash::check($req->userPassword,$user->userPassword))
        {
            Session::put('message', 'username or password mismatch!');
            return redirect('/login');
        }
        else{
            Session::put('user',$user);
            return  redirect('/');
        }
    }
    public function logout()
    {
        Session::forget('user');
        return view('login');
    }
}
