@extends('admin.template.base')
@section('title', 'Menu modification')
@section('banner-title', 'Administrateur- Modification des menu')
@section('content')
    <main class="m-auto menu_edit_admin">
        
        <h1>Modification du menu</h1>
        @if (Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
            <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
        <p>Date : {{$menu->start_date." / ".$menu->end_date}}</p>
        <p>Type : {{$menu->menu_type->type}}</p>
        <form action="{{route('admin.menu.update', ['id' => $menu->id])}}" method="POST" class="d-flex flex-column align-items-center">
            @method('put')
            @csrf
            @if (date($menu->start_date) > date('Y-m-d', strtotime('last Monday + 7 days')))
                <div>
                    <label for="meals">Repas</label>
                    <select name="meals" id="meals" class="custom-select">
                        <option value="null">Repas</option>
                        @if (isset($meals))
                            @foreach ($meals as $meal)
                            <option class="meal" value="{{ $meal->id }}">{{ $meal->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            @else
                <p class="alert alert-warning">Ce menu est en cours ou est déjà passé, vous ne pouvez donc pas le changer.</p>
            @endif
            
            <div class="checkBox_container mb-5">
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
            <div class="meal_div_container mt-5 w-100">
                <div class="text-white d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                    <p class="m-0">Nom du repas</p>
                    <p class="m-0 mealsCounter">{{count($menu->history_meals)}}/10</p>
                    <p class="m-0">Supprimer</p>
                </div>
                <div class="meals_menu_container bg-light">
                    @foreach ($mealId as $name => $id)
                        <div id="meal-{{$id}}" class="adminMealDiv meal-{{$id}}"><p class="m-0">{{$name}}</p>
                            @if (date($menu->start_date) > date('Y-m-d', strtotime('last Monday + 7 days')))
                                <button type="button"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @if (date($menu->start_date) > date('Y-m-d', strtotime('last Monday + 7 days')))
                <input class="btn btn-warning m-auto mt-3" type="submit" value="Modifier le menu">
            @endif
        </form>
        <hr />
        <form method="POST" action="{{route('admin.menu.destroy', ['id' => $menu->id])}}" class="d-flex justify-content-center">
            @method('delete')
            @csrf
            @if (date($menu->start_date) > date('Y-m-d', strtotime('last Monday + 7 days')))
                <input class="btn btn-danger" type="submit" value="Supprimer le menu">
            @endif
        </form>
    </main>
@endsection
