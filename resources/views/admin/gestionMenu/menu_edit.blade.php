@extends('admin.template.base')
@section('title', 'Menu modification')
@section('content')
    <main class="menu_edit_admin">
        <h1>Modification du menu</h1>
        <p>Date : {{$menu->start_date." / ".$menu->end_date}}</p>
        <p>Type : {{$menu->menu_type->type}}</p>
        <div>
            <label for="meals">Repas</label>
            <select name="meals" id="meals" class="custom-select">
                <option value="null">Repas</option>
                @foreach ($meals as $meal)
                    <option class="meal" value="{{ $meal->id }}">{{ $meal->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="checkBox_container">
            @foreach ($meals as $meal)
            @php
                $mealInMenu = false;
            @endphp
                @foreach ($menu->history_meals as $hMeal)
                    @if ($hMeal->name == $meal->name)
                        @php
                            $mealInMenu = true;
                        @endphp
                    @endif
                @endforeach
                <input name="meal-{{ $meal->id }}" type="checkbox" class="meal-{{ $meal->id }}" {{$mealInMenu ? 'checked="checked"' : ''}}>
            @endforeach
        </div>
        <div class="alert alert-danger maxMealBox displayNone">Vous avez atteint le nombre maximum de plat par menu.</div>
        <div class="alert alert-danger alreadyTaken displayNone">Vous avez déjà sélectionné ce repas dans ce menu.</div>
        <div class="meal_div_container">
            <div class="d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                <p class="m-0">Nom du repas</p>
                <p class="m-0 mealsCounter">{{count($menu->history_meals)}}/10</p>
                <p class="m-0">Supprimer</p>
            </div>
            <div class="meals_menu_container">
                @foreach ($mealId as $name => $id)
                    <div id="meal-{{$id}}" class="adminMealDiv meal-{{$id}}"><p>{{$name}}</p><button type="button"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button></div>
                @endforeach
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Ajouter le menu">
    </main>
@endsection
