<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\HistoryMeal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {




        $meals = HistoryMeal::where('is_on_home_page', 1)->
                              with('menu.menu_type')->
                              whereRelation('menu', [['start_date', '<', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->
                              take(4)->
                              get();
    
        return view('./public/home', ['meals' => $meals]);
    }
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
