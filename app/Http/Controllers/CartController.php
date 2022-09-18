<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use Illuminate\Http\Request;
use App\Http\Requests\GuestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($delete = null) {
        if($delete) {
            
            $key = array_search($delete, session('cart'));
            session()->forget('cart.'. $key);
        }
            
        $meals = HistoryMeal::find(session('cart'));
        
        $this->removeMenuSession();

        return view('./public/cart', ['meals' => $meals]);
    }

    private function removeMenuSession() {
        if(session()->exists('cart') && count(session('cart')) == 0) {
            session()->forget('menu');
        }
    }

    public function preCheckoutGuest(GuestRequest $request) {

        $validatedData = $request->validated();

        $inviteInformation = $request;

        dd($inviteInformation);

    }

    public function preCheckout() {

        if(Auth::check()) {
            dd(Auth::user());
        }
        else
            dd('user not conencted');
        

    }

    

}
