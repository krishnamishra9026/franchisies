<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Creator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;
use Session;

class LoginWithGoogleController extends Controller
{
     public function redirectToGoogle()
    {
        Session::put('login_type', 'creator');
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->stateless()->user();
       
            $finduser = Creator::where('google_id', $user->id)->orWhere('email', $user->email)->first();
       
            if($finduser){
       
                // Auth::login($finduser);
                Auth::guard('creator')->attempt(['email' => $user->email]);
      
                return redirect()->intended('creator.dashboard');
       
            }else{
                $newCreator = Creator::create([
                    'name' => $user->name,
                    'firstname' => $user->given_name,
                    'username' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'is_email_verified' => 1,
                    'password' => Hash::make('password')
                ]);
      
                // Auth::login($newCreator);
                Auth::guard('creator')->attempt(['email' => $user->email]);
      
                return redirect()->intended('creator.account-setting');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
