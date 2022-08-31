<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        

        $meals = HistoryMeal::where('is_on_home_page', 1)->with('menu.menu_type')->whereHas('menu', function($query) {
            $date = date('Y-m-d');
            
            $query->where([['start_date', '<', $date], ['end_date', '>', $date]]);

        })->take(4)->get();

        
        return view('./public/home', ['meals' => $meals]);


    }
}
