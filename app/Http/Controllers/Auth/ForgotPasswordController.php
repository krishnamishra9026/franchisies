<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
 use App\Notifications\Creator\ResetPasswordNotification;
 use App\Models\Creator;
 use App\Models\User;
 use Illuminate\Support\Facades\Password;
 use Illuminate\Support\Str;
 use Session;
 use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function showLinkRequestForm()
    {
        //Session::forget('status_email');
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {              
        $this->validateEmail($request);

        $email = $request->email;

        $stts = false;

        if(Creator::where('email', $email)->count() <= 0){
            if(User::where('email', $email)->count() <= 0){
                $stts = true;
                $this->validate($request, [
                    'email'         => 'required|email|unique:users',
                ]);
            }
        }

        if ($stts) {
            if(User::where('email', $email)->count() <= 0){
                if(Creator::where('email', $email)->count() <= 0){
                    $this->validate($request, [
                        'email'         => 'required|email|unique:creators',
                    ]);
                }
            }
        }
              

        if(Creator::where('email', $email)->count() > 0){

            $response = Password::broker('creators')->sendResetLink([
                'email' => $request->email
            ]);

            Session::put('status_email', 'A confirmation link has been sent to your email to reset the password!');

            return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
        }
         

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        Session::put('status_email', 'Email Reset Link sended successfully!');

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
}
