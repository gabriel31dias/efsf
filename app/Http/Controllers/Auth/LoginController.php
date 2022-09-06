<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;


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

        $this->checkExpiration($user);

        if($user->status == false){
            return redirect()->route('login')->with('message', 'Usuario desativado.');
        }

        if($user->blocked == false){
            return redirect()->route('login')->with('message', 'Usuario bloqueado.');
        }

        if(!isset($user->id)){
            return redirect()->route('login')->with('message', 'Usuário não encontrado.');
        }
        if(isset($user->id) && Hash::check($req->password, $user->password) && $user->status == true && $user->blocked == false){
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('message', 'Um erro ocorreu ao fazer o login.');
        }
    }

    public function checkExpiration($user){
        $now = Carbon::now();
        $activate_date_time = Carbon::parse($user->activate_date_time);

        if($user->profile_id){
            $getProfile = Profile::find($user->profile_id);
            $activate_date_time->addDays($getProfile->days_to_access_inspiration);
        }

        if($activate_date_time < $now){
            $this->setExpiredUser($user);
        }
    }

    public function setExpiredUser($user){
        $user->update(['status' => false ]);
        Auth::logout();
    }


}
