@extends('public.template.base')
@section('banner-title', 'Repas : ' . $meal->name)
@section('content')
    <main class="singleMeal">
        <section class="topSection p-5">

            <h1 class="text-center">{{ $meal->name }}</h1>
        </section>
        
        @if ($added)
            <div class="alert alert-success text-center m-3">
                Vous avez bien ajoutez le repas au panier
            </div>
        @endif

        <section class="mealSection fs-5">
            
            <img class="w-100 mb-5" src="{{ asset('storage/'.$meal->image_path) }}" alt="image">
            <hr />
            <p><span class="fw-bold">Menu :</span> {{ $meal->menu->menu_type->type }}</p>
            <p><span class="fw-bold">Description :</span> {{ $meal->description}}</p>
            <p><span class="fw-bold">Ingrédients :</span> </p>
            <ul>
                @foreach ($meal->ingredients as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p class="fw-bold">Allergènes :</p>
            <ul class="allergenContainer">
                @foreach ($meal->allergens as $allergen)
                    <li class="allergenItem">
                        @if ($allergen->name == 'Noix')
                            <i class="fa-duotone fa-peanuts"></i>
                        @endif
                        @if ($allergen->name == 'Lait')
                            <i class="fa-solid fa-cow"></i>
                        @endif
                        @if ($allergen->name == 'Oeuf')
                            <i class="fa-solid fa-egg"></i>
                        @endif
                        @if ($allergen->name == 'Crustacés')
                            <i class="fa-solid fa-shrimp"></i>
                        @endif
                    </li>
                @endforeach
            </ul>
           
            
            
            @if (session()->exists('cart') && count(session('cart')) >= 5)
                <div class="alert alert-danger text-center">Vous avez atteint le nombre maximum de repas dans une commande</div> 
            @elseif (session()->exists('cart') && in_array($meal->id, session('cart')))
                <div class="alert alert-danger text-center">Ce repas à déjà été ajouté</div>
            @elseif (session()->exists('menu') && session('menu') != $meal->menu->menu_type->type)
                <div class="alert alert-danger text-center">Ce repas fait partie du menu <span class="fw-bold">{{ $meal->menu->menu_type->type }}</span> <br> Mais le menu selectionné est : <span class="fw-bold">{{ session('menu') }}</span>. <br />Vous pouvez changer le menu en supprimant tous les repas de votre panier et en sélectionnant un repas du menu voulu.</div>
            @elseif (session()->missing('menu') || session('menu') == $meal->menu->menu_type->type)
                <a class="btn btn-primary mt-5" href="{{ route('meal', ['repas' => $meal->id, 'addCart' => true]) }}">Ajouter au panier</a>
            @endif
            <a class="btn btn-secondary mt-5" href="{{route('menu')}}">Retour au menu</a>

        </section>
    </main>
@endsection
