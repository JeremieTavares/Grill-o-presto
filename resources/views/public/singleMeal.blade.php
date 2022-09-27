@extends('public.template.base')
@section('banner-title', 'Menu : ' . $meal->menu->menu_type->type)
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

            <img class="w-100 mb-5" src="{{ asset('storage/' . $meal->image_path) }}" alt="image">
            <hr />
            <p><span class="fw-bold">Menu :</span> {{ $meal->menu->menu_type->type }}</p>
            <p><span class="fw-bold">Description :</span> {{ $meal->description }}</p>
            <p><span class="fw-bold">Ingrédients :</span> </p>
            <ul>
                @foreach ($meal->ingredients as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p class="fw-bold mb-1">Allergènes :</p>
            <div class="d-flex flex-column gap-3 mb-5">
                @foreach ($meal->allergens as $allergen)
                    @if ($allergen->name == 'Noix')
                        <div>
                            <img src="{{ asset('image/peanuts.png') }}" alt="peanut-allergy" class="fa-peanuts-custom"></i><span> Arachides et noix</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Lait')
                        <div>
                            <i class="fa-solid fa-cow"></i><span> Produits Laitiers</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Oeuf')
                        <div>
                            <i class="fa-solid fa-egg"></i><span> Œufs</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Crustacés')
                        <div>
                            <i class="fa-solid fa-shrimp"></i><span> Crustacés</span>
                        </div>
                    @endif
                @endforeach
            </div>




            @if (session()->exists('cart') && count(session('cart')) >= 5)
                <div class="alert alert-danger text-center">Vous avez atteint le nombre maximum de repas dans une commande
                </div>
            @elseif (session()->exists('cart') && in_array($meal->id, session('cart')))
                <div class="alert alert-danger text-center">Ce repas à déjà été ajouté</div>
            @elseif (session()->exists('menu') && session('menu') != $meal->menu->menu_type->type)
                <div class="alert alert-danger text-center">Ce repas fait partie du menu <span
                        class="fw-bold">{{ $meal->menu->menu_type->type }}</span> <br> Mais le menu selectionné est : <span
                        class="fw-bold">{{ session('menu') }}</span>. <br />Vous pouvez changer le menu en supprimant tous
                    les repas de votre panier et en sélectionnant un repas du menu voulu.</div>
            @elseif (session()->missing('menu') || session('menu') == $meal->menu->menu_type->type)
                <div class="d-flex flex-column align-items-start">
                    <div><a class="btn btn-primary mt-5 w-200px btn-rounded btn-scale-press"
                            href="{{ route('meal', ['repas' => $meal->id, 'addCart' => true]) }}">Ajouter au panier<i
                                class="fa-sharp fa-solid fa-cart-shopping ms-2"></i></a></div>
                    <div> <a class="btn btn-secondary mt-3 w-200px btn-rounded btn-scale-press"
                            href="{{ route('menu') }}">Retour au menu <i class="fa-solid fa-arrow-left ms-3"></i></a> </div>
                </div>
            @else
                <a class="btn btn-secondary mt-5" href="{{ route('menu') }}">Retour au menu</a>
            @endif
        </section>
    </main>
@endsection
