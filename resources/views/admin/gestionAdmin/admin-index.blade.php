@extends('public.template.base')
@section('banner-title', 'Mon profil - informations personnelles')
@section('content')
    @include('admin.template.sub-navbar-admin-3')
    <main class="m-auto">
        <div class="mw-1000px">

            <label for="selectAdmin">Sélectionnez un Administrateur</label>

            <form action="{{ route('admin.admin-edit', "") }}" method="POST">
                @csrf
                <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select">
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success mt-5">Rechercher</button>
            </form>

        </div>
    </main>
@endsection
