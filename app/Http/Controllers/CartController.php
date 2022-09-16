<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    

}
