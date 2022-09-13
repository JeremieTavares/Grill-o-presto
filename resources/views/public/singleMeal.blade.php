@extends('public.template.base')

@section('content')
    <menu class="singleMeal">
    <section class="topSection p-5">
       
        

        <h1 class="text-center">{{$meal->name}}</h1>
    </section>
    
    <section class="mealSection fs-5">
        @if ($addCart)
           
        <?php 
            if(session()->missing('cart')) {
                session()->put('cart', []);
                session()->put('menu', $meal->menu->menu_type->type);
            }

            $exist = false;
            foreach (session('cart') as $value) {
                if($value == $meal->id) {
                    $exist = true;
                }
            }
            
            if(!$exist && count(session('cart')) < 5)  {
                session()->push('cart', [$meal->id]);
                ?>
                    <div class="alert alert-success text-center mt-3 mb-3">
                        Vous avez bien ajoutez le repas au panier
                    </div>
                <?php
            }
            elseif(count(session('cart')) >= 5) {
                ?> <div class="alert alert-danger">Vous avez atteint le nombre maximum de repas dans une commande</div> <?php 
            }
            elseif($exist) {
                ?> <div class="alert alert-danger">Ce repas à déjà été ajouté</div> <?php 
            }
        ?>
    @endif
        <img class="w-100" src="{{$meal->image_path}}" alt="image">
        <p><span class="fw-bold">Menu :</span> {{$meal->menu->menu_type->type}}</p>
        <p><span class="fw-bold">Ingrédients :</span> </p>
        <ul>
            @foreach ($meal->ingredients as $ingredient)
                <li>{{$ingredient}}</li>
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

        @if (session()->missing('menu') || session('menu') == $meal->menu->menu_type->type)
            <a class="btn btn-primary mt-5" href="{{route('repas', ['repas' => $meal->id, 'addCart' => true])}}">Ajouter au panier</a>
        @else
            <p class="fw-bold mt-5">Vous ne pouvez pas ajouter un repas qui ne fait pas partie de votre menu selectionné : {{$meal->menu->menu_type->type}}</p>
        @endif
        
        
    </section>
</menu>

@endsection