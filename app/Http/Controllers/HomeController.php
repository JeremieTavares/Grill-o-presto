<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\HistoryMeal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        

        $meals = HistoryMeal::where('is_on_home_page', 1)->whereHas('menu', function($query) {
            $date = date('Y-m-d');        
            $query->where([['start_date', '<', $date],['end_date', '>', $date]]);
        })->get();




      
        // check ca zach, avec with wherehas et un array dans where ! ;) jai test pi ca marche

        // $meals = HistoryMeal::withWhereHas('menu', function($query) {
        //     $date = date('Y-m-d');        
        //     $query->where([['start_date', '<', $date],['end_date', '>', $date]]);
        // })->where('is_on_home_page', 1)->get();

        // dd($meals);

        dd($meals);


    }
}
