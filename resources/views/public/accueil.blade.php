@extends('public.template.base')

@section('content')

<main>
    <section class="wave_top_section w-100">
        <div class="over_wave_top bg-primary">
            <div>
                <div class="d-flex flex-column me-5">
                    <h1>GRILL-O-<br />PRESTO</h1>
                    <a href="#" class="btn btn-secondary home_btn ">Nos menus</a>
                </div>
                <p class="ms-5">Des mets savoureux préparé par les gens d'ici pour les gens d'ici !<br /> Plats pour tous, végétariens et sans glutens.</p>
            </div>
           

        </div>
        <img class="waveTop" src="./image/waveTop.svg" alt="wave">
        <img class="saladeImg col-sm-4" src="./image/salade_no_bg.png" alt="Salade Image">
    </section>

    <section class="w-100 p-5">
        <h2 class="text-center mb-5">NOS FAVORIS DE LA SEMAINE  </h2>
        <div class="home_grid_card">
            
                @for ($i = 0; $i < 4; $i++)

                <div class="meal_card">
                    <img src="./image/meal.jpg" alt="repas_image">
                    <p>Nom</p>
                    <p>Type menu</p>
                </div>

            @endfor
            </div>
        </div>
    </section>
    
</main>

@endsection