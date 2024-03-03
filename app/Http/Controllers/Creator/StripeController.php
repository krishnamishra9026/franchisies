<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Earning;
use Session;
use Stripe;


class StripeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:creator');
    }
    
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $payment_detail = Stripe\Charge::create ([
                "amount" => ($request->amount)*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Payment by Creator for upgrading services.",
        ]);


        if ($payment_detail->status == 'succeeded') {

            Earning::create([
                'transaction_id' => $payment_detail->id,
                'user_type' => 'Creator',
                'user_id' => auth()->guard('creator')->user()->id,
                'username' => auth()->guard('creator')->user()->firstname.' '.auth()->guard('creator')->user()->lastname,
                'amount' => $request->amount,
                'badges' => json_encode(Session::get('ids')),
                'status' => 1,
            ]);

        }else{

            Earning::create([
                'transaction_id' => $payment_detail->id,
                'user_type' => 'Creator',
                'user_id' => auth()->guard('creator')->user()->id,
                'username' => auth()->guard('creator')->user()->firstname.' '.auth()->guard('creator')->user()->lastname,
                'amount' => $request->amount,
                'badges' => json_encode(Session::get('ids')),
                'status' => 0,
            ]);
        }
   
           
        return redirect()->route('creator.thankyou')->with('success', 'Your Payment Successfull!');
    }
}
