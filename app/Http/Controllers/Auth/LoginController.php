<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);

        if (User::where('email', $request->email)->exists()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                      
                if(profileCompletedSponsor() === 'completed'){
                    return redirect()->route('home');
                }else{
                    return redirect()->intended(route('account-setting'));
                }
            } else {

                return $this->sendFailedLoginResponse($request);
            }

        }  else{          

            if (Auth::guard('creator')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                if(profileCompletedCreator() === 'completed'){
                    return redirect()->route('creator.dashboard');
                }else{
                    return redirect()->intended(route('creator.account-setting'));
                }
            } else {

                return $this->sendFailedLoginResponse($request);
            }
        }
    }
}
