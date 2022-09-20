@extends('admin.template.base')

@section('content')

    <main class="menu_add_admin d-flex flex-column align-items-center">
        <h1>Ajouter un menu</h1>
        <form action="{{route('menu.admin.store')}}" method="POST" class="d-flex flex-column">
            @csrf
            <div>
                <label for="start_date">Choisir la date</label>
                <select name="start_date" id="start_date" class="custom-select">
                    @for ($i = 0; $i < 10; $i++)
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
                <label for="meals">Type de menu</label>
                <select name="meals" id="meals" class="custom-select">
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
            
            
            <div class="meal_div_container">
                <div class="d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                    <p class="m-0">Nom du repas</p>
                    <p class="m-0">Supprimer</p>
                </div>
                <div class="meals_menu_container">
                
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="Ajouter le menu">

        </form>

    </main>
    

@endsection