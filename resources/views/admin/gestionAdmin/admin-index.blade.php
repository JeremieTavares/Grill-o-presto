@extends('public.template.base')
@section('banner-title', 'Mon profil - informations personnelles')
@section('content')
    @include('admin.template.sub-navbar-admin-3')
    <main class="m-auto">
        <div class="mw-1000px">

            <label for="selectAdmin">Sélectionnez un Administrateur</label>
            <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select">

                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->prenom }}</option>
                @endforeach
            </select>

        </div>
    </main>
@endsection
