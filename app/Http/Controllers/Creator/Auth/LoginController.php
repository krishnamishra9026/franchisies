<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:creator')->except('logout');
    }

    public function showLoginForm()
    {
        return view('creator.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);

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

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        if (Auth::guard('creator')->check())
        {
            Auth::guard('creator')->logout();
            return redirect()->route('creator.login');
        }
    }

    public function showRegisterForm()
    {
        return view('creator.auth.register');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);



    }
}
