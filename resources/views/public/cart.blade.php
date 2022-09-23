@extends('public.template.base')
@section('title', 'Panier')
@section('banner-title', 'Commande')
@section('content')
    <main class="cart m-auto">
        @if (Session::has('success'))
            <div class="alert alert-success  d-flex justify-content-between align-items-center mb-5"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('success') }}
                <button type="button" class="close btn btn-link text-decoration-none"
                    id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
            </div>
        @endif
        @if (Session::has('paymentSuccess'))
        <div class="alert alert-success  d-flex justify-content-between align-items-center"
            id="divAlertSucccessInfoChanged">
            {{ Session::get('paymentSuccess') }}
            <button type="button" class="close btn btn-link text-decoration-none"
                id="btnAlertSucccessInfoChanged"><span class="text-secondary">X</span></button>
        </div>
        @endif

        @if (Session::has('paymentFailed'))
            <div class="alert alert-danger  d-flex justify-content-between align-items-center"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('paymentFailed') }}
                <button type="button" class="close btn btn-link text-decoration-none"
                    id="btnAlertSucccessInfoChanged"><span class="text-secondary">X</span></button>
            </div>
        @endif
        
        <section class="cart_container">
            @if (session()->exists('cart') && count(session('cart')) > 0)
                <h2 class="mb-5">Menu : {{ session('menu') }}</h2>
                <div class="card_container">

                    @foreach ($meals as $meal)
                        <div class="cart_card">
                            <a href="{{ route('meal', ['repas' => $meal->id]) }}">
                                <img src="{{ $meal->image_path }}" alt="image">
                            </a>
                            <div class="text_container">
                                <p>Nom : {{ $meal->name }}</p>
                                <a href="{{ route('cart', ['delete' => $meal->id]) }}">Supprimer de la commande</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-5 mb-5 text-center">Aucun repas n'a été selectionné</p>
            @endif
        </section>
        <section class="w-100 login_container d-flex flex-column align-items-center">
                @guest
                    <a class="btn btn-primary mt-5" href="{{ route('login') }}">Se connecter</a>
                @endguest
                
                <hr class="w-75" />
                @if (Auth::check())
                    <h2>Information de commande</h2>
                @else
                    <h2>Rester invité</h2>
                @endif
                
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="top_div">
                        <div>
                            <label for="firstName">Prenom</label>
                            <input class="form-control @error('firstName') is-invalid @enderror"
                                value="{{ (Auth::check() ? Auth::user()->infoUser->prenom : old('firstName')) }}" name="firstName" id="firstName" type="text">
                            @error('firstName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="lastName">Nom</label>
                            <input class="form-control @error('lastName') is-invalid @enderror"
                                value="{{ (Auth::check() ? Auth::user()->infoUser->nom : old('lastName')) }}" name="lastName" id="lastName" type="text">
                            @error('lastName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="street">Rue</label>
                            <input class="form-control @error('street') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->rue : old('street')) }}"
                                name="street" id="street" type="text">
                            @error('street')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="appartement">Appartement</label>
                            <input class="form-control @error('door') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->appartement : old('appartement')) }}"
                                name="appartement" id="appartement" type="text">
                            @error('door')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="door">No de porte</label>
                            <input class="form-control @error('door') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->no_porte : old('door')) }}"
                                name="door" id="door" type="text">
                            @error('door')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="zip">Code postal</label>
                            <input class="form-control @error('zip') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->code_postal : old('zip')) }}"
                                name="zip" id="zip" type="text">
                            @error('zip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="town">Ville</label>
                            <input class="form-control @error('town') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->ville : old('town')) }}"
                                name="town" id="town" type="text">
                            @error('town')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            <div>
                                @guest
                                    <label for="tel">Téléphone</label>
                                @endguest
                                <input class="form-control @error('tel') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->telephone : old('tel')) }}"
                                    name="tel" id="tel" type="{{(Auth::check() ? "hidden" : "tel")}}">
                                @error('tel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <div>
                                @guest
                                    <label for="email">Courriel</label>
                                @endguest
                                <input class="form-control @error('email') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->email : old('email')) }}"
                                    name="email" id="email" type="{{(Auth::check() ? "hidden" : "email")}}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>  
                            
                            <div class="mt-3 mb-5 portion_div">
                                <label class="form-label" for="portion">Nombre de portions</label>
                                <select class="form-select p-2" name="portion" id="portion">
                                    @foreach ($portions as $portion)
                                    <option value="{{$portion->id}}">{{$portion->portion}}</option>
                                    @endforeach
                                </select>
                            </div>

            </div>
            @include('public.template.stripe')
            </form>
            <div class="priceInfo displayNone">
                <p>{{session()->exists('cart') ? count(session('cart')) : ""}}</p>
                @foreach ($priceInfo as $info)
                    <div class="price ">
                        <p>{{$info->portion_id}}</p>
                        <p>{{$info->price}}</p>
                    </div>
                @endforeach
            </div>
        </section>

    </main>
@endsection
