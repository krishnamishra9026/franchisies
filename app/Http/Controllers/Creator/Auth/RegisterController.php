<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Creator;
use App\Models\CreatorVerify;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Mail; 

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
        session(['tab' => 1]);
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
        session(['tab' => 1]);
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:creators'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:creators'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->back()->with('success','Registerd sucess')->with('message',$request->email);

        // $this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = Creator::create([
            'firstname' => $data['username'],
            'username' => $data['username'],
            'email' => $data['email'],
            'slug' => $data['username'],
            'uid' => md5(rand(1, 10) . microtime()),
            'password' => Hash::make($data['password']),
        ]);

        $token = Str::random(64);

        CreatorVerify::create([
            'creator_id' => $user->id, 
            'token' => $token
        ]);

        

        Mail::send('emails.creator.emailVerificationEmail', ['token' => $token, 'username' => $data['username']], function($message) use($data){
            $message->to($data['email']);
            $message->subject('Email Verification Mail');
        });      

        return $user; 
    }


    

}
