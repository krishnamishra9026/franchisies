<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\CreatorVerify;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Mail; 
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {              
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password_confirmation' => 'required|same:password',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->back()->with('success','Registerd sucess')->with('message',$request->email);

        // $this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'first_name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id, 
            'token' => $token
        ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token, 'username' => $data['username']], function($message) use($data){
            $message->to($data['email']);
            $message->subject('Email Verification Mail');
        });      

        return $user;   
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail has been verified. You can login now .";
            } else {
                $message = "Your e-mail is already verified. You can login now.";
            }
        }

        Auth::guard('creator')->logout();
        Auth::guard('web')->logout();

        return redirect()->route('login')->with('message', $message);
    }


    public function verifyCreatorAccount($token)
    {
        $verifyUser = CreatorVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail has been verified. You can login now .";
            } else {
                $message = "Your e-mail is already verified. You can login now .";
            }
        }

        Auth::guard('creator')->logout();
        Auth::guard('web')->logout();

        return redirect()->route('login')->with('message', $message)->with('tab', 1);
    }

}
    