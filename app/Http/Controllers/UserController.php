<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $req)
    {
        $user= User::where(['email'=>$req->email],['password'=>$req->password])->first();
        if (!$user)
        {
           return "Username or Password is not matched";
        }
        else{

            session()->put('user', $user);
            return redirect('/');     
        } 
        
        

    }

    public function logout(Request $req)
    {   
        if($req->session()->has('user'))
        {
            session()->pull('user');
        } 
        return redirect('/loginshow');
    }
}
