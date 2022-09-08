@extends('public.template.base')

@section('content')
    <main class="plat">
        <div class="container d-flex justify-content-center">
            <h1>Le plat sélectionné{{-- {{ $meal->mealName}} --}}</h1>
        </div>

        <div class="d-flex justify-content-center p-5">
            <div class="card mb-3">
                <img src="{{URL ('images/meatDish.jpg')}}" class="card-img-top" alt="image de viande"> 
                <div class="card-body">
                    <h2 class="card-title display-6">Parametre nom{{-- {{ $meal->mealNumber}} --}}</h2>
                    <p class="card-text">Parametre categorie{{-- {{ $meal->mealDescription}} --}}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-left p-4 pl-5 align-items-center">
                <h3 class="m-0">Plât:</h3>
                <p class="m-0">Saumon Roti( Faux plat) {{-- {{ $meal->mealName} --}}</p>
            </div>
            <div class="d-flex justify-content-left p-4 align-items-center">
                <h3 class="m-0">Menu:</h3>
                <p class="m-0">Vegetarien (faux Menu){{-- {{ $meal->mealMenu}} --}}</p>
            </div>
            <div class="d-flex justify-content-left p-4 align-items-center">
                <h4>Description du plat:{{-- {{ $meal->mealMenu}} --}}</h4>
            </div>
        </div>
      


        <div class="container pt-5 pb-5">
            <div class="d-flex justify-content-center p-1">
                <h3>Allergènes</h3>
            </div>
           <div class="d-flex justify-content-center">
            <a href="#" class="p-2"><img src="{{URL ('images/milkAllergen.png')}}" alt="du lait"></a>
            <a href="#" class="p-2"><img src="{{URL ('images/wheatAllergen.png')}}" alt="du ble"></a>
           </div>
            
        </div>


        <div class="container d-flex justify-content-center">
            <h3>Choisir la portion</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <a href="" class="btn btn-primary border-0  m-1">1 personne</a>
            <a href="" class="btn btn-primary border-0 m-1">2 personnes</a>
            <a href="" class="btn btn-primary border-0  m-1">4 Familliale</a>    
        </div>

        <hr class="breakLine">
        <div class="container d-flex justify-content-center p-5">
            <h2>Prix du repas:</h2>
        </div>
        <div class="d-flex justify-content-center">
            <h3>55${{-- {{ $meal->mealPrice}} --}}</h3>
        </div>

        <div class="container d-flex justify-content-center p-5">
            <a href="" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </main>
@endsection
