<?php

namespace App\Http\Controllers;

use App\Models\HistoryMeal;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;

class MenuAdmin extends Controller
{
    public function create() {
        $menuType = MenuType::all();
        $meals = Meal::all();

        return view('admin.menu_add', ['menuType' => $menuType, 'meals' => $meals]);
    }

    public function store(Request $request) {


        if(!Menu::where('start_date', $request['start-date'])->with('menu_type')->whereRelation('menu_type', ['type' => $request['menu_type']])->exists() ) {
            $menu = new Menu();
           
            $menu->menu_type_id =MenuType::where('type', $request['menu_type'])->get('id')[0]->id;
            $menu->start_date = $request['start_date'];
            $endDate = date('Y-m-d', strtotime("+7 day", strtotime($request['start_date'])));
            $menu->end_date =$endDate;
            $menu->save();

            $mealId = [];
            foreach ($request->all() as $key => $value) {
                if(explode('-', $key)[0] == 'meal') {
                    $idExp = explode('-', $key);
                    $id = $idExp[count($idExp)-1];
                    array_push($mealId, $id);
                    
                }
            }

            $meals = Meal::find($mealId);
            foreach ($meals as $key => $meal) {
                $hMeal = new HistoryMeal();

                $hMeal->name = $meal->name;
                $hMeal->ingredients = $meal->ingredients;
                $hMeal->description = $meal->description;
                $hMeal->vegetarian = $meal->vegetarian;
                $hMeal->gluten_free = $meal->gluten_free;
                $hMeal->spicy = $meal->spicy;
                $hMeal->menu_id = Menu::where('start_date', $request['start-date'])->with('menu_type')->whereRelation('menu_type', ['type' => $request['menu_type']])->get();
                $hMeal->image_path = $meal->image_path;
                $hMeal->is_on_home_page = 0;
                $hMeal->save();
                
            }
        

           

        }

        
    }
}
