<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($menu = 'all')
    {
        $meals = [];

        if($menu == 'all' || $menu == 'classic')
            $meals += ["classic" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Classique')->get()];

        if($menu == 'all' || $menu == 'vegetarian')
            $meals += ["vegan" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Végétarien')->get()];

        if($menu == 'all' || $menu == 'gluten-free')
            $meals += ["gluten_free" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Sans Gluten')->get()];

        $favMeals = HistoryMeal::where('is_on_home_page', 1)->
        with('menu.menu_type')->
        whereRelation('menu', [['start_date', '<', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->
        take(4)->
        get();



        return view('public.menu', ['meals' => $meals, 'favMeals' => $favMeals, 'menu' => $menu]);
    }

    public function single($meal_id) {
        $meal = HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->find($meal_id);

        $meal->ingredients = json_decode($meal->ingredients);

        return view('./public/singleMeal', ['meal' => $meal]);
    }
}
