<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Find existing user

        // $stripeCust =  $stripe->customers->search([
        //     'query' => 'email:"\beauchampx@outlook.com"',
        // ]);
        // $userToken =  $stripe->customers->retrieve(
        //    'cus_MSM12CcDpafOSl',
        // );
        //
        //dd($request->stripeToken);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(
            'sk_test_51LiLVXLQyEBjABClty9cNuhsOxMMyxAOdg2fAM9SXjI2nwMarcOuVtILIuzEe89E9iF5PmSpwwKhcTZ7N63v2A9800IGFHhOAb'
        );


        $fullName = $request->prenom . ' ' . $request->nom;
        if (Auth::check()) {
            $user = User::getLoggedUserInfo()->first();
            // If the existing user have an StipeToken , it means it already exist
            // Then we connect that token to the actual stripe transaction (Stripe server side)
            if ($user->stripeToken > 1) {
                Stripe\Charge::create([
                    "amount" => (200) + (200 * 0.15),
                    "currency" => "CAD",
                    "customer" => $user->stripeToken,
                    "description" => "Paiement Gill-O-Presto"
                ]);
            } else {
                // Create new client for Stripe via Logged user
                $newClientLogged =  $stripe->customers->create([
                    'description' => "Client email: $user->email, Form email: $request->email",
                    'name' => $user->prenom . " " . $user->nom,
                    'email' => $user->email
                ]);
                //Update payment card
                $stripe->customers->createSource(
                    $newClientLogged->id,
                    ['source' => $request->stripeToken]
                );
                // Create new transaction
                $paiement = Stripe\Charge::create([
                    "amount" => (200) + (200 * 0.15),
                    "currency" => "CAD",
                    "customer" => $newClientLogged->id,
                    "description" => "Paiement Gill-O-Presto"
                ]);

                $user->stripeToken = $newClientLogged->id;
                $user->save();
            }
        } else {
            $newClient =  $stripe->customers->create([
                'description' => "Form email: $request->email",
                'name' => $fullName,
                'email' => $request->email
            ]);
            $stripe->customers->createSource(
                $newClient->id,
                ['source' => $request->stripeToken]
            );
            // Create new transaction
            $paiement = Stripe\Charge::create([
                "amount" => (2002) + (200 * 0.15),
                "currency" => "CAD",
                "customer" => $newClient->id,
                "description" => "Paiement Gill-O-Presto"
            ]);
        }
        Session::flash('success', 'Payment successful!');

        return back();
    }
}



//'customer' =>  'cus_MSMFPr2kPILU55',
//"source" => $request->stripeToken,