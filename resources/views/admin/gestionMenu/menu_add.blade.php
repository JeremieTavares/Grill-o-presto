@extends('admin.template.base')
@section('banner-title', 'Administrateur- Ajout menu')
@section('title', 'Menu ajout')
@section('content')

    <main class="m-auto menu_add_admin d-flex flex-column align-items-center">
        <h1>Ajouter un menu</h1>
        @if (Session::has('success'))
            
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @elseif(Session::has('menuAlreadyExists'))
            <div class="alert alert-danger">{{Session::get('menuAlreadyExists')}}</div>
        @endif
        <form action="{{route('admin.menu.store')}}" method="POST" class="d-flex flex-column">
            @csrf
            <div>
                <label for="start_date">Choisir la date</label>
                <select name="start_date" id="start_date" class="custom-select">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{date('Y-m-d',strtotime("next Monday + " . (7*$i) . " days"))}}">{{date('Y-m-d',strtotime("next Monday + " . (7*$i) . " days"))}}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label for="menu_type">Type de menu</label>
                <select name="menu_type" id="menu_type" class="custom-select">
                    @foreach ($menuType as $type)
                        <option value="{{$type->type}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="meals">Repas</label>
                <select name="meals" id="meals" class="custom-select">
                    <option value="null">Repas</option>
                    @foreach ($meals as $meal)
                        <option class="meal {{$meal->vegetarian ? "vegetarian" : ""}} {{$meal->gluten_free ? "gluten_free" : ""}}" value="{{$meal->id}}">{{$meal->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="checkBox_container">
                @foreach ($meals as $meal)
                    <input name="meal-{{$meal->id}}" type="checkbox" class="meal-{{$meal->id}}">
                @endforeach
            </div>
            
            <div class="alert alert-danger maxMealBox displayNone">Vous avez atteint le nombre maximum de plat par menu.</div>
            <div class="alert alert-danger alreadyTaken displayNone">Vous avez déjà sélectionné ce repas dans ce menu.</div>
            
            <div class="meal_div_container">
                <div class="d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                    <p class="m-0">Nom du repas</p>
                    <p class="m-0 mealsCounter">0/10</p>
                    <p class="m-0">Supprimer</p>
                </div>
                <div class="meals_menu_container">
                
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="Ajouter le menu">

        </form>

    </main>
    

@endsection