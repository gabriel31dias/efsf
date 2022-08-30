<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login', []);
    }

    public function login(Request $req){

        $user = User::where('user_name', $req->user_name)->first();


        if(isset($user->id) && Hash::check($req->password, $user->password)){
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return redirect()->route('login');
        }
    }
}
