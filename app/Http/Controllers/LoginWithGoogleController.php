<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use Laravel\Socialite\Facades\Socialite;
use App\Models\GoogleAuth;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginWithGoogleController extends Controller
{
     public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
      
            $finduser = GoogleAuth::where('google_id', $user->id)->first();
       
            if($finduser){
       
               // Auth::login($finduser);
               Auth::guard('google')->login( $finduser);
    
                return redirect()->intended('dashboard');
       
            }else{
                $newUser = GoogleAuth::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::guard('google')->login( $newUser );
               // Auth::login($newUser);
      
                return redirect()->intended('dashboard');
            }
      
        } catch (Exception $e) {
           dd($e->getMessage());

        }
    }
}
