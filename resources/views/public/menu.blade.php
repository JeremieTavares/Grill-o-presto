@extends('public.template.base')

@section('content')
    <main class="menu p-5">

        <div class="blocHeader">
            <h1 class="text-center">Sélectionnez un menu</h1>

            <nav class="nav_container m-auto">
                <ul class="d-flex justify-content-between align-items-center">
                    <li class="bg-primary d-flex align-items-center justify-content-center"><a class="text-white" href="">Tout les plats</a></li>
                    <li class="bg-primary d-flex align-items-center justify-content-center"><a class="text-white" href="">Standard</a></li>
                    <li class="bg-primary d-flex align-items-center justify-content-center"><a class="text-white" href="">Végétarien</a></li>
                    <li class="bg-primary d-flex align-items-center justify-content-center"><a class="text-white" href="">Sans Gluten</a></li>
                </ul>
            </nav>

            <div>
                <h2>Rechercher un plat</h2>
            </div>

            <div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputText" aria-describedby="emailHelp"
                        placeholder="Entrez le nom d'un plat">
                    <a href="" class="btn btn-primary">Rechercher</a>
                </div>
            </div>
        </div>
        <section class="menu_section">
            <h2>Nos Favoris de la semaine</h2>
            <div class="card_container">
                @foreach ($favMeals as $meal)
                    <div class="meal_card">
                        <img src="{{ $meal->image_path }}" alt="repas_image">
                        <p>{{ $meal->name }}</p>
                        <p>{{ $meal->menu->menu_type->type }}</p>
                    </div>
                @endforeach
            </div>

            <hr>

            <h2>Not plats réguliers</h2>
            <div class="card_container">
                @foreach ($meals['classic'] as $meal)
                    <div class="meal_card">
                        <img src="{{ $meal->image_path }}" alt="repas_image">
                        <p>{{ $meal->name }}</p>
                        <p>{{ $meal->menu->menu_type->type }}</p>
                    </div>
                @endforeach
            </div>
            <hr>
            <h2>Not plats Végétariens</h2>
            <div class="card_container">
                @foreach ($meals['vegan'] as $meal)
                    <div class="meal_card">
                        <img src="{{ $meal->image_path }}" alt="repas_image">
                        <p>{{ $meal->name }}</p>
                        <p>{{ $meal->menu->menu_type->type }}</p>
                    </div>
                @endforeach
            </div>
            <hr>
            <h2>Not plats sans-gluten</h2>
            <div class="card_container">
                @foreach ($meals['gluten_free'] as $meal)
                    <div class="meal_card">
                        <img src="{{ $meal->image_path }}" alt="repas_image">
                        <p>{{ $meal->name }}</p>
                        <p>{{ $meal->menu->menu_type->type }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
