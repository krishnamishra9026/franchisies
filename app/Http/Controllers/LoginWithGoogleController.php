<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Creator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;
use Session;

class LoginWithGoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        if (Session::get('login_type') == 'creator') {
            try {
                Session::forget('login_type');

                $user = Socialite::driver('google')->stateless()->user();

                $finduser = Creator::where('google_id', $user->id)->orWhere('email', $user->email)->first();

                if($finduser){

                    Auth::guard('creator')->login($finduser);

                    return redirect()->intended(route('creator.dashboard'));

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

                    Auth::guard('creator')->login($newCreator);

                    return redirect()->intended(route('creator.account-setting'));
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }

        }else{

            try {

                $user = Socialite::driver('google')->stateless()->user();

                $finduser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

                if($finduser){

                    Auth::login($finduser);

                    return redirect()->intended('home');

                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'firstname' => $user->given_name,
                        'username' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'is_email_verified' => 1,
                        'password' => Hash::make('password')
                    ]);

                    Auth::login($newUser);

                    return redirect()->intended('account-setting');
                }

            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
    }
}
