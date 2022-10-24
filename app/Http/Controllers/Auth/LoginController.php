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
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login', []);
    }

    public function checkEqualPass(Request $req){
        $user = User::where('id', $req->user_id)->first();
        return \response()->json(["is_correct" => Hash::check($req->password, $user->password)]);
    }

    public function saveNewPassword(Request $req){
        $user = User::where('id', $req->user_id)->first();
        $result = $user->update(['password' => Hash::make($req->password), "first_acess" => 0]);
        Session::put('updatePass', 'false');
        Session::put('firstAccess', 'false');
        return \response()->json(["result" => $result]);
    }

    public function login(Request $req){
        $user = User::where('user_name', $req->user_name)->first();

        $this->checkExpiration($user);

        if($user->first_acess == 1){
            Session::put('firstAccess', 'true');
        }

        if($user->status == false){
            return redirect()->route('login')->with('message', 'Usuário desativado.');
        }

        if($user->blocked == true){
            return redirect()->route('login')->with('message', 'Usuário bloqueado.');
        }

        if(!isset($user->id)){
            return redirect()->route('login')->with('message', 'Usuário não encontrado.');
        }
        if(isset($user->id) && Hash::check($req->password, $user->password) && $user->status == true ){
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
            Session::put('updatePass', 'true');
        }

        $activate_date_time->addDays(1);

        if($activate_date_time < $now){
            $this->setExpiredUser($user);
        }

    }

    public function setExpiredUser($user){
        $user->update(['blocked' => false ]);
       /// Auth::logout();
    }

    public function logout(){
        Auth::logout();


        return redirect('/');
    }


}
