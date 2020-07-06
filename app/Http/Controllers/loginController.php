<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\users;

class loginController extends Controller

{

    function login(Request $request){

        $checkUserId = $request->session()->has('userId');

        if($checkUserId == true){
            return redirect('/home');
        }
        else{
            return view('socialLogin');
        }

    } 

    function logout(Request $request){

        $request->session()->flush();
        return redirect('/');
    }


    function callGithub(){

        $githubService = Socialite::driver('github')->redirect();
        return $githubService;

    }


    function loginCallback(){

        $user = Socialite::driver('github')->stateless()->user();

        $name = $user -> getName();
        $email = $user -> getEmail();
        $userId = $user -> getId();
        $avatar = $user -> getAvatar();

        Session::put('name', $name);
        Session::put('userId', $userId);
        Session::put('avatar', $avatar);

        $count = users::where('email', '=', $email)->count();

        if($count == 0){
            
            $result = users::insert(['name'=>$name , 'email'=> $email, 'userId'=> $userId]);

            return redirect('/home');
        }

        else{
            return redirect('/home');
        }
    }

}
