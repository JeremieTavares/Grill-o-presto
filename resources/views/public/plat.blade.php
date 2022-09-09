@extends('public.template.base')
@section('banner-title', '{{-- {{ $meal->mealName}} --}} Poulet au saumon')

@section('content')
    <main class="plat d-flex flex-column px-3 my-5">
        <div class="d-flex justify-content-center cardRepas mb-4">
            <div class="card mb-3">
                <img src="{{ URL('images/cajun.webp') }}" class="card-img-top" alt="image de viande">
                <div class="card-body">
                    <h2 class="card-title display-6">Parametre nom{{-- {{ $meal->mealNumber}} --}}</h2>
                    <p class="card-text">Parametre categorie{{-- {{ $meal->mealDescription}} --}}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-left align-items-center">
                <h4 class="m-0">Plât:</h4>
                <p class="m-0">Saumon Roti( Faux plat) {{-- {{ $meal->mealName} --}}</p>
            </div>
            <div class="d-flex justify-content-left align-items-center my-4">
                <h4 class="m-0">Menu:</h4>
                <p class="m-0">Vegetarien (faux Menu){{-- {{ $meal->mealMenu}} --}}</p>
            </div>
            <div class="d-flex justify-content-left align-items-center">
                <h4>Description du plat:{{-- {{ $meal->mealMenu}} --}}</h4>
            </div>
        </div>



        <div class="container d-flex  my-5 align-items-center">
            <div class="d-flex justify-content-center">
                <h4>Allergènes</h4>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" class="p-2"><img class="allergenImg" src="{{ URL('images/milkAllergen.png') }}"
                        alt="du lait"></a>
                <a href="#" class="p-2"><img class="allergenImg" src="{{ URL('images/wheatAllergen.png') }}"
                        alt="du ble"></a>
            </div>

        </div>


        <div class="container d-flex justify-content-center">
            <h4>Choisir la portion</h4>
        </div>

        <div class="container d-flex justify-content-center">
            <a href="" class="btn btn-primary m-1 portion-mobile">1 personne</a>
            <a href="" class="btn btn-primary m-1 portion-mobile">2 personnes</a>
            <a href="" class="btn btn-primary m-1 portion-mobile">4 Familliale</a>
        </div>

        <hr class="breakLine w-50 my-4 m-auto">

        <div class="container d-flex justify-content-center gap-2">
            <h4>Prix du repas:</h4>
            <h4>55${{-- {{ $meal->mealPrice}} --}}</h4>
        </div>
        

        <div class="container d-flex justify-content-center my-3">
            <a href="" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </main>
@endsection
