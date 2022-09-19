<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\User;
use App\Models\Creditcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreditCardRequest;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {

        if (Auth::check()) {
            $allCardsForLoggedUser = Creditcard::where('user_id', Auth::user()->id)->get();
        } else
            $allCardsForLoggedUser = 0;
        return view('public.template.stripe', ['cc' => $allCardsForLoggedUser]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(CreditCardRequest $request)
    {

        // FAIRE UN CUSTOM REQUEST WORKING NOW ITS NOT
        $validatedData = $request->validated();

        // ***KEEPING FOR BACKUP***
        // Find existing user
        // $stripeCust =  $stripe->customers->search([
        //     'query' => 'email:"\beauchampx@outlook.com"',
        // ]);
        // $stripUserObject =  $stripe->customers->retrieve(
        //     $user->stripeToken
        // );



        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(
            'sk_test_51LiLVXLQyEBjABClty9cNuhsOxMMyxAOdg2fAM9SXjI2nwMarcOuVtILIuzEe89E9iF5PmSpwwKhcTZ7N63v2A9800IGFHhOAb'
        );

        if (Auth::check()) {


            $user = User::getLoggedUserInfo()->first();


            // If the existing user have an StipeToken , it means it already exist
            // Then we connect that token to the actual stripe transaction (Stripe server side)
            if ($user->stripeToken > 1) {
                //Update the default creditcard for the logged user
                $stripe->customers->update($user->stripeToken, ['source' => $request->stripeToken]);
                // Create a new transaction for the logged user
                $transaction = Stripe\Charge::create([
                    "amount" => (200) + (200 * 0.15),
                    "currency" => "CAD",
                    "customer" => $user->stripeToken,
                    "description" => "Paiement Gill-O-Presto"
                ]);
                // Insert the credit card in the Database for the related user for the first transaction evermade for the user
                $cc = Creditcard::verifyIfUserUsingExistingCard($request)->get('card_number');
                if (isset($cc[0])) {
                    Creditcard::newCardFill($request);
                }
            }


            // iF LOGGED USER DONT HAVE A STRIPE ACCOUNT
            else {
                // Create new client for Stripe for the ACTIVE LOGGED USER IN GRILL-O-PRESTO
                $newClientLogged =  $stripe->customers->create([
                    'description' => "Client email: $user->email, Form email: $request->email",
                    'name' => $user->prenom . " " . $user->nom,
                    'email' => $user->email
                ]);
                //Update the default creditcard for the logged user

                $stripe->customers->update($newClientLogged->id, ['source' => $request->stripeToken]);

                // Create a new transaction for the logged user
                $transaction = Stripe\Charge::create([
                    "amount" => (200) + (200 * 0.15),
                    "currency" => "CAD",
                    "customer" => $newClientLogged->id,
                    "description" => "Paiement Gill-O-Presto"
                ]);
                $user->stripeToken = $newClientLogged->id;
                $user->save();
                // Insert the credit card in the Database for the related user

                $cc = Creditcard::verifyIfUserUsingExistingCard($request)->get('card_number');
                if (isset($cc[0])) {
                    Creditcard::newCardFill($request);
                }
            }
        }




        // IF ITS A GUEST CHECKOUT
        else {
            $fullName = $request->prenom . ' ' . $request->nom;
            // Create new guest user profile
            $newClient =  $stripe->customers->create([
                'description' => "Form email: $request->email",
                'name' => $fullName,
                'email' => $request->email
            ]);

            // Create new credit card for guest user profile in stripe
            $stripe->customers->createSource(
                $newClient->id,
                ['source' => $request->stripeToken]
            );
            
            // Create new transaction for guest user
            $transaction = Stripe\Charge::create([
                "amount" => (2002) + (200 * 0.15),
                "currency" => "CAD",
                "customer" => $newClient->id,
                "description" => "Paiement Gill-O-Presto"
            ]);
        }



        // Get the id of the transaction
        // $transaction->id

        if ($transaction->status === "succeeded") {
            if (Auth::check())
                return to_route('user.orders.index', Auth::user()->id)->with('paymentSuccess', "Merci, Votre paiement est passée");
            else
                return back()->with('paymentSuccess', "Merci, Votre paiement est passée");
        } else {
            return back()->with('paymentFailed', "Erreur lors du paiement");
        }
    }
}



//'customer' =>  'cus_MSMFPr2kPILU55',
//"source" => $request->stripeToken,