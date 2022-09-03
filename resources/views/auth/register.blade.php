@extends('layouts.app')

@section('content')
    <div class="container p-4 w-75">
        <div class="message mb-5">
            <h1 class="display-3 fw-bold">Me créer un compte</h1>
            <h2>Laissez-nous vous guider pour créer un compte.<br />Cela ne prendra qu'une petite minute.</h2>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}"
                        required autocomplete="prenom" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}"
                        required autocomplete="nom" autofocus />
                </div>

                <div class="col-md-6">
                    <label for="tel" class="form-label">Numéro de téléphone</label>
                    <input type="tel" name="tel" id="tel" class="form-control" value="{{ old('tel') }}"
                        required autocomplete="tel" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="rue" class="form-label">Rue</label>
                    <input type="text" name="rue" id="rue" class="form-control" value="{{ old('rue') }}"
                        required autocomplete="rue" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="noPorte" class="form-label">No de porte</label>
                    <input type="text" name="noPorte" id="noPorte" class="form-control" value="{{ old('noPorte') }}"
                        required autocomplete="noPorte" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control" value="{{ old('ville') }}"
                        required autocomplete="ville" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Adresse courriel</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>
                </div>

                <div class="col-md-6">
                    <label for="confirmeEmail" class="form-label">Confirmer adresse courriel</label>
                    <input type="email" name="confirmeEmail" id="confirmeEmail" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label ">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Entrer le mot de passe" />
                </div>

                <div class="col-md-6">
                    <label for="confirmePassword" class="form-label ">Confirmer le mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Confirmer le mot de passe" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-5">S'enregistrer</button>
        </form>

        <div class="d-flex w-75 m-auto mt-4 align-items-center">
            <hr class="col-3"><span class="col-6 text-center pb-1">Où se connecter</span>
            <hr class="col-3">
        </div>

        <div class="logo d-flex justify-content-center mt-4 gap-3">
            <div class="logo__faceboo rounded p-3 shadow-sm">
                <a href="#"><img src="{{ asset('img/facebook-logo.png') }}" alt="Logo Facebook" /></a>
            </div>
            <div class="logo__google rounded p-3 shadow-sm">
                <a href="#"><img src="{{ asset('img/google-logo.png') }}" alt="Logo Facebook" /></a>
            </div>
        </div>

        <div class="text-center mt-5">
            <p>Déjà un membre ? <a href="{{ route('login') }}" class="link-primary">Me connecter</a></p>
        </div>
    </div>
@endsection
