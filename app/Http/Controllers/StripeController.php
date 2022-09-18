<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Session;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('public.template.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        dd($request);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => (200) + (200 * 0.15),
            "currency" => "CAD",
            "source" => $request->stripeToken,
            "description" => "Mon nom"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
