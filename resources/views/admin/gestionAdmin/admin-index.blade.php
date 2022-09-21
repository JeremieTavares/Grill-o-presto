@extends('public.template.base')
@section('banner-title', 'Mon profil - informations personnelles')
@section('content')
    @include('admin.template.sub-navbar-admin-3')
    <main class="m-auto">
        <div class="container mw-1000px">

            <label for="selectAdmin">Sélectionnez un Administrateur</label>

            <form action="{{ route('admin.admin.edit', Auth::user()->id) }}" method="Post">
                @csrf
                <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select btn-rounded px-3">
                    <option value="" selected>Choisissez un Admin</option>
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Rechercher</button>
            </form>

        </div>
    </main>
@endsection
