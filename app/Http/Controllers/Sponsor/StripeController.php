<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Earning;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
                "description" => "Payment by Sponsor for upgrading services.",
        ]);

        if ($payment_detail->status == 'succeeded') {

            Earning::create([
                'transaction_id' => $payment_detail->id,
                'user_type' => 'Sponsor',
                'user_id' => auth()->user()->id,
                'username' => auth()->user()->first_name.' '.auth()->user()->last_name,
                'badges' => json_encode(Session::get('ids')),
                'amount' => $request->amount,
                'status' => 1,
            ]);

        }else{

            Earning::create([
                'transaction_id' => $payment_detail->id,
                'user_type' => 'Sponsor',
                'user_id' => auth()->user()->id,
                'amount' => $request->amount,
                'username' => auth()->user()->first_name.' '.auth()->user()->last_name,
                'badges' => json_encode(Session::get('ids')),
                'status' => 0,
            ]);
        }
              
        return redirect()->route('thankyou')->with('success', 'Your Payment Successfull!');
    }
}
