@extends('admin.template.base')
@section('banner-title', 'Administrateur- Modification des repas')
@section('title', 'Afficher un repas')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="singleMeal m-auto">
        <section class="topSection p-5">

            <h1 class="text-center">{{ $meal->name }}</h1>
        </section>
        
        {{-- @if ($added)
            <div class="alert alert-success text-center mt-3 mb-3">
                Vous avez bien ajoutez le repas au panier
            </div>
        @endif --}}

        <section class="mealSection fs-5">
            
            <img class="w-100 mb-5" src="{{ asset('storage/'.$meal->image_path) }}" alt="image">
            <p class="fw-bold">Type : </p>
            @if ($meal->vegetarian || $meal->gluten_free)
                @if ($meal->vegetarian)
                <p>Végétarien</p>
                @endif
                @if ($meal->gluten_free)
                    <p>Sans gluten</p>
                @endif
            @else
                <p>Classique</p>
            @endif
            
            
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
           <form method="POST" action="{{route('admin.repas.destroy', ['repa' => $meal->id])}}">
                @csrf
                @method('delete')
                
                <button type="submit" class="btn btn-primary mt-5">Supprimer</button>
            </form>
            

            

        </section>
    </main>
@endsection
