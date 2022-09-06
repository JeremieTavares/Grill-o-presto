<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        return view('public.accueil');
    }

    public function menuPage()
    {
        $meals = [
            "classic" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Classique')->get(),
            "vegan" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Végétarien')->get(),
            "gluten_free" => HistoryMeal::with('menu.menu_type')->whereRelation('menu', [['start_date', '<=', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->whereRelation('menu.menu_type', 'type', 'Sans Gluten')->get()
        ];

        $favMeals = HistoryMeal::where('is_on_home_page', 1)->
        with('menu.menu_type')->
        whereRelation('menu', [['start_date', '<', date('Y-m-d')], ['end_date', '>', date('Y-m-d')]])->
        take(4)->
        get();



        return view('public.menu', ['meals' => $meals, 'favMeals' => $favMeals]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
