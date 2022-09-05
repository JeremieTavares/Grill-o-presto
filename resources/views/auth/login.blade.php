@extends('layouts.app')

@section('content')
    <div class="container p-4 w-75">
        <div class="message mb-5">
            <h1 class="display-3 fw-bold">Bienvenue,</h1>
            <h2>Heureux de vous revoir !</h2>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="email" class="form-label">Courriel</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label ">Mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('email') is-invalid @enderror" required
                        autocomplete="current-password" />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            @if (Route::has('password.request'))
                <a class="btn btn-link my-3 p-0" href="{{ route('password.request') }}">
                    {{ __('J\'ai oublié mon mot de passe ?') }}
                </a>
            @endif

            <div>
                <button type="submit" class="btn btn-primary w-50">
                    {{ __('Se connecter') }}
                </button>
            </div>
        </form>

        <div class="d-flex w-75 m-auto mt-4 align-items-center">
            <hr class="col-3"><span class="col-6 text-center pb-1">Où se connecter</span>
            <hr class="col-3">
        </div>

        <div class="logo d-flex justify-content-center mt-4 gap-3">
            <div class="logo__faceboo rounded p-3 shadow-sm">
                <a href="{{ route('github.auth') }}"><img src="{{ asset('img/facebook-logo.png') }}" alt="Logo Facebook" /></a>
            </div>
            <div class="logo__google rounded p-3 shadow-sm">
                <a href="{{ route('google.auth') }}"><img src="{{ asset('img/google-logo.png') }}" alt="Logo Facebook" /></a>
            </div>
        </div>

        <div class="text-center mt-5">
            <p>Pas de compte ? <a href="{{ route('register') }}" class="link-primary">M'enregistrer</a></p>
        </div>
    </div>
@endsection
