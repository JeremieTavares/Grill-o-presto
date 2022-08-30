<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        

        $meals = HistoryMeal::where('is_on_home_page', 1)->whereHas('menu', function($query) {
            $date = date('Y-m-d');
            
            $query->where('start_date', '<', $date);
            $query->where('end_date', '>', $date);
            

        })->get();

        



    }
}
