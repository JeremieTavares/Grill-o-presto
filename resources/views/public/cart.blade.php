@extends('public.template.base')

@section('content')
    <main class="cart">
        <section class="cart_container">
            @if (session()->exists('cart') && count(session('cart')) > 0)
            <h2 class="mb-5">Menu : {{ session('menu') }}</h2>
            <div class="card_container">
            
                @foreach ($meals as $meal)
                    
                        <div class="cart_card">
                            <a href="{{route('meal', ['repas' => $meal->id])}}">
                                <img src="{{$meal->image_path}}" alt="image">
                            </a>
                            <div class="text_container">
                                <p>Nom : {{$meal->name}}</p>
                                <a href="{{route('cart', ['delete' => $meal->id])}}">Supprimer de la commande</a>
                            </div>
                        </div>
                    
                @endforeach
            </div>
            @else
                <p class="mt-5 mb-5 text-center">Aucun repas n'a été selectionné</p>
            @endif
        </section>
        <section class="w-100 login_container d-flex flex-column align-items-center">
            <a class="btn btn-primary mt-5" href="{{route('login')}}">Se connecter</a>
                <hr class="w-75" />
            <h2>Rester invité</h2>
            <form method="POST" action="{{route('cart_store')}}">
                @csrf
                <div>
                    <div>
                        <label for="firstName">Prenom</label>
                        <input class="form-control" name="firstName" id="firstName" type="text">
                    </div>
                    
                    <div>
                        <label for="lastName">Nom</label>
                        <input class="form-control" name="lastName" id="lastName" type="text">
                    </div>

                    <div>
                        <label for="tel">Téléphone</label>
                        <input class="form-control" name="tel" id="tel"  type="tel">
                    </div>

                    <div>
                        <label for="street">Rue</label>
                        <input class="form-control" name="street" id="street"  type="text">
                    </div>

                    <div>
                        <label for="door">No de porte</label>
                        <input class="form-control" name="door" id="door"  type="text">
                    </div>

                    <div>
                        <label for="zip">Code postal</label>
                        <input class="form-control" name="zip" id="zip"  type="text">
                    </div>

                    <div>
                        <label for="town">Ville</label>
                        <input class="form-control" name="town" id="town"  type="text">
                    </div>

                    <div>
                        <label for="mail">Courriel</label>
                        <input class="form-control" name="mail" id="mail"  type="mail">
                    </div>

                    <input class="btn btn-primary mt-3 checkoutBTN" type="submit" value="Passer à la caisse">

                </div>
            </form>
        </section>
        
        </main>
@endsection
