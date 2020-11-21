<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
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
            $req->session()->put('user', $user);
             return redirect('/');     
        }


    }
}
