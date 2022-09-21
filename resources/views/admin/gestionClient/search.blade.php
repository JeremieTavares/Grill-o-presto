@extends('public.template.base')
@section('banner-title', 'Administrateur- Modification des informations client')
@section('content')

    @include('admin.template.sub-navbar-admin-3')

    <main>
        <div class="container p-4">
            <div class="message my-5">
                <h2>Informations personnelles du client</h2>
            </div>


            @if (Session::has('successInfosChanged') ||
                Session::has('clientAccountUnblocked') ||
                Session::has('clientAccountUndeleted') ||
                Session::has('clientAccountDeleted') ||
                Session::has('clientAccountBlocked'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('clientAccountDeleted') }}
                    {{ Session::get('clientAccountBlocked') }}
                    {{ Session::get('clientAccountUnblocked') }}
                    {{ Session::get('clientAccountUndeleted') }}
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.client.update', ' ') }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom*</label>
                        <input type="text" name="prenom" id="prenom"
                            class="form-control @error('prenom') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->prenom }}" required autocomplete="prenom" autofocus>
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom*</label>
                        <input type="text" name="nom" id="nom"
                            class="form-control @error('nom') is-invalid @enderror" value="{{ $user[0]->infoUser->nom }}"
                            required autocomplete="nom" autofocus />
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="rue" class="form-label">Rue*</label>
                        <input type="text" name="rue" id="rue"
                            class="form-control @error('rue') is-invalid @enderror" value="{{ $user[0]->infoUser->rue }}"
                            required autocomplete="rue" autofocus>
                        @error('rue')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="noPorte" class="form-label">No de porte*</label>
                        <input type="text" name="noPorte" id="noPorte"
                            class="form-control @error('noPorte') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->no_porte }}" required autocomplete="noPorte" autofocus>
                        @error('noPorte')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="appartement" class="form-label">Appartement</label>
                        <input type="text" name="appartement" id="appartement"
                            class="form-control @error('appartement') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->appartement }}" autocomplete="appartement" autofocus>
                        @error('appartement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label for="zip_code" class="form-label">Code-Postal*</label>
                        <input type="text" name="zip_code" id="zip_code"
                            class="form-control @error('zip-code') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->code_postal }}" required autocomplete="zip-code" autofocus>
                        @error('zip-code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="ville" class="form-label">Ville*</label>
                        <input type="text" name="ville" id="ville"
                            class="form-control @error('ville') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->ville }}" required autocomplete="ville" autofocus>
                        @error('ville')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="tel" class="form-label">Numéro de téléphone*</label>
                        <input type="tel" name="tel" id="tel"
                            class="form-control @error('tel') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->telephone }}" required autocomplete="tel" autofocus>
                        @error('tel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="message my-5">
                        <h2 class="fs-1">Informations du compte client</h2>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Adresse courriel*</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ $user[0]->email }}"
                            required autocomplete="email" autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email_confirmation" class="form-label">Confirmer adresse courriel*</label>
                        <input type="email" name="email_confirmation" id="email_confirmation"
                            class="form-control @error('email_confirmation') is-invalid @enderror"
                            value="{{ $user[0]->email }}">
                        @error('email_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label ">Mot de passe*</label>
                        <input type="password" name="password" id="password" value="{{ $user[0]->password }}"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Entrer le mot de passe" />
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            value="{{ $user[0]->password }}"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirmer le mot de passe" />
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <h2 class="display-6 mt-5">Action sur le compte client</h2>

                    <div class="col-md-6 mt-5">
                        <label for="accountDeleted" class="form-label ">Date de suppression</label>
                        <input type="text" name="accountDeleted" id="accountDeleted"
                            value="{{ $user[0]->soft_deleted }}" disabled class="form-control"
                            placeholder="Date de suppression" />
                        <div class="mt-2">
                            <label for="restoreClient" class="form-check-label">Récupérer le compte de ce client ?</label>
                            <input type="checkbox" value="restoreClient" id="restoreClient" name="soft_deleted"
                                class="form-check-input">
                        </div>
                    </div>

                    <div class="col-md-6 mt-5">
                        <label for="accountBlocked" class="form-label">Date de du bannissement</label>
                        <input type="text" name="accountBlocked" id="accountBlocked"
                            value="{{ $user[0]->blocked_at }}" disabled class="form-control"
                            placeholder="Date du bloquage" />
                        <div class="mt-2">
                            <label for="unblockClient" class="form-check-label">Débloquer ce client ?</label>
                            <input type="checkbox" value="unblockClient" id="unblockClient" name="blocked_at"
                                class="form-check-input">
                        </div>
                    </div>

                    <input type="hidden" name="client_id" value="{{ $user[0]->id }}">
                </div>
                <div class="d-flex justify-content-sm-center justify-content-md-start">
                    <button type="submit"
                        class="btn btn-primary mt-5 mb-5 px-5 btn-scale-press btn-rounded">Enregistrer</button>
                </div>
            </form>
            @include('admin.gestionClient.template.modal-user-destroy')
            @include('admin.gestionClient.template.modal-user-block')
        </div>
    </main>
@endsection