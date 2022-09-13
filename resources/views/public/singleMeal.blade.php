@extends('public.template.base')

@section('content')
    <menu class="singleMeal">
        <section class="topSection p-5">

            

            <h1 class="text-center">{{ $meal->name }}</h1>
        </section>

        <section class="mealSection fs-5">
            @if ($addCart)
                <?php
                
                if (session()->missing('cart') || count(session('cart')) == 0) {
                    session()->put('menu', $meal->menu->menu_type->type);
                    session()->put('cart', []);
                }

                

                if(!in_array($meal->id, session('cart')) && count(session('cart')) < 5)  {
                    session()->push('cart', $meal->id);
                            
                    ?>
                        <div class="alert alert-success text-center mt-3 mb-3">
                            Vous avez bien ajoutez le repas au panier
                        </div>
                    <?php
                }
                
                ?>
            @endif
            <img class="w-100" src="{{ $meal->image_path }}" alt="image">
            <p><span class="fw-bold">Menu :</span> {{ $meal->menu->menu_type->type }}</p>
            <p><span class="fw-bold">Ingrédients :</span> </p>
            <ul>
                @foreach ($meal->ingredients as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p class="fw-bold">Allergens :</p>
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
                <div class="alert alert-danger">Vous avez atteint le nombre maximum de repas dans une commande</div> 
            @elseif (session()->exists('cart') && in_array($meal->id, session('cart')))
                <div class="alert alert-danger">Ce repas à déjà été ajouté</div>
            @elseif (session()->exists('menu') && session('menu') != $meal->menu->menu_type->type)
                <div class="alert alert-danger">Ce repas fait partie du menu <span class="fw-bold">{{ $meal->menu->menu_type->type }}</span> mais le menu selectionné est : <span class="fw-bold">{{ session('menu') }}</span>. <br />Vous pouvez changer le menu en supprimant tous les repas de votre panier et en sélectionnant un repas du menu voulu.</div>
            @elseif (session()->missing('menu') || session('menu') == $meal->menu->menu_type->type)
                <a class="btn btn-primary mt-5" href="{{ route('repas', ['repas' => $meal->id, 'addCart' => true]) }}">Ajouter au panier</a>
            @endif
            <a class="btn btn-primary mt-5" href="{{route('menu')}}">Retour au menu</a>

        </section>
    </menu>
@endsection
