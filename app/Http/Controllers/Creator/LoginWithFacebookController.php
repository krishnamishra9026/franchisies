<?php
  
namespace App\Http\Controllers\Creator;
  
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
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
        Session::put('login_type', 'creator');
        return Socialite::driver('facebook')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
        
            $user = Socialite::driver('facebook')->stateless()->user();
         
            $finduser = Creator::where('facebook_id', $user->id)->first();
         
            if($finduser){
         
                // Auth::guard('creator')->login($finduser);
                Auth::guard('creator')->attempt(['email' => $user->email]);
       
                return redirect()->intended('creator.dashboard');
         
            }else{
                $newCreator = Creator::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'email' => $user->email,
                        'username' => $user->name,
                        'facebook_id'=> $user->id,
                        'is_email_verified' => 1,
                        'password' => Hash::make('creator.account-setting')
                    ]);
        
                // Auth::guard('creator')->login($newCreator);
                Auth::guard('creator')->attempt(['email' => $user->email]);
        
                return redirect()->intended('home');
            }
       
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}
