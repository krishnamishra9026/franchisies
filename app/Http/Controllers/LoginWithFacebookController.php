<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Creator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
  
class LoginWithFacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        if (Session::get('login_type') == 'creator') {

            try {
                Session::forget('login_type');

                $user = Socialite::driver('facebook')->stateless()->user();

                $finduser = Creator::where('facebook_id', $user->id)->orWhere('email', $user->email)->first();

                if($finduser){

                    Auth::guard('creator')->login($finduser);

                    return redirect()->intended(route('creator.dashboard'));

                }else{
                    $newCreator = Creator::create([
                        'name' => $user->name,
                        'firstname' => $user->given_name,
                        'username' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
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

                $user = Socialite::driver('facebook')->stateless()->user();

                $finduser = User::where('facebook_id', $user->id)->first();

                if($finduser){

                    Auth::login($finduser);

                    return redirect()->intended('home');

                }else{
                    $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'email' => $user->email,
                        'username' => $user->name,
                        'facebook_id'=> $user->id,
                        'is_email_verified' => 1,
                        'password' => Hash::make('password')
                    ]);

                    Auth::login($newUser);

                    return redirect()->intended('home');
                }

            } catch (Exception $e) {

                dd($e->getMessage());
            }
        }
    }
}
