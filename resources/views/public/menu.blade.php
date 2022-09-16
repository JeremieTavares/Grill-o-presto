@extends('public.template.base')

@section('content')
    <main class="menu pt-5 pb-5 ps-1 pe-1">

        <div class="blocHeader">
            <h1 class="text-center">Sélectionnez un menu</h1>

            <nav class="nav_container m-auto mt-5">
                <ul class="d-flex justify-content-between align-items-center">
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white {{$menu == 'all' ? 'nav_selected' : ''}}" href="{{route('menu', ['menu' => 'all'])}}">Tout les plats</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white {{$menu == 'classic' ? 'nav_selected' : ''}}" href="{{route('menu', ['menu' => 'classic'])}}">Standard</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white {{$menu == 'vegetarian' ? 'nav_selected' : ''}}" href="{{route('menu', ['menu' => 'vegetarian'])}}">Végétarien</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white {{$menu == 'gluten-free' ? 'nav_selected' : ''}}" href="{{route('menu', ['menu' => 'gluten-free'])}}">Sans Gluten</a></li>
                </ul>
            </nav> 

            {{-- <div>
                <h2>Rechercher un plat</h2>
            </div>

            <div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputText" aria-describedby="emailHelp"
                        placeholder="Entrez le nom d'un plat">
                    <a href="" class="btn btn-primary">Rechercher</a>
                </div>
            </div> --}}
        </div>
        <section class="menu_section">
            @if ($menu == 'all')
                <h2>Nos Favoris de la semaine</h2>
                <div class="card_container">
                    @foreach ($favMeals as $meal)
                    <a href="{{route('meal', ['repas' => $meal->id])}}">
                        <div class="meal_card">
                            <img src="{{ $meal->image_path }}" alt="repas_image">
                            <p>{{ $meal->name }}</p>
                            <p>{{ $meal->menu->menu_type->type }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>

                <hr>
            @endif
        
            @if ($menu == 'all' || $menu == 'classic')
                <h2>Not plats réguliers</h2>
                <div class="card_container">
                    @foreach ($meals['classic'] as $meal)
                    <a href="{{route('meal', ['repas' => $meal->id])}}">
                        <div class="meal_card">
                            <img src="{{ $meal->image_path }}" alt="repas_image">
                            <p>{{ $meal->name }}</p>
                            <p>{{ $meal->menu->menu_type->type }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <hr>
            @endif
            
            @if ($menu == 'all' || $menu == 'vegetarian')
                <h2>Not plats Végétariens</h2>
                <div class="card_container">
                    @foreach ($meals['vegan'] as $meal)
                    <a href="{{route('meal', ['repas' => $meal->id])}}">
                        <div class="meal_card">
                            <img src="{{ $meal->image_path }}" alt="repas_image">
                            <p>{{ $meal->name }}</p>
                            <p>{{ $meal->menu->menu_type->type }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <hr>
            @endif
            
            @if ($menu == 'all' || $menu == 'gluten-free')
                <h2>Not plats sans-gluten</h2>
                <div class="card_container">
                    @foreach ($meals['gluten_free'] as $meal)
                    <a href="{{route('meal', ['repas' => $meal->id])}}">
                        <div class="meal_card">
                            <img src="{{ $meal->image_path }}" alt="repas_image">
                            <p>{{ $meal->name }}</p>
                            <p>{{ $meal->menu->menu_type->type }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            @endif
            
        </section>
    </main>
@endsection
