@extends('public.template.base')

@section('content')
    <main class="cart">
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
            @if (Auth::check())
                <a href="{{route('preCheckout.log')}}">Passer à la caisse</a>
            @else
                <a class="btn btn-primary mt-5" href="{{ route('login') }}">Se connecter</a>
                <hr class="w-75" />
                <h2>Rester invité</h2>
                <form method="POST" action="{{ route('preCheckout.guest') }}">
                    @csrf
                    <div>
                        <div>
                            <label for="firstName">Prenom</label>
                            <input class="form-control @error('firstName') is-invalid @enderror"
                                value="{{ old('firstName') }}" name="firstName" id="firstName" type="text">
                            @error('firstName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="lastName">Nom</label>
                            <input class="form-control @error('lastName') is-invalid @enderror"
                                value="{{ old('lastName') }}" name="lastName" id="lastName" type="text">
                            @error('lastName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="tel">Téléphone</label>
                            <input class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}"
                                name="tel" id="tel" type="tel">
                            @error('tel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="street">Rue</label>
                            <input class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}"
                                name="street" id="street" type="text">
                            @error('street')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="door">No de porte</label>
                            <input class="form-control @error('door') is-invalid @enderror" value="{{ old('door') }}"
                                name="door" id="door" type="text">
                            @error('door')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="zip">Code postal</label>
                            <input class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}"
                                name="zip" id="zip" type="text">
                            @error('zip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="town">Ville</label>
                            <input class="form-control @error('town') is-invalid @enderror" value="{{ old('town') }}"
                                name="town" id="town" type="text">
                            @error('town')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="email">Courriel</label>
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                name="email" id="email" type="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input class="btn btn-primary mt-3 checkoutBTN" type="submit" value="Passer à la caisse">
            @endif


            </div>
            </form>
        </section>

    </main>
@endsection
